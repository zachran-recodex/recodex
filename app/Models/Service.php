<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'content',
        'icon',
        'image_path',
        'content_image_path',
        'feature_list',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'feature_list' => 'array',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
