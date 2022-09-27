<?php

namespace Authenticate\Role\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;
   public  $clientData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clientData)
    {
        //
        $this->clientData =$clientData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME').' project password')
        ->subject('Website blocked')
        ->view('role::clientMail');
    }
}
