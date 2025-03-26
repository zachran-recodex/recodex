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
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('category')->nullable();
            $table->text('description');
            $table->date('project_date');
            $table->string('duration');
            $table->decimal('cost', 15, 2);
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled', 'on_hold']);
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
