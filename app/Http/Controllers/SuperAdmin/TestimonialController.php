<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view("super-admin.testimonials.index", compact("testimonials"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.testimonials.add");
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
            "description" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg"
        ]);
        $testimonial = new Testimonial();
        $testimonial->fill($request->all());
        // Image
        if (isset($request->image)) {
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/testimonial-images', $image_name);
            $testimonial->image = $image_name;
        }
        $testimonial->save();
        return redirect("sa1991as/testimonials")->with("success", "A testimonial has been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail(decrypt($id));
        return view("super-admin.testimonials.edit", compact("testimonial"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "image|mimes:png,jpg,jpeg"
        ]);
        $testimonial = Testimonial::findOrFail(decrypt($id));
        $testimonial->fill($request->all());
        // Image
        if (isset($request->image)) {
            // Delete old image first
            if ($testimonial->image != null) {
                $image_path = public_path() . '/storage/testimonial-images/' . $testimonial->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/testimonial-images', $image_name);
            $testimonial->image = $image_name;
        }
        $testimonial->save();
        return redirect("sa1991as/testimonials")->with("success", "A testimonial has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail(decrypt($id));
        // Delete image first
        if ($testimonial->image != null) {
            $image_path = public_path() . '/storage/testimonial-images/' . $testimonial->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $testimonial->delete();
        return redirect("sa1991as/testimonials")->with("error", "A testimonial has been deleted");
    }
}
