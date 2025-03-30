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
        Schema::table('clients', function (Blueprint $table) {
            $table->foreignId('primary_domain_id')->nullable()->constrained('domains')->nullOnDelete();
            $table->foreignId('primary_email_id')->nullable()->constrained('emails')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['primary_domain_id']);
            $table->dropColumn('primary_domain_id');

            $table->dropForeign(['primary_email_id']);
            $table->dropColumn('primary_email_id');
        });
    }
};
