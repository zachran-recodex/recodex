<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'invoice_date' => 'date',
        'services' => 'array',
        'is_paid' => 'boolean',
        'total_amount' => 'decimal:2',
    ];
}
