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
        Schema::create('email_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_client_id')->constrained('domain_clients')->cascadeOnDelete();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reset_token')->nullable();
            $table->timestamp('reset_token_expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_clients');
    }
};
