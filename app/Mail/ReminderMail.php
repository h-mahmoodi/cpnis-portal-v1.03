<?php

namespace App\Mail;

use App\Models\Reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable\Address;
use Illuminate\Mail\Mailable\Envelope;

class ReminderMail extends Mailable
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
        return $this->from('no-reply@cpnis.com','CPNIS')
        ->subject('New Reminder | CPNIS Working Panel')
        ->view('sendmail.reminder');
    }



}
