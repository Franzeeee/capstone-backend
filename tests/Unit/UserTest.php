<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;  // Use Laravel's base TestCase
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Profile;
use App\Models\CourseClass;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the user model has fillable attributes.
     */
    public function test_user_fillable_attributes()
    {
        $user = new User();

        $fillableAttributes = $user->getFillable();

        $this->assertContains('name', $fillableAttributes);
        $this->assertContains('first_name', $fillableAttributes);
        $this->assertContains('email', $fillableAttributes);
        $this->assertContains('password', $fillableAttributes);
        $this->assertContains('role', $fillableAttributes);
    }

    /**
     * Test that the user model can create a new user.
     */
    public function test_user_can_create()
    {
        $user = User::create([
            'name' => 'John Doe',
            'first_name' => 'John',
            'middle_name' => 'M',
            'last_name' => 'Doe',
            'suffix' => 'Jr.',
            'email' => 'john@example.com',
            'birthdate' => '2000-01-01',
            'gender' => 'male',
            'password' => Hash::make('password123'),
            'phone' => '1234567890',
            'role' => 'student'
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
    }

    /**
     * Test the profile relationship.
     */
    public function test_user_has_profile()
    {
        $user = User::factory()->create(); // Create a user using factory
        $profile = Profile::factory()->create(['user_id' => $user->id]); // Create a profile linked to the user

        $this->assertInstanceOf(Profile::class, $user->profile);
        $this->assertEquals($user->id, $user->profile->user_id);
    }

    /**
     * Test the courseClasses relationship.
     */
    public function test_user_has_course_classes()
    {
        $user = User::factory()->create();
        $courseClass = CourseClass::factory()->create(['teacher_id' => $user->id]);

        $this->assertInstanceOf(CourseClass::class, $user->courseClasses->first());
        $this->assertEquals($user->id, $courseClass->teacher_id);
    }

    /**
     * Test the `profile` method on the User model.
     */
    public function test_user_profile_method()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->profile->id, $profile->id);
    }
}
