<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/due-reminder.css')}}">
</head>
<body>
    <div class="contaner">
        <div class="cardContainer">
            <p class="logo">Codelab</p>
            <div class="card">
                <div class="cardHeader">
                    <h3>Due Activity Reminder</h3>
                </div>
                <div class="cardBody">
                    <div class="classInfo">
                        <p>Introduction to web development</p>
                    </div>
                    <div class="activityInfo">
                        <p>Due Tomorrow</p>
                        <div class="contentContainer">
                            <div class="logo">
                                <img src="{{asset('icon/bell.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div>
                                <p>Assignment 1</p>
                                <p>Complete the assignment 1 before the due date</p>                                    
                                </div>
                                <div class="instruction">
                                    <p>Instruction Here..</p>
                                </div>
                                <div class="Button-Area">
                                    <p>Due Date Here</p>
                                    <button class="Button">View Assessment</button>                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
