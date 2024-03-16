<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class CategoryController extends Controller {

    public function index(Request $request)
    {
        $sql = Category::with('parent')->orderBy('id', 'DESC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('name', 'LIKE', $request->q.'%');
                $q->orWhere('details', 'LIKE', $request->q.'%');
            });
        }

        if ($request->parent) {
            $sql->where('parent_id', $request->parent);
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        $records = $sql->paginate($request->limit ?? 15);

        $parents = Category::with('childs')->whereNull('parent_id')->orderBy('name', 'ASC')->get();

        return view('admin.category', compact('records', 'parents'))->with('list', 1);
    }

    public function create()
    {
        $parents = Category::with('childs')->whereNull('parent_id')->orderBy('name', 'ASC')->get();
        return view('admin.category', compact('parents'))->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'nullable|integer',
            'name' => 'required|max:255|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'sort' => $request->sort,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'categories', true, Str::slug($request->name), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        if ($request->hasFile('banner_image')) {
            $upload = MediaUploader::imageUpload($request->file('banner_image'), 'categories', true, Str::slug($request->name) . '-banner', [1920, 600], [80, 80]);
            $storeData['banner_image'] = $upload['name'];
        }


        Category::create($storeData);

        $request->session()->flash('successMessage', 'Category was successfully added!');
        return redirect()->route('categories.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Category::with('parent')->findOrFail($id);
        return view('admin.category', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $parents = Category::with('childs')->whereNull('parent_id')->orderBy('name', 'ASC')->get();
        return view('admin.category', compact('data', 'parents'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'parent_id' => 'nullable|integer',
            'name' => 'required|max:255|unique:categories,name,'.$id.',id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Category::findOrFail($id);

        $storeData = [
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'sort' => $request->sort,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            MediaUploader::delete('categories', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'categories', true, Str::slug($request->name), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        if ($request->hasFile('banner_image')) {
            MediaUploader::delete('categories', $data->banner_image, true);
            $upload = MediaUploader::imageUpload($request->file('banner_image'), 'categories', true, Str::slug($request->name) . '-banner', [1920, 600], [80, 80]);
            $storeData['banner_image'] = $upload['name'];
        }


        $data->update($storeData);

        $request->session()->flash('successMessage', 'Category was successfully updated!');
        return redirect()->route('categories.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Category::findOrFail($id);

        MediaUploader::delete('categories', $data->image,true);
        MediaUploader::delete('categories', $data->banner_image);

        $data->delete();

        $request->session()->flash('successMessage', 'Category was successfully deleted!');
        return redirect()->route('categories.index', qArray());
    }
}
