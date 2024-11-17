<?php

namespace App\Http\Controllers;

use App\Models\ActivateLogicLesson;

class ActivateLogicLessonController extends Controller
{
    public function update($id)
    {
        ActivateLogicLesson::where('class_id', $id)->update(['status' => 'active']);

        return response()->json([
            'message' => 'Lesson activated successfully'
        ], 200);
    }

    public function deactivate($id)
    {
        ActivateLogicLesson::where('class_id', $id)->update(['status' => 'inactive']);

        return response()->json([
            'message' => 'Lesson deactivated successfully'
        ], 200);
    }

    public function status($code)
    {
        $lesson = ActivateLogicLesson::where('class_code', $code)->first();

        if (!$lesson) {
            return response()->json([
                'message' => 'Lesson not found'
            ], 404);
        }

        return response()->json([
            'status' => $lesson->status
        ], 200);
    }
}
