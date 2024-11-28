<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentProgressFactory extends Factory
{
    protected $model = \App\Models\StudentProgress::class;

    public function definition()
    {
        return [
            'student_id' => User::factory(), // Create a related student (User model)
            'course_class_id' => CourseClass::factory(), // Create a related course class (CourseClass model)
            'last_completed_lesson' => $this->faker->randomNumber(), // Random lesson completion info
            'last_completed_quiz' => $this->faker->randomNumber(), // Random quiz completion info
        ];
    }
}
