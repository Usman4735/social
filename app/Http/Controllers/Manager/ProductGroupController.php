<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductGroupPermission;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product_group_ids = [];
        // $manager_permissions = ProductGroupPermission::where("manager_id", session('online_manager')->id)->get();
        // foreach($manager_permissions as $manager_permission) {
        //     $product_group_ids[] = $manager_permission->product_group_id;
        // }
        $products = ProductGroup::where('manager_id', session('online_manager')->id)->get();
        return view("manager.product-groups.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductGroup::findOrFail(decrypt($id));
        $categories = ProductCategory::all();
        $permission = ProductGroupPermission::where('product_group_id', $product->id)->where('manager_id', session('online_manager')->id)->first();
        return view("manager.product-groups.view", compact("product", "categories", "permission"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
