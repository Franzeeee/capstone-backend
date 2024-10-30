<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class ProfileController extends Controller
{
    //
    public function uploadProfilePicture(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max file size of 2MB
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Find or create the user's profile
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        // Delete the previous profile picture if it exists
        if ($profile->profile_path) {
            unlink(storage_path('app/public/' . $profile->profile_path)); // Ensure this matches your column name
        }

        // Store the uploaded profile picture in the 'profile_pictures' folder
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Update the profile picture path
        $profile->profile_path = $path; // Ensure this matches your column name
        $profile->user_id = $user->id;
        $profile->save(); // This will create or update the profile record

        return response()->json(['path' => asset('storage/' . $path)], 201); // Return the file path
    }





    public function updateBasicInfo(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Get the authenticated user
        $user = User::find(auth()->user()->id);

        // Update the user's information
        $user->name = $request->name;

        // Save the user with the new information
        $user->save();

        return response()->json(['message' => 'Basic information updated successfully']);
    }

    public function updatecontactInfo(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        // Get the authenticated user
        $user = User::find(auth()->user()->id);

        // Update the user's information
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Save the user with the new information
        $user->save();

        return response()->json(['message' => 'Contact Information updated successfully']);
    }

    public function updatePassword(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        // Get the authenticated user
        $user = User::find(auth()->user()->id);

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 401);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);

        // Save the user with the new password
        $user->save();

        return response()->json(['message' => 'Password updated successfully']);
    }

    public function fetchProfilePicture()
    {
        // Get the authenticated user
        $user = User::find(Auth::id());

        // Find the user's profile
        $profile = Profile::where('user_id', $user->id)->first();

        // Check if the profile picture exists and return the appropriate response
        $profilePicturePath = $profile && $profile->profile_path ? asset('storage/' . $profile->profile_path) : null;

        return response()->json(['path' => $profilePicturePath]);
    }
}
