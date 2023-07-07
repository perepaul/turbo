@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('content')
<h4 class="text-center mb-4">Forgot Password</h4>
@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button> {{ session('status') }}.
</div>
@endif
<form action="{{ url('/forgot-password') }}" method="POST">

    @csrf
    <p class="text-center">Forgot your password? That's easy, enter your email address below, we will send you instructions on how to change your password.</p>
    <div class="mb-3">
        <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email Address">
        <x-error key="email" />
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block">Send Link</button>
    </div>
</form>
<div class="new-account mt-3">
    <p><a class="text-primary" href="{{ route('login') }}">Login instead</a></p>
</div>
</div>
@endsection
