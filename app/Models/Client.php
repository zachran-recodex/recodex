<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasSlug;

    protected $fillable = [
        'company',
        'slug',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('company')
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
