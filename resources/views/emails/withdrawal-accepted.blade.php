@component('mail::message')
# Dear {{$withdrawal->user->firstname}}

The withdrawal request of {{format_money($withdrawal->amount)}} has been accepted.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
