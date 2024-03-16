<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\SwatchCard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class SwatchCardController extends Controller
{
    public function index(Request $request)
    {
        $sql = SwatchCard::with('product')->orderBy('date', 'ASC');

        if ($request->q) {
            $sql->where(function ($q) use ($request) {
                $q->where('buyer', 'LIKE', $request->q . '%');
                $q->orWhere('order', 'LIKE', $request->q . '%');
                $q->orWhere('color', 'LIKE', $request->q . '%');
                $q->orWhere('composition', 'LIKE', $request->q . '%');
            });
        }

        if ($request->category) {
            $sql->where('product_id', $request->category);
        }

        $records = $sql->paginate($request->limit ?? 15);

        return view('admin.swatch-card', compact('records'))->with('list', 1);
    }

    public function create()
    {

        $products = Product::all(); // Retrieves all products

        return view('admin.swatch-card', compact('products'))->with('create', 1);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|integer',          
            'buyer' => 'required|string|max:255',
            'order' => 'required|string|max:255',
            'fabric_structure' => 'required|string|max:255',
            'composition' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'dia' => 'required|string|max:255',
            'date' => 'required|date',
            'gsm' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,jpg,png',           
        ]);

        $storeData = [
            'product_id' => $request->product_id,           
            'buyer' => $request->buyer,
            'order' => $request->order,
            'fabric_structure' => $request->fabric_structure,
            'composition' => $request->composition,
            'color' => $request->color,
            'dia' => $request->dia,
            'date' => $request->date,
            'gsm' => $request->gsm,
            'quantity' => $request->quantity,
        ];

        if ($request->hasFile('image')) {
            $upload = MediaUploader::imageUpload($request->file('image'), 'swatch-cards', true, Str::slug($request->name), [600, 400], [80, 80]);
            $storeData['image'] = $upload['name'];
        }       

        $data = SwatchCard::create($storeData);

        $request->session()->flash('successMessage', 'Swatch Card was successfully added!');
        return redirect()->route('swatch-card.create', qArray());
    }

    public function show(Request $request, $id)
    {
        $data = SwatchCard::with('product')->findOrFail($id);
        return view('admin.swatch-card', compact('data'))->with('show', $id);
    }

    public function edit(Request $request, $id)
    {
        $data = SwatchCard::findOrFail($id);

        $products = Product::all();

        return view('admin.swatch-card', compact('data', 'products'))->with('edit', $id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|integer',            
            'buyer' => 'required|string|max:255',
            'order' => 'required|string|max:255',
            'fabric_structure' => 'required|string|max:255',
            'composition' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'dia' => 'required|string|max:255',
            'date' => 'required|date',
            'gsm' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,jpg,png', 
        ]);

        $data = SwatchCard::findOrFail($id);

        $storeData = [
            'product_id' => $request->product_id,           
            'buyer' => $request->buyer,
            'order' => $request->order,
            'fabric_structure' => $request->fabric_structure,
            'composition' => $request->composition,
            'color' => $request->color,
            'dia' => $request->dia,
            'date' => $request->date,
            'gsm' => $request->gsm,
            'quantity' => $request->quantity,
        ];

        if ($request->hasFile('image')) {
            MediaUploader::delete('swatch-cards', $data->image, true);
            $upload = MediaUploader::imageUpload($request->file('image'), 'swatch-cards', true, Str::slug($request->name), [600, 600], [80, 80]);
            $storeData['image'] = $upload['name'];
        }

        $data->update($storeData);



        $request->session()->flash('successMessage', 'Swatch Card was successfully updated!');
        return redirect()->route('swatch-card.index', qArray());
    }

    public function destroy(Request $request, $id)
    {
        $data = SwatchCard::findOrFail($id);

        MediaUploader::delete('swatch-cards', $data->image);       

        $data->delete();

        $request->session()->flash('successMessage', 'Swatch Card was successfully deleted!');
        return redirect()->route('swatchs.index', qArray());
    }
}
