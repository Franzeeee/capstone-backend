// const webAssessment = [ 
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Paragraph Assessment',
//                         'description' => 'Use an HTML paragraph to display the following text:
// "HTML (HyperText Markup Language) is the standard language for creating web pages and web applications."'n ,
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Paragraph Example</title>\n
// </head>\n
// <body>\n
//     <p>HTML (HyperText Markup Language) is the standard language for creating web pages and web applications.</p>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Paragraph with Inline Styles Assessment',
//                         'description' => 'Use an HTML paragraph to display the following text:\n
// "CSS (Cascading Style Sheets) is used to style HTML documents."\n
// Apply the following inline styles:\n

// Set the font size to 18px.\n
// Set the text color to dark blue.\n
// Make the text bold.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>Styled Paragraph Example</title>\n
// </head>\n
// <body>\n
//     <p style="font-size: 18px; color: darkblue; font-weight: bold;">CSS (Cascading Style Sheets) is used to style HTML documents.</p>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Paragraph with Formatting Tags Assessment',
//                         'description' => 'Use HTML to display the following text:\n
// "HTML formatting tags help in structuring and emphasizing text content."\n
// Apply the following formatting:\n

// Make the word "HTML" bold.\n
// Make the word "tags" italicized.\n
// Underline the word "emphasizing."',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Formatting Example</title>\n
// </head>\n
// <body>\n
//     <p><strong>HTML</strong> formatting <em>tags</em> help in structuring and <u>emphasizing</u> text content.</p>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Quotation Tags Assessment',
//                         'description' => 'Use HTML to display the following text:\n
// "Web development is the process of building websites and web applications."\n
// Apply the following quotation formatting:\n

// Use the <blockquote> tag to indicate the quoted text.\n
// Add a <cite> element after the quote to reference the source as "Web Development Handbook."',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Quotation Example</title>\n
// </head>\n
// <body>\n
//     <blockquote>\n
//         Web development is the process of building websites and web applications.\n
//         <cite>Web Development Handbook</cite>\n
//     </blockquote>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Comments Assessment',
//                         'description' => 'Use HTML to display the following text:\n
// "HTML comments are useful for adding notes in the code that are not displayed on the web page."\n
// Add the following comments in the HTML code:\n

// Add a comment before the opening <html> tag, explaining the purpose of the document.\n
// Add a comment before the <body> tag, explaining that the main content of the page will go there.\n
// Add a comment next to the <p> tag explaining the paragraph content.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
//     <!-- This document demonstrates the use of HTML comments. -->\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Comments Example</title>\n
// </head>\n
// <body>\n
//     <!-- Main content of the page starts here -->\n
//     <p>HTML comments are useful for adding notes in the code that are not displayed on the web page. <!-- This is the paragraph explaining HTML comments --></p>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML and Internal CSS Styling Assessment',
//                         'description' => '
// Got it! Here's the corrected version with \n added in every line of the description, as requested:

// Title: HTML and Internal CSS Styling Assessment

// Description:
// Use HTML to display the following text:\n
// "CSS (Cascading Style Sheets) allows you to style HTML elements."\n
// Apply the following CSS styles to the paragraph:\n

// Set the background color to lightgray.\n
// Set the text color to dark green.\n
// Set the text alignment to center.\n
// Set the padding to 20px.\n
// Use internal CSS within the <style> tag to apply the styles.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML and Internal CSS Styling Example</title>\n
//     <style>\n
//         p {\n
//             background-color: lightgray;\n
//             color: darkgreen;\n
//             text-align: center;\n
//             padding: 20px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <p>CSS (Cascading Style Sheets) allows you to style HTML elements.</p>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Heading Leveling with Personal Information Assessment',
//                         'description' => 'Use HTML to display the following information in the correct heading levels:\n

