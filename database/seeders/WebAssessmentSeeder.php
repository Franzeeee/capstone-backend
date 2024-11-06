<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\CodingProblem;

class WebAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($courseClassId, $userId): void
    {

        $activities = [
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 0,
                'title' => 'HTML Paragraphs',
                'description' => 'This activity will test your knowledge of HTML Paragraphs.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Paragraph Assessment',
                        'description' => 'Use an HTML paragraph to display the following text: "HTML (HyperText Markup Language) is the standard language for creating web pages and web applications."',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                                            <html lang="en">
                                            <head>
                                                <meta charset="UTF-8">
                                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                <title>HTML Paragraph Example</title>
                                            </head>
                                            <body>
                                                <p>HTML (HyperText Markup Language) is the standard language for creating web pages and web applications.</p>
                                            </body>
                                            </html>
                                            ',
                    ]
                ]
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
