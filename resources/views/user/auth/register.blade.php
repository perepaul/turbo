@extends('layouts.auth')
@section('title', 'Register')

@push('css')
    <script
        src="https://www.google.com/recaptcha/api.js"
        async
        defer
    ></script>
@endpush

@section('content')
    <h4 class="text-center mb-4">Sign up your account</h4>
    @if (session()->has('user') && is_null(session()->get('user')))
        <div class="alert alert-outline-danger">
            The referral link is invalid.
        </div>
    @endif
    <form
        action="{{ route('register') }}"
        method="POST"
        id="register-form"
    >
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>First Name</strong></label>
            <input
                type="text"
                class="form-control"
                placeholder="Firstname"
                value="{{ old('firstname') }}"
                name="firstname"
            >
            <x-error :key="'firstname'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Last Name</strong></label>
            <input
                type="text"
                class="form-control"
                placeholder="Lastname"
                value="{{ old('lastname') }}"
                name="lastname"
            >
            <x-error :key="'lastname'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Email</strong></label>
            <input
                type="email"
                class="form-control"
                placeholder="hello@example.com"
                value="{{ old('email') }}"
                name="email"
            >
            <x-error :key="'email'" />
        </div>
        @if (!is_null(session()->get('user')))
            <div class="mb-3">
                <label class="mb-1"><strong>Referrer</strong></label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Lastname"
                    value="{{ session()->get('user')->name }}"
                    name="lastname"
                    disabled
                    readonly
                >
            </div>
        @endif
        <div class="mb-3">
            <label class="mb-1"><strong>Password</strong></label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
            >
            <x-error :key="'password'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Password</strong></label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirm Password"
            >
        </div>
        <input
            type="text"
            name="username"
            style="display: none"
        >
        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}">
        </div>
        <x-error key="g-recaptcha-response" />
        <div class="text-center mt-4">
            <button
                type="submit"
                class="btn btn-primary btn-block g-recaptcha"
                id="submit-register"
            >Sign up</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Already have an account? <a
                class="text-primary"
                href="{{ route('login') }}"
            >Sign in</a> or go back <a
                class="text-primary"
                href="{{ route('front.index') }}"
            >Home</a></p>
    </div>
@endsection
@push('js')
@endpush