// The first line should display their full name: "John Doe" (use <h1>).\n
// The second line should display their age: "25" (use <h2>).\n
// The third line should display their municipality: "Quezon City" (use <h3>).',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>Personal Information Example</title>\n
// </head>\n
// <body>\n
//     <h1>John Doe</h1>\n
//     <h2>25</h2>\n
//     <h3>Quezon City</h3>\n
// </body>\n
// </html>
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Image Tag Assessment',
//                         'description' => 'Use HTML to display the following image:\n
// "Image of a dog in a garden."\n
// Apply the following HTML properties to the image:\n

// Use the <img> tag to embed the image.\n
// Set the src attribute to the provided image URL:
// https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=0.752xw:1.00xh;0.175xw,0&resize=1200:*\n
// Add an alt attribute with the text "A dog playing in a garden."\n
// Set a width of 500px for the image.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Image Example</title>\n
// </head>\n
// <body>\n
//     <img src="https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=0.752xw:1.00xh;0.175xw,0&resize=1200:*" \n
//          alt="A dog playing in a garden" \n
//          width="500px">\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Page Title Assessment',
//                         'description' => 'Use HTML to set the title of the web page.\n
// The title should be "Welcome to My Website".\n
// Apply the following HTML structure:\n

// Use the <title> tag inside the <head> section to set the page title.\n
// Ensure the title appears in the browser tab.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>Welcome to My Website</title>\n
// </head>\n
// <body>\n
//     <h1>Welcome to My Website</h1>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Tables Assessment',
//                         'description' => 'Use HTML to display a simple table with 3 rows and 2 columns.\n
// The table should contain the following data:\n

// Row 1: "Name" and "eg.John Doe"\n
// Row 2: "Age" and "eg.30"\n
// Row 3: "City" and "eg.New York"\n
// Apply the following HTML structure:\n
// Use the <table> tag to create the table.\n
// Use <tr> for each row, <th> for the table headers, and <td> for the table data.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Table Example</title>\n
// </head>\n
// <body>\n
//     <table border="1">\n
//         <tr>\n
//             <th>Name</th>\n
//             <td>John Doe</td>\n
//         </tr>\n
//         <tr>\n
//             <th>Age</th>\n
//             <td>30</td>\n
//         </tr>\n
//         <tr>\n
//             <th>City</th>\n
//             <td>New York</td>\n
//         </tr>\n
//     </table>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Lists Assessment',
//                         'description' => 'Use HTML to display a list of your favorite fruits.\n
// Create the list using two types of lists:\n

// An unordered list (<ul>) for the fruit names.\n
// An ordered list (<ol>) for the reasons you like each fruit.\n
// The fruits should be "Apple", "Banana", and "Cherry".\n
// For each fruit, provide a reason in the ordered list, for example: "Apple" - "Healthy and crunchy".',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML List Example</title>\n
// </head>\n
// <body>\n
//     <h2>My Favorite Fruits</h2>\n
//     <ul>\n
//         <li>Apple</li>\n
//         <li>Banana</li>\n
//         <li>Cherry</li>\n
//     </ul>\n
//     <h3>Reasons Why I Like Them</h3>\n
//     <ol>\n
//         <li>Apple - Healthy and crunchy</li>\n
//         <li>Banana - Rich in potassium</li>\n
//         <li>Cherry - Sweet and delicious</li>\n
//     </ol>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML Block and Inline Elements Assessment',
//                         'description' => 'Use HTML to demonstrate the difference between block-level and inline elements.\n

// Use a block-level element for the main container: <div>.
// Use inline elements for the text: <span>, <strong>, and <em>.\n
// Inside the <div>, include the following content:\n
// A <span> with text "This is an inline element".\n
// A <strong> element with text "This text is strong".\n
// An <em> element with text "This text is emphasized".\n
// Apply the following CSS styles to illustrate the behavior of these elements:\n
// Set the background color of the <div> to lightblue.\n
// Set the text color inside the <span> to red.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>Block and Inline Example</title>\n
//     <style>\n
//         div {\n
//             background-color: lightblue;\n
//             padding: 20px;\n
//         }\n
//         span {\n
//             color: red;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div>\n
//         <span>This is an inline element</span>\n
//         <strong>This text is strong</strong>\n
//         <em>This text is emphasized</em>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],

// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML <div> Element Assessment',
//                         'description' => 'Use HTML to demonstrate the usage of the <div> tag.\n

// Use the <div> tag as a container for other elements.\n
// Inside the <div>, include a heading <h2> with the text "Welcome to My Page".\n
// Below the heading, add a paragraph <p> with the text "This is a simple example of using the <div> element in HTML.".
// Apply some CSS to style the <div> container, setting a background color and padding.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML div Example</title>\n
//     <style>\n
//         div {\n
//             background-color: lightblue;\n
//             padding: 20px;\n
//             border-radius: 5px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div>\n
//         <h2>Welcome to My Page</h2>\n
//         <p>This is a simple example of using the `<div>` element in HTML.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => ' HTML Classes Assessment',
//                         'description' => 'Use HTML to demonstrate the use of classes for styling elements.\n

// Create a <div> element and assign it a class called container.\n
// Inside the <div>, include a heading <h1> with the text "Welcome to My Website".\n
// Below the heading, add two paragraphs <p>. The first paragraph should have the class highlight, and the second should have the class normal.\n
// Use CSS to style the .container class with a background color.\n
// Style the .highlight class with a different text color (e.g., red).\n
// Style the .normal class with a default text color.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML Classes Example</title>\n
//     <style>\n
//         .container {\n
//             background-color: lightgray;\n
//             padding: 20px;\n
//             border-radius: 5px;\n
//         }\n
//         .highlight {\n
//             color: red;\n
//         }\n
//         .normal {\n
//             color: black;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="container">\n
//         <h1>Welcome to My Website</h1>\n
//         <p class="highlight">This paragraph has a highlighted text color.</p>\n
//         <p class="normal">This paragraph has a normal text color.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML ID Attribute Assessment',
//                         'description' => 'Use HTML to demonstrate the use of the id attribute.\n

// Create a <div> element and assign it an id called main-container.\n
// Inside the <div>, include a heading <h2> with the text "Welcome to My Page".\n
// Below the heading, add a paragraph <p> with the text "This paragraph has a unique ID." and assign it the id attribute unique-paragraph.\n
// Apply CSS to style the #main-container by setting a background color.\n
// Style the #unique-paragraph by setting the text color to blue.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML ID Example</title>\n
//     <style>\n
//         #main-container {\n
//             background-color: lightyellow;\n
//             padding: 20px;\n
//             border-radius: 5px;\n
//         }\n
//         #unique-paragraph {\n
//             color: blue;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div id="main-container">\n
//         <h2>Welcome to My Page</h2>\n
//         <p id="unique-paragraph">This paragraph has a unique ID.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],

// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML <iframe> Element Assessment',
//                         'description' => 'Use HTML to embed an external webpage inside your page using the <iframe> tag.\n

// Set the src attribute to a URL, for example: https://www.youtube.com.\n
// Set the width and height attributes to define the iframe size.\n
// Add a title attribute to describe the embedded content.\n
// Make sure the iframe is displayed within your webpage.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML iframe Example</title>\n
// </head>\n
// <body>\n
//     <iframe src="https://www.example.com" \n
//             width="600" \n
//             height="400" \n
//             title="Example Website">\n
//     </iframe>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'HTML and JavaScript Integration Assessment',
//                         'description' => 'Use HTML to demonstrate how to integrate JavaScript into your webpage.\n

