<?php

namespace App\Console\Commands;

use App\Mail\DueActivityReminderMail;
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
    protected $signature = 'app:send-activity-due-reminder';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for activities due in 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        Log::info('Sending reminder email to user01@gmail.com');
        Mail::to('user01@gmail.com')->queue(new DueActivityReminderMail('user01@gmail.com'));
        Log::info('Email queued successfully.');
        $this->info('Activity due reminders sent successfully!');
    }
}
