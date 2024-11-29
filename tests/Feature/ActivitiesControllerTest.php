<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\CourseClass;
use App\Models\Activity;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

        $response = $this->getJson(route('activities.getClassActivities', ['id' => $courseClass->id]));

        $response->assertStatus(200);
    }

    // Test case for getCodingActivity() method
    public function test_get_coding_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.getCodingActivity', ['id' => $activity->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for fetchActivityWithoutProblems() method
    public function test_fetch_activity_without_problems()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.fetchActivityWithoutProblems', ['id' => $activity->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $activity->title]);
    }

    // Test case for deleteActivity() method
    public function test_delete_activity()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activities.delete', ['id' => $activity->id]));

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
            'end_date' => null,
            'coding_problems' => [
                [
                    'title' => 'Updated Problem 1',
                    'description' => 'Updated description',
                    'expected_output' => 'Updated output',
                ],
            ],
            'points' => 100,
        ];

        $response = $this->putJson(route('activities.update', ['id' => $activity->id]), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('activities', ['title' => 'Updated Activity Title']);
    }

    /** @test */
    public function test_create_logic_activity()
    {
        // Arrange: Prepare necessary data (e.g., course_class, user, etc.)
        $teacher = User::factory()->create(); // Assuming you're using a factory to create a teacher user.
        $courseClass = CourseClass::factory()->create(); // Assuming you have a factory for CourseClass.
        $students = User::factory()->count(3)->create(); // Creating 3 students for the course.
        $courseClass->students()->attach($students); // Attaching students to the course class.

        // Act: Make a request to create a new activity
        $data = [
            'course_class_id' => $courseClass->id,
            'title' => 'New Logic Activity',
            'description' => 'Description for the new logic activity',
            'points' => 100,
            'final_assessment' => false,
            'manual_checking' => false,
            'due_date' => now()->addDays(7)->toDateString(),
            'files' => [],
        ];

        // Send the POST request to the controller method
        $response = $this->actingAs($teacher)->postJson(route('activities.createLogicActivity'), $data);

        // Assert: Check the database and responses
        // 1. Assert the activity is created
        $this->assertDatabaseHas('activities', [
            'course_class_id' => $courseClass->id,
            'user_id' => $teacher->id,
            'title' => 'New Logic Activity',
            'description' => 'Description for the new logic activity',
            'point' => 100,  // Update this to 100, since that's what the request sends
        ]);


        // 3. Assert schedules are created for students
        foreach ($students as $student) {
            $this->assertDatabaseHas('schedules', [
                'user_id' => $student->id,
                'title' => 'New Logic Activity',
            ]);
        }

        // 4. Assert notifications are created for students
        foreach ($students as $student) {
            $this->assertDatabaseHas('notifications', [
                'user_id' => $student->id,
                'message' => 'Your teacher posted a new assessment in ' . $courseClass->name . ($courseClass->section ? ' (' . $courseClass->section . ')' : ''),
            ]);
        }

        // 5. Assert the response status is 201 (Created)
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Activity created successfully!']);
    }
}
