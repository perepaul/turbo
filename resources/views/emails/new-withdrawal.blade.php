@component('mail::message')
# Dear Admin

A new withdrawal request was made by:

Reference : {{$withdrawal->reference}}

Name : {{$withdrawal->user->name}}

Email : {{$withdrawal->user->email}}

Amount : {{format_money($withdrawal->amount)}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
