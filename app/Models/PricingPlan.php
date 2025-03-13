<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PricingPlan extends Model
{
    protected $fillable = [
        'title',
        'price',
        'description'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(PricingService::class, 'pricing_plan_service');
    }
}