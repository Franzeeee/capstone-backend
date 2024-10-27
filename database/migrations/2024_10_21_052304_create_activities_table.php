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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_class_id')->constrained()->onDelete('cascade'); // Foreign key to CourseClass
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to User (the creator)
            $table->string('python-default')->nullable(); // Type of the activity
            $table->string('title'); // Title of the activity
            $table->text('description'); // Description of the activity
            $table->boolean('final_assessment')->default(false); // Indicator for final assessment
            $table->boolean('manual_checking')->default(false); // Indicator for manual checking
            $table->integer('time_limit')->nullable(); // Time limit for the activity
            $table->integer('point')->default(0); // Points for the activity
            $table->dateTime('start_date'); // Start date of the activity
            $table->dateTime('end_date')->nullable(); // End date of the activity
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
