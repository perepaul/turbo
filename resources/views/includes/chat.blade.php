@production
@if (request()->isUser() || request()->isFront())
@if(isset($contact) && !is_null($contact->phone))
<a href="https://api.whatsapp.com/send?phone={{$contact?->phone}}" class="whatsapp-button-wrapper" target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>
@endif
{!! config('app.chat') !!}
@endif)
@endproduction
