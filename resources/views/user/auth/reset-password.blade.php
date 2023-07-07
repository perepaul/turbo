@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
<h4 class="text-center mb-4">@yield('title')</h4>
@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button> {{ session('status') }}.
</div>
@endif
<form action="{{ url('/reset-password') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $request->input('email') }}" name="email">
    <input type="hidden" value="{{ $request->route('token') }}" name="token">

    <div class="mb-3">
        <label class="mb-1"><strong>New Password</strong></label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <x-error key="password" />
    </div>

    <div class="mb-3">
        <label class="mb-1"><strong>Confirm password</strong></label>
        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block">Reset password</button>
    </div>
</form>
<div class="new-account mt-3">
    <p><a class="text-primary" href="{{ route('login') }}">Login instead</a></p>
</div>
</div>
@endsection
