@component('mail::message')
# Dear {{$deposit->user->firstname}}

Your deposit of **{{format_money($deposit->amount)}}** has been approved.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
