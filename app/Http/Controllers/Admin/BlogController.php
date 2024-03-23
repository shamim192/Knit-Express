<?php

namespace App\Http\Controllers\Admin;


use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MediaController;
use Sudip\MediaUploader\Facades\MediaUploader;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $sql = Blog::orderBy('id', 'DESC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('title', 'LIKE', $request->q.'%');
                $q->orWhere('details', 'LIKE', $request->q.'%');
            });
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.blog', compact('records'))->with('list', 1);
    }

    public function create()
    {
        return view('admin.blog')->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:blogs,title',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,webp,svg,gif',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];
        
        if ($request->hasFile('image')) {
            $file = MediaUploader::imageUpload($request->image, 'blogs', true, null, [600, 600], [80, 80]);

            $storeData['image'] = $file['name'];
        }

        Blog::create($storeData);

        $request->session()->flash('successMessage', 'Blog was successfully added!');
        return redirect()->route('blogs.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Blog::findOrFail($id);
        return view('admin.blog', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Blog::findOrFail($id);
        return view('admin.blog', compact('data'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:blogs,title,'.$id.',id',
            'details' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,webp,svg,gif',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Blog::findOrFail($id);

        $storeData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ];
        
        if ($request->hasFile('image')) {
            if ($data->image) {
                MediaUploader::delete('blogs', $data->image, true);
            }
            $file = MediaUploader::imageUpload($request->image, 'blogs', true, null, [600, 600], [80, 80]);
            $storeData['image'] = $file['name'];
        }

        $data->update($storeData);

        $request->session()->flash('successMessage', 'Blog was successfully updated!');
        return redirect()->route('blogs.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Blog::findOrFail($id);

        (new MediaController())->delete('blogs', $data->image, 1);

        $data->delete();

        $request->session()->flash('successMessage', 'Blog was successfully deleted!');
        return redirect()->route('blogs.index', qArray());
    }
}
