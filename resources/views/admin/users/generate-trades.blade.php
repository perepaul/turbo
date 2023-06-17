@extends('layouts.back')
@section('title', 'Add Withdrawal')
@section('content')
<div class="col-md-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.generate-trades', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for=""><strong>User</strong></label>
                        <input type="text" class="form-control" value="{{$user->name}}" readonly disabled>
                        <hr class="my-4">
                    </div>

                    <div class="form-group col-6">
                        <label for="start_date"><strong>Start date</strong></label>
                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}">
                        <x-error key="start_date" />
                    </div>
                    <div class="form-group col-6">
                        <label for="end_date"><strong>End date</strong></label>
                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date')}}">
                        <x-error key="end_date" />
                    </div>

                    <div class="form-group col-6">
                        <label for="min_amount"><strong>Min amount</strong></label>
                        <input type="text" class="form-control" name="min_amount" id="min_amount" value="{{old('min_amount')}}">
                        <x-error key="min_amount" />
                    </div>

                    <div class="form-group col-6">
                        <label for="max_amount"><strong>Max amount</strong></label>
                        <input type="text" class="form-control" name="max_amount" id="max_amount" value="{{old('max_amount')}}">
                        <x-error key="max_amount" />
                    </div>


                    <div class="form-group col-6">
                        <label for="min_profit"><strong>Min profit</strong></label>
                        <input type="text" class="form-control" name="min_profit" id="min_profit" value="{{old('min_profit')}}">
                        <x-error key="min_profit" />
                    </div>

                    <div class="form-group col-6">
                        <label for="max_profit"><strong>Max profit</strong></label>
                        <input type="text" class="form-control" name="max_profit" id="max_profit" value="{{old('max_profit')}}">
                        <x-error key="max_profit" />
                    </div>

                    <div class="form-group col-6">
                        <label for="min_loss"><strong>Min loss</strong></label>
                        <input type="text" class="form-control" name="min_loss" id="min_loss" value="{{old('min_loss')}}">
                        <x-error key="min_loss" />
                    </div>

                    <div class="form-group col-6">
                        <label for="max_loss"><strong>Max loss</strong></label>
                        <input type="text" class="form-control" name="max_loss" id="max_loss" value="{{old('max_loss')}}">
                        <x-error key="max_loss" />
                    </div>

                    <div class="form-group">
                        <label for="total_trades"><strong>Total number of trades</strong></label>
                        <input type="text" class="form-control" name="total_trades" id="total_trades" value="{{old('total_trades')}}">
                        <x-error key="total_trades" />
                    </div>


                    <div class="form-group">
                        <button class="btn btn-outline-primary w-100 mt-3" type="submit">Generate</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection