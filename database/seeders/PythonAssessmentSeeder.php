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
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 2,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Personal Information with Comments',
                        'description' => 'Create variables for name and age, then print them. Add appropriate comments explaining each step.',
                        'sample_input' => '# Stores the name
name = "John"\n
# Stores the age\n
age = 25',
                        'expected_output' => 'Name: John, Age: 25',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 3,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'String Replace',
                        'description' => 'Create a string and replace a word in it with another word.',
                        'sample_input' => 'sentence = "I like Java programming"',
                        'expected_output' => '"I like Python programming"',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 4,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Advanced String Manipulation',
                        'description' => ' Use a combination of built-in string methods to manipulate text.',
                        'sample_input' => '"  Python is fun. Python is powerful.   "',
                        'expected_output' => 'Python is fun. Python is powerful.\n
Java is fun. Java is powerful.\n
JAVA IS FUN. JAVA IS POWERFUL.\n
JAVA*IS*FUN.*JAVA*IS*POWERFUL.',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 5,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Searching Within Strings',
                        'description' => ' Use string methods to search for substrings and analyze their positions.\n
Using this sentence "Python is great for programming." do the following:\n
1. Find the index of the substring "Python" in the given text.\n
2. Count the occurrences of the letter "a" in the text.\n
3. Check if the word "great" is present in the text.\n
 ',
                        'sample_input' => '"Learning Java is fun and exciting."',
                        'expected_output' => '9\n
2\n
True',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 6,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Analyzing String Properties',
                        'description' => 'Use string methods to check various characteristics of a given string. Use the text "Python is easy as 123"',
                        'sample_input' => '"hello123"',
                        'expected_output' => 'the string contains only alphabetic characters: False\n
the string contains only digits: False\n
the string starts with "he": True\n
the string ends with "23": True\n
the string is in lowercase: True',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 8,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Grade Classification',
                        'description' => 'Implement decision control structures to classify student grades.',
                        'sample_input' => 'grade = 78',
                        'expected_output' => 'Grade: C',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 9,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Weather and Outdoor Activity Decision',
                        'description' => 'Implement decision control structures and logical operators to issue weather advisories and decide on outdoor activities.',
                        'sample_input' => 'temperature = 10, is_raining = True',
                        'expected_output' => 'It is advisable to stay indoors.\n
Better to stay inside.',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 10,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Age-Based Decision Making',
                        'description' => 'Use relational operators to evaluate and compare ages for different categories.',
                        'sample_input' => '25',
                        'expected_output' => 'You are an adult.',
                    ]
                ],
            ], 	
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 11,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Score Evaluation',
                        'description' => 'Classify student scores based on defined ranges. Utilize relational operators to evaluate the score and provide feedback.',
                        'sample_input' => '88',
                        'expected_output' => 'Very Good',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 12,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Checking Eligibility for Fitness Membership',
                        'description' => 'Determine if an individual is eligible for a fitness membership based on age and commitment level.',
                        'sample_input' => 'age = 24, commitment_level = "high"',
                        'expected_output' => 'You are eligible for a fitness membership.',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 14,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Creating and Accessing List Elements',
                        'description' => 'Create a list of integers and access specific elements.',
                        'sample_input' => 'numbers = [10, 20, 30, 40, 50]',
                        'expected_output' => 'First number: 10\n
Last number: 50',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 15,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Slicing a Tuple to Access Subsets',
                        'description' => 'Slice a tuple to retrieve a subset of its elements.',
                        'sample_input' => 'colors = ("red", "green", "blue", "yellow")',
                        'expected_output' => 'First two colors: ("red", "green")',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 16,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Basic Set Operations',
                        'description' => 'Use various set operations to demonstrate creation, modification, and common set functionalities.',
                        'sample_input' => 'fruits = {"apple", "banana", "cherry"}',
                        'expected_output' => 'Updated set of fruits: {"apple", "cherry", "orange"}\n
