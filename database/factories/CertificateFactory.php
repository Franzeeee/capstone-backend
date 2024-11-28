<?php

namespace Database\Factories;

use App\Models\CourseClass;
use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    protected $model = Certificate::class;

    public function definition()
    {
        return [
            'issue_date' => $this->faker->date(),  // Fake issue date
            'issued_to' => $this->faker->name(),  // Fake recipient name
            'teacher_name' => $this->faker->name(),  // Fake teacher name
            'class_name' => $this->faker->word(),  // Fake class name
            'class_id' => CourseClass::factory(),  // Creating a related CourseClass
        ];
    }
}
