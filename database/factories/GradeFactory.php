<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    protected $model = \App\Models\Grade::class;

    public function definition()
    {
        return [
            'student_id' => User::factory(), // Create a related student (User)
            'class_id' => CourseClass::factory(), // Create a related course class
            'final_grade' => $this->faker->numberBetween(60, 100), // Random grade between 60 and 100
            'remarks' => $this->faker->sentence(), // Random remarks
        ];
    }
}
