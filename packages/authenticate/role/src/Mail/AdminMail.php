<?php

namespace Authenticate\Role\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;
   public  $adminData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminData)
    {
        $this->adminData =$adminData;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME').' project password')
        ->subject('Website blocked password')
        ->view('role::adminMail');
    }
}
