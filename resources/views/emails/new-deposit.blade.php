@component('mail::message')
# Administrator

A new deposit was initiated on {{config('app.name')}}

Reference : {{$deposit->reference}}

User : {{$deposit->user->name}}

Email : {{$deposit->user->email}}

Amount : {{format_money($deposit->amount)}}

Wallet Address : {{$withdrawal->address}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
