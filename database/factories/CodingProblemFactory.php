<?php

namespace Database\Factories;

use App\Models\CodingProblem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodingProblemFactory extends Factory
{
    protected $model = CodingProblem::class;

    public function definition()
    {
        return [
            'activity_id' => \App\Models\Activity::factory(),  // Assuming each CodingProblem belongs to an Activity
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'sample_input' => $this->faker->text(),
            'expected_output' => $this->faker->text(),
        ];
    }
}
