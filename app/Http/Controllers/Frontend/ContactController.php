<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Home;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $parentCategories = Category::with('childs')->orderBy('created_at', 'ASC')->whereNull('parent_id')->get();
        $meta = Home::select('contact_meta_keywords as meta_keywords', 'contact_meta_title as meta_title', 'contact_meta_description as meta_description')->firstOrFail();

        return view('frontend.contact', compact('parentCategories', 'meta'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
        ]);

        $storeData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Contact::create($storeData);

        $request->session()->flash('successMessage', 'Contact was successfully added!');
        return redirect()->route('contact', qArray());
    }

}
