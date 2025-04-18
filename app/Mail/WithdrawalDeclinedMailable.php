<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalDeclinedMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($withdrawal)
    {
        $this->withdrawal = $withdrawal;

        $this->subject("Withdrawal Declined");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.withdrawal-declined');
    }
}
