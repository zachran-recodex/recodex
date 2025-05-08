<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Member extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'photo_path',
        'description',
        'social_links',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
