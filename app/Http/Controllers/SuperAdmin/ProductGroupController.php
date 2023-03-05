<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductGroupPermission;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductGroup::orderBy('id', 'desc')->get();
        return view("super-admin.product-groups.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view("super-admin.product-groups.add", compact("categories"));
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
            $request->image->storeAs('public/product-group-images', $image_name);
            $product->image = $image_name;
        }
        if(isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_super_admin')->id;
        $product->added_by_role = 1;
        $product->save();
        return redirect("sa1991as/product-groups")->with("success", "Product Group has been saved successfully");
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
        $managers = Admin::where("role", "manager")->where('status', 1)->get();
        return view("super-admin.product-groups.edit", compact("product", "categories", "managers"));
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
            $request->image->storeAs('public/product-group-images', $image_name);
            $product->image = $image_name;
        }
        if(isset($request->tags)) {
            $product->tags = implode(",", $request->tags);
        }
        $product->added_by = session('online_super_admin')->id;
        $product->added_by_role = 1;
        $product->save();
        return redirect("sa1991as/product-groups")->with("success", "Product Group has updated saved successfully");
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
            $image_path = public_path() . '/product-group-images/' . $product->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $product->delete();
        return back()->with("error", "A category has been deleted");
    }

    public function addPermission($manager, $product) {
        $manager = Admin::find($manager);
        $product = Product::findOrFail($product);
        $permission = null;
        $existing_permission = ProductGroupPermission::where("product_group_id", $product->id)->where("manager_id", $manager->id)->first();
        if($existing_permission) {
            $permission = $existing_permission;
        }
        return view("super-admin.product-groups.permissions.index", compact("manager", "product", "permission"));
    }

    public function savePermission(Request $request, $manager, $product) {
        $manager = Admin::find($manager);
        $product = Product::findOrFail($product);
        $permission = ProductGroupPermission::where("product_group_id", $product->id)->where("manager_id", $manager->id)->first();
        if(!$permission) {
            $permission = new ProductGroupPermission();
            $permission->product_group_id = $product->id;
            $permission->manager_id = $manager->id;
        }
        $permission->fill($request->all());

        if($request->isNotFilled('see_price')) {
            $permission->see_price = null;
        }
        if($request->isNotFilled('edit_price')) {
            $permission->edit_price = null;
        }
        if($request->isNotFilled('see_photos')) {
            $permission->see_photos = null;
        }
        if($request->isNotFilled('edit_photos')) {
            $permission->edit_photos = null;
        }
        if($request->isNotFilled('see_description')) {
            $permission->see_description = null;
        }
        if($request->isNotFilled('edit_description')) {
            $permission->edit_description = null;
        }
        if($request->isNotFilled('see_tags')) {
            $permission->see_tags = null;
        }
        if($request->isNotFilled('edit_tags')) {
            $permission->edit_tags = null;
        }

        $permission->save();

        return back()->with("success", "Permission has been saved successfully");

    }
}
