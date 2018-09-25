<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAssignment extends Mailable
{
    use Queueable, SerializesModels;

    private $userName;              // i.e abc
    private $userEmail;             // abc@gmail.com
    private $managerName;           // xyz
    private $managerEmail;          // xyz@gmail.com
    private $functionality;         // vision,strategy,kpi,goal etc
    private $functionalityName;     // strategy->name (name of strategy) etc
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName,$userEmail,$functionality,$functionalityName,$managerName,$managerEmail)
    {
        $this->userName           = $userName          ;
        $this->userEmail          = $userEmail         ;
        $this->functionality      = $functionality     ;
        $this->functionalityName  = $functionalityName ;
        $this->managerName        = $managerName       ;
        $this->managerEmail       = $managerEmail      ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.userAssignment',
            ["userName"=>$this->userName,"functionality"=>$this->functionality,
                "functionalityName"=>$this->functionalityName,"managerName"=>$this->managerName])
            ->from($this->managerEmail)->to($this->userEmail)
            ->subject(ucFirst($this->functionality)." Assignment");
    }
}
