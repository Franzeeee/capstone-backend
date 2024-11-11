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
                'lessonId' => 4,
                'title' => 'HTML Paragraphs',
                'description' => 'This topic covers the HTML role as the basic language for building web pages and applications, focusing on its importance in structuring content on the web.',
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
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 5,
                'title' => 'HTML Paragraph with Inline Styles',
                'description' => 'This topic explains how CSS is used to style and format HTML documents, controlling aspects like font size, color, and text formatting.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Paragraph with Inline Styles Assessment',
                        'description' => 'Use an HTML paragraph to display the following text:
                        "CSS (Cascading Style Sheets) is used to style HTML documents."
                        Apply the following inline styles:

                        Set the font size to 18px.
                        Set the text color to dark blue.
                        Make the text bold.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Styled Paragraph Example</title>
                        </head>
                        <body>
                            <p style="font-size: 18px; color: darkblue; font-weight: bold;">CSS (Cascading Style Sheets) is used to style HTML documents.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 6,
                'title' => 'HTML Paragraph with Formatting Tags',
                'description' => 'This assessment will enhance your understanding and practical application of HTML formatting techniques to structure and emphasize text content effectively.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Paragraph with Formatting Tags Assessment',
                        'description' => 'Use HTML to display the following text:
                        "HTML formatting tags help in structuring and emphasizing text content."
                        Apply the following formatting:

                        Make the word "HTML" bold.
                        Make the word "tags" italicized.
                        Underline the word "emphasizing."',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Formatting Example</title>
                        </head>
                        <body>
                            <p><strong>HTML</strong> formatting <em>tags</em> help in structuring and <u>emphasizing</u> text content.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 7,
                'title' => 'HTML Quotation Tags',
                'description' => 'This topic covers how to use the HTML <blockquote> and <cite> tags for quoting text and citing sources.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [  
                    [
                        'title' => 'HTML Quotation Tags Assessment',
                        'description' => 'Use HTML to display the following text:
                        "Web development is the process of building websites and web applications."
                        Apply the following quotation formatting:

                        Use the <blockquote> tag to indicate the quoted text.
                        Add a <cite> element after the quote to reference the source as "Web Development Handbook."',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Quotation Example</title>
                        </head>
                        <body>
                            <blockquote>
                                Web development is the process of building websites and web applications.
                                <cite>Web Development Handbook</cite>
                            </blockquote>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 8,
                'title' => 'HTML Comments',
                'description' => 'This topic explains how to use HTML comments to document the code and provide explanations without displaying them on the web page.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Comments Assessment',
                        'description' => 'Use HTML to display the following text:
                        "HTML comments are useful for adding notes in the code that are not displayed on the web page."
                        Add the following comments in the HTML code:

                        Add a comment before the opening <html> tag, explaining the purpose of the document.
                        Add a comment before the <body> tag, explaining that the main content of the page will go there.
                        Add a comment next to the <p> tag explaining the paragraph content.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                            <!-- This document demonstrates the use of HTML comments. -->
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Comments Example</title>
                        </head>
                        <body>
                            <!-- Main content of the page starts here -->
                            <p>HTML comments are useful for adding notes in the code that are not displayed on the web page. <!-- This is the paragraph explaining HTML comments --></p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 9,
                'title' => 'HTML and Internal CSS Styling',
                'description' => 'This topic explains how to use internal CSS within the <style> tag to style HTML elements, including setting background color, text color, alignment, and padding.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML and Internal CSS Styling Assessment',
                        'description' => '
                        Use HTML to display the following text:
                        "CSS (Cascading Style Sheets) allows you to style HTML elements."
                        Apply the following CSS styles to the paragraph:

                        Set the background color to lightgray.
                        Set the text color to dark green.
                        Set the text alignment to center.
                        Set the padding to 20px.
                        Use internal CSS within the <style> tag to apply the styles.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML and Internal CSS Styling Example</title>
                            <style>
                                p {
                                    background-color: lightgray;
                                    color: darkgreen;
                                    text-align: center;
                                    padding: 20px;
                                }
                            </style>
                        </head>
                        <body>
                            <p>CSS (Cascading Style Sheets) allows you to style HTML elements.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 10,
                'title' => 'HTML Heading Leveling with Personal Information',
                'description' => 'This topic demonstrates how to use different HTML heading tags (<h1>, <h2>, <h3>) to structure and display information in hierarchical order."',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Heading Leveling with Personal Information Assessment',
                        'description' => 'Use HTML to display the following information in the correct heading levels:
                        The first line should display their full name: "John Doe" (use <h1>).
                        The second line should display their age: "25" (use <h2>).
                        The third line should display their municipality: "Quezon City" (use <h3>).',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Personal Information Example</title>
                        </head>
                        <body>
                            <h1>John Doe</h1>
                            <h2>25</h2>
                            <h3>Quezon City</h3>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 11,
                'title' => 'HTML Image Tag',
                'description' => 'This topic shows how to use the HTML <img> tag to embed an image, set its source (src), add alternative text (alt), and adjust its dimensions using the width attribute.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Image Tag Assessment',
                        'description' => 'Use HTML to display the following image:
                        "Image of a dog in a garden."
                        Apply the following HTML properties to the image:

                        Use the <img> tag to embed the image.
                        Set the src attribute to the provided image URL:
                        https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=0.752xw:1.00xh;0.175xw,0&resize=1200:*
                        Add an alt attribute with the text "A dog playing in a garden."
                        Set a width of 500px for the image.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Image Example</title>
                        </head>
                        <body>
                            <img src="https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=0.752xw:1.00xh;0.175xw,0&resize=1200:*" 
                                alt="A dog playing in a garden" 
                                width="500px">
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 12,
                'title' => 'HTML Page Title',
                'description' => 'This topic demonstrates how to use the <title> tag within the <head> section to set the title of a web page, which appears in the browser tab.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Page Title Assessment',
                        'description' => 'Use HTML to set the title of the web page.
                        The title should be "Welcome to My Website".
                        Apply the following HTML structure:

                        Use the <title> tag inside the <head> section to set the page title.
                        Ensure the title appears in the browser tab.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Welcome to My Website</title>
                        </head>
                        <body>
                            <h1>Welcome to My Website</h1>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 13,
                'title' => 'HTML Tables',
                'description' => 'This topic demonstrates how to create a simple HTML table using <table>, <tr>, <th>, and <td> tags to display data in rows and columns.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Tables Assessment',
                        'description' => 'Use HTML to display a simple table with 3 rows and 2 columns.
                        The table should contain the following data:

                        Row 1: "Name" and "eg.John Doe"
                        Row 2: "Age" and "eg.30"
                        Row 3: "City" and "eg.New York"
                        Apply the following HTML structure:
                        Use the <table> tag to create the table.
                        Use <tr> for each row, <th> for the table headers, and <td> for the table data.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Table Example</title>
                        </head>
                        <body>
                            <table border="1">
                                <tr>
                                    <th>Name</th>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>New York</td>
                                </tr>
                            </table>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 14,
                'title' => 'HTML Lists',
                'description' => 'This topic shows how to create both unordered and ordered lists in HTML, using <ul> for listing items like fruits and <ol> for providing reasons associated with each item.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Lists Assessment',
                        'description' => 'Use HTML to display a list of your favorite fruits.
                        Create the list using two types of lists:

                        An unordered list (<ul>) for the fruit names.
                        An ordered list (<ol>) for the reasons you like each fruit.
                        The fruits should be "Apple", "Banana", and "Cherry".
                        For each fruit, provide a reason in the ordered list, for example: "Apple" - "Healthy and crunchy".',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML List Example</title>
                        </head>
                        <body>
                            <h2>My Favorite Fruits</h2>
                            <ul>
                                <li>Apple</li>
                                <li>Banana</li>
                                <li>Cherry</li>
                            </ul>
                            <h3>Reasons Why I Like Them</h3>
                            <ol>
                                <li>Apple - Healthy and crunchy</li>
                                <li>Banana - Rich in potassium</li>
                                <li>Cherry - Sweet and delicious</li>
                            </ol>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 15,
                'title' => 'HTML Block and Inline Elements',
                'description' => 'This topic demonstrates the use of block-level and inline elements in HTML and shows how to style them with CSS.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML Block and Inline Elements Assessment',
                        'description' => 'Use HTML to demonstrate the difference between block-level and inline elements.
                        Use a block-level element for the main container: <div>.
                        Use inline elements for the text: <span>, <strong>, and <em>.
                        Inside the <div>, include the following content:
                        A <span> with text "This is an inline element".
                        A <strong> element with text "This text is strong".
                        An <em> element with text "This text is emphasized".
                        Apply the following CSS styles to illustrate the behavior of these elements:
                        Set the background color of the <div> to lightblue.
                        Set the text color inside the <span> to red.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Block and Inline Example</title>
                            <style>
                                div {
                                    background-color: lightblue;
                                    padding: 20px;
                                }
                                span {
                                    color: red;
                                }
                            </style>
                        </head>
                        <body>
                            <div>
                                <span>This is an inline element</span>
                                <strong>This text is strong</strong>
                                <em>This text is emphasized</em>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 16,
                'title' => 'HTML <div> Element',
                'description' => 'This topic demonstrates how to use the <div> tag as a container for other elements, like headings and paragraphs, and how to apply CSS for styling.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML <div> Element Assessment',
                        'description' => 'Use HTML to demonstrate the usage of the <div> tag.

                        Use the <div> tag as a container for other elements.
                        Inside the <div>, include a heading <h2> with the text "Welcome to My Page".
                        Below the heading, add a paragraph <p> with the text "This is a simple example of using the <div> element in HTML.".
                        Apply some CSS to style the <div> container, setting a background color and padding.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML div Example</title>
                            <style>
                                div {
                                    background-color: lightblue;
                                    padding: 20px;
                                    border-radius: 5px;
                                }
                            </style>
                        </head>
                        <body>
                            <div>
                                <h2>Welcome to My Page</h2>
                                <p>This is a simple example of using the `<div>` element in HTML.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 17,
                'title' => 'HTML Classes',
                'description' => 'This topic shows how to use HTML classes for styling elements, applying different styles to a <div>, heading, and paragraphs based on their class names using CSS.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => ' HTML Classes Assessment',
                        'description' => 'Use HTML to demonstrate the use of classes for styling elements.
                        Create a <div> element and assign it a class called container.
                        Inside the <div>, include a heading <h1> with the text "Welcome to My Website".
                        Below the heading, add two paragraphs <p>. The first paragraph should have the class highlight, and the second should have the class normal.
                        Use CSS to style the .container class with a background color.
                        Style the .highlight class with a different text color (e.g., red).
                        Style the .normal class with a default text color.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML Classes Example</title>
                            <style>
                                .container {
                                    background-color: lightgray;
                                    padding: 20px;
                                    border-radius: 5px;
                                }
                                .highlight {
                                    color: red;
                                }
                                .normal {
                                    color: black;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <h1>Welcome to My Website</h1>
                                <p class="highlight">This paragraph has a highlighted text color.</p>
                                <p class="normal">This paragraph has a normal text color.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 18,
                'title' => 'HTML ID Attribute',
                'description' => 'This topic demonstrates how to use the id attribute in HTML to uniquely identify elements and apply specific styles using CSS.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML ID Attribute Assessment',
                        'description' => 'Use HTML to demonstrate the use of the id attribute.
                        Create a <div> element and assign it an id called main-container.
                        Inside the <div>, include a heading <h2> with the text "Welcome to My Page".
                        Below the heading, add a paragraph <p> with the text "This paragraph has a unique ID." and assign it the id attribute unique-paragraph.
                        Apply CSS to style the #main-container by setting a background color.
                        Style the #unique-paragraph by setting the text color to blue.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML ID Example</title>
                            <style>
                                #main-container {
                                    background-color: lightyellow;
                                    padding: 20px;
                                    border-radius: 5px;
                                }
                                #unique-paragraph {
                                    color: blue;
                                }
                            </style>
                        </head>
                        <body>
                            <div id="main-container">
                                <h2>Welcome to My Page</h2>
                                <p id="unique-paragraph">This paragraph has a unique ID.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],

            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 19,
                'title' => 'HTML <iframe> Element',
                'description' => 'This topic demonstrates how to embed an external webpage using the <iframe> tag in HTML with attributes for size and description.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML <iframe> Element Assessment',
                        'description' => 'Use HTML to embed an external webpage inside your page using the <iframe> tag.

                        Set the src attribute to a URL, for example: https://www.youtube.com.
                        Set the width and height attributes to define the iframe size.
                        Add a title attribute to describe the embedded content.
                        Make sure the iframe is displayed within your webpage.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML iframe Example</title>
                        </head>
                        <body>
                            <iframe src="https://www.example.com" 
                                    width="600" 
                                    height="400" 
                                    title="Example Website">
                            </iframe>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 20,
                'title' => 'HTML and JavaScript Integration',
                'description' => 'This topic demonstrates how to integrate JavaScript into an HTML webpage, using the <script> tag and an onclick event to trigger a function.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'HTML and JavaScript Integration Assessment',
                        'description' => 'Use HTML to demonstrate how to integrate JavaScript into your webpage.

                        Create a button with the text "Click Me".
                        Use the onclick event to trigger a JavaScript function when the button is clicked.
                        The JavaScript function should display an alert with the message "Hello, world!".
                        Include the <script> tag to write your JavaScript code inside the HTML document.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>HTML and JavaScript Example</title>
                        </head>
                        <body>
                            <button onclick="showAlert()">Click Me</button>
                            <script>
                                function showAlert() {
                                    alert("Hello, world!");
                                }
                            </script>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 25,
                'title' => 'CSS Comment',
                'description' => 'This assessment will test your understanding of using comments in CSS for clarity and documentation.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Comment Assessment',
                        'description' => 'In this assessment, you will demonstrate how to use comments in CSS to document your styles and provide explanations within your code.

