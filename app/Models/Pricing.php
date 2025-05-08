<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'title',
        'description',
        'monthly_price',
        'quarterly_price',
        'semi_annually_price',
        'annually_price',
        'features',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
