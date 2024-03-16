<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Home;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $news = News::orderBy('id', 'DESC')->get();
        $meta = Home::select('media_meta_keywords as meta_keywords', 'media_meta_title as meta_title', 'media_meta_description as meta_description')->firstOrFail();

        return view('frontend.news', compact('news', 'parentCategories', 'meta'));
    }

    public function newsDetails(Request $request, $id)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $news = News::findOrFail($id);
        $meta = News::select('meta_keywords', 'meta_title', 'meta_description')->findOrFail($id);

        return view('frontend.news-details', compact('news', 'parentCategories', 'meta'));
    }

}
