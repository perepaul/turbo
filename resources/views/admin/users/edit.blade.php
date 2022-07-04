@extends('layouts.back')
@section('title', 'Edit user');
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-center">
        <div class="col-md-8 col-sm-12">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="row">
                @csrf

                <div class="form-group col-md-6">
                    <label for="">Firstname</label>
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') ?? $user->firstname }}">
                    <x-error :key="'firstname'" />
                </div>

                <div class="form-group col-md-6">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" name="lastname" value="{{  old('lastname') ??$user->lastname }}">
                    <x-error :key="'lastname'" />
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{  old('email') ??$user->email }}">
                    <x-error :key="'email'" />
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" value="{{ $user->visible_password }}" disabled>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}">
                    <x-error :key="'phone'" />
                </div>

                {{-- <div class="form-group">
                    <label for="">Trade mode</label>
                    <select name="trade_mode" id="trade_mode" class="form-select">
                        <option value="">Select mode</option>
                        @foreach (['automatic','manual','dual'] as $mode )
                        <option {{$user->trade_mode == $mode ? 'selected="selected"': ''}} value="{{$mode}}">{{ucfirst($mode)}}</option>
                        @endforeach
                    </select>
                    <x-error :key="'trade_mode'" />
                </div> --}}

                <div class="form-group col-md-6">
                    <label for="">Main Balance</label>
                    <input type="text" class="form-control" name="balance" value="{{ old('balance') ?? $user->balance }}">
                    <x-error key="balance" />
                </div>

                <div class="form-group col-md-6">
                    <label for="">Demo Balance</label>
                    <input type="text" class="form-control" name="demo_balance" value="{{ old('demo_balance') ?? $user->demo_balance }}">
                    <x-error key="demo_balance" />
                </div>

                <div class="form-group col-md-6">
                    <label for="">Country</label>
                    <select name="country" id="country" class="form-select">
                        <x-countries country="{{$user->country}}" />
                    </select>
                    <x-error key="country" />
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">State/Region</label>
                    <select name="state" id="state" class="form-select">
                        <x-states selected="{{$user->state}}" country="{{$user->country}}" />
                    </select>
                    <x-error key="state" />
                </div>

                <div class="form-group col-md-8">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') ?? $user->city }}">
                    <x-error :key="'city'" />
                </div>
                <div class="form-group col-md-4">
                    <label for="">Zip/Postal Code</label>
                    <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') ?? $user->zip_code }}">
                    <x-error key="zip_code" />
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') ?? $user->address }}">
                    <x-error :key="'address'" />
                </div>



                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-secondary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
