@component('mail::message')
# Dear {{$withdrawal->user->firstname}}

We recieved a withdrawal request of {{format_money($withdrawal->amount)}} from your account.

Please wait while our agents process your request.

**Note:** Withdrawals take up to 24hours to be processed.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
