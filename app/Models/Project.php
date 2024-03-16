<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'image', 'is_home', 'status', 'details', 'location'
    ];
}
