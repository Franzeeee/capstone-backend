<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CompilerController extends Controller
{

    public function getToken()
    {
        $baseUrl = 'https://api.jdoodle.com/v1/auth-token';
        $clientId = env('JDOODLE_CLIENT_ID');
        $clientSecret = env('JDOODLE_CLIENT_SECRET');

        $data = [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret
        ];

        try {
            // Log outgoing request for debugging
            Log::info('Requesting token from JDoodle', $data);

            // Send POST request to JDoodle API to get the auth token
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post($baseUrl, $data);

            // Log the response for debugging
            Log::info('JDoodle API Response: ' . $response->body());

            // Check if the response is successful
            if ($response->successful()) {
                $responseBody = $response->json();

                if (isset($responseBody['token'])) {
                    return response()->json(['token' => $responseBody['token']]);
                } else {
                    return response()->json(['token' => $responseBody['token']]);
                }
            } else {
                return response()->json(['message' => 'Failed to retrieve the token: ' . $response->body()], $response->status());
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::error('Error fetching JDoodle token: ' . $e->getMessage());

            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
