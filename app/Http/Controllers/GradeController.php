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

    public function updateGrade(Request $request, $gradeId)
    {
        $validated = $request->validate([
            'final_grade' => 'required|numeric|min:0|max:100',
            'remarks' => 'nullable|string',
        ]);

        $grade = Grade::find($gradeId);

        $grade->final_grade = $validated['final_grade'];
        $grade->remarks = $request->input('remarks') ?? "Great effort! Remember, every challenge is an opportunity to learn and grow. Keep striving to be your best self, and success will follow.";

        $grade->save();

        return response()->json($grade);
    }

    public function printAllStudentGrade($classId)
    {
        $grades = Grade::where('class_id', $classId)
            ->with('student')
            ->get();

        return response()->json($grades);
    }
}
