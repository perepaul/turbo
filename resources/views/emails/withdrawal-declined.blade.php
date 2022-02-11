@component('mail::message')
# Dear {{$withdrawal->user->firstname}}

The withdrawal request of {{format_money($withdrawal->amount)}} has been declined

Thanks,<br>
{{ config('app.name') }}
@endcomponent