// Create a button with the text "Click Me".\n
// Use the onclick event to trigger a JavaScript function when the button is clicked.\n
// The JavaScript function should display an alert with the message "Hello, world!".\n
// Include the <script> tag to write your JavaScript code inside the HTML document.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>HTML and JavaScript Example</title>\n
// </head>\n
// <body>\n
//     <button onclick="showAlert()">Click Me</button>\n
//     <script>\n
//         function showAlert() {\n
//             alert('Hello, world!');\n
//         }\n
//     </script>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Comment Assessment',
//                         'description' => 'CSS Comment Assessment',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Comments Example</title>\n
//     <style>\n
//         /* This is a single-line comment that explains the following rule */\n
//         body {\n
//             background-color: lightblue;\n
//         }\n
//         /* Multi-line comment block\n
//            The body background color has been changed to lightblue\n
//            for a calm and fresh look. */\n
//     </style>\n
// </head>\n
// <body>\n
//     <h1>Welcome to My Page</h1>\n
//     <p>This page demonstrates the use of CSS comments.</p>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Colors Assessment',
//                         'description' => 'Use CSS to apply colors to elements on a webpage.\n

// Set the background color of the <body> to a light color (e.g., lightblue).\n
// Set the text color of the <h1> heading to a contrasting color (e.g., darkblue).\n
// Use the color property for text color and the background-color property for the background.\n
// Experiment with different color formats like named colors, hex, and RGB.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Colors Example</title>\n
//     <style>\n
//         body {\n
//             background-color: lightblue;\n
//         }\n
//         h1 {\n
//             color: darkblue;\n
//         }\n
//         p {\n
//             color: #333333;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <h1>Welcome to My Webpage</h1>\n
//     <p>This is an example of using CSS to apply colors to elements.</p>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Background Assessment',
//                         'description' => 'Use CSS to set the background properties for elements on a webpage.\n

// Set the background color of the <body> to light gray.\n
// Set an image as the background of a <div> element using the background-image property.\n
// Apply background-size to ensure the image covers the entire <div> container.\n
// Use background-repeat to prevent the background image from repeating.\n
// Add padding inside the <div> to make the content visible.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Background Example</title>\n
//     <style>\n
//         body {\n
//             background-color: lightgray;\n
//         }\n
//         .container {\n
//             background-image: url('https://example.com/background.jpg');\n
//             background-size: cover;\n
//             background-repeat: no-repeat;\n
//             padding: 20px;\n
//             height: 300px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="container">\n
//         <h2>Welcome to My Website</h2>\n
//         <p>This is an example of using a background image with CSS.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Border Assessment',
//                         'description' => 'Use CSS to add borders around HTML elements.\n

// Apply a border around a <div> element.\n
// Set the border width to 5px, the border style to solid, and the border color to blue.\n
// Add some padding inside the <div> to give space between the content and the border.\n
// Use a border-radius property to create rounded corners for the border.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Border Example</title>\n
//     <style>\n
//         .box {\n
//             border: 5px solid blue;\n
//             padding: 20px;\n
//             border-radius: 10px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box">\n
//         <h2>Welcome to My Box</h2>\n
//         <p>This div has a border with rounded corners.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Margin Assessment',
//                         'description' => 'Use CSS to apply margins around HTML elements.\n

// Set a margin around a <div> element to create space between it and other content.\n
// Apply different margin values for each side of the <div> using margin-top, margin-right, margin-bottom, and margin-left.\n
// Set the top margin to 20px, right margin to 30px, bottom margin to 20px, and left margin to 40px.\n
// Ensure that the margins create visible space between the <div> and other content on the page.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Margin Example</title>\n
//     <style>\n
//         .box {\n
//             margin-top: 20px;\n
//             margin-right: 30px;\n
//             margin-bottom: 20px;\n
//             margin-left: 40px;\n
//             background-color: lightgray;\n
//             padding: 15px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box">\n
//         <h2>Box with Margins</h2>\n
//         <p>This div has specific margins applied to its sides.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Padding Assessment',
//                         'description' => 'Use CSS to apply padding inside HTML elements.\n

