<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Mailer;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\ProductGroup;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {

        $news=News::orderBy('id', 'desc')->where('is_published', 1)->get()->take(4);
        $testimonials=Testimonial::orderBy('id', 'desc')->get()->take(5);
        $product_groups=ProductGroup::orderBy('id', 'desc')->get()->take(8);
        return view("web.index", compact('news', 'testimonials', 'product_groups'));
    }

    public function register() {
        return view("web.register");
    }

    public function registerProcess(Request $request) {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "password" => "required_with:confirm_password|same:confirm_password|min:8",
            // "email" => "required|email|unique:customers",
        ]);
        $exists=Customer::where('email', $request->email)->first();
        if ($exists) {
            if ($request->has('p_token') && decrypt($request->p_token)=='cart-register') {
                return redirect('/cart')->with("cart-register-page-error", "You already register Please login");
            }else {
                return back()->with("error", "You already register Please login");
            }
        }else {
            $customer = new Customer();
            $customer->fill($request->all());
            $customer->password = Hash::make($request->password);
            $customer->save();
        }
        return redirect("/login")->with("success", "Your account has been registered. Login to continue");
    }

    public function login(Request $request) {
        if($request->session()->has('online_customer')) {
             return redirect("/");
        }else {
            return view("web.login");
        }
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $user = Customer::where("email", $request->email)->first();
        if ($user) {
            if ($user->block != 1) {
                $check_password = Hash::check($request->password, $user->password);
                if ($check_password) {
                    $request->session()->put('online_customer', $user);

                    if(session('cartinfo')!=null){
                        return redirect('/cart')->with("cart-login-page-success", "Login successfull Please proceed to checkout");

                    }else if ($request->has('p_token') && decrypt($request->p_token)=='cart-login') {
                        return redirect('/cart')->with("cart-login-page-success", "Login successfull Please proceed to checkout");
                    }else {
                        return redirect("/");
                    }
                } else {
                    if ($request->has('p_token') && decrypt($request->p_token)=='cart-login') {
                        return redirect('/cart')->with("cart-login-page-error", "Wrong email or password");
                    }else {
                        return back()->with("error", "Wrong email or password");
                    }

                }
            } else {
                if ($request->has('p_token') && decrypt($request->p_token)=='cart-login') {
                    return redirect('/cart')->with("cart-login-page-error", "Your account is blocked. Please contact us for the recovery of your account");
                }else {
                    return back()->with("error", "Your account is blocked. Please contact us for the recovery of your account");
                }
            }
        } else {
            if ($request->has('p_token') && decrypt($request->p_token)=='cart-login') {
                return redirect('/cart')->with("cart-login-page-error", "Wrong email or password");
            }else {
                return back()->with("error", "Wrong email or password");
            }
        }
    }

    public function logout(Request $request) {
        if($request->session()->has('online_customer')) {
            $request->session()->pull('online_customer');
        }
        return redirect("/");
    }


    public function forgotPassword()
    {
        return view("web.forgot-password");
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            ],[
            "email.required" => "Email Not Found!"
        ]);
        $customer = Customer::where("email", $request->email)->first();
        if($customer) {
            $otp = rand(111111, 999999);
            $email = $customer->email;

            $password_reset=PasswordReset::where('email', $email)->latest()->first();
            $now = Carbon::now();

            if ($password_reset && $now->isBefore($password_reset->expire_at)) {
                $otp=$password_reset->otp;
            }else {
                $password_reset = new PasswordReset();
                $password_reset->email = $email;
                $password_reset->otp = $otp;
                $password_reset->expire_at=Carbon::now()->addMinutes(5);
                $password_reset->type = 0; // 10= for customers
                $password_reset->save();
            }


            $message = [
                'username' => $customer->first_name,
                'otp' => $otp
            ];

            $view = view("mails.otp", compact("message"))->render();
            Mailer::Send("Password Reset ", $view, $email);
            return redirect('otp/'.encrypt($password_reset->id))->with('success', 'OTP has been sent to your email!');
        }else {
            return back()->with(" error", "The email is invalid" );
        }
    }

    public function otp(Request $request, $id)
    {
        $password_reset_otp = PasswordReset::findOrFail(decrypt($id));
        return view('web.otp', compact('password_reset_otp'));
    }

    public function otpVerify(Request $request, $id)
    {
        $request->validate([
            'otp' => 'required',
        ]);
        $otp =$request->otp;
        //Validation Logic
        $password_reset_otp = PasswordReset::where('id', decrypt($id))->where('type', 0)->where('otp', $otp)->first();
        $now = Carbon::now();
        if (!$password_reset_otp) {
            return back()->with('error', 'Your OTP is not correct');
        } elseif ($password_reset_otp && $now->isAfter($password_reset_otp->expire_at)) {
            return back()->with('error', 'Your OTP has been expired');
        }

        $user=Customer::where('email', $password_reset_otp->email)->firstOrFail();
        if ($user) {
            $password_reset_otp->expire_at=Carbon::now();
        }
        return redirect('reset-password/'.encrypt($user->id));
    }

    public function resetPassword($id)
    {
        $user=Customer::findOrFail(decrypt($id));
        return view('web.reset-password', compact('user'))->with('success', "OTP verified successfully");
    }
    public function processResetPassword(Request $request)
    {
        $request->validate([
            "password" => "min:8|required_with:confirm_password|same:confirm_password"
        ]);
        $customer = Customer::where('id', decrypt($request->token))->firstOrFail();
        if ($customer) {
            $customer->password = Hash::make($request->password);
            $customer->save();
        }
        return redirect('/login')->with('success', 'Your password has been reset successfully. Please login!');
    }

    public function myAccount()
    {

        return view('web.customer-account.index');
    }
    public function OrderHistory()
    {

        return view('web.customer-account.order-history');
    }
    public function orderVerification(Request $request)
    {
        return view('web.customer-account.order-verification');
    }
    public function profile()
    {

        $customer = Customer::findOrFail(session('online_customer')->id);
        return view('web.customer-account.profile', compact('customer'));
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            'email' => 'required|unique:customers,email,'.session('online_customer')->id,
            "mobile" => "required",
            'picture' => 'image|mimes:jpeg,png,jpg|max:5048',
        ]);

        $customer = Customer::findOrFail(session('online_customer')->id);

        $data = $request->all();

        if ($request->has('password') && $request->password != null) {
            $request->validate([
                "password" => "min:8|same:confirm_password"
            ]);
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $customer->password;
        }

        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email=$data['email'];
        $customer->mobile=$request->mobile;
        $customer->password=$data['password'];

        $customer->save();
        $request->session()->put('online_customer', $customer);
        return back()->with("success", "Profile updated successfully");
    }
}
