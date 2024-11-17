<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'phone' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password'])
        ]);

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->profile_path = 'profile_pictures/default.png';
        $profile->save();

        $user->sendEmailVerificationNotification();

        return response()->json(["message" => "Registration"]);
    }

    public function verify(Request $request)
    {
        $user = User::findOrFail($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            return redirect()->to('http://codelab-api.online/verify-email');
        }

        $user->markEmailAsVerified();

        return redirect()->to('http://codelab-api.online/verify-email');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => "Invalid Credentials!"
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();
        $token = $user->createToken('token')->plainTextToken;

        $cookie = Cookie::make('jwt', $token, 60 * 24 * 326, '/', null, true, true, false, 'None');


        $user->verified = $user->hasVerifiedEmail();
        return response(['message' => $user])->withCookie($cookie);
    }

    public function user(Request $request)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }

        // Get the authenticated user and load the user profile
        $user = User::with('profile')->find(Auth::id());

        $profile_pictore = $user->profile ? asset('storage/' . $user->profile->profile_path) : null;

        // Prepare the response object combining user data and profile picture
        $response = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'verified' => $user->hasVerifiedEmail(),
        ];



        return response()->json($response);
    }


    public function logout(Request $request)
    {
        if (!$request->user()) {
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }

        $request->user()->currentAccessToken()->delete();
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Successfully logged out'
        ])->withCookie($cookie);
    }

    public function checkAuth(Request $request)
    {
        if ($request->user()) {
            return response()->json(true);
        }

        return response()->json(false);
    }
}
