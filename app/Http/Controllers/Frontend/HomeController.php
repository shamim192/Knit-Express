<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;


class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $sliders = Slide::orderBy('sorting', 'ASC')->get();
        $partners = Partner::where('is_home', 'yes')->get();
        $categories = Category::where('status', 'active')->get();
        $meta = Home::select('meta_keywords', 'meta_title', 'meta_description')->firstOrFail();
        $products = Product::where('status', 'Active')->orderBy('sort', 'ASC')->get();      
        $clients = Client::where('status', 'Active')->get();
       
        //dd($products->toArray());

        return view('frontend.home', compact('sliders', 'partners', 'categories', 'parentCategories', 'meta', 'products', 'clients'));
    }

    public function aboutUs(Request $request) {

        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $meta = Home::select('about_meta_keywords as meta_keywords', 'about_meta_title as meta_title', 'about_meta_description as meta_description')->firstOrFail();
        
        return view('frontend.about-us', compact('parentCategories', 'meta'));
    }

}
