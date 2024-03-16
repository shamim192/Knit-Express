<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sudip\MediaUploader\Facades\MediaUploader;

class HomeSEOController extends Controller {

    public function index(Request $request)
    {
        $data = Home::first();
        if($data){
            return view('admin.home', compact('data'))->with('edit', 1);
        } else {
            return view('admin.home')->with('create', 1);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'about_banner_img' => 'required',
        ]);


        $storeData = [
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,

            'about_meta_title' => $request->about_meta_title,
            'about_meta_keywords' => $request->about_meta_keywords,
            'about_meta_description' => $request->about_meta_description,

            'team_meta_title' => $request->team_meta_title,
            'team_meta_keywords' => $request->team_meta_keywords,
            'team_meta_description' => $request->team_meta_description,

            'career_meta_title' => $request->career_meta_title,
            'career_meta_keywords' => $request->career_meta_keywords,
            'career_meta_description' => $request->career_meta_description,

            'contact_meta_title' => $request->contact_meta_title,
            'contact_meta_keywords' => $request->contact_meta_keywords,
            'contact_meta_description' => $request->contact_meta_description,

            'project_meta_title' => $request->project_meta_title,
            'project_meta_keywords' => $request->project_meta_keywords,
            'project_meta_description' => $request->project_meta_description,

            'media_meta_title' => $request->media_meta_title,
            'media_meta_keywords' => $request->media_meta_keywords,
            'media_meta_description' => $request->media_meta_description,

            'gallery_meta_title' => $request->gallery_meta_title,
            'gallery_meta_keywords' => $request->gallery_meta_keywords,
            'gallery_meta_description' => $request->gallery_meta_description,

        ];

        if ($request->hasFile('about_banner_img')) {
            $upload=MediaUploader::imageUpload($request->file('about_banner_img'), 'banners', false, 'about_banner', [1920, 500], [80, 80]);
            $storeData['about_banner_img'] = $upload['name'];
        }



        Home::create($storeData);

        $request->session()->flash('successMessage', 'SEO data was successfully added!');
        return redirect()->route('admin-home.index', qArray());
    }

    public function update(Request $request, $id)
    {


        $data = Home::findOrFail($id);

        $storeData = [
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,

            'about_meta_title' => $request->about_meta_title,
            'about_meta_keywords' => $request->about_meta_keywords,
            'about_meta_description' => $request->about_meta_description,

            'team_meta_title' => $request->team_meta_title,
            'team_meta_keywords' => $request->team_meta_keywords,
            'team_meta_description' => $request->team_meta_description,

            'career_meta_title' => $request->career_meta_title,
            'career_meta_keywords' => $request->career_meta_keywords,
            'career_meta_description' => $request->career_meta_description,

            'contact_meta_title' => $request->contact_meta_title,
            'contact_meta_keywords' => $request->contact_meta_keywords,
            'contact_meta_description' => $request->contact_meta_description,

            'project_meta_title' => $request->project_meta_title,
            'project_meta_keywords' => $request->project_meta_keywords,
            'project_meta_description' => $request->project_meta_description,

            'media_meta_title' => $request->media_meta_title,
            'media_meta_keywords' => $request->media_meta_keywords,
            'media_meta_description' => $request->media_meta_description,

            'gallery_meta_title' => $request->gallery_meta_title,
            'gallery_meta_keywords' => $request->gallery_meta_keywords,
            'gallery_meta_description' => $request->gallery_meta_description,

        ];


        if ($request->hasFile('about_banner_img')) {
            MediaUploader::delete('banners', $data->about_banner_img, true);
            $upload = MediaUploader::imageUpload($request->file('about_banner_img'), 'banners', false, 'about_banner', [1920, 600]);
            $storeData['about_banner_img'] = $upload['name'];
        }
        $data->update($storeData);

        $request->session()->flash('successMessage', 'SEO Data was successfully updated!');
        return redirect()->route('admin-home.index', qArray());
    }
}
