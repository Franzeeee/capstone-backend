<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Log;

class DueActivityReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientEmail;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($recipientEmail, $data)
    {
        $this->recipientEmail = $recipientEmail;
        $this->data = (array) $data;

        Log::info('DueActivityReminderMail: Email queued for1 ' . $recipientEmail);
        Log::info('DueActivityReminderMail: Email queued for2 ' . $this->data['class_name']);
        Log::info('DueActivityReminderMail: Email queued for3 ' . $this->data['due_date']);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Due Activity Reminder Mail',
            from: new Address('codelab@codelab-edu.com', 'CodeLab Team'),
            to: $this->recipientEmail,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            html: 'emails.due-activity-reminder',
            with: [
                'className' => $this->data['class_name'],
                'dueDate' => $this->data['due_date'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
