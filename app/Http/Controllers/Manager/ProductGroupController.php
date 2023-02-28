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
        $product_group_ids = [];
        $manager_permissions = ProductGroupPermission::where("manager_id", session('online_manager')->id)->get();
        foreach($manager_permissions as $manager_permission) {
            $product_group_ids[] = $manager_permission->product_group_id;
        }
        $products = ProductGroup::whereIn('id', $product_group_ids)->get();
        return view("manager.product-groups.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view("manager.product-groups.add", compact("categories"));
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
            "category_id" => "required",
        ]);
        $product = new ProductGroup();
        $product->fill($request->all());
        // Image
        if (isset($request->image)) {
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/product-group-images', $image_name);
            $product->image = $image_name;
        }
        if (isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_manager')->id;
        $product->added_by_role = 3;
        $product->save();
        return redirect("m1001m/product-groups")->with("success", "Product Group has been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $productGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductGroup::findOrFail(decrypt($id));
        $categories = ProductCategory::all();
        $permission = ProductGroupPermission::where('product_group_id', $product->id)->where('manager_id', session('online_manager')->id)->first();
        return view("manager.product-groups.edit", compact("product", "categories", "permission"));
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
        $request->validate([
            "name" => "required",
            "category_id" => "required",
        ]);
        $product = ProductGroup::findOrFail(decrypt($id));
        $product->fill($request->all());
        // Image
        if (isset($request->image)) {
            // Delete old image first
            if ($product->image != null) {
                $image_path = public_path() . '/storage/product-group-images/' . $product->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/product-group-images', $image_name);
            $product->image = $image_name;
        }
        if (isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_manager')->id;
        $product->added_by_role = 3;
        $product->save();
        return redirect("m1001m/product-groups")->with("success", "Product Group has updated saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductGroup::findOrFail(decrypt($id));
        if ($product->image != null) {
            $image_path = public_path() . '/storage/product-group-images/' . $product->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $product->delete();
        return back()->with("error", "A category has been deleted");
    }
}
