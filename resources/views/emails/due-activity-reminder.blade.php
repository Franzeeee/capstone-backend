<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
    <style>
        .contaner {
            width: 100%;
            height: 100svh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        .cardHeader {
            display: flex;
            justify-content: center;
            align-items: center;
            /* border-bottom: 1.5px solid #380bff90; */
            padding: 10px;
            font-size: 1.2rem
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
            grid-template-columns: 1fr;
            height: 100%;
            width: 100%;
        }
        .content {
            padding-inline: 10px;
            display: grid;
            grid-template-rows: auto 1fr 50px;
            gap: 5px;
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
            transition: all .3s ease;
        }
        .Button:hover{
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="contaner">
        <div class="cardContainer">
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
                            <div class="content">
                                <div>
                                <p>{{$activityName ?? "Activity Name"}}</p>                               
                                </div>
                                <div class="instruction">
                                    <p>{{$description ?? ""}}</p>
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

