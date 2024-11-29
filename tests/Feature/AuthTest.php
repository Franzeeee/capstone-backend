<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_registration_successful()
    {
        // Mock data for the registration request.
        $requestData = [
            'name' => 'John Doe',
            'first_name' => 'John',
            'middle_name' => 'Smith',
            'last_name' => 'Doe',
            'suffix' => 'Jr.',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'role' => 'user',
            'phone' => '09123456789',
        ];

        // Send a POST request to the route handling the register method.
        $response = $this->postJson('/api/register', $requestData);

        // Assert the response status is 200.
        $response->assertStatus(200);

        // Assert the response message.
        $response->assertJson(['message' => 'Registration']);

        // Check the user is created in the database.
        $this->assertDatabaseHas('users', [
            'email' => $requestData['email'],
            'name' => $requestData['name'],
        ]);

        // Check the password is hashed correctly.
        $user = User::where('email', $requestData['email'])->first();
        $this->assertTrue(Hash::check($requestData['password'], $user->password));

        // Check the profile is created in the database.
        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'profile_path' => 'profile_pictures/default.png',
        ]);
    }

    public function test_user_registration_validation_fails()
    {
        // Mock incomplete data for the registration request.
        $requestData = [
            'name' => 'John Doe',
            'first_name' => 'John',
            // 'last_name' => '', // This field is intentionally missing
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'role' => 'user',
            'phone' => '09123456789',
        ];

        // Send a POST request with incomplete data.
        $response = $this->postJson('/api/register', $requestData);

        // Assert the response status is 422 (validation error).
        $response->assertStatus(422);
    }

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
