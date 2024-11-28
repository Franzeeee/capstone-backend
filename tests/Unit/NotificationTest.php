<?php

namespace Tests\Unit;

use App\Models\Notification;
use App\Models\User;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a Notification has a user and class.
     */
    public function test_notification_belongs_to_user_and_class()
    {
        // Create a Notification with a related user and class
        $notification = Notification::factory()->create();

        // Fetch the associated user and class
        $user = $notification->user;
        $class = $notification->class;

        // Assert that the notification belongs to the correct user
        $this->assertEquals($user->id, $notification->user->id, "The notification should belong to the correct user.");

        // Assert that the notification belongs to the correct course class
        $this->assertEquals($class->id, $notification->class->id, "The notification should belong to the correct course class.");
    }

    /**
     * Test that the Notification has required fields.
     */
    public function test_notification_has_required_fields()
    {
        // Create a Notification instance
        $notification = Notification::factory()->create();

        // Assert that the notification has a message
        $this->assertNotNull($notification->message, "The notification message should not be null.");

        // Assert that the notification has a status
        $this->assertNotNull($notification->status, "The notification status should not be null.");

        // Assert that the notification has a type
        $this->assertNotNull($notification->type, "The notification type should not be null.");
    }

    /**
     * Test that a Notification can be created successfully.
     */
    public function test_notification_creation()
    {
        // Create a Notification using the factory
        $notification = Notification::factory()->create();

        // Fetch the notification from the database
        $storedNotification = Notification::find($notification->id);

        // Assert that the notification was created successfully
        $this->assertNotNull($storedNotification, "The notification should be created in the database.");
    }
}
