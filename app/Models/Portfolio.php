<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'project_date',
        'duration',
        'cost'
    ];

    protected $casts = [
        'project_date' => 'date',
        'cost' => 'decimal:2'
    ];
}
