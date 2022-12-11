<?php

namespace App\Mail;

use App\Models\Activity;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewActivityMarkdownMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task,$activity;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task,Activity $activity)
    {
        $this->activity=$activity;
        $this->task=$task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@cplogmein.com','CPNIS Portal | New Activity')
        ->markdown('mail.new-Activitymarkdown',[
            'activity' => $this->activity,
            'task' => $this->task,
        ]);
    }
}
