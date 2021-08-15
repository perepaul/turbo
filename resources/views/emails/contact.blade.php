@component('mail::message')
## Dear Admin

{{$data['name']}} Sent you a contact message.

{{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
