<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
</head>
<body style="margin: 0; padding: 0; width: 100%; height: 100%; box-sizing: border-box; font-family: Arial, sans-serif; display: flex; justify-content: center;">
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100svh; margin: 0; padding: 0;">
        <div style="width: 50%; max-width: 600px; height: auto; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(98, 98, 98, 0.1);">
            <div style="display: grid; grid-template-rows: auto 1fr; gap: 0.5rem;">
                <!-- Header -->
                <div style="text-align: center; padding: 10px; font-size: 1.2rem; font-weight: bold;">
                    <h3 style="margin: 0; font-size: 1.2rem;">Due Activity Reminder</h3>
                </div>
                <!-- Body -->
                <div style="border: 1px solid rgb(211, 211, 211); border-radius: 5px; padding: 1rem; min-height: 300px;">
                    <!-- Class Info -->
                    <div style="border-bottom: 1px solid rgb(184, 184, 184); font-weight: 500; padding-bottom: 10px; margin-bottom: 10px;">
                        <p style="margin: 0;">{{$className ?? "Test"}}</p>
                    </div>
                    <!-- Activity Info -->
                    <div>
                        <p style="font-weight: 600; font-size: 0.7rem; text-transform: uppercase; margin: 0;">Due Tomorrow</p>
                        <div>
                            <p style="font-weight: 500; font-size: 1rem; margin: 10px 0;">{{$activityName ?? "Activity Name"}}</p>
                            <div style="padding: 10px 0; font-size: 0.9rem; line-height: 1.5;">
                                <p style="margin: 0;">{{$description ?? ""}}</p>
                            </div>
                            <div style="padding: 10px 0;">
                                <p style="margin-bottom: 10px; font-size: 0.9rem; color: #666;">{{$dueDate ?? "No due date provided"}}</p>
                                <button style="padding: 10px 20px; background-color: #5C5CD1; color: white; border: none; border-radius: 5px; cursor: pointer; transition: all 0.3s ease; font-size: 0.9rem;">
                                    View Assessment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
