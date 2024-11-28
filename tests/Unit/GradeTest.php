<?php

namespace Tests\Unit;

use App\Models\Grade;
use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a grade belongs to a student and course class.
     *
     * @return void
     */
    public function test_grade_belongs_to_student_and_class()
    {
        // Create a student and a course class
        $student = User::factory()->create();
        $courseClass = CourseClass::factory()->create();

        // Create a grade for the student in the course class
        $grade = Grade::factory()->create([
            'student_id' => $student->id,
            'class_id' => $courseClass->id,
        ]);

        // Assert that the grade belongs to the correct student
        $this->assertEquals($student->id, $grade->student->id);

        // Assert that the grade belongs to the correct course class
        $this->assertEquals($courseClass->id, $grade->courseClass->id);
    }

    /**
     * Test that the grade model has a final grade and remarks.
     *
     * @return void
     */
    public function test_grade_has_final_grade_and_remarks()
    {
        // Create a grade
        $grade = Grade::factory()->create();

        // Assert that the final grade is a number between 60 and 100
        $this->assertGreaterThanOrEqual(60, $grade->final_grade);
        $this->assertLessThanOrEqual(100, $grade->final_grade);

        // Assert that remarks are not null
        $this->assertNotNull($grade->remarks);
    }
}
