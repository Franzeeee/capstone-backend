<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\CourseClass;
use App\Models\ClassCodes;
use Mockery;
use Illuminate\Support\Str;


class CourseClassControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_class_success()
    {
        // Create a teacher user
        $teacher = User::factory()->create();

        // Prepare the request data
        $data = [
            'className' => 'Test Class',
            'description' => 'A description of the test class.',
            'teacher_id' => $teacher->id,
            'schedule' => 'Monday 10 AM',
            'room' => 'Room 101',
            'subject' => 'Web Development',
            'section' => 'A',
            'startDate' => '2024-01-01',
            'endDate' => '2024-12-31',
        ];

        $token = $teacher->createToken('Test Token')->plainTextToken;
        $response = $this->postJson('/api/class/create', $data, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Assert status code is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains the success message
        $response->assertJson([
            'message' => 'Course Class created successfully!',
        ]);

        // Assert that the class has been created in the database
        $this->assertDatabaseHas('course_classes', [
            'name' => 'Test Class',
            'description' => 'A description of the test class.',
            'teacher_id' => $teacher->id,
            'subject' => 'Web Development',
            'section' => 'A',
            'schedule' => 'Monday 10 AM',
            'room' => 'Room 101',
        ]);

        // Assert that a class code has been generated and stored
        $classCode = ClassCodes::where('class_id', CourseClass::latest()->first()->id)->first();
        $this->assertNotNull($classCode);
        $this->assertTrue(Str::length($classCode->code) === 8); // Ensure the class code is 8 characters long
    }

    public function test_create_class_validation_failure()
    {
        // Create a teacher user
        $teacher = User::factory()->create();

        // Prepare invalid data (missing class name)
        $data = [
            'description' => 'A class without a name.',
            'teacher_id' => $teacher->id,
            'schedule' => 'Monday 10 AM',
            'room' => 'Room 101',
            'subject' => 'Web Development',
            'section' => 'A',
            'startDate' => '2024-01-01',
            'endDate' => '2024-12-31',
        ];

        $token = $teacher->createToken('Test Token')->plainTextToken;
        $response = $this->postJson('/api/class/create', $data, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Assert status code is 422 (Unprocessable Entity) due to validation failure
        $response->assertStatus(422);

        // Assert that the validation error message for className exists
        $response->assertJsonValidationErrors(['className']);
    }


    public function testIndexReturnsEmptyForTeacherWithNoClasses()
    {
        $teacher = User::factory()->create();
        $this->actingAs($teacher);

        $response = $this->getJson('/api/classes?teacher_id=' . $teacher->id);

        $response->assertStatus(200);
        $response->assertJsonCount(0); // No classes should be returned
    }

    public function testIndexUnauthorizedAccess()
    {
        $response = $this->getJson('/api/classes?teacher_id=1');
        $response->assertStatus(401); // Unauthorized
    }


    public function testIndexReturnsClassesForValidTeacherId()
    {
        // Create a teacher user
        $teacher = User::factory()->create();

        // Create 5 course classes for the teacher
        CourseClass::factory()->count(5)->create(['teacher_id' => $teacher->id]);

        // Authenticate as the teacher
        $this->actingAs($teacher);

        // Send request to the index endpoint with the teacher_id
        $response = $this->getJson('/api/classes?teacher_id=' . $teacher->id);

        // Assert response status is 200
        $response->assertStatus(200);

        // Assert the response contains the 4 most recent classes
        $response->assertJsonCount(4); // Limit is set to 4 in the controller

        // Assert that the response has the correct structure
        $response->assertJsonStructure([
            '*' => [
                'id',
                'teacher_id',
                'class_code',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testIndexFailsWithInvalidTeacherId()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson('/api/classes?teacher_id=9999');

        // Assert response status is 422 (validation error)
        $response->assertStatus(422);
    }

    /**
     * Test generateUniqueClassCode function.
     */
    public function test_create_class_with_unique_code()
    {

        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $teacher = User::factory()->create(['role' => 'teacher']);
        $data = [
            'className' => 'Math 101',
            'description' => 'Basic Mathematics',
            'teacher_id' => $teacher->id,
            'schedule' => 'MWF 10-11am',
            'room' => 'Room 203',
            'subject' => 'Math',
            'section' => 'A',
        ];

        $response = $this->postJson(route('class.create'), $data);

        $response->assertStatus(200)
            ->assertJsonStructure(['message', 'data', 'classCode']);
    }

    public function test_update_class_information()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a course class
        $courseClass = CourseClass::factory()->create();

        // Prepare the update data
        $updateData = [
            'class_id' => $courseClass->id,
            'name' => 'Updated Class Name',
            'description' => 'Updated Description',
            'schedule' => 'Updated Schedule',
            'room' => 'Updated Room',
            'section' => 'Updated Section',
        ];

        // Send the update request
        $response = $this->postJson(route('class.update', $courseClass->id), $updateData);

        // Assert response status is 200
        $response->assertStatus(200);

        // Assert that the response contains the success message
        $response->assertJson(['message' => 'Class updated successfully']);

        // Assert that the class has been updated in the database
        $this->assertDatabaseHas('course_classes', [
            'id' => $courseClass->id,
            'name' => 'Updated Class Name',
            'description' => 'Updated Description',
            'schedule' => 'Updated Schedule',
            'room' => 'Updated Room',
            'section' => 'Updated Section',
        ]);
    }


    /** @test */
    public function it_allows_students_to_join_a_class()
    {

        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $classCode = ClassCodes::factory()->create();
        $student = User::factory()->create(['role' => 'student']);

        $data = [
            'class_code' => $classCode->code,
            'student_id' => $student->id,
        ];

        $response = $this->postJson(route('class.join'), $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Student successfully enrolled in class']);
    }

    /** @test */
    public function it_fetches_class_students()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a course class with students
        $courseClass = CourseClass::factory()->hasStudents(3)->create();

        // Generate the route with the correct parameter name 'id'
        $response = $this->getJson(route('class.fetchClassStudents', ['id' => $courseClass->id]));

        // Assert the status and JSON count
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_fetches_class_info_by_code()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $classCode = ClassCodes::factory()->create();

        $response = $this->getJson(route('class.fetchClassInfo', ['code' => $classCode->code]));

        $response->assertStatus(200)
            ->assertJsonStructure(['teacher', 'students_count']);
    }

    /** @test */
    public function it_deletes_a_class()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $courseClass = CourseClass::factory()->create();

        $response = $this->deleteJson(route('class.delete', ['classId' => $courseClass->id]));

        $response->assertStatus(200)
            ->assertJson(['message' => 'Class deleted successfully']);
    }

    /** @test */
    public function it_removes_a_student_from_class()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $courseClass = CourseClass::factory()->hasStudents(1)->create();
        $student = $courseClass->students->first();

        $data = [
            'class_id' => $courseClass->id,
            'student_id' => $student->id,
        ];

        $response = $this->postJson(route('class.removeStudent'), $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Student removed from class']);
    }

    /** @test */
    public function it_updates_grade_distribution()
    {
        // Authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        $courseClass = CourseClass::factory()->create();

        $data = [
            'class_id' => $courseClass->id,
            'assessment' => 0.6,
            'final_assessment' => 0.4,
        ];

        $response = $this->postJson(route('class.updateGradeDistribution'), $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Grade distribution updated successfully']);
    }
}
