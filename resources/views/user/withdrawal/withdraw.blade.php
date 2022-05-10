@extends('layouts.back')
@section('title', 'Withdraw')
@section('content')

<x-message />
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
                        <option @if (old('method')==$method->id) selected @endif value="{{ $method->id }}"
                            data-target=".method" data-status="{{$method->status}}">
                            {{ $method->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group method" style="display: none">
                    <label for=""><strong>Wallet address</strong></label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
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

@push('js')
<script>
    $(document).on('change', '[name=method]', e => {
            var c = '.method'
            $(c).hide()
            if($(e.currentTarget).find(`option[value=${$(e.currentTarget).val()}]`).data('status') == 'inactive'){
            toast('The selected method is currently inactive','error');
            return;
            }
            if ($(e.currentTarget).val() == '') return;
            $(c).show()
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
