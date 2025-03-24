<?php

namespace App\Models\Webmail;

use Illuminate\Database\Eloquent\Model;

class EmailClient extends Model
{
    protected $fillable = [
        'domain_client_id',
        'email',
        'password',
    ];

    public function domainClient()
    {
        return $this->belongsTo(DomainClient::class);
    }
}
