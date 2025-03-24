<?php

namespace App\Models\Hosting;

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
