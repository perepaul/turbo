@extends('layouts.back')
@section('title', 'Trade')

@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div>

    <div class="col-lg-6 col-sm-12 mx-auto">
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
                    <div class="row">
                        <div class="form-group col-6">
                            <label for=""><strong>Fee</strong></label>
                            <input type="text" class="form-control" name="fee" value="5.00" disabled readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for=""><strong>Total</strong></label>
                            <input type="text" class="form-control" name="total" readonly disabled>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <input type="submit" name="type" class="btn btn-outline-danger btn-lg" value="Sell">
                        <input type="submit" name="type" class="btn btn-outline-success btn-lg" value="Buy">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
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
