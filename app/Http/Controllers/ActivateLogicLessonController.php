<?php

namespace App\Http\Controllers;

use App\Models\ActivateLogicLesson;

class ActivateLogicLessonController extends Controller
{
    public function update($id)
    {
        // Find the lesson
        $lesson = ActivateLogicLesson::where('class_id', $id)->first();

        // Check if the lesson exists
        if (!$lesson) {
            return response()->json(['message' => 'Lesson not found'], 404);
        }

        // Update the lesson status to 'active'
        $lesson->status = 'active';
        $lesson->save();

        // Return a success message
        return response()->json(['message' => 'Lesson activated successfully'], 200);
    }


    public function deactivate($id)
    {
        // Find the lesson
        $lesson = ActivateLogicLesson::where('class_id', $id)->first();

        // Check if the lesson exists
        if (!$lesson) {
            return response()->json(['message' => 'Lesson not found'], 404);
        }

        // Update the lesson status to 'inactive'
        $lesson->status = 'inactive';
        $lesson->save();

        // Return a success message
        return response()->json(['message' => 'Lesson deactivated successfully'], 200);
    }

    public function status($id)
    {
        // Find the lesson
        $lesson = ActivateLogicLesson::where('class_id', $id)->first();

        // Check if the lesson exists
        if (!$lesson) {
            return response()->json(['message' => 'Lesson not found'], 404);
        }

        // Return the status of the lesson
        return response()->json(['status' => $lesson->status], 200);
    }
}