Union of fruits and citrus: {"apple", "cherry", "orange", "lemon", "lime"}\n
Intersection of fruits and citrus: {"orange"}',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 17,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Managing Student Grades with a Dictionary',
                        'description' => 'Demonstrate how to create, update, and manage a dictionary of student grades, including adding, modifying, and removing entries.',
                        'sample_input' => 'grades = {"Alice": 90, "Bob": 75, "Charlie": 85}',
                        'expected_output' => 'Updated grades: {"Alice": 90, "Bob": 80, "David": 88}\n
Grade of Alice: 90\n
Grade of Bob: 80',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 18,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Creating and Using Functions',
                        'description' => 'Define functions to calculate the square of a number, check if a number is even, and combine these to describe a number. Call the functions with different inputs and print the results.',
                        'sample_input' => null,
                        'expected_output' => 'The square of 4 is 16 and it is even.',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 19,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Using Function Arguments Effectively',
                        'description' => ' In this assessment, you will define functions that accept various types of arguments, including positional, keyword, and default parameters. You will call these functions with different argument combinations and print the results.',
                        'sample_input' => null,
                        'expected_output' => 'Hello, Alice!
Hi, Bob!\n
Total price without tax: 105.0\n
Total price with tax: 110.0',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 20,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>' Implementing Return Statements in Functions',
                        'description' => 'In this assessment, you will define functions that perform calculations and use the return statement to send values back to the caller. You will demonstrate how to utilize the return values in further calculations or outputs.',
                        'sample_input' => null,
                        'expected_output' => 'Area of the rectangle: 50\n
Maximum value: 12',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 22,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Implementing Lambda Functions in Python',
                        'description' => 'Description: In this assessment, you will define and use lambda functions to perform simple operations. You will explore their applications in higher-order functions like map, filter, and sorted.',
                        'sample_input' => 'numbers = [1, 2, 3, 4, 5]',
                        'expected_output' => 'Squared numbers: [1, 4, 9, 16, 25]\n
Even numbers: [2, 4]\n
Sorted tuples: [(1, "one"), (3, "three"), (2, "two")]',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 24,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Using the Math Module',
                        'description' => 'Use functions from the math module to perform basic mathematical operations such as square root, rounding, and calculating powers.',
                        'sample_input' => null,
                        'expected_output' => 'Square root of 16: 4.0\n
2 raised to the power of 3: 8.0\n
Rounded value of 4.7: 5\n
Value of pi: 3.141592653589793',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 25,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Using the Random Module for Randomness',
                        'description' => 'Use functions from the random module to generate random numbers, select random elements from a list, and shuffle items. Demonstrate basic randomness functionalities.',
                        'sample_input' => null,
                        'expected_output' => 'Random integer (1-10): 7\n
Random float (0-1): 0.234\n
Random choice from list: banana\n
Shuffled cards: ["Queen", "Ace", "Jack", "King"]',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 26,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Reading and Writing Text Files',
                        'description' => 'Perform basic file handling operations by creating a text file, writing content to it, and then reading the content back. Ensure to demonstrate proper opening and closing of files.',
                        'sample_input' => null,
                        'expected_output' => 'Content of the file: Hello, World!',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 27,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'Implementing Exception Handling',
                        'description' => 'Demonstrate basic exception handling in Python by creating scenarios that may raise exceptions. You will use try-except blocks to manage these exceptions effectively.',
                        'sample_input' => null,
                        'expected_output' => 'Error: Cannot divide by zero.\n
Error: The file was not found.',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 28,
                'title' => 'Python Basics Assessment',
                'description' => 'Basic assessment to test Python fundamentals.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' =>'File Operations with Exception Management',
                        'description' => ' Perform basic file handling operations while demonstrating exception handling. You will create a file, write to it, and read from it, managing any potential errors that may arise during these operations.',
                        'sample_input' => null,
                        'expected_output' =>'Content of the file:\n
This is a test file.\n
It demonstrates file handling with exception management.',
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
