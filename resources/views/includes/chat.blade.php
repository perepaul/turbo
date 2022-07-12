@production
@if (request()->isUser() || request()->isFront())
@if(isset($contact) && !is_null($contact->phone) && $contact->whatsapp == 'active')
<a href="https://api.whatsapp.com/send?phone={{$contact?->phone}}" class="whatsapp-button-wrapper" target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>
@endif
@if(!empty($contact->chat_script))
{!! $contact->chat_script !!}
@endif
@endif
@endproduction
