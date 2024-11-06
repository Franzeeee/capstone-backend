<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProgress;

class StudentProgressController extends Controller
{
    //

    public function index(Request $request, $classId)
    {
        // Validate the incoming request
        $request->validate([
            'student_id' => 'required|exists:users,id', // Ensure student_id is present and valid
        ]);

        // Fetch progress associated with the specified student_id
        $progress = StudentProgress::where('student_id', $request->student_id)
            ->where('course_class_id', $classId)
            ->with('courseClass')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        // Return the progress as a JSON response
        return response()->json($progress);
    }
}
