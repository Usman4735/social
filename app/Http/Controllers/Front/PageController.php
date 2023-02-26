<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function quickViewProduct($id)
    {
        $product=ProductGroup::findOrFail($id);
        return view('web.quick-view-product', compact('product'));
    }
    public function viewProduct($id)
    {
        $product=ProductGroup::findOrFail($id);
        $related_products=ProductGroup::where('category_id', $product->category_id)->get()->where('id','!=', $product->id)->take(4);

        return view('web.view-product-details', compact('product', 'related_products'));
    }
    public function news()
    {
        $news=News::where('is_published', 1)->orderBy('id', 'desc')->get();
        return view('web.news.index', compact('news'));
    }
    public function newsDetails(Request $request, $id)
    {

        $news=News::where('seo_title', $id)->orWhere('seo_url', $id)->orWhere('title', $id)->firstOrFail();
        // $news=News::findOrFail($id);
        $blogs=News::where('is_published', 1)->orderBy('id', 'desc')->get();
        return view('web.news.details', compact('news', 'blogs'));
    }
    public function howToBuy()
    {
        return view('web.how-to-buy');
    }
}
