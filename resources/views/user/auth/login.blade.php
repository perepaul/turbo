@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <h4 class="text-center mb-4">Sign in your account</h4>
    <form action="{{ route('login') }}" method="POST">
        <x-alert />
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>Email</strong></label>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email Address">
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Password</strong></label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="row d-flex justify-content-between mt-4 mb-2">
            <div class="mb-3">
                <div class="form-check custom-checkbox ms-1">
                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1" name="remember">
                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a> or go back <a
                class="text-primary" href="{{ route('front.index') }}">Home</a></p>
    </div>
    </div>
@endsection
