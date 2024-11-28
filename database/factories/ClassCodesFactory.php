<?php

namespace Database\Factories;

use App\Models\CourseClass;
use App\Models\ClassCodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassCodesFactory extends Factory
{
    protected $model = ClassCodes::class;

    public function definition()
    {
        return [
            'class_id' => CourseClass::factory(), // Creating a related CourseClass
            'code' => $this->faker->regexify('[A-Za-z0-9]{8}'), // Random 8 character alphanumeric code
        ];
    }
}
