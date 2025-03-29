<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'logo'
    ];

    /**
     * Get the domain associated with the client.
     */
    public function domain(): HasOne
    {
        return $this->hasOne(Domain::class);
    }

    /**
     * Get all projects for the client.
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
