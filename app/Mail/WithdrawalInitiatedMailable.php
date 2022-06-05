<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalInitiatedMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal, $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($withdrawal, $contact)
    {
        $this->withdrawal = $withdrawal;
        $this->contact = $contact;
        $this->subject("Withdrawal {$withdrawal->reference} initiated");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.withdrawal-initiated');
    }
}
