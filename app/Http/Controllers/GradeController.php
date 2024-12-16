<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\CourseClass;
use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

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
        $students = CourseClass::find($classId)->students;
        $activities = Activity::where('course_class_id', $classId)->get();

        $grades = [];

        foreach ($students as $student) {
            $studentGrades = Grade::where('student_id', $student->id)
                ->where('class_id', $classId)
                ->first();

            $activityScores = [];

            foreach ($activities as $activity) {
                $submission = DB::table('submissions')
                    ->where('activity_id', $activity->id)
                    ->where('student_id', $student->id)
                    ->first();

                $activityScores[] = [
                    'activity_id' => $activity->id,
                    'activity_title' => $activity->title,
                    'score' => $submission ? $submission->score : 0,
                ];
            }

            $grades[] = [
                'student' => $student,
                'final_grade' => $studentGrades ? $studentGrades->final_grade : null,
                'remarks' => $studentGrades ? $studentGrades->remarks : null,
                'activities' => $activityScores,
            ];
        }

        return response()->json($grades);
    }

    public function fetchAllGrades($classId)
    {
        $students = CourseClass::find($classId)->students;

        $activities = Activity::where('course_class_id', $classId);

        $studentsGradesheet = [];
        $studentGrades = [];

        foreach ($students as $student) {

            $studentId = $student->id;

            $activities = DB::table('activities as a')
                ->leftJoin('submissions as s', function ($join) use ($studentId) {
                    $join->on('a.id', '=', 's.activity_id')
                        ->where('s.student_id', '=', $studentId);
                })
                ->leftJoin('users as st', function ($join) use ($studentId) {
                    $join->on('st.id', '=', DB::raw($studentId));
                })
                ->where('a.course_class_id', $classId)
                ->where('a.point', '>', 0)
                ->select(
                    'a.id as activity_id',
                    'a.course_class_id',
                    'a.user_id as creator_id',
                    'a.default',
                    'a.lessonId',
                    'a.title as activity_title',
                    'a.description as activity_description',
                    'a.final_assessment',
                    'a.manual_checking',
                    'a.time_limit',
                    'a.point as activity_points',
                    'a.start_date',
                    'a.end_date',
                    'a.dueReminder',
                    DB::raw('COALESCE(s.score, 0) as submission_score'),
                    'st.id as student_id',
                    'st.name as student_name',
                    'st.email as student_email'
                )
                ->get();

            $data = [$student, $activities];

            $studentsGradesheet[] = $data;

            $studentGrades[] = Grade::where('student_id', $studentId)
                ->where('class_id', $classId)
                ->first();
        }

        return response()->json(['data' => $studentsGradesheet, 'activities' => $activities, 'finalGrades' => $studentGrades]);
    }
}
