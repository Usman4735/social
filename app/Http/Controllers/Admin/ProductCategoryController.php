<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.product-category.index', compact('categories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = ProductCategory::all();
        return view("admin.product-category.add", compact("categories"));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
        "name" => "required",
        "category_description" => "required",
        "picture" => "required|image|mimes:png,jpg,jpeg",
        ]);
        $category = new ProductCategory();
        $category->fill($request->all());
        // Picture
        if (isset($request->picture)) {
        $picture = $request->picture;
        $picture_name = uniqid() . '.' . $picture->extension();
        $request->picture->storeAs('public/category-pictures', $picture_name);
        $category->picture = $picture_name;
        }
        $category->save();
        return redirect("a1aa/product-categories")->with("success", "A category has been saved successfully");
    }

    /**
    * Display the specified resource.
    *
    * @param \App\Models\ProductCategory $productCategory
    * @return \Illuminate\Http\Response
    */
    public function show(ProductCategory $productCategory)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Models\ProductCategory $productCategory
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $category = ProductCategory::findOrFail(decrypt($id));
        $categories = ProductCategory::all();
        return view("admin.product-category.edit", compact("category", "categories"));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\ProductCategory $productCategory
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "category_description" => "required",
            "picture" => "image|mimes:png,jpg,jpeg",
        ]);
        $category = ProductCategory::findOrFail(decrypt($id));
        $category->fill($request->all());
        // Picture
        if (isset($request->picture)) {
            // Delete old picture first
            if ($category->picture != null) {
                $image_path = public_path() . '/storage/category-pictures/' . $category->picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $picture = $request->picture;
            $picture_name = uniqid() . '.' . $picture->extension();
            $request->picture->storeAs('public/category-pictures', $picture_name);
            $category->picture = $picture_name;
        }
        if($request->isNotFilled('parent_category')) {
            $category->parent_category = null;
        }
        $category->save();
        return redirect("a1aa/product-categories")->with("success", "A category has been updated successfully");
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Models\ProductCategory $productCategory
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail(decrypt($id));
        $children_categories = ProductCategory::where("parent_category", $category->id)->get();
        foreach($children_categories as $child_category) {
            $child_category->delete();
        }
        $category->delete();
        return back()->with("error", "A category has been deleted");
    }
}