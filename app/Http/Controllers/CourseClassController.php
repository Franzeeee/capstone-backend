<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClass;
use App\Models\ClassCode;
use App\Models\ClassCodes;
use App\Models\Grade;
use App\Models\User;
use App\Models\StudentProgress;
use Illuminate\Support\Str;
use Database\Seeders\PythonAssessmentSeeder;
use Database\Seeders\WebAssessmentSeeder;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission;
use App\Models\Activity;

class CourseClassController extends Controller
{
    public function index(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'teacher_id' => 'required|exists:users,id', // Ensure teacher_id is present and valid
        ]);

        // Fetch classes associated with the specified teacher_id
        $classes = CourseClass::where('teacher_id', $request->teacher_id)
            ->with('classCode')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        // Return the classes as a JSON response
        return response()->json($classes);
    }

    public function allClasses()
    {
        // Fetch classes associated with the specified teacher_id
        $classes = CourseClass::where('teacher_id', Auth::id())
            ->with(['classCode'])
            ->withCount('students') // Efficiently count students
            ->orderBy('created_at', 'desc')
            ->get();

        // Return the classes as a JSON response
        return response()->json($classes, 200);
    }


    public function createClass(Request $request)
    {

        try {
            $request->validate([
                'className' => 'required|string|max:255',
                'description' => 'nullable|string',
                'teacher_id' => 'required|exists:users,id', // Validates that the teacher_id exists in the users table
                'schedule' => 'required|string|max:255',
                'room' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'section' => 'required|string|max:255',
                'startDate' => 'nullable|date',
                'endDate' => 'nullable|date|after:start_date',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        // Generate a unique 8-character class code
        $classCode = $this->generateUniqueClassCode();


        $courseClass = CourseClass::create([
            'name' => $request->input('className'),
            'description' => $request->input('description'),
            'teacher_id' => $request->input('teacher_id'),
            'section' => $request->input('section'),
            'schedule' => $request->input('schedule'),
            'room' => $request->input('room'),
            'subject' => $request->input('subject'),
            'grade_distribution' => json_encode([
                'assessment' => 0.5,
                'final_assessment' => 0.5,
            ]),
            'start_date' => $request->input('startDate'),
            'end_date' => $request->input('endDate'),
        ]);

        ClassCodes::create([
            'class_id' => $courseClass->id,  // Associate the class code with the class
            'code' => $classCode,  // Store the generated class code
        ]);

        if ($request->subject === 'Python') {
            $seeder = new PythonAssessmentSeeder();
            $seeder->run($courseClass->id, $request->teacher_id);
        } else {
            $seeder = new WebAssessmentSeeder();
            $seeder->run($courseClass->id, $request->teacher_id);
        }

        return response()->json([
            'message' => 'Course Class created successfully!',
            'data' => $courseClass,
            'classCode' => $classCode,
        ], 200);
    }

    /**
     * Function to generate a unique 8-character class code
     */
    private function generateUniqueClassCode()
    {
        $tries = 0;
        $maxTries = 5;

        // Loop to attempt code generation (limited tries for efficiency)
        do {
            // Generate a batch of potential class codes
            $classCode = Str::random(8);

            // Check for existing code only if necessary
            $existingCode = ClassCodes::where('code', $classCode)->exists();
            $tries++;
        } while ($existingCode && $tries < $maxTries);

        return $classCode;
    }

    public function joinClass(Request $request)
    {
        // Validate that the class code and student ID are provided
        $request->validate([
            'class_code' => 'required|string|exists:class_codes,code', // Validate class code
            'student_id' => 'required|exists:users,id', // Ensure the student exists
        ]);

        // Find the class by the class code
        $classCode = ClassCodes::where('code', $request->class_code)->first();

        // If the class exists, fetch the related CourseClass
        if (!$classCode) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        $courseClass = $classCode->courseClass;

        // Get the student who wants to join
        $student = User::find($request->student_id);

        // Check if the student is already enrolled in this class
        if ($courseClass->students()->where('student_id', $student->id)->exists()) {
            return response()->json(['message' => 'Student already enrolled in this class'], 400);
        }

        // Create a new progress entry when the student enrolls
        StudentProgress::create([
            'student_id' => $request->student_id,
            'course_class_id' => $courseClass->id,
        ]);

        // Attach the student to the class (enroll the student)
        $courseClass->students()->attach($student->id);
        Grade::create([
            'student_id' => $student->id,
            'class_id' => $courseClass->id,
            'final_grade' => 0,
            'remarks' => 'Not yet graded',
        ]);

        return response()->json(['message' => 'Student successfully enrolled in class', "class" => $courseClass], 200);
    }

    public function fetchClassStudents($classId)
    {
        // $courseClass = CourseClass::with('students')->find($classId);
        $courseClass = CourseClass::with(['students', 'students.profile'])->find($classId);

        if (!$courseClass) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        return response()->json($courseClass->students, 200);
    }

    public function fetchClassInfo($code)
    {
        // Find the class by the class code
        $classCode = ClassCodes::where('code', $code)->first();

        // If the class code does not exist, return a 404 error
        if (!$classCode) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Fetch the related CourseClass with teacher info using the class_code
        $courseClass = CourseClass::with('teacher')->find($classCode->class_id);

        // If the CourseClass does not exist, return a 404 error
        if (!$courseClass) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Return the class information with a 200 status code
        return response()->json($courseClass, 200);
    }

    public function deleteClass($classId)
    {
        // Find the class by the class ID
        $courseClass = CourseClass::find($classId);

        // If the class does not exist, return a 404 error
        if (!$courseClass) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Delete the class
        $courseClass->delete();

        // Return a success message
        return response()->json(['message' => 'Class deleted successfully'], 200);
    }

    public function verifyCode(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'code' => 'required|string|exists:class_codes,code', // Ensure the code exists in the class_codes table
        ]);

        // Fetch the class code
        $classCode = ClassCodes::where('code', $request->code)->first();

        // If the class code does not exist, return a 404 error
        if (!$classCode) {
            return response()->json(['message' => 'Class code not found'], 404);
        }

        // Return the class code information
        return response()->json($classCode, 200);
    }

    public function removeStudent(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'class_id' => 'required|exists:course_classes,id', // Ensure the class_id exists in the course_classes table
            'student_id' => 'required|exists:users,id', // Ensure the student_id exists in the users table
        ]);

        // Find the class by the class ID
        $courseClass = CourseClass::find($request->class_id);

        // If the class does not exist, return a 404 error
        if (!$courseClass) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Find the student by the student ID
        $student = User::find($request->student_id);

        // If the student does not exist, return a 404 error
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Detach the student from the class
        $courseClass->students()->detach($student->id);

        // Return a success message
        return response()->json(['message' => 'Student removed from class'], 200);
    }

    public function updateGradeDistribution(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'class_id' => 'required|exists:course_classes,id', // Ensure the class_id exists in the course_classes table
            'assessment' => 'required|numeric', // Ensure the assessment value is numeric
            'final_assessment' => 'required|numeric', // Ensure the final_assessment value is numeric
        ]);

        // Find the class by the class ID
        $courseClass = CourseClass::find($request->class_id);

        if ($validated['assessment'] > 1 || $validated['final_assessment'] > 1 || $validated['assessment'] + $validated['final_assessment'] > 1 || $validated['assessment'] + $validated['final_assessment'] < 1) {
            return response()->json(['message' => 'Grade distribution must not exceed 1'], 400);
        }

        // If the class does not exist, return a 404 error
        if (!$courseClass) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Update the grade distribution
        $courseClass->update([
            'grade_distribution' => json_encode([
                'assessment' => $request->assessment,
                'final_assessment' => $request->final_assessment,
            ])
        ]);

        // Return a success message
        return response()->json(['message' => 'Grade distribution updated successfully'], 200);
    }


    // Fetch course class id based on code
    public function fetchClassId($code)
    {
        // Find the class by the class code
        $classCode = ClassCodes::where('code', $code)->first();

        // If the class code does not exist, return a 404 error
        if (!$classCode) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        // Return the class information with a 200 status code
        return response()->json($classCode->class_id, 200);
    }

    public function fetchUserClasses($userId)
    {
        // Fetch classes associated with the specified student_id
        $classes = CourseClass::whereHas('students', function ($query) use ($userId) {
            $query->where('student_id', $userId);
        })->with('classCode')->get();
        $classes = $classes->map(function ($class) use ($userId) {
            $grade = Grade::where('class_id', $class->id)
                ->where('student_id', $userId)
                ->first();

            return [
                'id' => $class->id,
                'name' => $class->name,
                'subject' => $class->subject,
                'class_code' => $class->classCode->code,
                'grade' => $grade ? $grade : null,
            ];
        });

        // Return the classes as a JSON response
        return response()->json($classes);
    }

    public function fetchTeacherClasses()
    {
        $classes = CourseClass::where('teacher_id', Auth::id())->get();

        if ($classes->isEmpty()) {
            return response()->json([], 200);
        }

        return response()->json($classes, 200);
    }

    public function fetchAvgStudentScores($classId)
    {
        $class = CourseClass::findOrFail($classId);
        // Fetch all students enrolled in the class
        $students = $class->students;

        if ($students->isEmpty()) {
            return response()->json(['classData' => $class, 'label' => $class->name, 'data' => []], 200);
        }

        $averageScores = $students->map(function ($student) {
            $submissions = Submission::where('student_id', $student->id)->get();

            if ($submissions->isEmpty()) {
                return [
                    'x' => $student->name,
                    'y' => 0,
                ];
            }

            $totalScore = $submissions->sum('score');
            $averageScore = $totalScore / $submissions->count();

            return [
                'x' => $student->name,
                'y' => round($averageScore),
            ];
        });

        return response()->json(['classData' => $class, 'label' => $class->name, 'data' => $averageScores], 200);
    }

    public function fetchClassAverages($teacherId)
    {

        // Fetch all the classes associated with the teacher
        $classes = CourseClass::where('teacher_id', $teacherId)->get();

        if ($classes->isEmpty()) {
            return response()->json(['message' => 'No classes found for this teacher'], 404);
        }

        // Process each class
        $classAverages = $classes->map(function ($class) {
            // Fetch all students enrolled in the class
            $students = $class->students;

            // Get the enrolled student count
            $enrolledStudentCount = $students->count();

            if ($enrolledStudentCount === 0) {
                return [
                    'enrolled_student_count' => 0,
                    'label' => $class->name,
                    'data' => []
                ];
            }

            // Get the average score for each student
            $averageScores = $students->map(function ($student) use ($class) {
                // Get all activities for this class
                $activities = $class->activities;

                $totalScore = 0;
                $activityCount = 0;

                // Loop through each activity and fetch the submission for the student
                foreach ($activities as $activity) {
                    $submission = Submission::where('student_id', $student->id)
                        ->where('activity_id', $activity->id)  // Link submission to activity
                        ->first();

                    if ($submission) {
                        $totalScore += $submission->score;
                        $activityCount++;
                    }
                }

                // Calculate the average score for this student
                if ($activityCount > 0) {
                    return round($totalScore / $activityCount); // Average of all submissions for this student
                }

                return 0;  // If no submissions, return 0
            });

            // Calculate the overall average score for the class
            $totalAverage = $averageScores->sum() / $averageScores->count();

            return [
                'enrolled_student_count' => $enrolledStudentCount,
                'class_section' => $class->section,
                'label' => $class->name,
                'data' => round($totalAverage)  // Overall average score for the class
            ];
        });

        return response()->json($classAverages, 200);
    }
}
