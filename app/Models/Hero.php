<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'motto',
        'button_text',
        'image_path',
    ];
}
