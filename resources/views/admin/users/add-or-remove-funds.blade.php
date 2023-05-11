@extends('layouts.back')
@section('title', 'Add or Remove Funds')
@section('content')
<div class="col-md-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.add-or-remove-funds', $user->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for=""><strong>Action</strong></label>
                        <select name="action" id="action" class="form-select">
                            <option value="">Select Action</option>
                            <option value="add" @if(old("action")=="add" ) selected @endif>Add Funds</option>
                            <option value="remove" @if(old("action")=="remove" ) selected @endif>Remove Funds</option>
                        </select>
                        <x-error key="action" />
                    </div>

                    <div class="form-group">
                        <label for="account"><strong>Account</strong></label>
                        <select name="account" id="account" class="form-select">
                            <option value="">Select Account</option>
                            <option value="balance" @if(old("account")=="balance" ) selected @endif>Add Funds</option>
                            <option value="referral_balance" @if(old("account")=="referral_balance" ) selected @endif>Remove Funds</option>
                        </select>
                        <x-error key="account" />
                    </div>

                    <div class="form-group">
                        <label for="amount"><strong>Amount</strong></label>
                        <input type="text" class="form-control" name="amount" id="amount" value="{{old('amount')}}">
                        <x-error key="amount" />
                    </div>

                    <div class="form-group">
                        <label for="date"><strong>Transaction Date</strong></label>
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{old('date')}}">
                        <x-error key="date" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary w-100 mt-3" type="submit">Commit Action</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection