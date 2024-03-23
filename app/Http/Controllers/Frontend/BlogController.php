<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    protected $paginate = 8;

    public function index(Request $request)
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $meta = Blog::select('meta_keywords', 'meta_title', 'meta_description')->first();

        return view('frontend.blog', compact('blogs','meta'));
    }

    public function blogDetails(Request $request, $id)
    {
        $blog_details = Blog::where('slug', $id)->firstOrFail();
        $moreBlogs = Blog::orderBy('id', 'DESC')->where('slug', '!=', $id)->get();
        $meta = Blog::select('meta_keywords', 'meta_title', 'meta_description')->first();

        return view('frontend.blog-details', compact('blog_details','moreBlogs', 'meta'));
    }
}
