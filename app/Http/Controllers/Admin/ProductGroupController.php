<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
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
        $products = ProductGroup::where('admin_id', session('online_admin')->id)->orderBy('id', 'desc')->get();
        return view("admin.product-groups.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $managers=Admin::where('role', 'manager')->where('admin_id', session('online_admin')->id)->get();
        return view("admin.product-groups.add", compact("categories", 'managers'));
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
            "price" => "required"
        ]);
        $product = new ProductGroup();
        $product->fill($request->all());
        // Image
        if (isset($request->image)) {
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $image->move(public_path('product-group-images'), $image_name);

            $product->image = $image_name;
        }
        if(isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_admin')->id;
        $product->added_by_role = 2;
        $product->admin_id = session('online_admin')->id;
        $product->manager_id = $request->manager_id;
        $product->save();
        return redirect("a1aa/product-groups")->with("success", "Product Group has been saved successfully");
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
        $managers=Admin::where('role', 'manager')->where('admin_id', session('online_admin')->id)->get();
        return view("admin.product-groups.edit", compact("product", "categories", 'managers'));
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
            "price" => "required"
        ]);
        $product = ProductGroup::findOrFail(decrypt($id));
        $product->fill($request->all());
        // Image
        // Image
        if (isset($request->image)) {
            // Delete old image first
            if ($product->image != null) {
                $image_path = public_path() . '/product-group-images/' . $product->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $image->move(public_path('product-group-images'), $image_name);
            $product->image = $image_name;
        }
        if(isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_admin')->id;
        $product->added_by_role = 2;
        $product->manager_id = $request->manager_id;
        $product->save();
        return redirect("a1aa/product-groups")->with("success", "Product Group has updated saved successfully");
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
