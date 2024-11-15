<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        
*::after, *::before, * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}
.contaner {
    width: 100%;
    height: 100svh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.cardContainer {
    width: 50%;
    height: 60%;
}
.card {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-rows: auto 1fr;
    gap: .5rem;
}
.logo {
    font-size: 1rem;
    text-align: center;
}
.cardHeader {
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 1.5px solid #380bff90;
    padding: 10px;
}
.cardBody {
    border: 1px solid rgb(211 211 211);
    display: grid;
    border-radius: 5px;
    padding: 1rem;
    grid-template-rows: auto 1fr;
    box-shadow: 2px 2px 2px 0px #e3e3e38f;
    min-height: 300px;
}
.classInfo {
    padding-bottom: 10px;
    border-bottom: 1px solid rgb(184, 184, 184);
    font-weight: 500;
}
.activityInfo {
    display: grid;
    grid-template-rows: 20px 1fr;
    padding-block: .5rem;

}
.activityInfo p:first-child {
    font-weight: 600;
    font-size: .70rem;
    text-transform: uppercase;
}
.contentContainer {
    display: grid;
    grid-template-columns: 50px 1fr;
    height: 100%;
    width: 100%;
}
.contentContainer img {
    width: 80%;
    aspect-ratio: 1/1;
    object-fit: cover;
    border-radius: 5px;
    background-color: black;
    padding: 5px;
    border-radius: 100%;
}
.content {
    padding-inline: 10px;
    display: grid;
    grid-template-rows: auto 1fr 50px;
    gap: 5px
}
.instruction{

    height: 60%;
}
.Button-Area p{
    margin-bottom: 10px;
}
.Button{
    padding: 10px;
    background-color: #5C5CD1;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color .3s ease;
}
.Button:hover{
    background-color: #0b5ed7;
}

    </style>
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
                        <p>{{$className ?? "Test"}}</p>
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
                                </div>
                                <div class="instruction">
                                    <p>Instruction Here..</p>
                                </div>
                                <div class="Button-Area">
                                    <p>{{$dueDate ?? "No due date provided"}}</p>
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

