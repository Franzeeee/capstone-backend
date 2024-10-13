<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompilerController extends Controller
{
    public function getToken()
    {
        $baseUrl = 'https://api.jdoodle.com/v1';
        $clientId = '80d7f4c9e24d6d17354e31f6301d1203';
        $clientSecret = '74d8130f970462b618aba4bdb77a8b07c5c67c35601fd857960a1659129d4556';

        // Prepare the payload
        $data = [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret
        ];

        try {
            // Send POST request to JDoodle API to get the auth token
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post($baseUrl . '/auth-token', $data);

            // Check if the response is successful
            if ($response->successful()) {
                $responseBody = $response->json();

                if (isset($responseBody['token'])) {
                    return response()->json(['token' => $responseBody['token']]);
                } else {
                    return response()->json(['message' => 'Failed to retrieve the token.'], 500);
                }
            } else {
                return response()->json(['message' => 'Failed to retrieve the token: ' . $response->body()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