// Set padding inside a <div> element to create space between the content and the border.\n
// Apply different padding values for each side of the <div> using padding-top, padding-right, padding-bottom, and padding-left.\n
// Set the top padding to 20px, right padding to 30px, bottom padding to 20px, and left padding to 40px.\n
// Ensure that the padding makes the content inside the <div> have more space, without affecting the size of the border.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Padding Example</title>\n
//     <style>\n
//         .box {\n
//             padding-top: 20px;\n
//             padding-right: 30px;\n
//             padding-bottom: 20px;\n
//             padding-left: 40px;\n
//             background-color: lightgray;\n
//             border: 3px solid blue;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box">\n
//         <h2>Box with Padding</h2>\n
//         <p>This div has specific padding applied to its sides.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Height and Width Assessment',
//                         'description' => 'Use CSS to set the height and width of an HTML element.\n

// Create a <div> element and set both its height and width using CSS.\n
// Set the width to 300px and the height to 200px.\n
// Ensure that the content inside the <div> fits within the defined height and width.\n
// Apply a background color to make the dimensions more visible.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Height and Width Example</title>\n
//     <style>\n
//         .box {\n
//             width: 300px;\n
//             height: 200px;\n
//             background-color: lightcoral;\n
//             padding: 20px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box">\n
//         <h2>Box with Defined Height and Width</h2>\n
//         <p>This div has a fixed height and width.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Box Model Assessment',
//                         'description' => 'Use CSS to demonstrate how the box model works in styling elements.\n

// Create a <div> element and apply the CSS box model properties.\n
// Set the width to 300px, padding to 20px, border to 5px solid black, and margin to 30px.\n
// Ensure that the content area is the inner part of the box, with padding around it, a border surrounding the padding, and margin outside the border.\n
// Use the box-sizing property to control whether the width includes the padding and border.\n
// Set box-sizing: border-box; to include padding and border within the defined width.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Box Model Example</title>\n
//     <style>\n
//         .box {\n
//             width: 300px;\n
//             padding: 20px;\n
//             border: 5px solid black;\n
//             margin: 30px;\n
//             box-sizing: border-box;\n
//             background-color: lightgreen;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box">\n
//         <h2>Box Model Example</h2>\n
//         <p>This div demonstrates the CSS box model with padding, border, and margin.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Outline Assessment',
//                         'description' => 'Use CSS to demonstrate how to apply outlines to HTML elements.\n

// Create a <div> element and apply an outline using the outline property.\n
// Set the outline color to blue, the style to dashed, and the width to 3px.\n
// Add a :focus pseudo-class to the <div> so that the outline appears when the element is focused.\n
// Ensure that the outline does not affect the layout of the element (it should not push the content or change the element’s dimensions).',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Outline Example</title>\n
//     <style>\n
//         .box {\n
//             width: 300px;\n
//             height: 200px;\n
//             background-color: lightyellow;\n
//             padding: 20px;\n
//             outline: 3px dashed blue;\n
//         }\n
//         .box:focus {\n
//             outline: 5px solid red;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box" tabindex="0">\n
//         <h2>Box with Outline</h2>\n
//         <p>This div has an outline that appears when focused.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Text Assessment',
//                         'description' => 'Use CSS to style text elements on a webpage.\n

// Create a paragraph <p> and apply the following styles:\n
// Set the text color to dark blue.\n
// Change the font size to 18px.\n
// Set the font family to "Arial", sans-serif.\n
// Apply text alignment to center the text within the paragraph.\n
// Add text decoration to underline the text.\n
// Also, use the line-height property to adjust the line spacing between the text.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Text Example</title>\n
//     <style>\n
//         p {\n
//             color: darkblue;\n
//             font-size: 18px;\n
//             font-family: "Arial", sans-serif;\n
//             text-align: center;\n
//             text-decoration: underline;\n
//             line-height: 1.5;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <p>This is a paragraph with CSS text styling applied.</p>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Fonts Assessment',
//                         'description' => 'Use CSS to style fonts in HTML elements.\n

