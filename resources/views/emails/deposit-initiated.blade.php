@component('mail::message')
# Dear {{$deposit->user->firstname}}

Deposit **{{$deposit->reference}}** has been initiated, and our agents are reviewing the payment proof.

We will get in touch with you as soon as the payment is validated.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
