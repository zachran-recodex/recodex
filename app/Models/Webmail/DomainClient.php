<?php

namespace App\Models\Webmail;

use Illuminate\Database\Eloquent\Model;

class DomainClient extends Model
{
    protected $fillable = [
        'domain',
    ];

    public function emailClients()
    {
        return $this->hasMany(EmailClient::class);
    }
}
