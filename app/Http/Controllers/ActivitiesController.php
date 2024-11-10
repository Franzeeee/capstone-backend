<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\CodingProblem;
use App\Models\ActivityFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            'final_assessment' => 'nullable|boolean',
            'manual_checking' => 'nullable|boolean',
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
                'final_assessment' => $validated['final_assessment'] ?? false,
                'manual_checking' => $validated['manual_checking'] ?? false,
                'time_limit' => $validated['time_limit'] ? (int)$validated['time_limit'] : null,
                'point' => 100,
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
            ->where('default', false)
            ->get();

        // Check if activities are found
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No activities found for this class.'], 200);
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

    public function checkActivityAuth($id)
    {
        // Fetch the activity with the given ID
        $activity = Activity::with('codingProblems')->find($id);

        // Check if the activity is found and belongs to the authenticated user
        if (!$activity) {
            return response()->json(['result' => null], 404);
        }

        return response()->json($activity, 200);
    }

    public function fetchDefaultActivities($classId)
    {
        // Fetch default activities for the specific course class
        $activities = Activity::where('course_class_id', $classId)
            ->where('default', true)
            ->get();

        // Check if activities are found
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No default activities found for this class.'], 200);
        }

        return response()->json($activities, 200);
    }

    public function fetchGetPaginatedActivities($classId)
    {
        // Fetch activities for the specific course class
        $activities = Activity::where('course_class_id', $classId)
            ->with(['codingProblems', 'submissions']) // Include submissions relationship
            ->paginate(10);

        // Check if activities are found
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No activities found for this class.'], 200);
        }

        // Add total submissions count to each activity
        $activities->getCollection()->transform(function ($activity) {
            $activity->total_submissions = $activity->submissions->count();
            return $activity;
        });

        return response()->json($activities, 200);
    }

    public function deleteActivity($id)
    {
        // Fetch the activity with the given ID
        $activity = Activity::find($id);

        // Check if the activity is found
        if (!$activity) {
            return response()->json(['message' => 'Activity not found.'], 404);
        }

        // Delete the activity
        $activity->delete();

        return response()->json(['message' => 'Activity deleted successfully.'], 200);
    }

    public function updateActivity(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_class_id' => 'required|exists:course_classes,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'time_limit' => 'nullable|integer|min:1',
            'coding_problems' => 'required|array',
            'coding_problems.*.title' => 'required|string',
            'coding_problems.*.description' => 'required|string',
            'coding_problems.*.sample_input' => 'nullable|string',
            'coding_problems.*.expected_output' => 'required|string',
        ]);

        // Start a database transaction
        DB::transaction(function () use ($validated, $id) {
            // Find the activity by its ID
            $activity = Activity::findOrFail($id);

            // Update the activity
            $activity->update([
                'course_class_id' => $validated['course_class_id'],
                'user_id' => $validated['user_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'final_assessment' => false,
                'manual_checking' => false,
                'time_limit' => $validated['time_limit'] ?? 100, // Use null coalescing operator
                'point' => array_sum(array_column($validated['coding_problems'], 'points')),
                'start_date' => now(),
                'end_date' => null,
            ]);

            // Delete existing coding problems
            CodingProblem::where('activity_id', $activity->id)->delete();

            // Prepare an array for batch insertion with timestamps
            $codingProblemsData = array_map(function ($problemData) use ($activity) {
                return [
                    'activity_id' => $activity->id,
                    'title' => $problemData['title'],
                    'description' => $problemData['description'],
                    'sample_input' => $problemData['sample_input'] ?? null, // Handle nullable fields
                    'expected_output' => $problemData['expected_output'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $validated['coding_problems']);

            // Insert all coding problems in one query
            CodingProblem::insert($codingProblemsData);
        });

        return response()->json(['message' => 'Activity updated successfully!'], 200);
    }



    // Creating Store Activity for Logic Type
    public function createLogicActivity(Request $request)
    {

        $validated = $request->validate([
            'course_class_id' => 'required|exists:course_classes,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:doc,docx,xlsx,ppt,pptx,jpeg,jpg,png,txt',
        ]);

        // Create the activity
        $activity = Activity::create([
            'course_class_id' => $validated['course_class_id'],
            'user_id' => 1,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'final_assessment' => false,
            'manual_checking' => true,
            'time_limit' => null,
            'point' => 100,
            'start_date' => now(),
            'end_date' => $validated['due_date'],
        ]);

        if ($request->has('files')) {
            foreach ($request->input('files') as $file) {
                // Access various properties of the file object
                $originalName = $file->getClientOriginalName();  // e.g., 'document1.docx'
                $filePath = $file->store('activity_files', 's3'); // Store the file in the 's3' disk and get the path
                $fileType = $file->getClientOriginalExtension();  // e.g., 'docx'
                $s3Link = Storage::disk('s3')->url($filePath);   // Get the S3 link of the file

                // Now you can create an entry in the ActivityFile model
                ActivityFile::create([
                    'activity_id' => $activity->id, // Assume this is set in your logic
                    'file_path' => $s3Link,         // Store the S3 link
                    'file_type' => $fileType,
                    'file_name' => $originalName,
                ]);
            }
        }

        return response()->json(['message' => 'Activity created successfully!'], 201);
    }
}


    // Creating Store Activity for Logic Type
    // public function createLogicActivity(Request $request)
    // {

    //     Log::info($request->all());

    //     $validated = $request->validate([
    //         'course_class_id' => 'required|exists:course_classes,id',
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'due_date' => 'nullable|date',
    //         'files' => 'required|array',
    //         'files.*' => 'file|mimes:doc,docx,xlsx,ppt,pptx,jpeg,jpg,png,txt',
    //     ]);


    //     // Create the activity
    //     $activity = Activity::create([
    //         'course_class_id' => $validated['course_class_id'],
    //         'user_id' => 1,
    //         'title' => $validated['title'],
    //         'description' => $validated['description'],
    //         'final_assessment' => false,
    //         'manual_checking' => true,
    //         'time_limit' => null,
    //         'point' => 100,
    //         'start_date' => now(),
    //         'end_date' => $validated['due_date'],
    //     ]);

    //     $files = $validated['files'];

    //     foreach ($files as $file) {
    //         // Access various properties of the file object
    //         $originalName = $file->getClientOriginalName();  // e.g., 'document1.docx'
    //         $filePath = $file->store('activity_files', 'public'); // Store the file in the 'public' disk and get the path
    //         $fileType = $file->getClientOriginalExtension();  // e.g., 'docx'

    //         // Now you can create an entry in the ActivityFile model
    //         ActivityFile::create([
    //             'activity_id' => $activity->id, // Assume this is set in your logic
    //             'file_path' => $filePath,
    //             'file_type' => $fileType,
    //             'file_name' => $originalName,
    //         ]);
    //     }



    //     return response()->json(['message' => 'Activity created successfully!'], 201);
    // }