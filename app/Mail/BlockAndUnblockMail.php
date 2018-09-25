<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockAndUnblockMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $userName     ;
    public $userEmail    ;
    public $comment      ;
    public $managerName  ;
    public $managerEmail ;
    public $subject      ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $userEmail, $comment, $managerName, $managerEmail, $subject)
    {
        $this->userName     = $userName     ;
        $this->userEmail    = $userEmail    ;
        $this->comment      = $comment      ;
        $this->managerName  = $managerName  ;
        $this->managerEmail = $managerEmail ;
        $this->subject      = $subject      ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.blockAndUnblock',
            ["userName"=>$this->userName,"managerName"=>$this->managerName,
                "comment"=>$this->comment])
            ->from($this->managerEmail)->to($this->userEmail)
            ->subject(ucFirst($this->subject));
    }
}
