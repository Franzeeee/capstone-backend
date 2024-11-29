<?php

namespace Tests\Feature;

use App\Models\Announcement;
use App\Models\User;
use App\Models\CourseClass;
use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnnouncementControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_announcement_with_valid_data()
    {
        $user = User::factory()->create(); // Create a user
        $courseClass = CourseClass::factory()->create(); // Create a course class
        $this->actingAs($user); // Authenticate as the user

        $data = [
            'content' => 'New announcement content',
            'course_class_id' => $courseClass->id,
            'file' => null, // Simulate no file upload for simplicity
        ];

        $response = $this->postJson(route('announcements.store'), $data); // Make the POST request

        $response->assertStatus(201);
    }

    /** @test */
    public function it_can_delete_announcement()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $user = User::factory()->create();
        $courseClass = CourseClass::factory()->create();
        $announcement = Announcement::factory()->create(['course_class_id' => $courseClass->id]);
        $this->actingAs($user);

        $response = $this->getJson(route('announcements.delete', $announcement->id));

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Announcement deleted successfully']);
        $this->assertDatabaseMissing('announcements', ['id' => $announcement->id]);
    }
}
