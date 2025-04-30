<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'social_links' => 'array',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug before saving
        static::creating(function ($member) {
            if (empty($member->slug)) {
                $member->slug = Str::slug($member->name);
            }
        });

        // Update slug when name changes
        static::updating(function ($member) {
            if ($member->isDirty('name') && !$member->isDirty('slug')) {
                $member->slug = Str::slug($member->name);
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