// Apply a custom font family to a paragraph <p> element using the font-family property.\n
// Set the font size to 20px.\n
// Apply a font weight of bold.\n
// Set the font style to italic.\n
// Use a web-safe fallback font in case the custom font is unavailable (e.g., Arial, sans-serif).\n
// Add line-height for better readability of the text.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Fonts Example</title>\n
//     <style>\n
//         p {\n
//             font-family: 'Times New Roman', Arial, sans-serif;\n
//             font-size: 20px;\n
//             font-weight: bold;\n
//             font-style: italic;\n
//             line-height: 1.6;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <p>This paragraph uses custom font styles with CSS.</p>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Icons Assessment',
//                         'description' => 'Use CSS to incorporate icons into a webpage using a popular icon library.\n

// Include the Font Awesome library via a CDN to access various icons.\n
// Add an icon inside a <div> element using the <i> tag.\n
// Set the size of the icon using the font-size property.\n
// Change the icon color using the color property (e.g., set it to red).\n
// Apply a hover effect that changes the icon color when the user hovers over it.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Icons Example</title>\n
//     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">\n
//     <style>\n
//         .icon {\n
//             font-size: 50px;\n
//             color: red;\n
//             transition: color 0.3s;\n
//         }\n
//         .icon:hover {\n
//             color: blue;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div>\n
//         <i class="fas fa-heart icon"></i>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Links Assessment',
//                         'description' => 'Use CSS to style hyperlinks on a webpage.\n

// Create a <a> element (hyperlink) and set the href attribute to a URL.\n
// Set the default link color using the color property (e.g., blue).\n
// Add a hover effect to change the link color when the user hovers over the link (e.g., set it to red).\n
// Apply an underline effect to the link when hovered over.\n
// Remove the underline from the link by default.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Links Example</title>\n
//     <style>\n
//         a {\n
//             color: blue;\n
//             text-decoration: none;\n
//         }\n
//         a:hover {\n
//             color: red;\n
//             text-decoration: underline;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <a href="https://www.example.com">Visit Example Website</a>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Lists Assessment',
//                         'description' => 'Use CSS to style unordered and ordered lists on a webpage.\n

// Create an unordered list (<ul>) with multiple list items (<li>).\n
// Set the list style type to circle for the unordered list.\n
// Create an ordered list (<ol>) and set the list style type to decimal.\n
// Add some padding and margin around both the unordered and ordered lists.\n
// Style the list items to change their font size and text color.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Lists Example</title>\n
//     <style>\n
//         ul {\n
//             list-style-type: circle;\n
//             padding-left: 20px;\n
//             margin: 20px;\n
//         }\n
//         ol {\n
//             list-style-type: decimal;\n
//             padding-left: 20px;\n
//             margin: 20px;\n
//         }\n
//         li {\n
//             font-size: 18px;\n
//             color: darkgreen;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <h2>Unordered List</h2>\n
//     <ul>\n
//         <li>Item 1</li>\n
//         <li>Item 2</li>\n
//         <li>Item 3</li>\n
//     </ul>\n
//     <h2>Ordered List</h2>\n
//     <ol>\n
//         <li>First</li>\n
//         <li>Second</li>\n
//         <li>Third</li>\n
//     </ol>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Tables Assessment',
//                         'description' => '
// Title: CSS Tables Assessment

// Description:
// Use CSS to style HTML tables.\n

// Create a table using the <table>, <tr>, <td>, and <th> tags.\n
// Set the table width to 100%.\n
// Add a border to the table, table cells (<td>), and header cells (<th>).\n
// Apply padding inside the table cells to give the content more space.\n
// Set a background color for the table header (<th>) to differentiate it from the table body.\n
// Apply a hover effect to change the background color of a row when the mouse hovers over it.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Tables Example</title>\n
//     <style>\n
//         table {\n
//             width: 100%;\n
//             border-collapse: collapse;\n
//         }\n
//         th, td {\n
//             border: 1px solid black;\n
//             padding: 10px;\n
//             text-align: center;\n
//         }\n
//         th {\n
//             background-color: lightblue;\n
//         }\n
//         tr:hover {\n
//             background-color: lightgray;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <table>\n
//         <thead>\n
//             <tr>\n
//                 <th>Header 1</th>\n
//                 <th>Header 2</th>\n
//                 <th>Header 3</th>\n
//             </tr>\n
//         </thead>\n
//         <tbody>\n
//             <tr>\n
//                 <td>Row 1, Cell 1</td>\n
//                 <td>Row 1, Cell 2</td>\n
//                 <td>Row 1, Cell 3</td>\n
//             </tr>\n
//             <tr>\n
//                 <td>Row 2, Cell 1</td>\n
//                 <td>Row 2, Cell 2</td>\n
//                 <td>Row 2, Cell 3</td>\n
//             </tr>\n
//         </tbody>\n
//     </table>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Display Assessment',
//                         'description' => 'Use CSS to control the display property of HTML elements.\n

