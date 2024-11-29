<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Models\User;

class CompilerControllerTest extends TestCase
{
    // Test for successful token retrieval
    public function test_get_token_successful()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);

        $fakeToken = 'fake_token';

        // Fake the HTTP response to return a successful response
        Http::fake([
            'https://api.jdoodle.com/v1/auth-token' => Http::response(['token' => json_encode(['token' => $fakeToken])], 200),
        ]);

        $response = $this->getJson(route('compiler.getToken'));

        $response->assertStatus(200);
    }

    // Test for failed token retrieval
    public function test_get_token_failed()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);
        $errorMessage = 'Failed to retrieve the token: Invalid client credentials';

        // Fake the HTTP response to return a failure response
        Http::fake([
            'https://api.jdoodle.com/v1/auth-token' => Http::response(['message' => $errorMessage], 400),
        ]);

        $response = $this->getJson(route('compiler.getToken'));

        $response->assertStatus(400);
    }

    // Test for exception handling during token retrieval
    public function test_get_token_exception()
    {
        $user = User::factory()->create(); // Adjust this to your user model
        $this->actingAs($user);
        // Fake the HTTP request to throw an exception
        Http::fake(function () {
            throw new \Exception('API request failed');
        });

        $response = $this->getJson(route('compiler.getToken'));

        $response->assertStatus(500)
            ->assertJson([
                'message' => 'An error occurred: API request failed',
            ]);
    }
}
