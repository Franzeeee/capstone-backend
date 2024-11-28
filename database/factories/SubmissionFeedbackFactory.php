<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\SubmissionFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFeedbackFactory extends Factory
{
    protected $model = SubmissionFeedback::class;

    public function definition()
    {
        return [
            'submission_id' => Submission::factory(),  // Creating a related Submission
            'feedback' => $this->faker->paragraph(),   // Random feedback text (paragraph format)
        ];
    }
}
