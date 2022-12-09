<?php

namespace App\Jobs;

use App\Mail\NewActivity;
use App\Mail\ReminderMail;
use App\Models\Activity;
use App\Models\Reminder;
use App\Models\User;
use App\Notifications\NewActivityNotification;
use App\Notifications\RemindmeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $activity,$msg;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $user=User::findOrFail($this->activity->worker_id);
        // Notification::sendNow($user,new NewActivityNotification($this->activity,$this->msg));

        $admins=User::where('role','!=',0)->get();
        $reminders=Reminder::whereDate('reminder_date',now()->format('Y/m/d'))->where('status',0)->get();


        foreach($reminders as $reminder){
            $user=User::find($reminder->user_id);
            Mail::to($user->email)->queue(new ReminderMail($reminder));
            $reminder->status=1;
            $reminder->update();
            foreach($admins as $admin){
                Mail::to($admin->email)->queue(new ReminderMail($reminder));
            };
        };

        // $user=User::findOrFail($this->activity->worker_id);

        // Notification::send($users,new RemindmeNotification());

        // Notification::send($reminders,new RemindmeNotification());

        // Mail::to($request->user())->send(new OrderShipped($order));


    }
}
