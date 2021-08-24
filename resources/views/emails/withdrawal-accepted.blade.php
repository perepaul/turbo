@component('mail::message')
# Dear {{$withdrawal->user->firstname}}

The withdrawal request of {{format_mone($withdrawal->amount)}} has been accepted.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

