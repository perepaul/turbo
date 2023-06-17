@extends('layouts.back')
@section('title', 'Add Withdrawal')
@section('content')
<div class="col-md-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.add-withdrawal', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for=""><strong>User</strong></label>
                        <input type="text" class="form-control" value="{{$user->name}}" readonly disabled>
                        <hr class="my-4">
                    </div>


                    <div class="form-group">
                        <label for=""><strong>Withdrawal method</strong></label>
                        <select name="method" id="" class="form-select">
                            <option value="">Select withdrawal Method</option>
                            @foreach ($methods as $method)
                            <option value="{{ $method->id }}" data-address="{{$method->address}}" @if (old('method')==$method->id) selected @endif>
                                {{ $method->name }} ({{$method->method->name}})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount"><strong>Amount</strong></label>
                        <input type="text" class="form-control" name="amount" id="amount" value="{{old('amount')}}">
                        <x-error key="amount" />
                    </div>

                    <div class="form-group">
                        <label for=""><strong>Status</strong></label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Select status</option>
                            <option value="pending" @if(old("status")=='pending' ) selected @endif>Pending</option>
                            <option value="approved" @if(old("status")=='approved' ) selected @endif>Approved</option>
                            <option value="declined" @if(old("status")=='declined' ) selected @endif>Declined</option>
                        </select>
                        <x-error key="status" />
                    </div>

                    <div class="form-group">
                        <label for="date"><strong>Transaction Date</strong></label>
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{old('date')}}">
                        <x-error key="date" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary w-100 mt-3" type="submit">Withdraw</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection