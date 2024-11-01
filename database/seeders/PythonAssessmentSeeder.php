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
                'defualt' => true,
                'lessonId' => 0,
                'title' => 'Variables Lesson Assesment',
                'description' => 'Basic assessment for variables lesson.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Commenting',
                        'description' => 'Write a line that says print("Hello, World!"). \n Add a comment above the line that says "This line prints Hello, World!".',
                        'sample_input' => null,
                        'expected_output' => 'Hello, World!',
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
