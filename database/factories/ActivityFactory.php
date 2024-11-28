<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition()
    {
        return [
            'course_class_id' => CourseClass::factory(), // Create a related CourseClass
            'user_id' => User::factory(), // Create a related User
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'default' => $this->faker->boolean(),
            'lessonId' => $this->faker->randomNumber(),
            'final_assessment' => $this->faker->boolean(),
            'manual_checking' => $this->faker->boolean(),
            'time_limit' => $this->faker->numberBetween(10, 120),
            'point' => $this->faker->numberBetween(1, 100),
            'dueReminder' => $this->faker->boolean(),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
