<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailsMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $m,$user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$message,$subject, $attahData = [])
    {
        $this->user = $user;
        $this->m = $message;
        $this->subject($subject);
        if(count($attahData)){
            foreach($attahData as $d) {
                $this->attach(public_path(config('dir.attachments').$d));
            }
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.email');
    }
}
