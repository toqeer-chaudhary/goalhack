<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.subscription-notification');
        return $this->markdown('emails.subscription-notification', ["key"=>$this->key])
            ->from("mygoalHack@gmail.com")->to("mygoalHack@gmail.com")
            ->subject("GoalHack Plan Subscribed");
    }
}
