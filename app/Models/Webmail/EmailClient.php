<?php

namespace App\Models\Webmail;

use Illuminate\Database\Eloquent\Model;

class EmailClient extends Model
{
    protected $fillable = [
        'domain_client_id',
        'email',
        'password',
        'reset_token',
        'reset_token_expires_at',
    ];

    protected $casts = [
        'reset_token_expires_at' => 'datetime',
    ];

    public function domainClient()
    {
        return $this->belongsTo(DomainClient::class);
    }
}
