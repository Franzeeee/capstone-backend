<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $fileSize = $file->getSize();  // e.g., 1024

            SubmissionFile::create([
                'submission_id' => $submission->id,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'file_name' => $originalName,
                'file_size' => $fileSize,
            ]);
        }

        return response()->json(['message' => 'Submitted Sucessfully.'], 201);
    }

    public function checkSubmission($activityId)
    {
        $submission = DB::table('submissions')
            ->join('submission_files', 'submissions.id', '=', 'submission_files.submission_id')
            ->where('submissions.activity_id', $activityId)
            ->where('submissions.student_id', Auth::id())
            ->select('submissions.*', 'submission_files.file_path', 'submission_files.file_type', 'submission_files.file_name')
            ->first();

        if ($submission) {
            $submissionFiles = DB::table('submission_files')
                ->where('submission_id', $submission->id)
                ->get()
                ->map(function ($file) {
                    $file->file_path = asset('storage/' . $file->file_path);
                    return $file;
                });

            $submission->files = $submissionFiles;

            return response()->json(['submitted' => true, 'submission' => $submission], 200);
        } else {
            return response()->json(['submitted' => false], 200);
        }
    }

    public function unSubmitFile($fileId)
    {
        $file = SubmissionFile::find($fileId);

        if ($file) {
            // Delete the file from storage
            Storage::disk('public')->delete($file->file_path);

            // Delete the file record from the database
            $file->delete();

            return response()->json(['message' => 'File deleted successfully.'], 200);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }

    public function updateSubmissionFiles($submissionId, Request $request)
    {
        $validated = $request->validate([
            'files' => 'array|required',
            'files.*' => 'file|required',
        ]);

        $submission = Submission::find($submissionId);

        if (!$submission) {
            return response()->json(['message' => 'Submission not found.'], 404);
        }

        $files = $validated['files'];

        foreach ($files as $file) {
            // Access various properties of the file object
            $originalName = $file->getClientOriginalName();  // e.g., 'document1.docx'
            $filePath = $file->store('submission_files', 'public'); // Store the file in the 'public' disk and get the path
            $fileType = $file->getClientOriginalExtension();  // e.g., 'docx'
            $fileSize = $file->getSize();  // e.g., 1024

            SubmissionFile::create([
                'submission_id' => $submission->id,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'file_name' => $originalName,
                'file_size' => $fileSize,
            ]);
        }

        $submission->created_at = now();

        return response()->json(['message' => 'Submitted Sucessfully.'], 201);
    }
}
