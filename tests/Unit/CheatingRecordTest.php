<?php

namespace Tests\Unit;

use App\Models\CheatingRecord;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheatingRecordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_submission()
    {
        $submission = Submission::factory()->create();
        $cheatingRecord = CheatingRecord::factory()->create(['submission_id' => $submission->id]);

        $this->assertTrue($cheatingRecord->submission->is($submission));
    }

    /** @test */
    public function it_has_exit_fullscreen_and_change_tab_flags()
    {
        $cheatingRecord = CheatingRecord::factory()->create();

        $this->assertIsBool($cheatingRecord->exit_fullscreen);
        $this->assertIsBool($cheatingRecord->change_tab);
    }
}
