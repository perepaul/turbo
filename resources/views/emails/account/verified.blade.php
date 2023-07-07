@component('mail::message')
## Hello {{$user->firstname}}

Your Documents have been reviewed and your account has been verified.


Login, access your customised dashboard where you can make a deposit, subscribe to a plan and commence trading.



Warm Regards,<br>
{{ config('app.name') }}
@endcomponent
