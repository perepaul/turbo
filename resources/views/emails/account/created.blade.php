@component('mail::message')
## Greetings {{$user->firstname}}

Thank you for opening an account with {{config('app.name')}}, you can now proceed to upload your documents for verification after which you are free to deposit, subscribe to a plan and start trading.

To do this, we ask that you provide your proof of identity; The best identification documents are those which are issued by a government authority, which should have your photograph, address and signature. For example a passport or driving license.

Once these documents are received and your account is verified, then you can join over 50,000 people who is already making use of our platform and earning daily passive income.

To ensure you always receive your deposit/withdrawal confirmations and news on new developments, trade assets addition and several others, please add <a href="mailto:{{'support@'.config('domain.base')}}">{{"support@".config('domain.base')}}</a> to your safe senders or white list.

We take pride in our level of customer service and if you have any questions or feedback please don't hesitate to contact us via livechat or email


Warm Regards,<br>
{{ config('app.name') }}
@endcomponent
