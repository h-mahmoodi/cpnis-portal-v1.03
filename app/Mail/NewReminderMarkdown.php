<?php

namespace App\Mail;

use App\Models\Reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReminderMarkdown extends Mailable
{
    use Queueable, SerializesModels;


    public $reminder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reminder $reminder)
    {
        $this->reminder=$reminder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@cplogmein.com','CPNIS Portal | Reminder')
        ->markdown('mail.new-ReminderMarkdown',['reminder'=>$this->reminder]);
    }
}
