<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'slug', 'details', 'image', 'meta_title', 'meta_keywords', 'meta_description', 'is_home', 'status',
    ];
}
