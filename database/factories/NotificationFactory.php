<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = \App\Models\Notification::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a related user (User model)
            'message' => $this->faker->sentence(), // Random message text
            'status' => $this->faker->boolean(), // Random status
            'type' => $this->faker->randomElement(['info', 'warning', 'alert']), // Random notification type
            'class_id' => CourseClass::factory(), // Create a related course class (CourseClass model)
            'class_name' => $this->faker->word(), // Random class name
            'class_section' => $this->faker->randomElement(['A', 'B', 'C']), // Random class section
        ];
    }
}
