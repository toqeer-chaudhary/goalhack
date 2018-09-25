<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceGenerate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoice-generate', ["subscription"=>$this->subscription])
            ->from("mygoalHack@gmail.com")->to("mygoalHack@gmail.com")
            ->subject("Invoice Generate Notification");
    }
}
