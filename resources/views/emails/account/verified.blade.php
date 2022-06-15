@component('mail::message')
## Hello {{$user->firstname}}

Your Document have been Reviewed and Verification Process Completed Successfully.


Login Now to Access Your Dashboard where you can make a deposit, subscribe to a plan and commence trading.


Cheers to profitable trading.


Warm Regards,<br>
{{ config('app.name') }}
@endcomponent
