<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Models\ProductGood;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use App\Models\ProductGoodStatus;
use App\Http\Controllers\Controller;

class ProductGoodController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_goods = ProductGood::where('admin_id', session('online_admin')->id)->whereNot('status', 1)->orderBy('id', 'desc')->get();
        return view("admin.product-goods.index", compact("product_goods"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_groups = ProductGroup::where('admin_id', session('online_admin')->id)->get();
        $managers=Admin::where('admin_id', session('online_admin')->id)->where('role', 'manager')->get();
        $statuses=ProductGoodStatus::whereIn('type', [2,3])->get();
        return view("admin.product-goods.add", compact("product_groups", "managers", "statuses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "group_id" => "required",
            "description" => "required"
        ],
        [
            "group_id.required" => "Please select a Product Group"
        ]);
        $product = new ProductGood();
        $product->fill($request->all());
        $product->admin_id=session('online_admin')->id;
        $product->save();
        return redirect("a1aa/product-goods")->with("success", "A Product Good has been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGood  $productGood
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGood $productGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGood  $productGood
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductGood::findOrFail(decrypt($id));
        $product_groups = ProductGroup::where('admin_id', session('online_admin')->id);
        $managers=Admin::where('admin_id', $product->admin_id)->where('role', 'manager')->get();
        $statuses=ProductGoodStatus::whereIn('type', [2,3])->get();
        return view("admin.product-goods.edit", compact("product", "product_groups", "managers", "statuses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGood  $productGood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "group_id" => "required",
            "description" => "required"
        ],
        [
            "group_id.required" => "Please select a Product Group"
        ]);
        $product = ProductGood::findOrFail(decrypt($id));
        $product->fill($request->all());
        $product->admin_id=session('online_admin')->id;
        $product->save();
        return redirect("a1aa/product-goods")->with("success", "A Product Good has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGood  $productGood
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductGood::findOrFail(decrypt($id));
        $product->delete();
        return redirect("a1aa/product-goods")->with("error", "A Product Good has been deleted");
    }
}
