<?php

namespace App\Mail;

use App\Models\FreedomRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreedomMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $freedomRequest;
    public function __construct(FreedomRequest  $freedomRequest)
    {
        $this->freedomRequest = $freedomRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.freedom')->with(["freedomRequest"=>$this->freedomRequest]);
    }
}
