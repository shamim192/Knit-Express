<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwatchCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'buyer',
        'order',
        'fabric_structure',
        'composition',
        'color',
        'dia',
        'date',
        'gsm',
        'quantity',
        'image',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
