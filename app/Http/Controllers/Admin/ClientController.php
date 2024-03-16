<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class ClientController extends Controller {

    public function index(Request $request)
    {
        $sql = Client::orderBy('id', 'DESC');

        if ($request->q) {
            $sql->where(function($q) use($request) {
                $q->where('title', 'LIKE', $request->q.'%');
            });
        }

        if ($request->status) {
            $sql->where('status', $request->status);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.client', compact('records'))->with('list', 1);
    }

    public function create()
    {
        return view('admin.client')->with('create', 1);
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
            'details' => $request->details,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'clients', true, Str::slug($request->title), [380, 88], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        Client::create($storeData);

        $request->session()->flash('successMessage', 'Client was successfully added!');
        return redirect()->route('clients.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = Client::findOrFail($id);
        return view('admin.client', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = Client::findOrFail($id);
        return view('admin.client', compact('data'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'is_home' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Deactivated',
        ]);

        $data = Client::findOrFail($id);

        $storeData = [
            'title' => $request->title,
            'details' => $request->details,
            'is_home' => $request->is_home,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            MediaUploader::delete('clients', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'clients', true, Str::slug($request->title), [380, 88], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        $data->update($storeData);

        $request->session()->flash('successMessage', 'Client was successfully updated!');
        return redirect()->route('clients.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = Client::findOrFail($id);

        MediaUploader::delete('clients', $data->image);
        
        $data->delete();
        
        $request->session()->flash('successMessage', 'Client was successfully deleted!');
        return redirect()->route('clients.index', qArray());
    }
}
