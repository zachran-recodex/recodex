<?php

namespace App\Models\Webmail;

use Illuminate\Database\Eloquent\Model;

class EmailClientPasswordReset extends Model
{
    protected $fillable = [
        'email_client_id',
        'token',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function emailClient()
    {
        return $this->belongsTo(EmailClient::class);
    }
}