<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function uploadProfilePicture(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Store the uploaded profile picture in the 'profile_pictures' folder
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        return response()->json(['path' => $path], 201); // Return the file path
    }
}
