<?php

namespace Tests\Unit;

use App\Models\Announcement;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the fillable attributes of the Announcement model.
     */
    public function test_fillable_attributes()
    {
        $announcement = new Announcement();

        $fillableAttributes = $announcement->getFillable();

        // Check if the expected fillable attributes exist
        $this->assertContains('content', $fillableAttributes);
        $this->assertContains('announcement_date', $fillableAttributes);
        $this->assertContains('file_path', $fillableAttributes);
        $this->assertContains('course_class_id', $fillableAttributes);
    }

    /**
     * Test the courseClass relationship method.
     */
    public function test_course_class_relationship()
    {
        // Create a CourseClass instance
        $courseClass = CourseClass::factory()->create();

        // Create an Announcement instance with the related courseClass
        $announcement = Announcement::factory()->create([
            'course_class_id' => $courseClass->id,
        ]);

        // Check if the courseClass relationship is correctly established
        $this->assertInstanceOf(CourseClass::class, $announcement->courseClass);
        $this->assertEquals($courseClass->id, $announcement->courseClass->id);
    }
}
