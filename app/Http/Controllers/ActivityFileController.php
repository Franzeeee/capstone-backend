<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityFileController extends Controller
{
    public function fetchFiles($activityId)
    {
        $activity = Activity::find($activityId);

        if (!$activity) {
            return response()->json([
                'message' => 'Activity not found.'
            ], 404);
        }

        $files = $activity->activityFiles;

        return response()->json([
            'files' => $files
        ]);
    }
}
