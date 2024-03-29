<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\News;
use App\Models\Order;
use App\Models\Customer;
use App\Models\ProductGood;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\OrderDetails;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mailer;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function quickViewProduct($id)
    {
        $product=ProductGroup::findOrFail($id);
        return view('web.quick-view-product', compact('product'));
    }
    public function viewProduct($id)
    {
        $product=ProductGood::findOrFail($id);
        $related_products=ProductGood::where('group_id', $product->group_id)->get()->take(4);

        return view('web.view-product-details', compact('product', 'related_products'));
    }
    public function UpdateCartQuantity(Request $request)
    {
        $cartinfo = $request->session()->get("cartinfo");
        $data = $request->all();

        for ($i = 0; $i < count($cartinfo); $i++) {
            foreach ($data as $key => $value) {
                $tokens = explode("+", $key);
                if ($tokens[0] == "qty") {
                    if ($tokens[1] == $cartinfo[$i]["product"]->id) {
                        $cartinfo[$i]["qty"] = $value;
                    }
                }
            }
        }
        $request->session()->put("cartinfo", $cartinfo);
        return redirect("cart")->with("update-cart", "Cart updated successfully");
    }

    public function RemoveFromCart(Request $request, $id)
    {

        $cartinfo = $request->session()->get("cartinfo");
        $foundedIndex = -1;

        for ($i = 0; $i < count($cartinfo); $i++) {
            if ($cartinfo[$i]["product"]->id == $id) {
                $foundedIndex = $i;
            }
        }
        array_splice($cartinfo, $foundedIndex, 1);


        $request->session()->put("cartinfo", $cartinfo);

        return redirect("cart")->with("error", "Item remove from cart successfully");
    }
    public function addToCart(Request $request, $id)
    {

        $product=ProductGood::findOrFail($id);

        if ($product == null) {
            return url('/');
        }

        $qty = $request->qty;

        if ($qty <= 0) {
            return back()->with('error', "Something wen't wrong.");
        }

        $session_data = [];
        $session_data["product"] = $product;
        $data = $request->all();

        foreach ($data as $key => $value) {
            $session_data[$key] = $value;
        }

        $cartinfo = $request->session()->get("cartinfo");
        if ($cartinfo == null || empty($cartinfo)) {
            $cartinfo = [];
        }
        $founded = 0;
        for ($i = 0; $i < count($cartinfo); $i++) {
            if ($cartinfo[$i]["product"]->id == $session_data["product"]->id) {
                $founded = 1;
                $cartinfo[$i]["qty"] += $session_data["qty"];
            }
        }
        if ($founded == 0) {
            $cartinfo[] = $session_data;
        }

        $request->session()->put("cartinfo", $cartinfo);
        return back()->with('success', 'Product added to cart successfully');
    }

    public function viewCart(Request $request, $id=null)
    {
        // dd(decrypt($request->p_token));
        // dd($request->all());
        $p_token=null;
        $trending_products=ProductGood::orderBy('id', 'desc')->get();

        // if (decrypt($request->id)=='place-order') {
        //     dd("2");

        //     $p_token='place-order';
        //     return redirect('cart'.'/'. $p_token);
        // }elseif ( $request->id=='place-order') {
        //     dd('3');
        // }elseif ( $request->id=='buy-without-registration') {
        //     dd('ok');
        // }else if ($request->has('p_token') && decrypt($request->p_token)=='buy-without-registration') {
        //     // this will redirect to above if condition
        //     $p_token='place-order';
        //     return redirect('cart'.'/'. $p_token);
        // }else {
            // direct cart view
            // dd("4");
            return view('web.cart', compact('p_token'));
        // }
    }
    public function buyWithoutRegistration(Request $request)
    {
        $p_token='buy-without-registration';
        return view('web.cart', compact('p_token'));
    }
    public function paymentMethodResponse(Request $request)
    {
        dd($request->all());
    }
    public function paymentMethod()
    {
        $customer=Customer::find(session('online_customer')->id);
        return view('web.payment-method', compact('customer'));
    }

    // order placing
    public function checkoutProcess(Request $request, $id)
    {

        if (count(session('cartinfo'))>0 && decrypt($request->id)=='checkout') {
            $p_token='';
            $request->validate([
                'first_name' => "required",
                'last_name' => "required",
                'mobile' => "required",
                'email' => "required|email",
                'payment_method' => "required",
            ],[
                "payment_method.required" => "Please select payment method",
            ]);
            $user=null;
            $exists_customer=Customer::where('email', $request->email)->first();
            if ($exists_customer!=null) {
                $user=$exists_customer;
            }else {
                $random_password=Str::random(8);
                $customer= new Customer();
                $customer->fill($request->all());
                $customer->password=Hash::make($random_password);
                $customer->save();
                $user=$customer;
                $user->password = $random_password;
            }



            $cartinfo = $request->session()->get("cartinfo");

            // foreach ($cartinfo as $item) {

            //     $order=new Order();
            //     $order->customer_id=$user->id;
            //     $order->order_no=rand(666666,999999);
            //     $order->status=1;
            //     $order->payment_method=$request->payment_method;
            //     $order->good_id=$item['product']->id;
            //     $order->price=$item['product']->group->price;
            //     $order->qty=$item['qty'];
            //     $order->save();
            // }

            $order=new Order();
            $order->customer_id=$user->id;
            $order->order_no=rand(666666,999999);
            $order->status=1;
            $order->payment_method=$request->payment_method;
            $order->save();

            $cartinfo = $request->session()->get("cartinfo");
            $total_price=0;
            foreach ($cartinfo as $item) {
                $total_price+=$item['product']->group->price*$item['qty'];
                $order_details=new OrderDetails();
                $order_details->order_id=$order->id;
                $order_details->good_id=$item['product']->id;
                $order_details->group_id=$item['product']->group_id;
                $order_details->price=$item['product']->group->price;
                $order_details->qty=$item['qty'];
                $order_details->save();
            }
            $order->price=$total_price;
            $order->save();

            $message = "Customer placed the Order";
            $title = "New Order";
            $action_url = "#";
            $action_url = url('sa1991as/orders/view') . "/" . encrypt($order->id);

            $notification = new Notification();
            $notification->title = $title;
            $notification->message = $message;
            $notification->action_url = $action_url;
            $notification->type = 2;
            $notification->user_id = 1;
            $notification->seen = 0;
            $notification->save();

            // $order->price=$total_price;
            // to send mail
            // dd($cartinfo);
            $user_credentials = null;
            if($exists_customer == null) {
                $user_credentials = $random_password;
            }
            $view = view("mails.order-placed-mail", compact("user_credentials", "user", "cartinfo"))->render();
            Mailer::Send("Order Placed", $view, $user->email);

            $request->session()->put('order_placed', $order);
            return redirect('/checkout');
        } else {
            return back()->with('error', 'something went wrong');
        }
    }
    public function checkoutSuccess(Request $request)
    {
        if ($request->session()->has("order_placed")) {

            $p_token='checkout';
            $order=Order::find(session('order_placed')->id);
            if ($order!=null) {
                // if ($request->session()->has("cartinfo")) {
                //     $request->session()->pull("cartinfo");
                // }
                return view('web.cart', ['order' => $order, 'p_token' => $p_token])->with('order-placed', 'Your order is on hold Please pay through the selected payment method');
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
    }

    public function orderVerification(Request $request)
    {
        $similar_products=ProductGroup::all()->take(5);
        return view('web.order-verification', compact('similar_products'));
    }
    public function news()
    {
        $news=News::where('is_published', 1)->orderBy('id', 'desc')->paginate(4);
        return view('web.news.index', compact('news'));
    }
    public function newsDetails(Request $request, $id)
    {

        $news=News::where('seo_title', $id)->orWhere('seo_url', $id)->orWhere('title', $id)->firstOrFail();
        $blogs=News::where('is_published', 1)->whereNot('id', $news->id)->orderBy('id', 'desc')->get();
        return view('web.news.details', compact('news', 'blogs'));
    }
    public function howToBuy()
    {
        $news=News::orderBy('id', 'desc')->where('is_published', 1)->get()->take(4);
        $testimonials=Testimonial::orderBy('id', 'desc')->get()->take(5);
        return view('web.how-to-buy', compact('news', 'testimonials'));
    }
}
