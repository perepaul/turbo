@extends('layouts.back')
@section('title', 'Edit user');
@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div>
    <div class="card">
        <div class="card-body d-flex justify-content-center">
            <div class="col-md-8 col-sm-12">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="{{ old('firstname') ?? $user->firstname }}">
                        <x-error :key="'firstname'" />
                    </div>

                    <div class="form-group">
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
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}">
                        <x-error :key="'phone'" />
                    </div>

                    <div class="form-group">
                        <label for="">Trade mode</label>
                        <select name="trade_mode" id="trade_mode" class="form-select form-control">
                            <option value="">Select mode</option>
                            @foreach (['automatic','manual','dual'] as $mode )
                            <option {{$user->trade_mode == $mode ? 'selected="selected"': ''}} value="{{$mode}}">{{ucfirst($mode)}}</option>
                            @endforeach
                        </select>
                        <x-error :key="'phone'" />
                    </div>

                    <div class="form-group">
                        <label for="">Main Balance</label>
                        <input type="text" class="form-control" name="balance" value="{{ old('balance') ?? $user->balance }}">
                        <x-error :key="'balance'" />
                    </div>

                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country" value="{{ old('country') ?? $user->country }}">
                        <x-error :key="'country'" />
                    </div>

                    <div class="form-group">
                        <label for="">State / Province</label>
                        <input type="text" class="form-control" name="state" value="{{ old('state') ?? $user->state }}">
                        <x-error :key="'state'" />
                    </div>

                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') ?? $user->city }}">
                        <x-error :key="'city'" />
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
</div>
@endsection
