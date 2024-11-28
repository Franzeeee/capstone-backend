<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\CodingProblem;
use App\Models\CodingProblemSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodingProblemSubmissionFactory extends Factory
{
    protected $model = CodingProblemSubmission::class;

    public function definition()
    {
        return [
            'submission_id' => Submission::factory(),  // Creating a related Submission
            'problem_id' => CodingProblem::factory(),  // Creating a related CodingProblem
            'code' => $this->faker->text(2000),  // Random code (up to 2000 characters)
            'score' => $this->faker->randomFloat(2, 0, 100),  // Random score between 0 and 100
        ];
    }
}
