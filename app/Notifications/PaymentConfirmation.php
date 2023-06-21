<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Registration;
use Illuminate\Http\Request;
class PaymentConfirmation extends Notification
{
    use Queueable;
    private $new_payment_request;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Registration  $new_payment_request)
    {
        $this->new_payment_request = $new_payment_request;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
            'id' => $this->new_payment_request->id,
            'league_id' => $this->new_payment_request->league_id,
            'user_id' => $this->new_payment_request->user_id,




        ];
    }
}
