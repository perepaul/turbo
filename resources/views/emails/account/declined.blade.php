@component('mail::message')
## Hello {{$user->firstname}}

Your account verification has failed, the documents you have uploaded for verification could not be verified by our team, please we request you to upload a document that follows the guidelines written below:


- Document must be issued by a Governmental Body and must be Very Visible in Cases Of Verification and Processing.


Any attempt to upload any document which doesn't follow the guidelines stated above could lead to an indefinite suspension of your trading account.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