Instructions:

Create a basic HTML page structure with the necessary <html>, <head>, and <body> tags.
Inside the <head>, include a <style> tag to write your CSS.
Add a comment in the CSS using both single-line and multi-line comments.
Use the single-line comment to explain a basic style rule for the body element.
Use the multi-line comment to explain a more detailed style rule or a section of your CSS.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Comments Example</title>
                            <style>
                                /* This is a single-line comment that explains the following rule */
                                body {
                                    background-color: lightblue;
                                }
                                /* Multi-line comment block
                                The body background color has been changed to lightblue
                                for a calm and fresh look. */
                            </style>
                        </head>
                        <body>
                            <h1>Welcome to My Page</h1>
                            <p>This page demonstrates the use of CSS comments.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 26,
                'title' => 'CSS Colors',
                'description' => 'This topic covers applying background and text colors to elements using CSS, with different color formats like named colors, hex, and RGB.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Colors Assessment',
                        'description' => 'Use CSS to apply colors to elements on a webpage.

                        Set the background color of the <body> to a light color (e.g., lightblue).
                        Set the text color of the <h1> heading to a contrasting color (e.g., darkblue).
                        Use the color property for text color and the background-color property for the background.
                        Experiment with different color formats like named colors, hex, and RGB.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Colors Example</title>
                            <style>
                                body {
                                    background-color: lightblue;
                                }
                                h1 {
                                    color: darkblue;
                                }
                                p {
                                    color: #333333;
                                }
                            </style>
                        </head>
                        <body>
                            <h1>Welcome to My Webpage</h1>
                            <p>This is an example of using CSS to apply colors to elements.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 27,
                'title' => 'CSS Background',
                'description' => 'This topic covers using CSS to set background colors, images, and size properties for elements, along with padding and preventing image repetition.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Background Assessment',
                        'description' => 'Use CSS to set the background properties for elements on a webpage.

                        Set the background color of the <body> to light gray.
                        Set an image as the background of a <div> element using the background-image property.
                        Apply background-size to ensure the image covers the entire <div> container.
                        Use background-repeat to prevent the background image from repeating.
                        Add padding inside the <div> to make the content visible.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Background Example</title>
                            <style>
                                body {
                                    background-color: lightgray;
                                }
                                .container {
                                    background-image: url("https://example.com/background.jpg");
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    padding: 20px;
                                    height: 300px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <h2>Welcome to My Website</h2>
                                <p>This is an example of using a background image with CSS.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 28,
                'title' => 'CSS Border',
                'description' => 'This topic demonstrates how to use CSS to add borders around HTML elements, including setting border width, style, color, padding, and using border-radius for rounded corners.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Border Assessment',
                        'description' => 'Use CSS to add borders around HTML elements.

                        Apply a border around a <div> element.
                        Set the border width to 5px, the border style to solid, and the border color to blue.
                        Add some padding inside the <div> to give space between the content and the border.
                        Use a border-radius property to create rounded corners for the border.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Border Example</title>
                            <style>
                                .box {
                                    border: 5px solid blue;
                                    padding: 20px;
                                    border-radius: 10px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box">
                                <h2>Welcome to My Box</h2>
                                <p>This div has a border with rounded corners.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 29,
                'title' => 'CSS Margin',
                'description' => 'Basic assessment to test Python fundamentals.This topic covers using CSS to apply and customize margins around HTML elements to create space between them and surrounding content.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Margin Assessment',
                        'description' => 'Use CSS to apply margins around HTML elements.

                        Set a margin around a <div> element to create space between it and other content.
                        Apply different margin values for each side of the <div> using margin-top, margin-right, margin-bottom, and margin-left.
                        Set the top margin to 20px, right margin to 30px, bottom margin to 20px, and left margin to 40px.
                        Ensure that the margins create visible space between the <div> and other content on the page.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Margin Example</title>
                            <style>
                                .box {
                                    margin-top: 20px;
                                    margin-right: 30px;
                                    margin-bottom: 20px;
                                    margin-left: 40px;
                                    background-color: lightgray;
                                    padding: 15px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box">
                                <h2>Box with Margins</h2>
                                <p>This div has specific margins applied to its sides.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 30,
                'title' => 'CSS Padding',
                'description' => 'This topic covers using CSS to apply padding inside HTML elements, creating space between the content and the border.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Padding Assessment',
                        'description' => 'Use CSS to apply padding inside HTML elements.

                        Set padding inside a <div> element to create space between the content and the border.
                        Apply different padding values for each side of the <div> using padding-top, padding-right, padding-bottom, and padding-left.
                        Set the top padding to 20px, right padding to 30px, bottom padding to 20px, and left padding to 40px.
                        Ensure that the padding makes the content inside the <div> have more space, without affecting the size of the border.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Padding Example</title>
                            <style>
                                .box {
                                    padding-top: 20px;
                                    padding-right: 30px;
                                    padding-bottom: 20px;
                                    padding-left: 40px;
                                    background-color: lightgray;
                                    border: 3px solid blue;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box">
                                <h2>Box with Padding</h2>
                                <p>This div has specific padding applied to its sides.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 31,
                'title' => 'CSS Height and Width',
                'description' => 'This topic demonstrates how to use CSS to set the height and width of an HTML element, ensuring the content fits within the defined dimensions.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Height and Width Assessment',
                        'description' => 'Use CSS to set the height and width of an HTML element.

                        Create a <div> element and set both its height and width using CSS.
                        Set the width to 300px and the height to 200px.
                        Ensure that the content inside the <div> fits within the defined height and width.
                        Apply a background color to make the dimensions more visible.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Height and Width Example</title>
                            <style>
                                .box {
                                    width: 300px;
                                    height: 200px;
                                    background-color: lightcoral;
                                    padding: 20px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box">
                                <h2>Box with Defined Height and Width</h2>
                                <p>This div has a fixed height and width.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 32,
                'title' => 'CSS Box Model',
                'description' => 'This topic covers the CSS box model, including setting width, padding, border, and margin, and using box-sizing to control element sizing.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Box Model Assessment',
                        'description' => 'Use CSS to demonstrate how the box model works in styling elements.

                        Create a <div> element and apply the CSS box model properties.
                        Set the width to 300px, padding to 20px, border to 5px solid black, and margin to 30px.
                        Ensure that the content area is the inner part of the box, with padding around it, a border surrounding the padding, and margin outside the border.
                        Use the box-sizing property to control whether the width includes the padding and border.
                        Set box-sizing: border-box; to include padding and border within the defined width.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Box Model Example</title>
                            <style>
                                .box {
                                    width: 300px;
                                    padding: 20px;
                                    border: 5px solid black;
                                    margin: 30px;
                                    box-sizing: border-box;
                                    background-color: lightgreen;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box">
                                <h2>Box Model Example</h2>
                                <p>This div demonstrates the CSS box model with padding, border, and margin.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 33,
                'title' => 'CSS Outline',
                'description' => 'This topic covers applying outlines to HTML elements using CSS, including the :focus pseudo-class to show outlines without affecting layout.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Outline Assessment',
                        'description' => 'Use CSS to demonstrate how to apply outlines to HTML elements.

                        Create a <div> element and apply an outline using the outline property.
                        Set the outline color to blue, the style to dashed, and the width to 3px.
                        Add a :focus pseudo-class to the <div> so that the outline appears when the element is focused.
                        Ensure that the outline does not affect the layout of the element (it should not push the content or change the element’s dimensions).',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Outline Example</title>
                            <style>
                                .box {
                                    width: 300px;
                                    height: 200px;
                                    background-color: lightyellow;
                                    padding: 20px;
                                    outline: 3px dashed blue;
                                }
                                .box:focus {
                                    outline: 5px solid red;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box" tabindex="0">
                                <h2>Box with Outline</h2>
                                <p>This div has an outline that appears when focused.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 34,
                'title' => 'CSS Text',
                'description' => 'This topic demonstrates how to use CSS to style text elements, including setting text color, font size, font family, alignment, text decoration, and line height.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Text Assessment',
                        'description' => 'Use CSS to style text elements on a webpage.

                        Create a paragraph <p> and apply the following styles:
                        Set the text color to dark blue.
                        Change the font size to 18px.
                        Set the font family to "Arial", sans-serif.
                        Apply text alignment to center the text within the paragraph.
                        Add text decoration to underline the text.
                        Also, use the line-height property to adjust the line spacing between the text.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Text Example</title>
                            <style>
                                p {
                                    color: darkblue;
                                    font-size: 18px;
                                    font-family: "Arial", sans-serif;
                                    text-align: center;
                                    text-decoration: underline;
                                    line-height: 1.5;
                                }
                            </style>
                        </head>
                        <body>
                            <p>This is a paragraph with CSS text styling applied.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 35,
                'title' => 'CSS Fonts',
                'description' => 'This topic demonstrates how to use CSS to style fonts in HTML elements, including custom fonts, font size, weight, style, and line height for improved readability.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Fonts Assessment',
                        'description' => 'Use CSS to style fonts in HTML elements.

                        Apply a custom font family to a paragraph <p> element using the font-family property.
                        Set the font size to 20px.
                        Apply a font weight of bold.
                        Set the font style to italic.
                        Use a web-safe fallback font in case the custom font is unavailable (e.g., Arial, sans-serif).
                        Add line-height for better readability of the text.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Fonts Example</title>
                            <style>
                                p {
                                    font-family: "Times New Roman", Arial, sans-serif;
                                    font-size: 20px;
                                    font-weight: bold;
                                    font-style: italic;
                                    line-height: 1.6;
                                }
                            </style>
                        </head>
                        <body>
                            <p>This paragraph uses custom font styles with CSS.</p>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 36,
                'title' => 'CSS Icons',
                'description' => 'This topic demonstrates how to incorporate icons into a webpage using a popular icon library like Font Awesome, and style them with CSS, including size, color, and hover effects.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Icons Assessment',
                        'description' => 'Use CSS to incorporate icons into a webpage using a popular icon library.

                        Include the Font Awesome library via a CDN to access various icons.
                        Add an icon inside a <div> element using the <i> tag.
                        Set the size of the icon using the font-size property.
                        Change the icon color using the color property (e.g., set it to red).
                        Apply a hover effect that changes the icon color when the user hovers over it.',
                                                'sample_input' => '',
                                                'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Icons Example</title>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                            <style>
                                .icon {
                                    font-size: 50px;
                                    color: red;
                                    transition: color 0.3s;
                                }
                                .icon:hover {
                                    color: blue;
                                }
                            </style>
                        </head>
                        <body>
                            <div>
                                <i class="fas fa-heart icon"></i>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 37,
                'title' => 'CSS Links',
                'description' => 'This topic demonstrates how to style hyperlinks in CSS, including setting default and hover link colors, adding hover effects, and controlling the text decoration.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Links Assessment',
                        'description' => 'Use CSS to style hyperlinks on a webpage.

                        Create a <a> element (hyperlink) and set the href attribute to a URL.
                        Set the default link color using the color property (e.g., blue).
                        Add a hover effect to change the link color when the user hovers over the link (e.g., set it to red).
                        Apply an underline effect to the link when hovered over.
                        Remove the underline from the link by default.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>3
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Links Example</title>
                            <style>
                                a {
                                    color: blue;
                                    text-decoration: none;
                                }
                                a:hover {
                                    color: red;
                                    text-decoration: underline;
                                }
                            </style>
                        </head>
                        <body>
                            <a href="https://www.example.com">Visit Example Website</a>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 38,
                'title' => 'CSS Lists',
                'description' => 'This topic demonstrates how to style unordered and ordered lists in CSS, including list style types, padding, margin, and customizing list item font size and color.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Lists Assessment',
                        'description' => 'Use CSS to style unordered and ordered lists on a webpage.

                        Create an unordered list (<ul>) with multiple list items (<li>).
                        Set the list style type to circle for the unordered list.
                        Create an ordered list (<ol>) and set the list style type to decimal.
                        Add some padding and margin around both the unordered and ordered lists.
                        Style the list items to change their font size and text color.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Lists Example</title>
                            <style>
                                ul {
                                    list-style-type: circle;
                                    padding-left: 20px;
                                    margin: 20px;
                                }
                                ol {
                                    list-style-type: decimal;
                                    padding-left: 20px;
                                    margin: 20px;
                                }
                                li {
                                    font-size: 18px;
                                    color: darkgreen;
                                }
                            </style>
                        </head>
                        <body>
                            <h2>Unordered List</h2>
                            <ul>
                                <li>Item 1</li>
                                <li>Item 2</li>
                                <li>Item 3</li>
                            </ul>
                            <h2>Ordered List</h2>
                            <ol>
                                <li>First</li>
                                <li>Second</li>
                                <li>Third</li>
                            </ol>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 39,
                'title' => 'CSS Tables',
                'description' => 'This topic covers styling HTML tables with CSS, including borders, padding, background colors, and hover effects for rows.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Tables Assessment',
                        'description' => 'Use CSS to style HTML tables.
                        Create a table using the <table>, <tr>, <td>, and <th> tags.
                        Set the table width to 100%.
                        Add a border to the table, table cells (<td>), and header cells (<th>).
                        Apply padding inside the table cells to give the content more space.
                        Set a background color for the table header (<th>) to differentiate it from the table body.
                        Apply a hover effect to change the background color of a row when the mouse hovers over it.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Tables Example</title>
                            <style>
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }
                                th, td {
                                    border: 1px solid black;
                                    padding: 10px;
                                    text-align: center;
                                }
                                th {
                                    background-color: lightblue;
                                }
                                tr:hover {
                                    background-color: lightgray;
                                }
                            </style>
                        </head>
                        <body>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Header 1</th>
                                        <th>Header 2</th>
                                        <th>Header 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Row 1, Cell 1</td>
                                        <td>Row 1, Cell 2</td>
                                        <td>Row 1, Cell 3</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2, Cell 1</td>
                                        <td>Row 2, Cell 2</td>
                                        <td>Row 2, Cell 3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                        </html>
',
                    ]
                ],
            ],
            [
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 40,
                'title' => 'CSS Display',
                'description' => 'This topic demonstrates how to use the CSS display property to control the layout of HTML elements, including block, inline-block, and none values.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Display Assessment',
                        'description' => 'Use CSS to control the display property of HTML elements.

                        Create multiple <div> elements and use the display property to manipulate their layout.
                        Set the first <div> to display: block; to make it take up the full width of its parent container.
                        Set the second <div> to display: inline-block; to make it behave like an inline element but still respect width and height.
                        Set the third <div> to display: none; to hide it from the page.
                        Apply background colors and padding to make each <div> visually distinct.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Display Example</title>
                            <style>
                                .block {
                                    display: block;
                                    background-color: lightblue;
                                    padding: 20px;
                                    margin-bottom: 10px;
                                }
                                .inline-block {
                                    display: inline-block;
                                    background-color: lightgreen;
                                    padding: 20px;
                                    margin-right: 10px;
                                }
                                .none {
                                    display: none;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="block">
                                <p>This div is displayed as a block.</p>
                            </div>
                            <div class="inline-block">
                                <p>This div is displayed as an inline-block.</p>
                            </div>
                            <div class="none">
                                <p>This div is hidden because its display is set to none.</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 41,
                'title' => 'CSS Position',
                'description' => 'This topic demonstrates how to use CSS positioning properties (static, relative, absolute, fixed) to control the layout and placement of HTML elements.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Position Assessment',
                        'description' => 'Use CSS to control the positioning of HTML elements.

                        Create multiple <div> elements and apply different position values: static, relative, absolute, and fixed.
                        Set the first <div> to position: static; (default value), so it flows normally with the document content.
                        Set the second <div> to position: relative; and move it 50px from the top and 30px from the left of its normal position.
                        Set the third <div> to position: absolute; and place it 100px from the top and 50px from the left relative to its nearest positioned ancestor.
                        Set the fourth <div> to position: fixed; to make it stay fixed at 10px from the top and 10px from the left of the viewport when scrolling.
                        Add background colors and padding to each <div> to make them visually distinct.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Position Example</title>
                            <style>
                                .static {
                                    position: static;
                                    background-color: lightblue;
                                    padding: 20px;
                                    margin-bottom: 10px;
                                }
                                .relative {
                                    position: relative;
                                    top: 50px;
                                    left: 30px;
                                    background-color: lightgreen;
                                    padding: 20px;
                                    margin-bottom: 10px;
                                }
                                .absolute {
                                    position: absolute;
                                    top: 100px;
                                    left: 50px;
                                    background-color: lightcoral;
                                    padding: 20px;
                                    margin-bottom: 10px;
                                }
                                .fixed {
                                    position: fixed;
                                    top: 10px;
                                    left: 10px;
                                    background-color: lightyellow;
                                    padding: 20px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="static">
                                <p>This div is positioned statically.</p>
                            </div>
                            <div class="relative">
                                <p>This div is positioned relatively (50px from top, 30px from left).</p>
                            </div>
                            <div class="absolute">
                                <p>This div is positioned absolutely (100px from top, 50px from left).</p>
                            </div>
                            <div class="fixed">
                                <p>This div is fixed (10px from top and left of the viewport).</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 42,
                'title' => 'CSS Z-Index',
                'description' => 'This topic demonstrates how to use the CSS z-index property to control the stacking order of elements, ensuring the element with the highest z-index appears on top.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Z-Index Assessment',
                        'description' => 'Use CSS to control the stacking order of elements using the z-index property.

                        Create multiple <div> elements with different background colors.
                        Apply position: relative; to each <div> to enable the z-index property.
                        Set the z-index of the first <div> to 1, the second <div> to 3, and the third <div> to 2.
                        The <div> with the highest z-index value should appear on top of the others.
                        Make sure the elements overlap to visualize the stacking order.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Z-Index Example</title>
                            <style>
                                .box {
                                    width: 200px;
                                    height: 200px;
                                    position: relative;
                                    margin: 20px;
                                }
                                .box1 {
                                    background-color: lightblue;
                                    z-index: 1;
                                }
                                .box2 {
                                    background-color: lightgreen;
                                    z-index: 3;
                                }
                                .box3 {
                                    background-color: lightcoral;
                                    z-index: 2;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="box box1">
                                <p>Box 1 (z-index: 1)</p>
                            </div>
                            <div class="box box2">
                                <p>Box 2 (z-index: 3)</p>
                            </div>
                            <div class="box box3">
                                <p>Box 3 (z-index: 2)</p>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 43,
                'title' => 'CSS Align',
                'description' => 'This topic covers using CSS Flexbox to horizontally and vertically align elements within a parent container.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Align Assessment',
                        'description' => 'Use CSS to align elements horizontally and vertically on a webpage.
                        Create a parent container <div> with multiple child elements.
                        Use text-align: center; on the parent container to center-align text inside it.
                        Apply display: flex; on the parent container to align child elements horizontally.
                        Use justify-content: center; to center the child elements along the main axis (horizontally).
                        Use align-items: center; to align the child elements along the cross axis (vertically).
                        Apply some padding and background colors to the parent and child elements to make them visually distinct.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Align Example</title>
                            <style>
                                .container {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    height: 100vh;
                                    background-color: lightgray;
                                }
                                .child {
                                    background-color: lightblue;
                                    padding: 20px;
                                    margin: 10px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <div class="child">
                                    <p>This is a centered child element.</p>
                                </div>
                            </div>
                        </body>
                        </html>
                        ',
                    ]
                ],
            ],
[
                'course_class_id' => $courseClassId,
                'user_id' => $userId,
                'default' => true,
                'lessonId' => 44,
                'title' => 'CSS Overflow',
                'description' => 'This topic covers using the CSS overflow property to manage content overflow within an element, including scrolling and hiding overflowed content.',
                'due_date' => null, // Open-ended by default
                'points' => 100,
                'time_limit' => 1800, // 30 minutes
                'coding_problems' => [
                    [
                        'title' => 'CSS Overflow Assessment',
                        'description' => 'Use CSS to control the overflow behavior of content within an element.

                        Create a parent <div> with a fixed height and width.
                        Add child content inside the parent <div> that exceeds its size (i.e., text or additional elements).
                        Set the overflow property of the parent <div> to auto to allow scrolling if the content exceeds the container size.
                        Experiment with overflow-x (horizontal overflow) and overflow-y (vertical overflow) to control scrolling in specific directions.
                        Set the overflow property to hidden to hide the overflowing content (without scrolling).
                        Test different overflow values (scroll, visible, auto, hidden) to see how they affect the layout.',
                        'sample_input' => '',
                        'expected_output' => '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>CSS Overflow Example</title>
                            <style>
                                .container {
                                    width: 300px;
                                    height: 200px;
                                    border: 2px solid black;
                                    padding: 10px;
                                    overflow: auto;
                                }
                                .content {
                                    height: 500px;
                                    background-color: lightblue;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <div class="content">
                                    <p>This is some content that exceeds the height and width of the corner. Scrollbars will appear.</p>
                                </div>
                            </div>
                        </body>
                        </html>
                        ',
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
