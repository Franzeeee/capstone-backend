<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'course_class_id' => 'required|exists:course_classes,id',
            'file' => 'nullable|file|mimes:jpeg,png,pdf,docx|max:2048', // Accept image and document types
        ]);

        $filePath = null;

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('announcements', 'public'); // Store in public directory
        }

        // Create announcement
        $announcement = Announcement::create([
            'content' => $request->input('content'),
            'file_path' => $filePath,
            'course_class_id' => $request->input('course_class_id'),
            'announcement_date' => now()->toDateString()
        ]);

        return response()->json([
            'message' => 'Announcement created successfully!',
            'data' => $announcement
        ], 201);
    }

    public function downloadFile($id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->file_path) {
            return Storage::download($announcement->file_path);
        }

        return response()->json(['message' => 'No file attached to this announcement'], 404);
    }

    public function fetchAnnouncements(Request $request)
    {
        $request->validate([
            'course_class_id' => 'required|exists:course_classes,id',
        ]);

        $user = $request->user();
        $courseClassId = $request->course_class_id;

        // Check if the user is enrolled in the class or is the teacher
        $isEnrolled = $user->enrollments()->where('course_class_id', $courseClassId)->exists();
        $isTeacher = $user->teachingClasses()->where('id', $courseClassId)->exists();

        if (!$isEnrolled && !$isTeacher) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $announcements = Announcement::where('course_class_id', $courseClassId)
            ->orderBy('announcement_date', 'desc')
            ->get();

        return response()->json($announcements);
    }

    public function fetchAllAnnouncements(Request $request)
    {
        $userId = $request->input('user_id'); // Accept user ID from the request

        // Retrieve the user object based on the provided user ID
        $user = User::findOrFail($userId);

        // Get all course class IDs where the user is enrolled or is the teacher
        $enrolledClassIds = $user->classes()->pluck('course_class_id')->toArray();
        $teachingClassIds = $user->courseClasses()->pluck('id')->toArray();

        // Merge and get unique class IDs
        $classIds = array_unique(array_merge($enrolledClassIds, $teachingClassIds));

        // Fetch announcements for these classes
        $announcements = Announcement::whereIn('course_class_id', $classIds)
            ->with('courseClass.teacher')
            ->orderBy('announcement_date', 'desc')
            ->get();
        $transformedAnnouncements = $announcements->map(function ($announcement) {
            return [
                'announcement_id' => $announcement->id,
                'announcement_date' => Carbon::parse($announcement->announcement_date)->format('F j, Y'),
                'content' => $announcement->content,
                'teacher' => [
                    'id' => $announcement->courseClass->teacher->id,
                    'name' => $announcement->courseClass->teacher->name,
                ],
                'course_class' => [
                    'id' => $announcement->course_class_id,
                    'name' => $announcement->courseClass->name,
                ],
            ];
        });

        return response()->json($transformedAnnouncements);
    }
}
