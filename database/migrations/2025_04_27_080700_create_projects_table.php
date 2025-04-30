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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('client');
            $table->string('client_slug');
            $table->string('category');
            $table->date('date')->nullable();
            $table->string('duration')->nullable();
            $table->string('cost')->nullable();
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->json('steps')->nullable();
            $table->string('content_image_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
