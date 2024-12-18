<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;

class AiController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'userMessage' => 'required',
        ]);

        $message = $validated['userMessage'] . ", If this message is not about programming, please ignore it. If it is about programming, then continue. If not, tell them that you onlyy know programming related topics.";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4-turbo',
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
                'model' => 'gpt-4',
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

        Log::alert($request->input("codingProblem"));

        $validated = $request->validate([
            'codingProblem' => 'required',
        ]);

        $codingProblem = $validated['codingProblem'];
        $code = $request->code;

        $message = "
        Check the student's submission for the following problem:
        Problem: $codingProblem
        --------------------------------
        Code: $code
    
        Total Score: [total score here]
        Feedback:
        - [feedback point 1]
        - [feedback point 2]
        - [feedback point 3]
        ...
    
        Rubric:
        - Correctness (60%): Passes standard and edge test cases provided by the platform.
        - Efficiency (25%): Uses optimal algorithms and data structures for better time and space complexity.
        - Code Quality (10%): Follows clean coding practices, proper naming conventions, and avoids redundancy.
        - Edge Cases (5%): Handles boundary conditions and unexpected inputs effectively.
    
        The points should be between 0 and 100. Don't be too harsh on the student. Zero if no code. Ignore the \\n because it is just the code editor formatting. Also,
        note that they can't resubmit. If no code is submitted then the score should be 0 and feedback is 'You did not submit any code. Please practice more on the lessons.' 0 if no code is submitted.
        Give them feedback on what they did wrong and how they can improve. The --- is for separating codingProblem and the code of the student. Also, always follow the format. 
        Don't put any other response other than the one above. The feedback should be the feedback about their code and what do they need to improve or learn more.
    ";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4-turbo',
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

    public function generateCodingProblem(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'subject' => 'required',
        ]);

        $message = "
            Generate a programming problem for {$validated['subject']}, topic is based on this assessment title {$validated['title']} and the description of this title is {$validated['description']}.

            Stricly Follow Ths Response Format:
            ProblemName: Problem Name Here
            ProblemDescription: Problem Description Here
            SampleInput: Sample Input Here
            SampleOutput: Sample Output Here

            If the problem they want to generate is about web, in the sample output always include the html boilerplate. and use internal css if it need styling and they dont specify if it needs to be inline css.

            Sample Output: <! DOCTYPE html>
            <html>
            <head>
            <style>
            /* Internal CSS Here */
            </style>
            </head>
            <body>
            <h1>Sample Output</h1>
            </body>
            </html>

            PS. If the title and description is just jarble or not ano valid topic, just return no valid topic. Populate the formata with Invalid if the title and description is invalid or not clear, dont make up.
        ";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ]);
            return response()->json([
                'result' => $result->choices[0]->message->content
            ], 200);
        } catch (\Exception $e) {
            // Handle the error here
            return response('An error occurred.', 500);
        }
    }
}
