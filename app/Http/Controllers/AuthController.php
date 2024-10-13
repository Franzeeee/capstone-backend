<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        Log::info("Phone: " . $request->phone);
        Log::info("Phone: " . $request->role);
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

        return response()->json(["message" => "Registration"]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => "Invalid Credintials!"
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();
        $token = $user->createToken('token')->plainTextToken;

        $cookie = Cookie::make('jwt', $token, 60 * 24);

        return response(['message' => $user])->withCookie($cookie);
    }

    public function user(Request $request)
    {
        if (!$request->user()) {
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }
        return Auth::user();
    }

    public function logout(Request $request)
    {
        if (!$request->user()) {
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }

        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Successfully logged out'
        ])->withCookie($cookie);
    }
}
