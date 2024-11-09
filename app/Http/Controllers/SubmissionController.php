<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

use App\Models\CodingProblemSubmission;
use App\Models\StudentProgress;
use App\Models\Submission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SubmissionFeedback;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'score' => 'nullable|integer',
            'status' => 'nullable|string',
            'coding_problem_codes' => 'required|array',
            'coding_problem_codes.*.problem_id' => 'required|exists:coding_problems,id',
            'coding_problem_codes.*.code' => 'nullable|string',
            'coding_problem_codes.*.score' => 'nullable|integer',
        ]);

        // Check if the submission already exists
        $existingSubmission = Submission::where('activity_id', $validated['activity_id'])
            ->where('student_id', Auth::id())
            ->first();

        if ($existingSubmission) {
            return response()->json([
                'message' => 'Submission already exists.',
                'submission' => $existingSubmission,
            ], 409); // Conflict response
        }

        // Store the submission
        $submission = Submission::create([
            'activity_id' => $validated['activity_id'],
            'student_id' => Auth::id(),
            'score' => $validated['score'] ?? 0,
            'status' => $validated['status'] ?? 'pending',
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


        // Fetch all submissions for the same activity
        $submissions = Submission::where('activity_id', $validated['activity_id'])
            ->orderBy('score', 'desc')
            ->orderBy('created_at', 'asc') // Sort by date if scores are tied
            ->get();
        // Determine the rank of the newly created submission
        $rank = $submissions->search(function ($sub) use ($submission) {
            return $sub->id === $submission->id;
        }) + 1; // Adding 1 to convert index to rank


        // Fetch the lesson id
        $lesson_id = Activity::find($validated['activity_id'])->lessonId;

        $activity = Activity::find($validated['activity_id']);
        $classCourseId = $activity->courseClass->id;
        if ($activity && $activity->default) {
            $studentProgress = StudentProgress::where('student_id', Auth::id())
                ->where('course_class_id', $classCourseId)
                ->first();
            if ($studentProgress) {
                $studentProgress->update([
                    'last_completed_quiz' => $lesson_id + 1,
                    'last_completed_lesson' => $lesson_id,
                ]);
            }
        }

        return response()->json([
            'submission' => $submission,
            'rank' => $rank,
            'progress' => $studentProgress,
        ], 201);
    }


    public function storeSubmission(Request $request)
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
            'status' => $validated['status'] ?? 'pending',
            'score' => $validated['score'] ?? 0,
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



    public function fetchSubmission($activityId, $userId)
    {
        // Attempt to retrieve the submission
        $submission = Submission::where('activity_id', $activityId)
            ->where('student_id', $userId) // Ensure correct field (assuming student_id)
            ->first();

        // Check if submission exists
        if ($submission) {
            // Fetch all submissions for the same activity to determine rank
            $submissions = Submission::where('activity_id', $activityId)
                ->orderBy('score', 'desc')
                ->orderBy('created_at', 'asc') // Sort by date if scores are tied
                ->get();

            // Determine the rank of the existing submission
            $rank = $submissions->search(function ($sub) use ($submission) {
                return $sub->id === $submission->id;
            }) + 1; // Adding 1 to convert index to rank

            // Get the total number of submissions
            $totalSubmissions = $submissions->count();

            return response()->json([
                'exists' => true,
                'data' => $submission,
                'rank' => $rank,
                'total_submissions' => $totalSubmissions,
            ], 200);
        } else {
            return response()->json(['exists' => false, 'data' => null], 200);
        }
    }

    public function all()
    {
        $submissions = Submission::all();

        return response()->json($submissions, 200);
    }

    public function fetchSubmissionRanking($activityId)
    {
        $submissions = DB::table('submissions')
            ->join('users', 'submissions.student_id', '=', 'users.id') // Join with the users table using student_id
            ->join('profiles', 'users.id', '=', 'profiles.user_id') // Join with the profiles table using user_id
            ->where('submissions.activity_id', $activityId)
            ->select('submissions.*', 'users.name', 'users.email', DB::raw("CONCAT('https://s3.amazonaws.com/codelabbucket/', profiles.profile_path) as profile_path")) // Include the user and profile columns you need
            ->orderBy('submissions.score', 'desc')
            ->orderBy('submissions.created_at', 'asc')
            ->get();

        $submissions->transform(function ($submission) {
            $submission->profile_path = asset($submission->profile_path);
            return $submission;
        });

        return response()->json($submissions, 200);
    }

    public function fetchAllActivitySubmission(Request $request, $id)
    {

        $perPage = $request->input('per_page', 10); // Default to 10 per page if not specified
        $submissions = Submission::where('activity_id', $id)
            ->join('users', 'submissions.student_id', '=', 'users.id') // Join with the users table using student_id
            ->join('profiles', 'users.id', '=', 'profiles.user_id') // Join with the profiles table using user_id
            ->with('activity.codingProblems')
            ->with('codingProblemSubmissions')
            ->with('feedback')
            ->select('submissions.*', 'users.name', 'users.email', DB::raw("CONCAT('/storage/', profiles.profile_path) as profile_path")) // Include the user and profile columns you need
            ->paginate($perPage);

        $submissions->transform(function ($submission) {
            $submission->profile_path = asset($submission->profile_path);
            return $submission;
        });

        return response()->json($submissions, 200);
    }

    public function deleteSubmission($id)
    {
        Submission::destroy($id);

        return response()->json(['message' => 'Submission deleted successfully.'], 200);
    }

    public function updateCodingSubmission(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'score' => 'nullable|integer',
            'status' => 'nullable|string',
            'coding_problem_submissions' => 'required|array',
            'coding_problem_submissions.*.problem_id' => 'required|exists:coding_problems,id',
            'coding_problem_submissions.*.score' => 'nullable|integer',
            'feedback' => 'nullable',
        ]);

        // Update the submission
        $submission = Submission::find($validated['submission_id']);
        $submission->update([
            'score' => $validated['score'] ?? $submission->score,
            'status' => $validated['status'] ?? $submission->status,
        ]);

        if ($validated['feedback']) {
            $feedback = $submission->feedback;
            if ($feedback) {
                $feedback->update([
                    'feedback' => $validated['feedback'],
                ]);
            } else {
                SubmissionFeedback::create([
                    'submission_id' => $submission->id,
                    'feedback' => $validated['feedback']->feedback,
                ]);
            }
        }

        // Update each coding problem submission
        foreach ($validated['coding_problem_submissions'] as $codingProblem) {
            $codingProblemSubmission = CodingProblemSubmission::where('submission_id', $submission->id)
                ->where('problem_id', $codingProblem['problem_id'])
                ->first();

            if ($codingProblemSubmission) {
                $codingProblemSubmission->update([
                    'score' => $codingProblem['score'] ?? $codingProblemSubmission->score,
                ]);
            }
        }

        return response()->json($submission, 200);
    }
}
