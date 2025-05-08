<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'position',
        'rating',
        'title',
        'content',
        'photo_path',
        'is_active',
        'sort_order',
    ];
}
