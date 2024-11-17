<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\CourseClass;
use App\Models\ClassCodes;
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
}
