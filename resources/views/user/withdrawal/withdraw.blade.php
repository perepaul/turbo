@extends('layouts.back')
@section('title', 'Withdraw')
@section('content')

{{-- <x-message /> --}}
<div class="col-lg-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.withdrawal.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Withdrawal method</strong></label>
                    <select name="method" id="" class="form-control">
                        <option value="">Select withdrawal Method</option>
                        @foreach ($methods as $method)
                        <option value="{{ $method->id }}" @if (old('method')==$method->id) selected @endif>
                            {{ $method->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="display: none" id="address-container">
                    <label for="address"><strong>Wallet address</strong> <small>withdaral amount will be sent to this address</small> </label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Wallet Address" value="{{old('address')}}">
                    <x-error :key="'address'" />
                </div>

                <div class="form-group">
                    <label for=""><strong>Amount</strong></label>
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                    <x-error :key="'amount'" />
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="submit" class="btn btn-primary" value="Withdraw">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .form-group {
        margin-top: 15px !important;
        margin-bottom: 10px !important;
    }
</style>

@endpush

@push('js')
<script>
    $(document).on('change', 'select[name=method]', e => {
        var elem = $(e.currentTarget);
        var address = $('#address');
        var addressParent = address.parent();

        if(elem.val() == ''){
            addressParent.hide();
            return false;
        }

        var option = elem.children(`option[value=${elem.val()}]`);
        addressParent.show();

    })

        $(document).on('input', '[name=amount]', e => {
            $('#amount_error').html('');
            target = $(e.currentTarget);
            value = target.val()
            fee = 5 / 100;
            if (isNaN(value)) {
                $('#amount_error').html('Amount can only be numbers');
                return;
            }

            if (value == '') {
                value = 0
            }
            total = parseFloat((fee * parseInt(value)) + parseInt(value))
            if (isNaN(total)) {
                total = 0;
            }
            $('[name=total]').val(total)
        })

        $('input[type=file]').on('change', (e) => {
            var _this = e.currentTarget
            var file = $(_this).prop('files')[0]
            var passed = false;
            ['png', 'jpeg', 'jpg'].forEach((value, index) => {
                if (file.type == 'image/' + value) {
                    passed = true;
                    return;
                }
            })

            if (!passed) {
                alert('Only png, jpg, and jpeg are allowed');
                return;
            }
            var url = URL.createObjectURL(file);
            $(_this).next('label').find('span').hide();
            $(_this).next('label').find('.preview').html(
                `<img src="${url}" class="img-responsive" style="width:100%;height:auto;"/>`
            )
        })

        $(document).on('click', '#copy', e => {
            value = $(e.currentTarget).siblings('input.copy-text').val();
            element = document.createElement('input');
            element.value = value;
            $('body').append(element);
            element.select();
            document.execCommand('copy');
            alert('Copied');
        })
</script>
@endpush
