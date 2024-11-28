<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\CourseClass;
use App\Models\Activity;
use App\Models\Schedule;
use App\Models\CodingProblem;
use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Tests\TestCase;

class ActivitiesControllerTest extends TestCase
{
    use RefreshDatabase;

    // Test case for store() method
    public function test_store_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $courseClass = CourseClass::factory()->create();

        // Prepare request data
        $data = [
            'user_id' => $user->id,
            'course_class_id' => $courseClass->id,
            'title' => 'New Activity',
            'description' => 'Activity Description',
            'due_date' => null,
            'coding_problems' => [
                [
                    'title' => 'Problem 1',
                    'description' => 'Problem 1 description',
                    'sample_input' => 'Sample input 1',
                    'expected_output' => 'Expected output 1',
                ],
            ],
            'points' => 100,
        ];

        // Make a post request to store the activity
        $response = $this->postJson(route('activities.store'), $data);

        // Assert successful creation
        $response->assertStatus(201);
        $this->assertDatabaseHas('activities', ['title' => 'New Activity']);
    }

    // Test case for getClassActivities() method
    public function test_get_class_activities()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $courseClass = CourseClass::factory()->create();
        $activity = Activity::factory()->create(['course_class_id' => $courseClass->id]);

        $response = $this->getJson(route('activities.getClassActivities', ['classId' => $courseClass->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for getAllActivity() method
    public function test_get_all_activities()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.getAllActivity'));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for getCodingActivity() method
    public function test_get_coding_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.getCodingActivity', ['activityId' => $activity->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for fetchActivityWithoutProblems() method
    public function test_fetch_activity_without_problems()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.fetchActivityWithoutProblems', ['activityId' => $activity->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for deleteActivity() method
    public function test_delete_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->deleteJson(route('activities.deleteActivity', ['id' => $activity->id]));

        $response->assertStatus(200);
        $this->assertDatabaseMissing('activities', ['id' => $activity->id]);
    }

    // Test case for updateActivity() method
    public function test_update_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();
        $user = User::factory()->create();
        $courseClass = CourseClass::factory()->create();

        $data = [
            'user_id' => $user->id,
            'course_class_id' => $courseClass->id,
            'title' => 'Updated Activity Title',
            'description' => 'Updated description',
            'coding_problems' => [
                [
                    'title' => 'Updated Problem 1',
                    'description' => 'Updated description',
                    'expected_output' => 'Updated output',
                ],
            ],
            'points' => 100,
        ];

        $response = $this->putJson(route('activities.updateActivity', ['id' => $activity->id]), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('activities', ['title' => 'Updated Activity Title']);
    }
}
