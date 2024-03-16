<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Home;
use App\Models\SwatchCard;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        // $meta = Home::select('meta_keywords', 'meta_title', 'meta_description')->firstOrFail();
        $parentCategories = Category::with(['parent', 'childs.products'])->orderBy('created_at', 'ASC')->whereNotNull('parent_id')->get();
        $swatchCards = SwatchCard::with('product')->get();
        $meta = Home::select('meta_keywords', 'meta_title', 'meta_description')->firstOrFail();
        return view('frontend.category', compact('parentCategories', 'swatchCards', 'meta'));
    }


    public function products(Request $request, $slug)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $category = Category::where('slug', $slug)->firstorFail();
        $products = Product::where('category_id', $category->id)->orderBy('sort', 'ASC')->get();
        $meta = Category::select('meta_keywords', 'meta_title', 'meta_description')->where('slug', $slug)->firstorFail();
        return view('frontend.product', compact('category', 'products', 'parentCategories', 'meta'));
    }

    public function productDetails(Request $request, $slug)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstorFail();
        $meta = Product::select('meta_keywords', 'meta_title', 'meta_description')->where('slug', $slug)->firstorFail();
        return view('frontend.product-details', compact('product', 'parentCategories', 'meta'));
    }

    public function download(Request $request, $id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $product = Product::where('id', $id)->firstorFail();
        $file = public_path() . "/storage/products/" . $product->product_pdf;

        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $product->product_pdf . '.pdf', $headers);
    }


    //PDF file is stored under project/public/download/info.pdf
    // public function pdf(Request $request, $slug, $pdf=null, $certificate=null)
    // {

    //     $product = Product::where('slug', $slug)->firstorFail();

    //     if($certificate)
    //     {

    //         $file= public_path(). "/storage/products/" . $product->product_certificate;
    //         $headers = array(
    //             'Content-Type: application/pdf',
    //             );
    //         return response()->file($file,['content-type'=>'application/pdf']);
    //     }

    //     if($pdf)
    //     {
    //         $file= public_path(). "/storage/products/" . $product->product_pdf;
    //         $headers = array(
    //             'Content-Type: application/pdf',
    //             );
    //         return response()->file($file,['content-type'=>'application/pdf']);
    //     }
    // }


    public function pdf(Request $request, $slug, $pdf = null, $certificate = null)
    {
        $product = Product::where('slug', $slug)->first();
        $file = public_path() . "/storage/products/" . $product->product_pdf;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->file($file, ['content-type' => 'application/pdf']);
    }


    public function certificate(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $file = public_path() . "/storage/products/" . $product->product_certificate;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->file($file, ['content-type' => 'application/pdf']);
    }


    public function search(Request $request)
    {
        //PDF file is stored under project/public/download/info.pdf
        $products = Product::where('name', 'LIKE', '%' . $request->q . '%')->get();
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $meta = Home::select('meta_keywords', 'meta_title', 'meta_description')->first();
        return view('frontend.search-product', compact('products', 'parentCategories', 'meta'));
    }
}
