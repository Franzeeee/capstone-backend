<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CodingProblem;

use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_class_id' => 'required|exists:course_classes,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'time_limit' => 'nullable|integer|min:1',
            'points' => 'required|integer|min:1|max:100',
            'coding_problems' => 'required|array',
            'coding_problems.*.title' => 'required|string',
            'coding_problems.*.description' => 'required|string',
            'coding_problems.*.sample_input' => 'nullable|string',

            'coding_problems.*.expected_output' => 'required|string',
        ]);

        // Start a database transaction
        DB::transaction(function () use ($validated) {
            // Create the activity
            $activity = Activity::create([
                'course_class_id' => $validated['course_class_id'],
                'user_id' => $validated['user_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'final_assessment' => false,
                'manual_checking' => false,
                'time_limit' => $validated['time_limit'] || null,
                'point' => array_sum(array_column($validated['coding_problems'], 'points')),
                'start_date' => now(),
                'end_date' => $validated['due_date'],
            ]);

            // Prepare an array for batch insertion with timestamps
            $codingProblemsData = array_map(function ($problemData) use ($activity) {
                return [
                    'activity_id' => $activity->id,
                    'title' => $problemData['title'],
                    'description' => $problemData['description'],
                    'sample_input' => $problemData['sample_input'],
                    'expected_output' => $problemData['expected_output'],
                    'created_at' => now(), // Include created_at timestamp
                    'updated_at' => now(), // Include updated_at timestamp
                ];
            }, $validated['coding_problems']);

            // Insert all coding problems in one query
            CodingProblem::insert($codingProblemsData);
        });

        return response()->json(['message' => 'Activity created successfully!'], 201);
    }

    public function getClassActivities($classId)
    {
        // Fetch activities for the specific course class
        $activities = Activity::where('course_class_id', $classId)
            ->get();

        // Check if activities are found
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No activities found for this class.'], 404);
        }

        return response()->json($activities, 200);
    }

    public function getAllActivity()
    {
        // Fetch all activities
        $activities = Activity::with('codingProblems')
            ->get();

        // Check if activities are found
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No activities found.'], 404);
        }

        return response()->json($activities, 200);
    }

    public function getCodingActivity($activityId)
    {
        // Fetch the activity with the given ID
        $activity = Activity::with('codingProblems')
            ->find($activityId);

        // Check if the activity is found
        if (!$activity) {
            return response()->json(['message' => 'Activity not found.'], 404);
        }

        return response()->json($activity, 200);
    }

    public function fetchActivityWithoutProblems($activityId)
    {
        // Find the activity by its ID or throw a 404 if not found
        $activity = Activity::findOrFail($activityId, [
            'id',
            'course_class_id',
            'user_id',
            'title',
            'description',
            'final_assessment',
            'manual_checking',
            'time_limit',
            'point',
            'start_date',
            'end_date',
            'created_at',
            'updated_at'
        ]);

        // Return the activity data as JSON
        return response()->json([
            'activity' => $activity
        ]);
    }
}
