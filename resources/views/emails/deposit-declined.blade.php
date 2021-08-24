@component('mail::message')
# Dear {{$deposit->user->firstname}}

Your deposit of {{format_money($deposit->amount)}} was declined.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
