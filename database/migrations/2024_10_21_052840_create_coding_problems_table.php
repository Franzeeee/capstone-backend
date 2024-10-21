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
        Schema::create('coding_problems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->onDelete('cascade'); // Connect to the Activity
            $table->string('title'); // Problem title
            $table->text('description'); // Problem description
            $table->text('sample_input')->nullable(); // Sample input for the problem
            $table->text('expected_output'); // Expected output for the problem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coding_problems');
    }
};
