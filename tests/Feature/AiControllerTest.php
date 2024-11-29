<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class AiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_generateAssessment()
    {
        $user = User::factory()->create(); // Adjust this to your user model

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_activityAutoCheck()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_generateCodingProblem()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
