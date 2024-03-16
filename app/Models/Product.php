<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'details', 'specification', 'image', 'product_pdf', 'product_certificate', 'sort', 'meta_title', 'meta_keywords', 'meta_description', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function swatchCard()
    {
        return $this->hasMany(SwatchCard::class);
    }

}
