<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function fetchAllStudentGrade($classId)
    {
        $grades = Grade::where('class_id', $classId)
            ->with('student')
            ->paginate(10);

        return response()->json($grades);
    }
}
