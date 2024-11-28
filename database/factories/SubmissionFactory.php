<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    protected $model = Submission::class;

    public function definition()
    {
        return [
            'activity_id' => Activity::factory(),  // Creating a related Activity
            'student_id' => User::factory(),       // Creating a related User (student)
            'score' => $this->faker->randomFloat(2, 0, 100),  // Score between 0 and 100
            'time_taken' => $this->faker->numberBetween(1, 180),  // Time taken in minutes
            'status' => $this->faker->randomElement(['failed', 'pending', 'graded']),
        ];
    }
}
