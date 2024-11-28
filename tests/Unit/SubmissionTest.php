<?php

namespace Tests\Unit;

use App\Models\Submission;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a submission can be created with valid data.
     *
     * @return void
     */
    public function test_submission_creation()
    {
        // Arrange: Create a new activity and student using their respective factories
        $activity = Activity::factory()->create();
        $user = User::factory()->create();

        // Act: Create a submission
        $submission = Submission::factory()->create([
            'activity_id' => $activity->id,
            'student_id' => $user->id,
        ]);

        // Assert: Check that the submission was created successfully
        $this->assertDatabaseHas('submissions', [
            'activity_id' => $activity->id,
            'student_id' => $user->id,
        ]);
    }

    /**
     * Test the relationship between submission and activity.
     *
     * @return void
     */
    public function test_submission_belongs_to_activity()
    {
        // Arrange: Create a submission and activity
        $submission = Submission::factory()->create();
        $activity = $submission->activity;

        // Assert: Check that the activity relationship is correct
        $this->assertInstanceOf(Activity::class, $activity);
    }

    /**
     * Test the relationship between submission and user (student).
     *
     * @return void
     */
    public function test_submission_belongs_to_user()
    {
        // Arrange: Create a submission and user
        $submission = Submission::factory()->create();
        $user = $submission->user;

        // Assert: Check that the user relationship is correct
        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * Test if score is nullable.
     *
     * @return void
     */
    public function test_submission_score_nullable()
    {
        // Act: Create a submission without a score
        $submission = Submission::factory()->create([
            'score' => null,
        ]);

        // Assert: Ensure score can be null
        $this->assertNull($submission->score);
    }
}
