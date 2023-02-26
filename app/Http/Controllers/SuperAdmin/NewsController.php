<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_posts = News::orderBy('id', 'desc')->get();
        return view("super-admin.news.index", compact("news_posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.news.add");
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
            "short_description" => "required",
            "seo_url" => "required",
            "image" => "image|mimes:png,jpg,jpeg"
        ]);
        $news = new News();
        $news->fill($request->all());
        if($request->isNotFilled('is_published')) {
            $news->is_published = 0;
        }
        $news->seo_url=Str::slug($request->seo_url);

        // Image
        if (isset($request->image)) {
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/news-images', $image_name);
            $news->image = $image_name;
        }
        $news->save();
        return redirect("sa1991as/news")->with("success", "News have been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail(decrypt($id));
        return view("super-admin.news.edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "short_description" => "required",
            "seo_url" => "required",
            "image" => "image|mimes:png,jpg,jpeg"
        ]);
        $news = News::findOrFail(decrypt($id));
        $news->fill($request->all());
        $news->seo_url=Str::slug($request->seo_url);
        if($request->isNotFilled('is_published')) {
            $news->is_published = 0;
        }
        // Image
        if (isset($request->image)) {
            // Delete old image first
            if ($news->image != null) {
                $image_path = public_path() . '/storage/news-images/' . $news->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->image;
            $image_name = uniqid() . '.' . $image->extension();
            $request->image->storeAs('public/news-images', $image_name);
            $news->image = $image_name;
        }
        $news->save();
        return redirect("sa1991as/news")->with("success", "News have been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail(decrypt($id));
        // Delete image first
        if ($news->image != null) {
            $image_path = public_path() . '/storage/news-images/' . $news->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $news->delete();
        return redirect("sa1991as/news")->with("success", "News have been deleted");
    }
}
