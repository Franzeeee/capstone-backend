<?php

namespace Database\Factories;

use App\Models\ActivateLogicLesson;
use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivateLogicLessonFactory extends Factory
{
    protected $model = ActivateLogicLesson::class;

    public function definition()
    {
        return [
            'class_id' => CourseClass::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
