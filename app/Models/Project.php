<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'duration',
        'cost',
        'image_path',
        'description',
        'steps',
        'content_image_path',
        'is_active',
        'sort_order',
        'client_id',
        'service_id',
    ];

    protected $casts = [
        'steps' => 'array',
        'date' => 'date',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
