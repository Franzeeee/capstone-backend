<?php

namespace App\Console\Commands;

use App\Mail\DueActivityReminderMail;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\CourseClass;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SendActivityDueReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activity:check-due';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if any activity is due in the next 24 hours and send email reminders to students';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $now = Carbon::now('Asia/Manila'); // Get current time in Manila timezone
        $formattedNow = $now->format('Y-m-d H:i:s');
        $formattedEndDate = $now->copy()->addHours(24)->format('Y-m-d H:i:s');

        // Add a tolerance of 1 minute before and after the 24-hour mark
        $toleranceStart = Carbon::parse($formattedEndDate)->subMinutes(1)->format('Y-m-d H:i:s'); // 1 minute before 24 hours
        $toleranceEnd = Carbon::parse($formattedEndDate)->addMinutes(1)->format('Y-m-d H:i:s'); // 1 minute after 24 hours

        $this->info('Checked for activities due in the next 24 hours.');

        // Fetch activities that are within the tolerance window (exactly 24 hours +/- 1 minute)
        $activities = Activity::where('end_date', '>=', $toleranceStart)
            ->where('end_date', '<=', $toleranceEnd)
            ->where('dueReminder', false)
            ->get();


        // Log the count of activities found
        Log::info('Found ' . $activities->count() . ' activities due in the next 24 hours.');

        foreach ($activities as $activity) {
            // Get the course class associated with this activity
            $courseClass = $activity->courseClass;

            Log::info('Activity: ' . $activity->title . ' is due in ' . $activity->end_date . ' for class: ' . $courseClass->name);

            // Get all students associated with the course class via the pivot table (class_student)
            $students = $activity->courseClass->students;

            foreach ($students as $student) {
                // Log the student's email instead of sending an email
                Log::info('Would send reminder email to: ' . $student->email);
                Mail::to($student->email)->queue(new DueActivityReminderMail($student->email));
            }
            $activity->update(['dueReminder' => true]);
            $this->info('Activity due reminders sent successfully!');
        }
    }
}
