<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\CourseClass;
use App\Models\User;
use App\Models\Submission;
use App\Models\CodingProblem;
use App\Models\ActivityFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_course_class()
    {
        // Create a CourseClass instance
        $courseClass = CourseClass::factory()->create();

        // Create an Activity instance with the related CourseClass
        $activity = Activity::factory()->create(['course_class_id' => $courseClass->id]);

        // Assert the relationship is correctly set
        $this->assertInstanceOf(CourseClass::class, $activity->courseClass);
        $this->assertEquals($courseClass->id, $activity->courseClass->id);
    }

    /** @test */
    public function it_belongs_to_user()
    {
        // Create a User instance
        $user = User::factory()->create();

        // Create an Activity instance with the related User
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        // Assert the relationship is correctly set
        $this->assertInstanceOf(User::class, $activity->user);
        $this->assertEquals($user->id, $activity->user->id);
    }

    /** @test */
    public function it_has_many_submissions()
    {
        // Create an Activity instance
        $activity = Activity::factory()->create();

        // Create multiple Submission instances related to the Activity
        $submissions = Submission::factory()->count(3)->create(['activity_id' => $activity->id]);

        // Assert that the activity has many submissions
        $this->assertCount(3, $activity->submissions);
        $this->assertInstanceOf(Submission::class, $activity->submissions->first());
    }

    /** @test */
    public function it_has_many_coding_problems()
    {
        // Create an Activity instance
        $activity = Activity::factory()->create();

        // Create multiple CodingProblem instances related to the Activity
        $codingProblems = CodingProblem::factory()->count(3)->create(['activity_id' => $activity->id]);

        // Assert that the activity has many coding problems
        $this->assertCount(3, $activity->codingProblems);
        $this->assertInstanceOf(CodingProblem::class, $activity->codingProblems->first());
    }

    /** @test */
    public function it_has_many_activity_files()
    {
        // Create an Activity instance
        $activity = Activity::factory()->create();

        // Create multiple ActivityFile instances related to the Activity
        $activityFiles = ActivityFile::factory()->count(3)->create(['activity_id' => $activity->id]);

        // Assert that the activity has many activity files
        $this->assertCount(3, $activity->activityFiles);
        $this->assertInstanceOf(ActivityFile::class, $activity->activityFiles->first());
    }
}
