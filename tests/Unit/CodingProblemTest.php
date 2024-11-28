<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\CodingProblem;
use App\Models\CodingProblemSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CodingProblemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if CodingProblem model belongs to an Activity.
     *
     * This test checks if the 'activity_id' in CodingProblem properly references
     * the Activity model through the 'activity' relationship.
     *
     * @return void
     */
    public function test_it_belongs_to_activity()
    {
        // Create an Activity instance
        $activity = Activity::factory()->create();

        // Create a CodingProblem instance and associate it with the created Activity
        $codingProblem = CodingProblem::factory()->create(['activity_id' => $activity->id]);

        // Assert that the 'activity' relation returns the correct related Activity instance
        $this->assertTrue($codingProblem->activity->is($activity));
    }

    /**
     * Test if CodingProblem model has many CodingProblemSubmissions.
     *
     * This test checks if the 'codingProblemSubmissions' relationship works correctly,
     * meaning CodingProblem should have many related CodingProblemSubmission instances.
     *
     * @return void
     */
    public function test_it_has_many_coding_problem_submissions()
    {
        // Create a CodingProblem instance
        $codingProblem = CodingProblem::factory()->create();

        // Create related CodingProblemSubmission instances
        $submission1 = CodingProblemSubmission::factory()->create(['problem_id' => $codingProblem->id]);
        $submission2 = CodingProblemSubmission::factory()->create(['problem_id' => $codingProblem->id]);

        // Assert that the CodingProblem has 2 related CodingProblemSubmissions
        $this->assertCount(2, $codingProblem->codingProblemSubmissions);
    }
}
