<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Support\Facades\Auth;

class SubmissionFileController extends Controller
{
    public function store(Request $request, $activityId)
    {
        $validated = $request->validate([
            'files' => 'array|required',
            'files.*' => 'file|required',
        ]);

        $activity = Activity::find($activityId);

        $submission = Submission::create([
            'activity_id' => $activity->id,
            'student_id' => Auth::id(),
            'score' => 0,
            'status' => 'pending',
        ]);

        $files = $validated['files'];

        foreach ($files as $file) {
            // Access various properties of the file object
            $originalName = $file->getClientOriginalName();  // e.g., 'document1.docx'
            $filePath = $file->store('submission_files', 'public'); // Store the file in the 'public' disk and get the path
            $fileType = $file->getClientOriginalExtension();  // e.g., 'docx'

            SubmissionFile::create([
                'submission_id' => $submission->id,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'file_name' => $originalName,
            ]);
        }

        return response()->json(['message' => 'Submitted Sucessfully.'], 201);
    }
}
