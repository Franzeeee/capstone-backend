<?php

namespace Database\Factories;

use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseClass>
 */
class CourseClassFactory extends Factory
{
    protected $model = CourseClass::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), // Random class name
            'description' => $this->faker->sentence(), // Random description
            'teacher_id' => \App\Models\User::factory(), // Create a related teacher
            'subject' => $this->faker->word(), // Random subject
            'section' => $this->faker->randomElement(['A', 'B', 'C']), // Random section
            'schedule' => $this->faker->dayOfWeek() . ' ' . $this->faker->time(), // Random schedule
            'room' => 'Room ' . $this->faker->numberBetween(100, 200), // Random room
            'start_date' => $this->faker->date(), // Random start date
            'end_date' => $this->faker->date(), // Random end date
        ];
    }
}
