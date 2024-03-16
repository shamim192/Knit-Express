<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id', 'name', 'sort', 'slug', 'details', 'image', 'banner_image', 'meta_title', 'meta_keywords', 'meta_description', 'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort', 'ASC');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
