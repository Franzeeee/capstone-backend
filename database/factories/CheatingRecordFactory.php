<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\CheatingRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheatingRecordFactory extends Factory
{
    protected $model = CheatingRecord::class;

    public function definition()
    {
        return [
            'submission_id' => Submission::factory(), // Create a related Submission
            'exit_fullscreen' => $this->faker->boolean(),
            'change_tab' => $this->faker->boolean(),
        ];
    }
}
