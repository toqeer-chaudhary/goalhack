<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApproveDisapproveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $userName     ;
    private $userEmail    ;
    private $actualDate   ;
    private $comment      ;
    private $managerName  ;
    private $managerEmail ;
    private $subjects      ;
    private $status       ;


    public function __construct($userName, $userEmail, $actualDate, $comment, $managerName, $managerEmail, $subject, $status)
    {
        $this->userName     = $userName     ;
        $this->userEmail    = $userEmail    ;
        $this->actualDate   = $actualDate   ;
        $this->comment      = $comment      ;
        $this->managerName  = $managerName  ;
        $this->managerEmail = $managerEmail ;
        $this->subjects     = $subject      ;
        $this->status       = $status       ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.approve',
            ["userName"=>$this->userName,"managerName"=>$this->managerName,
                "comment"=>$this->comment,"actualDate"=>$this->actualDate,"status"=>$this->status])
            ->from($this->managerEmail)->to($this->userEmail)
            ->subject(ucFirst($this->subjects));
    }
}
