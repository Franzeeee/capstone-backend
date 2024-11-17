<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    /** @test */
    public function user_can_authenticate_with_sanctum_token()
    {
        // Create a user
        $user = User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('TestApp')->plainTextToken;

        // Make a request with the token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/user');

        // Assert the response is successful
        $response->assertStatus(200);
    }

    /** @test */
    public function user_cannot_access_protected_route_without_token()
    {
        // Make a request without the token
        $response = $this->get('/api/user');  // Replace with the route you want to test

        // Assert that the user is unauthorized
        $response->assertStatus(401);
    }

    /** @test */
    public function test_user_can_logout_and_revoke_token()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a token for the user
        $token = $user->createToken('Test Token')->plainTextToken;

        // Make the logout request with the token
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/logout');

        // Assert the response is successful
        $response->assertStatus(200);

        // Check that the token was revoked
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'tokenable_type' => get_class($user),
        ]);
    }
}
