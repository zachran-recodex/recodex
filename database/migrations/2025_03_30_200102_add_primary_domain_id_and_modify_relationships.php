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
        // Tambahkan kolom primary_domain_id ke tabel clients
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('primary_domain_id')->nullable();
        });

        // Buat kolom name menjadi unique pada tabel domains
        Schema::table('domains', function (Blueprint $table) {
            // Hapus constraint foreign key yang lama jika ada
            if (Schema::hasTable('domains') && Schema::hasColumn('domains', 'client_id')) {
                try {
                    $table->dropForeign(['client_id']);
                } catch (\Exception $e) {
                    // Jika constraint belum ada, abaikan error
                }
            }

            // Ubah kolom client_id menjadi nullable jika belum
            $table->unsignedBigInteger('client_id')->nullable()->change();

            // Tambahkan index unique ke name jika belum ada
            $table->unique('name');
        });

        // Tambahkan constraint foreign key yang baru
        Schema::table('domains', function (Blueprint $table) {
            $table->foreign('client_id', 'domains_client_id_foreign')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('cascade');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('primary_domain_id', 'clients_domain_id_foreign')
                  ->references('id')
                  ->on('domains')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus constraint foreign key
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_domain_id_foreign');
            $table->dropColumn('primary_domain_id');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->dropForeign('domains_client_id_foreign');
            $table->dropUnique(['name']);
            $table->unsignedBigInteger('client_id')->nullable(false)->change();
        });

        // Kembalikan constraint foreign key asli
        Schema::table('domains', function (Blueprint $table) {
            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('cascade');
        });
    }
};
