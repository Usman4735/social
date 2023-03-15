<?php

namespace App\Http\Controllers\SuperAdmin;
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
        $product_goods = ProductGood::orderBy('id', 'desc')->whereNot('status', 1)->get();
        return view("super-admin.product-goods.index", compact("product_goods"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_groups = ProductGroup::all();
        $admins= Admin::where('status', 1)->where('role', 'admin')->get();
        $statuses=ProductGoodStatus::all();
        return view("super-admin.product-goods.add", compact("product_groups", "admins", "statuses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
        $product->save();
        return redirect("sa1991as/product-goods")->with("success", "A Product Good has been saved successfully");
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
        $product_groups = ProductGroup::all();
        $admins= Admin::where('status', 1)->where('role', 'admin')->get();
        $managers=Admin::where('admin_id', $product->admin_id)->get();
        $statuses=ProductGoodStatus::all();

        return view("super-admin.product-goods.edit", compact("product", "product_groups", "managers", "statuses"));
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
        return redirect("sa1991as/product-goods")->with("success", "A Product Good has been updated successfully");
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
        return redirect("sa1991as/product-goods")->with("error", "A Product Good has been deleted");
    }
}
