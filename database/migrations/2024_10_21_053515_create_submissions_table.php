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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->onDelete('cascade'); // Foreign key to Activity
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // Foreign key to User (the student)
            $table->integer('score')->nullable(); // Score received for the submission
            $table->enum('status', ['pending', 'graded', 'failed'])->default('pending'); // Status of the submission
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
