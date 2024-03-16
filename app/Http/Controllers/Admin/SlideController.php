<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class SlideController extends Controller {

    public function index(Request $request)
    {
        $sql = Slide::orderBy('sorting', 'ASC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('title', 'LIKE', $request->q.'%');
            });
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.slide', compact('records'))->with('list', 1);
    }

    public function create()
    {
        return view('admin.slide')->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $storeData = [
            'title' => $request->title,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'slides', true,  Str::slug($request->title), [1920, 700], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        Slide::create($storeData);

        $request->session()->flash('successMessage', 'Slide was successfully added!');
        return redirect()->route('slides.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Slide::findOrFail($id);
        return view('admin.slide', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Slide::findOrFail($id);
        return view('admin.slide', compact('data'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Slide::findOrFail($id);

        $storeData = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        
        if ($request->hasFile('image')) {
            MediaUploader::delete('slides', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'slides', true, Str::slug($request->title), [1920, 600], [80, 80]);
            $storeData['image'] = $upload['name'];
        }


        $data->update($storeData);

        $request->session()->flash('successMessage', 'Slide was successfully updated!');
        return redirect()->route('slides.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Slide::findOrFail($id);

        MediaUploader::delete('slides', $data->image,true);
        
        $data->delete();
        
        $request->session()->flash('successMessage', 'Slide was successfully deleted!');
        return redirect()->route('slides.index', qArray());
    }
}
