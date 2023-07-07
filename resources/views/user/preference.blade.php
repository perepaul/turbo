@extends('layouts.back')
@section('title', 'Change password')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <x-message />
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.preference.update') }}" class="col-md-8 mx-auto" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Prefered Account Currency</label>
                        <select name="prefered_account_currency" id="" class="form-control">
                            <option value="">Select Currency</option>
                            @foreach ($currencies as $currency)
                            <option value="{{$currency->id}}" @if(auth('user')->user()->currency_id == $currency->id) selected @endif>{{$currency->name}}</option>
                            @endforeach
                            <x-error :key="'prefered_account_currency'" />
                        </select>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
