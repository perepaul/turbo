@component('mail::message')
## Greetings {{$user->firstname}}

Congratulations! Your trading account has been successfully created.
Next, you'll have to verify your account so that you can access the rich features of our trading platform.


Warm Regards,<br>
{{ config('app.name') }}
@endcomponent
