@extends('layouts.back')
@section('title', 'Two factor Authentication')
@section('content')

<div class="row">
    @if(Laravel\Fortify\Features::canManageTwoFactorAuthentication())
    <div class="col-md-4 mx-auto">
        <x-message />
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center text-center">
                    <form action="{{url('/user/two-factor-authentication')}}" method="POST">
                        @csrf
                        @if (auth()->user()->two_factor_secret)
                        @method('DELETE')
                        <div class="my-4">
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                        <div class="">
                            <button type="button" class="btn-outline-success btn btn-sm" id="recovery-modal-launcher" data-toggle="modal" data-target="#recovery-modal">Recovery Codes</button>
                            <button class="btn-outline-danger btn btn-sm">Disable 2FA</button>
                        </div>
                        @else
                        <button class="btn btn-outline-primary btn-sm align-self-center my-5">
                            Enable 2FA
                        </button>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </div>
    @endif
</div>

@endsection

@push('css')
<style>
    .form-group {
        margin-bottom: 20px;
    }
</style>
@endpush

@push('modals')
@if(auth()->user()->two_factor_secret)
<div class="modal fade" id="recovery-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">2FA Recovery codes</h5>
                <span class="fs-24 text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="cursor:pointer">&times;</span>
                </span>
            </div>
            <div class="modal-body">
                @foreach (auth()->user()->recoveryCodes() as $code)
                <ol class="list-group">
                    <li class="list-group-item" style="cursor: pointer"><span class="copy">{{$code}}</span> <span class="text-info ml-3">copy</span></li>
                </ol>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endpush

@push('js')
<script>
    function copytext( text, successMsg = 'Copied to clipboard', failMessage = 'Oops, failed to copy to clipboard' ) {
        if ( !navigator.clipboard ) return copyFallBack( text, successMsg, failMessage );
        navigator.clipboard.writeText( text ).then(
            () => toast( successMsg ),
            () => toast( failMessage, 'error' )
    )
    }
    document.querySelectorAll('.list-group-item').forEach(element => {
        element.addEventListener('click', e => copytext($(element).find('span.copy').text()))
    });
</script>
@endpush

@push('css')
<style>
    .list-group-item span:last-child {
        display: none;
    }

    .list-group-item:hover span:last-child {
        display: inline;
    }
</style>
@endpush

{{-- @push('js')
    <script>
        $(document).on('change', '[name=country]', (e) => {
            let value = e.target.value;
            var element = '[name=state]'
            var firstChild = element + ' option:first-child';
            var text = "Select Province/State"
            $(element + ' option').not(':first-child').remove()
            $(firstChild).html('Loading...')

            $.get("{{ route('admin.state') }}", {
country_id: value
}).then(json => {
$(firstChild).html(text);
$(element).append(json.data);
}, err => {
alert('Failed to load pronvince/state, try again.')
console.error(err);
})
})

$(document).on('change', '[name=state]', (e) => {
alert('changed');
let state_id = e.target.value;
var country_id = $('[name=country').val();
var element = '[name=city]'
var firstChild = element + ' option:first-child';
var text = "Select City"
$(element + ' option').not(':first-child').remove()
$(firstChild).html('Loading...')

$.get("{{ route('admin.city') }}", {
country_id,
state_id
}).then(json => {
$(firstChild).html(text);
$(element).append(json.data);
}, err => {
$(firstChild).html(text);
alert('Failed to load pronvince/state, try again.')
console.error(err);
})
})
</script>
@endpush --}}
