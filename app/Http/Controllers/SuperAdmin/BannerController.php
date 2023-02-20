<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view("super-admin.banners.index", compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.banners.add");
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
            "title" => "required",
            "image" => "required"
        ]);
        $banner = new Banner();
        $banner->title = $request->title;
        $image = $request->image;
        $image_name = uniqid() . '.' . $image->extension();
        $request->image->storeAs('public/banner-images', $image_name);
        $banner->image = $image_name;
        $banner->save();
        return redirect("sa1991as/banners")->with("success", "A new banner has been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail(decrypt($id));
        return view("super-admin.banners.edit", compact("banner"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "image" => "required"
        ]);
        $banner = Banner::findOrFail(decrypt($id));
        $banner->title = $request->title;
        if (isset($request->image)) {
            // Delete old image first
            if ($banner->image != null) {
                $image_path = public_path() . '/storage/banner-images/' . $banner->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/banner-images', $image_name);
            $banner->image = $image_name;
        }
        $banner->save();
        return redirect("sa1991as/banners")->with("success", "A banner has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail(decrypt($id));
        if ($banner->image != null) {
            $image_path = public_path() . '/storage/banner-images/' . $banner->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $banner->delete();
        return back()->with("error", "A banner has been deleted");
    }
}
