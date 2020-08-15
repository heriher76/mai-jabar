<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function show($slug) {
    	$news = News::where('slug', $slug)->first();

    	$latestNews = News::orderBy('updated_at', 'asc')->where('publish_status', 1)->limit(5)->get(); 

    	return view('pages.news.show', compact('news', 'latestNews'));
    }
}