// Create multiple <div> elements and use the display property to manipulate their layout.\n
// Set the first <div> to display: block; to make it take up the full width of its parent container.\n
// Set the second <div> to display: inline-block; to make it behave like an inline element but still respect width and height.\n
// Set the third <div> to display: none; to hide it from the page.\n
// Apply background colors and padding to make each <div> visually distinct.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Display Example</title>\n
//     <style>\n
//         .block {\n
//             display: block;\n
//             background-color: lightblue;\n
//             padding: 20px;\n
//             margin-bottom: 10px;\n
//         }\n
//         .inline-block {\n
//             display: inline-block;\n
//             background-color: lightgreen;\n
//             padding: 20px;\n
//             margin-right: 10px;\n
//         }\n
//         .none {\n
//             display: none;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="block">\n
//         <p>This div is displayed as a block.</p>\n
//     </div>\n
//     <div class="inline-block">\n
//         <p>This div is displayed as an inline-block.</p>\n
//     </div>\n
//     <div class="none">\n
//         <p>This div is hidden because its display is set to none.</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Position Assessment',
//                         'description' => 'Use CSS to control the positioning of HTML elements.\n

// Create multiple <div> elements and apply different position values: static, relative, absolute, and fixed.\n
// Set the first <div> to position: static; (default value), so it flows normally with the document content.\n
// Set the second <div> to position: relative; and move it 50px from the top and 30px from the left of its normal position.\n
// Set the third <div> to position: absolute; and place it 100px from the top and 50px from the left relative to its nearest positioned ancestor.\n
// Set the fourth <div> to position: fixed; to make it stay fixed at 10px from the top and 10px from the left of the viewport when scrolling.\n
// Add background colors and padding to each <div> to make them visually distinct.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Position Example</title>\n
//     <style>\n
//         .static {\n
//             position: static;\n
//             background-color: lightblue;\n
//             padding: 20px;\n
//             margin-bottom: 10px;\n
//         }\n
//         .relative {\n
//             position: relative;\n
//             top: 50px;\n
//             left: 30px;\n
//             background-color: lightgreen;\n
//             padding: 20px;\n
//             margin-bottom: 10px;\n
//         }\n
//         .absolute {\n
//             position: absolute;\n
//             top: 100px;\n
//             left: 50px;\n
//             background-color: lightcoral;\n
//             padding: 20px;\n
//             margin-bottom: 10px;\n
//         }\n
//         .fixed {\n
//             position: fixed;\n
//             top: 10px;\n
//             left: 10px;\n
//             background-color: lightyellow;\n
//             padding: 20px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="static">\n
//         <p>This div is positioned statically.</p>\n
//     </div>\n
//     <div class="relative">\n
//         <p>This div is positioned relatively (50px from top, 30px from left).</p>\n
//     </div>\n
//     <div class="absolute">\n
//         <p>This div is positioned absolutely (100px from top, 50px from left).</p>\n
//     </div>\n
//     <div class="fixed">\n
//         <p>This div is fixed (10px from top and left of the viewport).</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Z-Index Assessment',
//                         'description' => 'Use CSS to control the stacking order of elements using the z-index property.\n

