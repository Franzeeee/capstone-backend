<?php

namespace Tests\Unit;

use App\Models\StudentProgress;
use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentProgressTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the StudentProgress model belongs to a student.
     */
    public function test_student_progress_belongs_to_student()
    {
        // Create a StudentProgress with a related student (User)
        $studentProgress = StudentProgress::factory()->create();

        // Fetch the associated student
        $student = $studentProgress->student;

        // Assert that the StudentProgress belongs to the correct student
        $this->assertEquals($student->id, $studentProgress->student->id, "The StudentProgress should belong to the correct student.");
    }

    /**
     * Test that the StudentProgress model belongs to a course class.
     */
    public function test_student_progress_belongs_to_course_class()
    {
        // Create a StudentProgress with a related course class (CourseClass)
        $studentProgress = StudentProgress::factory()->create();

        // Fetch the associated course class
        $courseClass = $studentProgress->courseClass;

        // Assert that the StudentProgress belongs to the correct course class
        $this->assertEquals($courseClass->id, $studentProgress->courseClass->id, "The StudentProgress should belong to the correct course class.");
    }

    /**
     * Test that the StudentProgress model has a last_completed_lesson field.
     */
    public function test_student_progress_has_last_completed_lesson()
    {
        // Create a StudentProgress instance
        $studentProgress = StudentProgress::factory()->create();

        // Assert that the last_completed_lesson field is not null
        $this->assertNotNull($studentProgress->last_completed_lesson, "The StudentProgress should have a last_completed_lesson.");
    }

    /**
     * Test that the StudentProgress model has a last_completed_quiz field.
     */
    public function test_student_progress_has_last_completed_quiz()
    {
        // Create a StudentProgress instance
        $studentProgress = StudentProgress::factory()->create();

        // Assert that the last_completed_quiz field is not null
        $this->assertNotNull($studentProgress->last_completed_quiz, "The StudentProgress should have a last_completed_quiz.");
    }
}
