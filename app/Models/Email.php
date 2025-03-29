<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'domain_id',
        'email',
        'password',
        'reset_token',
        'reset_token_expires_at',
        'password_updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'reset_token_expires_at' => 'datetime',
        'password_updated_at' => 'datetime',
    ];

    /**
     * Get the domain that owns the email.
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
}
