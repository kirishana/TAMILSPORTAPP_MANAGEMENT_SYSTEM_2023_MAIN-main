<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CancelledEventNotification extends Notification
{
    use Queueable;
    private $notifiedData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifiedData)
    {

        $this->notifiedData=$notifiedData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
            'name'=> $this->notifiedData['name'],
            'body'      => $this->notifiedData['body'],
            'league'      => $this->notifiedData['league'],
            'org'      => $this->notifiedData['org'],
            'ageGroup'=>$this->notifiedData['ageGroup'],
            'gender'=>$this->notifiedData['gender']

            ];
    }
}
