<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function news()
    {
        $news=News::where('is_published', 1)->orderBy('id', 'desc')->get();
        return view('web.news.index', compact('news'));
    }
    public function howToBuy()
    {
        return view('web.how-to-buy');
    }
}
