<?php

namespace App\Http\Controllers\Manager;

use App\Models\ProductGood;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductGoodStatus;

class ProductGoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_goods = ProductGood::where('manager_id', session('online_manager')->id)->orderBy('id', 'desc')->get();
        return view("manager.product-goods.index", compact("product_goods"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_groups = ProductGroup::where('manager_id', session('online_manager')->id)->get();
        $statuses=ProductGoodStatus::where('type', 3)->get();
        return view("manager.product-goods.add", compact("product_groups", "statuses"));
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
        $product->manager_id=session('online_manager')->id;
        $product->admin_id=session('online_manager')->admin_id;
        $product->save();
        return redirect("m1001m/product-goods")->with("success", "A Product Good has been saved successfully");
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
        $product_groups = ProductGroup::where('manager_id', session('online_manager')->id)->get();
        $statuses=ProductGoodStatus::where('type', 3)->get();
        return view("manager.product-goods.edit", compact("product", "product_groups", 'statuses'));
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
        $product->save();
        return redirect("m1001m/product-goods")->with("success", "A Product Good has been updated successfully");
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
        return redirect("m1001m/product-goods")->with("error", "A Product Good has been deleted");
    }
}
