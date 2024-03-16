<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Sudip\MediaUploader\Facades\MediaUploader;

class ProductController extends Controller {

    public function index(Request $request)
    {
        $sql = Product::with('category')->orderBy('sort', 'ASC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('name', 'LIKE', $request->q.'%');
                $q->orWhere('details', 'LIKE', $request->q.'%');
                $q->orWhere('specification', 'LIKE', $request->q.'%');
                $q->orWhere('sort', 'LIKE', $request->q.'%');
            });
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        if ($request->category) {
            $sql->where('category_id', $request->category);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.product', compact('records'))->with('list', 1);
    }

    public function create()
    {
        $categories = Category::with(['childs' => function($q) {
            $q->orderBy('name', 'ASC');
            $q->with(['childs' => function($q) {
                $q->orderBy('name', 'ASC');
            }]);
        }])->whereNull('parent_id')->orderBy('name', 'ASC')->get();


        return view('admin.product', compact('categories'))->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|max:255|unique:products,name',
            'details' => 'required',
            'specification' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'sort' => 'required|integer',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'specification' => $request->specification,
            'sort' => $request->sort,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'products', true, Str::slug($request->name), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        if ($request->hasFile('product_pdf')) {
            $upload = MediaUploader::anyUpload($request->file('product_pdf'), 'products', Str::slug($request->name));
            $storeData['product_pdf'] = $upload['name'];
        }

        if ($request->hasFile('product_certificate')) {
            $upload = MediaUploader::anyUpload($request->file('product_certificate'), 'products', Str::slug($request->name));
            $storeData['product_certificate'] = $upload['name'];
        }

        $data = Product::create($storeData);

        $request->session()->flash('successMessage', 'Product was successfully added!');
        return redirect()->route('products.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Product::with(['category', 'images'])->findOrFail($id);
        return view('admin.product', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $categories = Category::with(['childs' => function($q) {
            $q->orderBy('name', 'ASC');
            $q->with(['childs' => function($q) {
                $q->orderBy('name', 'ASC');
            }]);
        }])->whereNull('parent_id')->orderBy('name', 'ASC')->get();

        return view('admin.product', compact('data', 'categories'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|max:255|unique:products,name,'.$id.',id',
            'details' => 'required',
            'specification' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'sort' => 'required|integer',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Product::findOrFail($id);

        $storeData = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'specification' => $request->specification,
            'sort' => $request->sort,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            MediaUploader::delete('products', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'products', true, Str::slug($request->name), [600, 600], [80, 80]);
            $storeData['image'] = $upload['name'];
        }
        

        if ($request->hasFile('product_pdf')) {
            MediaUploader::delete('products', $data->product_pdf);
            $upload = MediaUploader::anyUpload($request->file('product_pdf'), 'products', Str::slug($request->product_pdf));;
            // dd($upload);
            $storeData['product_pdf'] = $upload['name'];
        }

        if ($request->hasFile('product_certificate')) {
            MediaUploader::delete('products', $data->product_certificate);
            $upload = MediaUploader::anyUpload($request->file('product_certificate'), 'products', Str::slug($request->product_certificate));;
            // dd($upload);
            $storeData['product_certificate'] = $upload['name'];
        }

        $data->update($storeData);

        

        $request->session()->flash('successMessage', 'Product was successfully updated!');
        return redirect()->route('products.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        MediaUploader::delete('products', $data->image);
        MediaUploader::delete('products', $data->product_pdf);
        MediaUploader::delete('products', $data->product_certificate);

        $data->delete();

        $request->session()->flash('successMessage', 'Product was successfully deleted!');
        return redirect()->route('products.index', qArray());
    }

}
