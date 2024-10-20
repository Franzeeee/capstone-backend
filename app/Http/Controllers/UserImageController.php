<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserImage;

class UserImageController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|max:2048', // Max size: 2MB
            'user_id' => 'required|exists:users,id',
        ]);

        // Store the uploaded image in the 'profile_pictures' folder
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Create a new UserImage entry
        $userImage = new UserImage();
        $userImage->user_id = $request->input('user_id'); // Assuming user is authenticated
        $userImage->image_path = $path;
        $userImage->save();

        // Return the file path or URL
        return response()->json(['path' => $path], 201); // Return the file path
    }
}
