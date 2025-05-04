<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->string('client_name');
            $table->text('client_address');
            $table->json('services');
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->text('company_address');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('company_website');
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
