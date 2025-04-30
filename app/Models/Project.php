<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'client',
        'client_slug',
        'category',
        'date',
        'duration',
        'cost',
        'image_path',
        'description',
        'steps',
        'content_image_path',
        'is_active',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'steps' => 'array',
        'date' => 'date',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug before saving
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }

            if (empty($project->client_slug)) {
                $project->client_slug = Str::slug($project->client);
            }
        });

        // Update slug when title changes
        static::updating(function ($project) {
            if ($project->isDirty('title') && !$project->isDirty('slug')) {
                $project->slug = Str::slug($project->title);
            }

            if ($project->isDirty('client') && !$project->isDirty('client_slug')) {
                $project->client_slug = Str::slug($project->client);
            }
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
