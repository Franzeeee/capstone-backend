<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CodingProblemSubmission;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'user_id' => 'required|exists:users,id',
            'score' => 'nullable|integer',
            'status' => 'nullable|string',
            'coding_problem_codes' => 'required|array',
            'coding_problem_codes.*.problem_id' => 'required|exists:coding_problems,id',
            'coding_problem_codes.*.code' => 'required|string',
            'coding_problem_codes.*.score' => 'nullable|integer',
        ]);

        // Store the submission
        $submission = Submission::create([
            'activity_id' => $validated['activity_id'],
            'user_id' => $validated['user_id'],
        ]);

        // Store each coding problem submission
        foreach ($validated['coding_problem_codes'] as $codingProblem) {
            CodingProblemSubmission::create([
                'submission_id' => $submission->id,
                'problem_id' => $codingProblem['problem_id'],
                'code' => $codingProblem['code'],
                'score' => $codingProblem['score'] ?? 0,
            ]);
        }

        return response()->json($submission, 201);
    }
}
