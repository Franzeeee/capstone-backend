<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\CodingProblem;

class PythonAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param int $courseClassId
     * @param int $userId
     */
    public function run($courseClassId, $userId): void
    {
        // Define default activities and coding problems for Python subject
        $activities = [
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 0,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Name and Age Together',
                        'description' => 'Create variables for name and age, then print them in one sentence.',
                        'sample_input' => 'name = "John", age = 20',
                        'expected_output' => '"My name is John and I am 20 years old"',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 1,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Calculator Program',
                        'description' => 'Create a simple calculator that takes two numbers and prints their sum, difference, product, and quotient.',
                        'sample_input' => 'num1 = 10, num2 = 2',
                        'expected_output' => 'Sum: 12\n
Difference: 8\n
Product: 20\n
Quotient: 5.0',
                    ]
                ],
            ],

        ];

        // Loop through each activity
        foreach ($activities as $activityData) {
            // Create the activity
            $activity = Activity::create([
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'title' => $activityData['title'],
                'description' => $activityData['description'],
                'default' => true,
                'lessonId' => $activityData['lessonId'],
                'final_assessment' => false,
                'manual_checking' => false,
                'start_date' => now(),
                'end_date' => null,
                'point' => $activityData['points'],
                'time_limit' => $activityData['time_limit'],
            ]);

            // Prepare coding problems for the activity
            $codingProblems = array_map(function ($problem) use ($activity) {
                return [
                    'activity_id' => $activity->id,
                    'title' => $problem['title'],
                    'description' => $problem['description'],
                    'sample_input' => $problem['sample_input'],
                    'expected_output' => $problem['expected_output'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $activityData['coding_problems']);

            // Insert all coding problems for this activity
            CodingProblem::insert($codingProblems);
        }
    }
}
