<?php

namespace Tests\Feature;

use App\Models\CourseClass;
use App\Models\ActivateLogicLesson;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivateLogicLessonControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_lesson_status_to_active()
    {
        // Ensure a logged-in user (if authentication is required)
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        // Ensure there is a class in the course_classes table
        $class = CourseClass::factory()->create([
            'id' => 1, // Ensure the class_id is consistent
        ]);

        // Create a lesson associated with the class
        $lesson = ActivateLogicLesson::factory()->create([
            'status' => 'inactive',
            'class_id' => $class->id
        ]);

        // Send a GET request to activate the lesson
        $response = $this->getJson(route('activateLogicLesson.update', ['id' => $lesson->class_id]));

        // Assert that the status is updated to active
        $lesson->refresh(); // Refresh to get the latest data from the database
        $response->assertStatus(200)
            ->assertJson(['message' => 'Lesson activated successfully']);
        $this->assertEquals('active', $lesson->status);
    }

    public function test_deactivate_lesson_status_to_inactive()
    {
        // Ensure a logged-in user (if authentication is required)
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        // Ensure there is a class in the course_classes table
        $class = CourseClass::factory()->create([
            'id' => 1, // Ensure the class_id is consistent
        ]);

        // Create a lesson associated with the class
        $lesson = ActivateLogicLesson::factory()->create([
            'status' => 'active',
            'class_id' => $class->id
        ]);

        // Send a GET request to deactivate the lesson
        $response = $this->getJson(route('activateLogicLesson.deactivate', ['id' => $lesson->class_id]));

        // Assert that the status is updated to inactive
        $lesson->refresh(); // Refresh to get the latest data from the database
        $response->assertStatus(200)
            ->assertJson(['message' => 'Lesson deactivated successfully']);
        $this->assertEquals('inactive', $lesson->status);
    }

    public function test_get_lesson_status()
    {

        // Ensure a logged-in user (if authentication is required)
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        // Ensure there is a class in the course_classes table
        $class = CourseClass::factory()->create([
            'id' => 1, // Ensure the class_id is consistent
        ]);

        // Create a lesson associated with the class
        $lesson = ActivateLogicLesson::factory()->create([
            'status' => 'active',
            'class_id' => $class->id
        ]);

        // Send a GET request to retrieve the lesson status
        $response = $this->getJson(route('activateLogicLesson.status', ['id' => $lesson->class_id]));

        // Assert that the correct status is returned
        $response->assertStatus(200)
            ->assertJson(['status' => 'active']);
    }

    public function test_lesson_not_found()
    {
        // Ensure a logged-in user (if authentication is required)
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        // Send a GET request with an invalid lesson ID
        $response = $this->getJson(route('activateLogicLesson.status', ['id' => 999]));

        // Assert that the lesson was not found
        $response->assertStatus(404)
            ->assertJson(['message' => 'Lesson not found']);
    }
}
