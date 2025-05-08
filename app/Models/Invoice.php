<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'client_name',
        'client_address',
        'services',
        'total_amount',
        'account_name',
        'bank_name',
        'account_number',
        'company_address',
        'company_phone',
        'company_email',
        'company_website',
        'is_paid',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'services' => 'array',
        'is_paid' => 'boolean',
        'total_amount' => 'decimal:2',
    ];
}
