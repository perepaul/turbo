@extends('layouts.activation')
@section('title', 'Step 1')

@section('content')
    <h6 class="text-center mb-1">@yield('title') of 2</h6>
    <form action="{{ route('user.activation.store.step.one') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>Country</strong></label>
            <input type="text" class="form-control" value="{{ old('country') ?? auth('user')->user()->country}}" name="country" placeholder="Country">
            <x-error :key="'country'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>State / Province</strong></label>
            <input type="text" class="form-control" placeholder="State / Province" name="state" value="{{old('state') ?? auth('user')->user()->state}}">
            <x-error :key="'state'" />
        </div>

        <div class="mb-3">
            <label class="mb-1"><strong>City</strong></label>
            <input type="text" class="form-control" placeholder="City" name="city" value="{{old('city') ?? auth('user')->user()->city }}">
            <x-error :key="'city'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Address</strong></label>
            <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address') ?? auth('user')->user()->address }}">
            <x-error :key="'address'" />
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Zip / Postal Code</strong></label>
            <input type="text" class="form-control" placeholder="Zip / Postal Code" name="zip_code" value="{{old('zip_code') ?? auth('user')->user()->zip_code }}">
            <x-error :key="'zip_code'" />
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></button>
        </div>
    </form>
@endsection
