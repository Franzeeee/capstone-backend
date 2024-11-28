<?php

namespace Tests\Unit;

use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionFileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the creation of a submission file.
     *
     * @return void
     */
    public function test_submission_file_creation()
    {
        // Create a Submission
        $submission = Submission::factory()->create();

        // Create a SubmissionFile
        $submissionFile = SubmissionFile::factory()->create([
            'submission_id' => $submission->id,
        ]);

        // Assert: Check if the file was created
        $this->assertDatabaseHas('submission_files', [
            'submission_id' => $submission->id,
            'file_name' => $submissionFile->file_name,
        ]);
    }

    /**
     * Test the relationship between SubmissionFile and Submission.
     *
     * @return void
     */
    public function test_submission_file_belongs_to_submission()
    {
        // Create a Submission
        $submission = Submission::factory()->create();

        // Create a SubmissionFile
        $submissionFile = SubmissionFile::factory()->create([
            'submission_id' => $submission->id,
        ]);

        // Assert: Check that the submission relationship is correct
        $this->assertInstanceOf(Submission::class, $submissionFile->submission);
    }
}
