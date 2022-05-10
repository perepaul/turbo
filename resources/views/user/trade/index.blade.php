@extends('layouts.back')
@section('title', 'Trade')

@section('content')


<div class="col-lg-5 mx-auto">
    @if(auth()->user()->trade_mode == 'automatic')
    <div class="alert alert-outline-danger fs-12">
        <p>You can't place trades as you have an automated trading EA linked to your account</p>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('user.trade.create')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Pay with</strong></label>
                    <select name="payment_method" id="" class="form-control">
                        <option @if(old('payment_method')=='balance' ) selected @endif value="balance">Main Account</option>
                        <option @if(old('payment_method')=='demo_balance' ) selected @endif value="demo_balance">Demo Account</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for=""><strong>Currency</strong></label>
                    <select name="currency" id="" class="form-control">
                        @foreach ($currencies as $currency)
                        <option @if(old('currency')==$currency->id) selected @endif value="{{$currency->id}}">{{ $currency->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for=""><strong>Amount</strong></label>
                    <input type="text" class="form-control" name="amount" value="{{old('amount')}}">
                    <x-error :key="'amount'" />
                </div>

                <div class="form-group">
                    <label for="time"><strong>Time</strong></label>
                    <select name="time" id="time" class="form-select" style="height: 3.5rem">
                        <option value="3 minutes">3 mins.</option>
                        <option value="5 minutes">5 mins.</option>
                        <option value="10 minutes">10 mins.</option>
                        <option value="30 minutes">30 mins.</option>
                        <option value="1 hour">1 hour.</option>
                        <option value="1 day">1 day.</option>
                    </select>
                    {{-- <input type="text" class="form-control" name="time" value="{{old('time')}}"> --}}
                    <x-error key="time" />
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <input type="submit" name="type" class="btn btn-outline-danger" value="Sell">
                    <input type="submit" name="type" class="btn btn-outline-success" value="Buy">
                </div>
            </form>
        </div>
    </div>
</div>

@include('user.trade.history',['trades'=>$trades])


@endsection

@push('js')
<script>
    $(() => {
            $(document).on('input', '[name=amount]', e => {
                $('#amount_error').html('');
                target = $(e.currentTarget);
                value = target.val()
                fee = 5 / 100;
                if (isNaN(value)) {
                    $('#amount_error').html('Amount can only be numbers');
                    return;
                }

                if(value == '')
                {
                    value = 0
                }
                total = parseFloat((fee * parseInt(value)) + parseInt(value))
                if(isNaN(total))
                {
                    total = 0;
                }
                $('[name=total]').val(total)
            })
        })
</script>
@endpush
