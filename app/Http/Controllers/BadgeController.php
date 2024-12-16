<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\Submission;

class BadgeController extends Controller
{
    public function issueBadge($activityId)
    {
        $activity = Activity::findOrFail($activityId);

        $badgeExist = Badge::where('activity_id', $activityId)->exists();

        if ($badgeExist) {
            return response()->json(['message' => 'Badges already issued for this activity'], 200);
        }

        $submissions = Submission::where('activity_id', $activityId)
            ->orderBy('score', 'desc')
            ->orderBy('time_taken', 'asc')
            ->take(3)
            ->get();

        $badgeTypes = ['Gold', 'Silver', 'Bronze'];


        // Initialize the badge array
        $badge = [];

        // Issue badges to top 3 students
        foreach ($submissions as $index => $submission) {
            $createdBadge = Badge::create([
                'activity_id' => $activityId,
                'student_id' => $submission->student_id,
                'badge_type' => $badgeTypes[$index], // Gold, Silver, or Bronze
                'title' => $badgeTypes[$index] . ' Badge', // E.g., "Gold Badge"
                'description' => 'Earned a ' . $badgeTypes[$index] . ' Badge for "' . $activity->title . '" Activity!',
            ]);

            // Store the created badge in the badge array
            $badge[] = $createdBadge;
        }

        return response()->json(['message' => 'Badges issued successfully', 'data' => $badge]);
    }

    public function fetchActivityBadge($activityId)
    {
        $badges = Badge::where('activity_id', $activityId)->get();
        return response()->json($badges);
    }

    public function fetchClassBadges($classId)
    {
        $badges = Badge::join('activities', 'badges.activity_id', '=', 'activities.id')
            ->join('users', 'badges.student_id', '=', 'users.id')
            ->where('activities.course_class_id', $classId)
            ->select('badges.*', 'users.name as student_name', 'activities.title as activity_title')
            ->get();
        return response()->json($badges);
    }

    public function fetchStudentBadge($studentId, $classId)
    {
        $badges = Badge::join('activities', 'badges.activity_id', '=', 'activities.id')
            ->where('badges.student_id', $studentId)
            ->where('activities.course_class_id', $classId)
            ->select('badges.*', 'activities.title as activity_title')
            ->get();

        return response()->json($badges);
    }
}
