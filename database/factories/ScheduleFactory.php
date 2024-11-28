<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = \App\Models\Schedule::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(), // Random title
            'description' => $this->faker->paragraph(), // Random description
            'start_date' => $this->faker->date(), // Random start date
            'end_date' => $this->faker->date(), // Random end date
            'start_time' => $this->faker->time(), // Random start time
            'end_time' => $this->faker->time(), // Random end time
            'user_id' => User::factory(), // Create a related user (User model)
        ];
    }
}
