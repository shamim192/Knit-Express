<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'title', 'image', 'is_home', 'status', 'details'
    ];
}
