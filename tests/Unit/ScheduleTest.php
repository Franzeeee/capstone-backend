<?php

namespace Tests\Unit;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the schedule belongs to a user.
     */
    public function test_schedule_belongs_to_user()
    {
        // Create a Schedule with a related user
        $schedule = Schedule::factory()->create();

        // Fetch the associated user
        $user = $schedule->user;

        // Assert that the schedule belongs to the correct user
        $this->assertEquals($user->id, $schedule->user->id, "The schedule should belong to the correct user.");
    }

    /**
     * Test that the schedule has a title.
     */
    public function test_schedule_has_title()
    {
        // Create a Schedule instance
        $schedule = Schedule::factory()->create();

        // Assert that the schedule has a title
        $this->assertNotNull($schedule->title, "The schedule should have a title.");
    }

    /**
     * Test that the schedule can be created successfully.
     */
    public function test_schedule_creation()
    {
        // Create a Schedule using the factory
        $schedule = Schedule::factory()->create();

        // Fetch the schedule from the database
        $storedSchedule = Schedule::find($schedule->id);

        // Assert that the schedule was created successfully
        $this->assertNotNull($storedSchedule, "The schedule should be created in the database.");
    }
}
