<?php

namespace Tests\Unit;

use App\Models\ActivateLogicLesson;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivateLogicLessonTest extends TestCase
{
    use RefreshDatabase;  // Ensure the database is reset after each test

    /**
     * Test mass assignment on the ActivateLogicLesson model.
     *
     * @return void
     */
    public function test_mass_assignment()
    {
        // Create a course class
        $courseClass = CourseClass::factory()->create();

        // Mass assign attributes
        $lesson = ActivateLogicLesson::create([
            'class_id' => $courseClass->id,
            'status' => 'active',
        ]);

        // Assert the data was stored correctly
        $this->assertDatabaseHas('activate_logic_lessons', [
            'class_id' => $courseClass->id,
            'status' => 'active',
        ]);
    }

    /**
     * Test the belongsTo relationship between ActivateLogicLesson and CourseClass.
     *
     * @return void
     */
    public function test_belongs_to_course_class()
    {
        // Create a CourseClass and an ActivateLogicLesson instance
        $courseClass = CourseClass::factory()->create();
        $lesson = ActivateLogicLesson::factory()->create(['class_id' => $courseClass->id]);

        // Explicitly load the relationship
        $lesson->load('courseClass');

        // Assert the relationship is correctly set
        $this->assertInstanceOf(CourseClass::class, $lesson->courseClass);
        $this->assertEquals($courseClass->id, $lesson->courseClass->id);
    }
}
