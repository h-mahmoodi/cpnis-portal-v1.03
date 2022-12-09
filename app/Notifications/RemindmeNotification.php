<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RemindmeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->subject('You Have A Reminder | '. $notifiable->body.' | CPNIS Portal')
            ->from('dont-reply@cpnis-portal.com', 'CPNIS Portal')
            ->greeting('Hello! ' .$notifiable->getUser->name. ' This Is Reminder')
            ->line(now())
            ->line('-----------')
            ->line('Reminder Date : '.$notifiable->reminder_date)
            ->line('Reminder Descriotion : '.$notifiable->body)
            ->line('-----------')
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
