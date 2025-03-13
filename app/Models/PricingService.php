<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PricingService extends Model
{
    protected $fillable = [
        'item'
    ];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(PricingPlan::class, 'pricing_plan_service');
    }
}