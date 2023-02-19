<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Http\Request;

class MediaGalleryController extends Controller
{
    public function index()
    {
        $media_gallery=MediaGallery::all();
        return view('super-admin.gallery.index', compact('media_gallery'));
    }
    public function create()
    {
        return view('super-admin.gallery.add');
    }

    public function show()
    {
        # code...
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg'
        ]);
        $gallery=new MediaGallery();
        $gallery->fill($request->all());
        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $file_name = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$file_name);
            $gallery->image=$file_name;
        }

        $gallery->save();
        return back()->with('success', 'Media uploaded successfully');

    }
    public function edit($id)
    {
        $media_gallery=MediaGallery::findOrFail(decrypt($id));
        return view('super-admin.gallery.edit', compact('media_gallery'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'image' => 'required|mimes:png,jpg'
        ]);
        $gallery=MediaGallery::findOrFail(decrypt($id));
        $gallery->fill($request->all());

        if($file = $request->hasFile('image')) {
            if ($gallery->image != null) {
                $image_path = public_path() . '/images' .'/'. $gallery->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $file = $request->file('image') ;
            $file_name = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$file_name);
            $gallery->image=$file_name;
        }
        $gallery->save();
        return back()->with('success', 'Media updated successfully');

    }
}
