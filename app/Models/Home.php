<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{

    protected $fillable = [
        'meta_title', 'meta_keywords', 'meta_description', 'team_meta_title', 'team_meta_keywords', 'team_meta_description', 'gallery_meta_title', 'gallery_meta_keywords', 'gallery_meta_description', 'career_meta_title', 'career_meta_keywords', 'career_meta_description', 'contact_meta_title', 'contact_meta_keywords', 'contact_meta_description', 'project_meta_title', 'project_meta_keywords', 'project_meta_description', 'media_meta_title', 'media_meta_keywords', 'media_meta_description',
        'about_banner_img','about_meta_title', 'about_meta_keywords', 'about_meta_description',
    ];
}
