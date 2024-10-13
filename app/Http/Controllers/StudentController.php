<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    //
    public function fetchStudentClasses($studentId)
    {
        $student = User::with(['classes' => function ($query) {
            $query->with('classCode');
        }])->find($studentId);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student->classes, 200);
    }
}
