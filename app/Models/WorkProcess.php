<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