// Create multiple <div> elements with different background colors.\n
// Apply position: relative; to each <div> to enable the z-index property.\n
// Set the z-index of the first <div> to 1, the second <div> to 3, and the third <div> to 2.\n
// The <div> with the highest z-index value should appear on top of the others.\n
// Make sure the elements overlap to visualize the stacking order.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Z-Index Example</title>\n
//     <style>\n
//         .box {\n
//             width: 200px;\n
//             height: 200px;\n
//             position: relative;\n
//             margin: 20px;\n
//         }\n
//         .box1 {\n
//             background-color: lightblue;\n
//             z-index: 1;\n
//         }\n
//         .box2 {\n
//             background-color: lightgreen;\n
//             z-index: 3;\n
//         }\n
//         .box3 {\n
//             background-color: lightcoral;\n
//             z-index: 2;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="box box1">\n
//         <p>Box 1 (z-index: 1)</p>\n
//     </div>\n
//     <div class="box box2">\n
//         <p>Box 2 (z-index: 3)</p>\n
//     </div>\n
//     <div class="box box3">\n
//         <p>Box 3 (z-index: 2)</p>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Align Assessment',
//                         'description' => '
// Title: CSS Align Assessment

// Description:
// Use CSS to align elements horizontally and vertically on a webpage.\n

// Create a parent container <div> with multiple child elements.\n
// Use text-align: center; on the parent container to center-align text inside it.\n
// Apply display: flex; on the parent container to align child elements horizontally.\n
// Use justify-content: center; to center the child elements along the main axis (horizontally).\n
// Use align-items: center; to align the child elements along the cross axis (vertically).\n
// Apply some padding and background colors to the parent and child elements to make them visually distinct.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Align Example</title>\n
//     <style>\n
//         .container {\n
//             display: flex;\n
//             justify-content: center;\n
//             align-items: center;\n
//             height: 100vh;\n
//             background-color: lightgray;\n
//         }\n
//         .child {\n
//             background-color: lightblue;\n
//             padding: 20px;\n
//             margin: 10px;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="container">\n
//         <div class="child">\n
//             <p>This is a centered child element.</p>\n
//         </div>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
// [
//                 'course_class_id' => $courseClassId,
//                 'user_id' => $userId,
//                 'default' => true,
//                 'lessonId' => 0,
//                 'title' => 'Python Basics Assessment',
//                 'description' => 'Basic assessment to test Python fundamentals.',
//                 'due_date' => null, // Open-ended by default
//                 'points' => 100,
//                 'time_limit' => 1800, // 30 minutes
//                 'coding_problems' => [
//                     [
//                         'title' => 'CSS Overflow Assessment',
//                         'description' => 'Use CSS to control the overflow behavior of content within an element.\n

// Create a parent <div> with a fixed height and width.\n
// Add child content inside the parent <div> that exceeds its size (i.e., text or additional elements).\n
// Set the overflow property of the parent <div> to auto to allow scrolling if the content exceeds the container size.\n
// Experiment with overflow-x (horizontal overflow) and overflow-y (vertical overflow) to control scrolling in specific directions.\n
// Set the overflow property to hidden to hide the overflowing content (without scrolling).\n
// Test different overflow values (scroll, visible, auto, hidden) to see how they affect the layout.',
//                         'sample_input' => '',
//                         'expected_output' => '<!DOCTYPE html>\n
// <html lang="en">\n
// <head>\n
//     <meta charset="UTF-8">\n
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">\n
//     <title>CSS Overflow Example</title>\n
//     <style>\n
//         .container {\n
//             width: 300px;\n
//             height: 200px;\n
//             border: 2px solid black;\n
//             padding: 10px;\n
//             overflow: auto;\n
//         }\n
//         .content {\n
//             height: 500px;\n
//             background-color: lightblue;\n
//         }\n
//     </style>\n
// </head>\n
// <body>\n
//     <div class="container">\n
//         <div class="content">\n
//             <p>This is some content that exceeds the container's height and width. Scrollbars will appear.</p>\n
//         </div>\n
//     </div>\n
// </body>\n
// </html>\n
// ',
//                     ]
//                 ],
//             ],
