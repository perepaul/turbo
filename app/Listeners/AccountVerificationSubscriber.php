<?php

namespace App\Listeners;

use App\Events\Account\{Created, Declined, Activated};
use App\Mail\Account\CreatedMailable;
use App\Mail\Account\DeclinedMailable;
use App\Mail\Account\VerifiedMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class AccountVerificationSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the accout created event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleCreated($event)
    {
        $this->sendMail($event->user, new CreatedMailable($event->user));
    }

    /**
     * Handle the accout declined event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleDeclined($event)
    {
        $this->sendMail($event->user, new DeclinedMailable($event->user));
    }


    /**
     * Handle the accout verified event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleVerified($event)
    {
        $this->sendMail($event->user, new VerifiedMailable($event->user));
    }


    private function sendMail($to, $mailable)
    {
        Mail::to($to)->send($mailable);
    }

    public function subscribe($events)
    {
        return [
            Created::class => 'handleCreated',
            Declined::class => 'handleDeclined',
            Activated::class => 'handleVerified',
        ];
    }
}
