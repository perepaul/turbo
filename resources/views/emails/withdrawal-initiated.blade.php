@component('mail::message')
### Dear {{$withdrawal->user->firstname}}

Your withdrawal of {{format_money($withdrawal->amount)}} to your **{{$withdrawal->method->name}} ({{$withdrawal->method->method->name}})** address has been processed, you should get your withdrawal in about 1-2 hours.

If your withdrawal is not available in your wallet in about 1-2 hours, you can communicate with any of our livechat hot lines available below:

Whatsapp: {{$contact->phone}}

Telegram: <a href="{{$contact->telegram}}">Visit Link</a>


Email: {{$contact->support_email}}

Or you can communicate via the 247 livechat.

Cheers to profitable trading.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
