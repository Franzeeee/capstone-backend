<?php

namespace Tests\Unit;

use App\Models\CodingProblemSubmission;
use App\Models\Submission;
use App\Models\CodingProblem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CodingProblemSubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the relationship between CodingProblemSubmission and Submission.
     *
     * @return void
     */
    public function test_belongs_to_submission()
    {
        // Create a new Submission
        $submission = Submission::factory()->create();

        // Create a new CodingProblemSubmission and associate it with the Submission
        $codingProblemSubmission = CodingProblemSubmission::factory()->create([
            'submission_id' => $submission->id,
        ]);

        // Assert that the CodingProblemSubmission belongs to the correct Submission
        $this->assertEquals($submission->id, $codingProblemSubmission->submission->id);
    }

    /**
     * Test the relationship between CodingProblemSubmission and CodingProblem.
     *
     * @return void
     */
    public function test_belongs_to_coding_problem()
    {
        // Create a new CodingProblem
        $codingProblem = CodingProblem::factory()->create();

        // Create a new CodingProblemSubmission and associate it with the CodingProblem
        $codingProblemSubmission = CodingProblemSubmission::factory()->create(['problem_id' => $codingProblem->id]);

        // Assert that the CodingProblemSubmission belongs to the correct CodingProblem
        $this->assertEquals($codingProblem->id, $codingProblemSubmission->codingProblem->id);
    }
}
