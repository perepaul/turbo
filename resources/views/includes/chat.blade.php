@production
    @if (request()->isUser() || request()->isFront())
        {!! config('app.chat') !!}
    @endif)
@endproduction
