@extends('layouts.auth')
@section('title', 'Two Factor Authentication')
@section('content')
<h4 class="text-center mb-4 fw-bold">
    <svg width="44" height="24" viewBox="0 0 44 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M23.3 8C21.65 3.34 17.22 0 12 0C5.37 0 0 5.37 0 12C0 18.63 5.37 24 12 24C17.22 24 21.65 20.66 23.3 16H32V24H40V16H44V8H23.3ZM12 16C9.79 16 8 14.21 8 12C8 9.79 9.79 8 12 8C14.21 8 16 9.79 16 12C16 14.21 14.21 16 12 16Z" fill="#030300" />
    </svg>
</h4>
<div id="code">
    <form action="{{ url('/two-factor-challenge ') }}" method="POST">
        <p class="text-center">
            Please enter your TOTP code from your authenticator device.
        </p>
        @error('code')
        <div class="alert alert-outline-danger alert-sm fs-12">
            {{$message}}
        </div>
        @enderror
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>TOTP code</strong></label>
            <input type="code" class="form-control" placeholder="TOTP code" name="code">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Authenticate</button>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <a href="{{route('login')}}" class="text-default">&laquo; Back</a>
            <span class="toggle">Don't have your 2FA device?</span>
        </div>
    </form>
</div>
<div id="recovery" class="d-none">
    <form action="{{ url('/two-factor-challenge ') }}" method="POST">
        @csrf
        <p class="text-center">
            Please enter any of your recovery codes to continue.
        </p>
        @error('recovery_code')
        <div class="alert alert-outline-danger alert-sm fs-12">
            {{$message}}
        </div>
        @enderror
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>Recovery code</strong></label>
            <input type="text" class="form-control" placeholder="Recovery code" name="recovery_code">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Recover</button>
        </div>
        <div class="text-end mt-3">
            <span class="toggle"> &laquo; Back</span>
        </div>
    </form>
</div>
</form>
@endsection

@push('js')
<script>
    function toggleDisplay()
    {
        var code = $('#code')
        var recovery = $('#recovery')
        if(code.hasClass('d-none')){
            code.removeClass('d-none');
            recovery.addClass('d-none')
        }else{
            recovery.removeClass('d-none');
            code.addClass('d-none')
        }
    }
    $('span.toggle').on('click',e => toggleDisplay())
</script>
@endpush
@push('css')
<style>
    span.toggle {
        cursor: pointer;
    }
</style>
@endpush
