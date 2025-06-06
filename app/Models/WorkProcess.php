<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
