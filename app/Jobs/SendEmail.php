<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewActivityNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    public $activity,$msg;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($activity,$msg)
    {
        $this->activity=$activity;

        $this->msg=$msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user=User::findOrFail($this->activity->worker_id);
        Notification::sendNow($user,new NewActivityNotification($this->activity,$this->msg));
    }
}
