<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function createNotification(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required',
            'status' => 'required',
            'type' => 'required',
            'class_id' => 'required|exists:course_class,id',
            'class_name' => 'required',
            'class_section' => 'required'
        ]);

        $notification = Notification::create($request->all());
    }

    public function fetchNotifications($id)
    {
        $notifications = Notification::where('user_id', $id)->get();
        $notifications->load('class');
        foreach ($notifications as $notification) {
            $notification->class_code = $notification->class->classCode->code;
        }
        if ($notifications->isEmpty()) {
            return response()->json([
                'message' => 'No notifications found',
                'notifications' => []
            ], 200);
        }

        return response()->json([
            'notifications' => $notifications,
            'message' => 'Notifications fetched successfully'
        ], 200);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->status = true;
        $notification->save();

        return response()->json([
            'message' => 'Notification marked as read',
            'notification' => $notification
        ], 200);
    }

    public function deleteNotification($id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        return response()->json([
            'message' => 'Notification deleted successfully'
        ], 200);
    }
}
