<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AiController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'userMessage' => 'required',
        ]);

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $validated['userMessage']],
                ],
            ]);
            return response()->json([
                'message' => $result->choices[0]->message->content
            ], 200);
        } catch (\Exception $e) {
            // Handle the error here
            return response('An error occurred.', 500);
        }
    }

    public function getToken()
    {
        return "CODELAB Backend for API Fetching...";
    }

    public function generateAssessment()
    {
        $message = "
            Generate a programming assessment for python, the topic should be variables, loops, and functions.

            Format:
            Problem
            Sample Input/Expected Output
        ";
        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ]);
            return response()->json([
                'message' => $result->choices[0]->message->content
            ], 200);
        } catch (\Exception $e) {
            // Handle the error here
            return response('An error occurred.', 500);
        }
    }

    // Check the student's submission via OPENAI
    public function activityAutoCheck(Request $request)
    {
        $validated = $request->validate([
            'codingProblem' => 'required',
        ]);

        $codingProblem = $validated['codingProblem'];
        $code = $request->code;

        $message = "
            Check the student's submission for the following problem:
            Problem: $codingProblem
            Code: $code

            Total Score: points here
            Feedback: your feedback here

            The points should be between 0 and 10. dont be too harsh on the student.
        ";
        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ]);
            return response()->json([
                'message' => $result->choices[0]->message->content
            ], 200);
        } catch (\Exception $e) {
            // Handle the error here
            return response('An error occurred.', 500);
        }
    }
}
