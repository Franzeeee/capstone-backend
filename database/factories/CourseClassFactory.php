<?php

namespace Database\Factories;

use App\Models\CourseClass;
use App\Models\ClassCode;
use App\Models\ClassCodes;
use App\Models\User;
use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseClass>
 */
class CourseClassFactory extends Factory
{
    use RefreshDatabase;

    protected $model = CourseClass::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), // Random class name
            'description' => $this->faker->sentence(), // Random description
            'teacher_id' => User::factory(), // Create a related teacher
            'subject' => $this->faker->word(), // Random subject
            'section' => $this->faker->randomElement(['A', 'B', 'C']), // Random section
            'schedule' => $this->faker->dayOfWeek() . ' ' . $this->faker->time(), // Random schedule
            'room' => 'Room ' . $this->faker->numberBetween(100, 200), // Random room
            'start_date' => $this->faker->date(), // Random start date
            'end_date' => $this->faker->date(), // Random end date
        ];
    }


    // In CourseClassFactory
    public function withRelations()
    {
        return $this->afterCreating(function (CourseClass $courseClass) {
            // Create the related models
            $classCode = ClassCodes::factory()->create(['class_id' => $courseClass->id]);

            // If using a HasOne relationship, you don't need associate; just set the foreign key
            $courseClass->classCode()->save($classCode);  // Save the related model

            // Create related activities and announcements
            Activity::factory(3)->create(['course_class_id' => $courseClass->id]);
            Announcement::factory(2)->create(['course_class_id' => $courseClass->id]);

            // Save the CourseClass with the relationships
            $courseClass->save();
        });
    }
}
