<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApproveOrDisapproveNotification extends Notification
{
    use Queueable;

    private $managerName ;
    private $actualDate  ;
    private $message     ;
    private $userName       ;
    private $timeOfDelivery ;
    private $goalDataId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($managerName,$actualDate,$message,$userName,$goalDataId)
    {
        $this->managerName = $managerName;
        $this->actualDate  = $actualDate;
        $this->message     = $message;
        $this->userName    = $userName;
        $this->goalDataId    = $goalDataId;
        $this->timeOfDelivery = Carbon::now()->toFormattedDateString();
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
            "managerName" => $this->managerName,
            "actualDate"  => $this->actualDate,
            "message"     => $this->message,
            "userName"    => $this->userName,
            "goalDataId"  => $this->goalDataId,
            // when this notification delivered
            'timeOfDelivery' => $this->timeOfDelivery,
        ];
    }
}
