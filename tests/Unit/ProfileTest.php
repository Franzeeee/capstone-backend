<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a Profile belongs to a user.
     */
    public function test_profile_belongs_to_user()
    {
        // Create a Profile with a related user
        $profile = Profile::factory()->create();

        // Fetch the associated user
        $user = $profile->user;

        // Assert that the profile belongs to the correct user
        $this->assertEquals($user->id, $profile->user->id, "The profile should belong to the correct user.");
    }

    /**
     * Test that the Profile has a profile path.
     */
    public function test_profile_has_profile_path()
    {
        // Create a Profile instance
        $profile = Profile::factory()->create();

        // Assert that the profile has a profile path
        $this->assertNotNull($profile->profile_path, "The profile should have a profile path.");
    }

    /**
     * Test that a Profile can be created successfully.
     */
    public function test_profile_creation()
    {
        // Create a Profile using the factory
        $profile = Profile::factory()->create();

        // Fetch the profile from the database
        $storedProfile = Profile::find($profile->id);

        // Assert that the profile was created successfully
        $this->assertNotNull($storedProfile, "The profile should be created in the database.");
    }
}
