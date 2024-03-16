<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;


class GalleryController extends Controller {

    public function index(Request $request)
    {
        $sql = Gallery::orderBy('id', 'DESC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('title', 'LIKE', $request->q.'%');
            });
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.gallery', compact('records'))->with('list', 1);
    }

    public function create()
    {
        return view('admin.gallery')->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'is_home' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'title' => $request->title,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'galleries', true, null, null, [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        Gallery::create($storeData);

        $request->session()->flash('successMessage', 'Gallery was successfully added!');
        return redirect()->route('galleries.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Gallery::findOrFail($id);
        return view('admin.gallery', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Gallery::findOrFail($id);
        return view('admin.gallery', compact('data'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'is_home' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Gallery::findOrFail($id);

        $storeData = [
            'title' => $request->title,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            MediaUploader::delete('galleries', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'galleries', true, null, null, [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        $data->update($storeData);

        $request->session()->flash('successMessage', 'Gallery was successfully updated!');
        return redirect()->route('galleries.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Gallery::findOrFail($id);

        MediaUploader::delete('galleries', $data->image,true);
        
        $data->delete();
        
        $request->session()->flash('successMessage', 'Gallery was successfully deleted!');
        return redirect()->route('galleries.index', qArray());
    }
}
