<?php

namespace App\Notifications;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewActivityNotification extends Notification
{
    use Queueable;

    public $sender,$worker,$activity,$msg;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activity,$msg)
    {
        $this->activity=Activity::findOrFail($activity->id);
        $this->sender=User::findOrFail($activity->sender_id);
        $this->worker=User::findOrFail($activity->worker_id);
        $this->msg=$msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)

                    ->subject('You Have New Activity | CPNIS Portal')
                    ->from('dont-reply@cpnis-portal.com', 'CPNIS Portal')
                    ->greeting('Hello! '.$this->worker->name)
                    ->line(now())
                    ->line('-----------')
                    ->line($this->msg)
                    ->line("Activity : #".$this->activity->id)
                    ->line("Created At : ".$this->activity->created_at)
                    ->line("From : ".$this->sender->name)
                    ->line("Details : ".$this->activity->description)
                    ->action('Enter To Portal', url('/'))
                    ->line('Thank you');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
