<?php

namespace Tests\Unit;

use App\Models\Submission;
use App\Models\SubmissionFeedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionFeedbackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a submission feedback is created successfully.
     *
     * @return void
     */
    public function test_submission_feedback_creation()
    {
        // Create a submission
        $submission = Submission::factory()->create();

        // Create feedback for the submission
        $feedback = SubmissionFeedback::factory()->create([
            'submission_id' => $submission->id,
        ]);

        // Assert: Check that the feedback is correctly associated with the submission
        $this->assertDatabaseHas('submission_feedback', [
            'submission_id' => $submission->id,
            'feedback' => $feedback->feedback,
        ]);
    }

    /**
     * Test the feedback belongs to a submission.
     *
     * @return void
     */
    public function test_submission_feedback_belongs_to_submission()
    {
        // Create a submission and feedback
        $feedback = SubmissionFeedback::factory()->create();

        // Assert: Check that the feedback belongs to a submission
        $this->assertInstanceOf(Submission::class, $feedback->submission);
    }

    /**
     * Test if feedback field is nullable.
     *
     * @return void
     */
    public function test_feedback_nullable()
    {
        // Create a feedback without a feedback text
        $feedback = SubmissionFeedback::factory()->create([
            'feedback' => null, // Explicitly setting feedback to null
        ]);

        // Assert: Check that the feedback field is null
        $this->assertNull($feedback->feedback);
    }
}
