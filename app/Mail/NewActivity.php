<?php

namespace App\Mail;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class NewActivity extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $sender,$worker,$activity;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activity_id,$sender_id,$worker_id)
    {
        $this->activity=Activity::findOrFail($activity_id);
        $this->sender=User::findOrFail($sender_id);
        $this->worker=User::findOrFail($worker_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@cplogmein.com', 'noreply_New Activity')->view('sendmail.index');
    }
}
