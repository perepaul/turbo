@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<h4 class="text-center mb-4">Sign up your account</h4>
<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="mb-1"><strong>First Name</strong></label>
        <input type="text" class="form-control" placeholder="Firstname" value="{{old('firstname')}}" name="firstname">
        <x-error :key="'firstname'" />
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Last Name</strong></label>
        <input type="text" class="form-control" placeholder="Lastname" value="{{old('email')}}" name="lastname">
        <x-error :key="'lastname'" />
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Email</strong></label>
        <input type="email" class="form-control" placeholder="hello@example.com" value="{{old('email')}}" name="email">
        <x-error :key="'email'" />
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Password</strong></label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <x-error :key="'password'" />
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Password</strong></label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
    </div>
</form>
<div class="new-account mt-3">
    <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a> or go back <a class="text-primary" href="{{route('front.index')}}">Home</a></p>
</div>
@endsection
