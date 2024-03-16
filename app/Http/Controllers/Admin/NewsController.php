<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class NewsController extends Controller {

    public function index(Request $request)
    {
        $sql = News::orderBy('id', 'DESC');

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

        return view('admin.news', compact('records'))->with('list', 1);
    }

    public function create()
    {
        return view('admin.news')->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:news,title',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'is_home' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];
        
        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'news', true, Str::slug($request->title), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        News::create($storeData);

        $request->session()->flash('successMessage', 'News was successfully added!');
        return redirect()->route('news.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = News::findOrFail($id);
        return view('admin.news', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = News::findOrFail($id);
        return view('admin.news', compact('data'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:news,title,'.$id.',id',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'is_home' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = News::findOrFail($id);

        $storeData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];
        
        
        
        if ($request->hasFile('image')) {
            MediaUploader::delete('news', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'news', true, Str::slug($request->title), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }
        $data->update($storeData);

        $request->session()->flash('successMessage', 'News was successfully updated!');
        return redirect()->route('news.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = News::findOrFail($id);

        MediaUploader::delete('news', $data->image);
        
        $data->delete();
        
        $request->session()->flash('successMessage', 'News was successfully deleted!');
        return redirect()->route('news.index', qArray());
    }
}
