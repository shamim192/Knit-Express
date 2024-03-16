<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Home;

class GalleryController extends Controller
{
    //
    public function index(Request $request)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        $meta = Home::select('gallery_meta_keywords as meta_keywords', 'gallery_meta_title as meta_title', 'gallery_meta_description as meta_description')->firstOrFail();

        return view('frontend.gallery', compact('galleries', 'parentCategories', 'meta'));
    }

}
