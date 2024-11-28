<?php

namespace Tests\Unit;

use App\Models\ActivityFile;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityFileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the fillable attributes of the ActivityFile model.
     */
    public function test_fillable_attributes()
    {
        $activityFile = new ActivityFile();

        $fillableAttributes = $activityFile->getFillable();

        // Check if the expected fillable attributes exist
        $this->assertContains('activity_id', $fillableAttributes);
        $this->assertContains('file_path', $fillableAttributes);
        $this->assertContains('file_name', $fillableAttributes);
        $this->assertContains('file_type', $fillableAttributes);
    }

    /**
     * Test the activity relationship method.
     */
    public function test_activity_relationship()
    {
        // Create an Activity instance
        $activity = Activity::factory()->create();

        // Create an ActivityFile instance
        $activityFile = ActivityFile::factory()->create([
            'activity_id' => $activity->id,
        ]);

        // Check if the activity relationship is correctly established
        $this->assertInstanceOf(Activity::class, $activityFile->activity);
        $this->assertEquals($activity->id, $activityFile->activity->id);
    }
}
