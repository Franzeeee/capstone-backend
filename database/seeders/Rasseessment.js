$activities = [
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 1,
                'title' => 'Comment',
                'description' => 'This assessment practice the usage of comments in each set of code.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Comments in R Programming',
'description' => 'Create an R script that stores the name and age of the person, then print these values, with comments explaining the purpose and logic of the code.',
'sample_input' => '# Assigning first name\nfirst_name <- "Jane"
# Assigning last name\nlast_name <- "Doe"
# Assigning age\nage <- 30
# Combining variables and printing the output\nmessage <- paste("Name:", first_name, last_name, "- Age:", age)
# Displaying the final message\nprint(message)',
'expected_output' => 'Name: Jane Doe - Age: 30'

                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 2,
                'title' => 'Variables',
                'description' => 'This assessment demonstrates how to create variables in R, store data, and displaying it.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Using Comments in R Programming',
'description' => 'Create a script in R that stores the name and age of a person and prints them. Add comments explaining the overall purpose and logic of the code.',
'sample_input' => '',
'expected_output' => 'Name: John , Age: 25'

                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 3,
                'title' => 'Data Types in R',
                'description' => 'This  assessment shows how to use different data types in R—numeric, character, and logical—by creating and printing variables for age, name, and a boolean value.ce.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Understanding Data Types in R',
'description' => 'Create a script in R that demonstrates the use of different data types such as numeric, character, and logical. Add comments to explain the type of each variable and how it is used.',
'sample_input' =>'',
'expected_output' => 'Numeric: 10.5
Name: Alice
Is Student: TRUE'

                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 4,
                'title' => 'Numbers in R',
                'description' => 'This  assessment demonstrates basic numeric operations in R—addition, subtraction, multiplication, and division—by performing calculations on two variables and printing the results.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Working with Numbers in R',
'description' => 'Create a script in R that demonstrates different numeric operations such as addition, subtraction, multiplication, and division. Add comments to explain each step and the type of operations being performed.',
'sample_input' => '',
'expected_output' => 'Sum: 20
Difference: 10
Product: 75
Division: 3'
,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 5,
                'title' => 'Strings in R',
                'description' => 'This  assessment demonstrates string operations in R, including concatenation, finding string length, and converting a string to uppercase, with explanations for each operation.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Working with Strings in R',
'description' => 'Create a script in R that demonstrates various string operations such as concatenation, string length, and converting to uppercase. Add comments to explain each operation and its purpose.',
'sample_input' => 'Hello Alice',
'expected_output' => 'Length of Greeting: 11
Uppercase Greeting: HELLO ALICE'
,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 6,
                'title' => 'Booleans in R',
                'description' => 'This  assessment demonstrates boolean (logical) operations in R, including AND, OR, and NOT, by evaluating conditions and explaining each operation's purpose.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Working with Booleans in R',
'description' => 'Create a script in R that demonstrates the use of boolean (logical) values and operations such as AND, OR, and NOT. Add comments to explain each operation and its purpose.',
'sample_input' => '',
'expected_output' => 'Is ready: FALSE
Can go out: TRUE
Should stay home: FALSE'


,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 7,
                'title' => 'if and else Statements in R',
                'description' => 'This  assessment uses if and else statements in R to check if a person is eligible to vote based on their age and provides feedback accordingly.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Using If and Else Statements in R',
'description' => 'Create a script in R that uses **if** and **else** statements to check conditions based on user input. The script will determine whether a person is eligible to vote, based on their age. Add comments to explain the logic and flow of the program.',
'sample_input' => '20',
'expected_output' => 'Enter your age: 20
You are eligible to vote.'

                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 8,
                'title' => 'Loops in R',
                'description' => 'This  assessment demonstrates the use of for and while loops in R to calculate the sum of all numbers from 1 to a user-provided number, with explanations for each loop's purpose.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Using Loops in R',
'description' => 'Create a script in R that demonstrates the use of **for** and **while** loops. The script should ask the user for a number and then use both types of loops to calculate the sum of all numbers from 1 to the given number. Add comments to explain the flow and purpose of the loops.',
'sample_input' => '5',
'expected_output' => 'Enter a number: 5
Sum using for loop: 15
Sum using while loop: 15'

                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 9,
                'title' => 'Functions in R',
                'description' => 'This  assessment defines a function in R to calculate the area of a rectangle based on user-provided width and height, and then prints the result.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Creating and Using Functions in R',
'description' => 'Create a script in R that demonstrates how to define and use functions. The script should define a function that calculates the area of a rectangle given the width and height. The user will provide the width and height as inputs. Add comments to explain the logic and flow of the function.',
'sample_input' => '5 and 10',
'expected_output' => 'Enter the width of the rectangle: 5
Enter the height of the rectangle: 10
The area of the rectangle is: 50'
,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 10,
                'title' => 'R Max and Min',
                'description' => 'This  assessment takes a list of numbers from the user and uses the max() and min() functions to find and display the maximum and minimum values from the list.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Using Max and Min Functions in R',
'description' => 'Create a script in R that demonstrates the use of the **max()** and **min()** functions. The script should take a list of numbers as input from the user and then use these functions to find the maximum and minimum values from the list. Add comments to explain the logic of the code.',
'sample_input' => '5,12,3,9,7',
'expected_output' => 'Enter a list of numbers separated by commas: 5,12,3,9,7
The maximum value is: 12
The minimum value is: 3'
,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 11,
                'title' => 'Mean, Median, and Mode in R',
                'description' => 'This assessment calculates the mean, median, and mode of a list of numbers provided by the user and prints the results.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                       'title' => 'Calculating Mean, Median, and Mode in R',
'description' => 'Create a script in R that demonstrates how to calculate the **mean**, **median**, and **mode** of a list of numbers provided by the user. The script should get a list of numbers from the user and calculate these statistics. Add comments to explain each operation.',
'sample_input' => '5,12,3,9,7,5',
'expected_output' => 'Enter a list of numbers separated by commas: 5,12,3,9,7,5
Mean: 6.833333
Median: 6
Mode: 5'
,
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 12,
                'title' => 'Percentile in R',
                'description' => 'This topic covers calculaton and displaying the percentile of a list of numbers based on a user-defined value.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'Calculating Percentiles in R',
'description' => 'Create a script in R that calculates the percentile of a list of numbers based on a user-defined percentile value. The script should prompt the user for a list of numbers and a specific percentile, and then compute and display the percentile value. Add comments to explain the steps of the calculation.',
'sample_input' => '5,12,3,9,7,5',
'expected_output' => 'Enter a list of numbers separated by commas: 5,12,3,9,7,5
Enter the percentile (e.g., 90 for the 90th percentile): 90
The 90th percentile is: 12'
,
                    ]
                ],
            ],
]