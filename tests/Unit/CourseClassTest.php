<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\CourseClass;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\ClassCodes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CourseClassTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Test mass assignment on the CourseClass model.
     */
    public function test_fillable_attributes()
    {
        // Create a user for the teacher relationship
        $teacher = User::factory()->create();

        // Create an array of attributes to be mass-assigned
        $attributes = [
            'name' => 'Math 101',
            'description' => 'Introduction to Math',
            'teacher_id' => $teacher->id,
            'section' => 'A',
            'schedule' => 'Monday 9 AM',
            'room' => 'Room 101',
            'subject' => 'Math',
            'grade_distribution' => json_encode(['midterm' => '50%', 'final' => '50%']),
        ];

        // Attempt to create a CourseClass using mass-assignment
        $courseClass = CourseClass::create($attributes);

        // Assert that the CourseClass is correctly created and attributes are assigned
        $this->assertEquals('Math 101', $courseClass->name);
        $this->assertEquals('Introduction to Math', $courseClass->description);
        $this->assertEquals($teacher->id, $courseClass->teacher_id);
        $this->assertEquals('A', $courseClass->section);
        $this->assertEquals('Monday 9 AM', $courseClass->schedule);
        $this->assertEquals('Room 101', $courseClass->room);
        $this->assertEquals('Math', $courseClass->subject);
        $this->assertEquals(['midterm' => '50%', 'final' => '50%'], json_decode($courseClass->grade_distribution, true));
    }

    /**
     * Test that attributes not in the fillable array are not mass-assigned.
     */
    public function test_non_fillable_attributes()
    {
        // Create a user for the teacher relationship
        $teacher = User::factory()->create();

        // Attempt to mass-assign a non-fillable attribute (id)
        $courseClass = CourseClass::create([
            'name' => 'Math 101',
            'teacher_id' => $teacher->id,
            'id' => 999,  // Non-fillable attribute
            'section' => 'A',
            'schedule' => 'Monday 9 AM',
            'room' => 'Room 101',
            'subject' => 'Math',
            'grade_distribution' => json_encode(['midterm' => '50%', 'final' => '50%']),

        ]);

        // Assert that the ID is not mass-assigned
        $this->assertNotEquals(999, $courseClass->id);  // The ID should not be set to 999
        $this->assertNotNull($courseClass->id);  // The ID should still be auto-generated
    }

    /**
     * Test the creation of a CourseClass with related models.
     */
    public function testCourseClassCreationWithRelations()
    {
        $courseClass = CourseClass::factory()->withRelations()->create();

        // Assert that the CourseClass has the correct relationships
        $this->assertInstanceOf(User::class, $courseClass->teacher);
        $this->assertCount(3, $courseClass->activities); // Check that 3 activities are related
        $this->assertCount(2, $courseClass->announcements); // Check that 2 announcements are related
        $this->assertInstanceOf(ClassCodes::class, $courseClass->classCode); // Check that the classCode is related
    }


    /**
     * Test the relationship between CourseClass and students.
     */
    public function test_course_class_has_students()
    {
        // Create a CourseClass and associate students with it
        $courseClass = CourseClass::factory()->create();
        $student = User::factory()->create();
        $courseClass->students()->attach($student);

        // Assert that the CourseClass has the correct students
        $this->assertTrue($courseClass->students->contains($student));
    }

    /**
     * Test the relationship between CourseClass and teacher.
     */
    public function test_course_class_belongs_to_teacher()
    {
        // Create a CourseClass with a teacher
        $courseClass = CourseClass::factory()->create();
        $teacher = $courseClass->teacher;

        // Assert that the CourseClass belongs to the correct teacher
        $this->assertEquals($teacher->id, $courseClass->teacher->id);
    }

    /**
     * Test the CourseClass class code association.
     */
    public function test_course_class_has_class_code()
    {
        // Create a CourseClass with a class code using the withRelations method
        $courseClass = CourseClass::factory()->withRelations()->create();

        // Get the class code
        $classCode = $courseClass->classCode;

        // Assert that the CourseClass has a class code
        $this->assertNotNull($classCode);  // Assert that classCode is not null
        $this->assertNotNull($classCode->code);  // Optionally check that the code is also present
    }
}
