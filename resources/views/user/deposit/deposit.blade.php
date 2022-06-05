@extends('layouts.back')
@section('title', 'Deposit')
@section('content')

<div class="col-lg-5 col-sm-12 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.deposit.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Deposit method</strong></label>
                    <select name="method" id="" class="form-control">
                        <option value="">Select Deposit Method</option>
                        @foreach ($methods as $method)
                        <option value="{{ $method->id }}" data-target=".method{{ $method->id }}" data-status="{{$method->status}}">
                            {{ $method->name }}
                        </option>
                        @endforeach
                    </select>
                    <x-error :key="'method'" />
                </div>
                @foreach ($methods as $method)
                <div class="form-group method method{{ $method->id }}" style="display:none">
                    <div class="text-center py-3">
                        {!! QrCode::format('png')->size(180)->merge(logo(),.3,true)->generate($method->address) !!}
                    </div>
                    <label for=""><strong>Address</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control copy-text" value="{{ $method->address }}" disabled>
                        <span id="copy" class="input-group-text bg-primary text-white" style="cursor: pointer">Copy</span>
                    </div>
                    <x-error :key="'address'" />
                </div>
                @endforeach

                <div class="form-group">
                    <label for=""><strong>Amount</strong></label>
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                    <x-error :key="'amount'" />
                </div>
                <div class="mb-3 col-md-4">
                    <label class="mb-1 d-block"><strong>Proof of Payment</strong></label>
                    <input type="file" name="proof" id="proof" style="display:none" accept="image/png;image/jpg;image/jpeg">
                    <label for="proof" class="mt-3">
                        <span class="btn btn-outline-warning">Upload <i class="fa fa-upload"></i></span>
                        <div class="preview">

                        </div>
                    </label>
                    <x-error :key="'image'" />

                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="submit" class="btn btn-primary" value="Deposit">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).on('change', '[name=method]', e => {
            var c = '.method' + $(e.currentTarget).val()
            $('.form-group.method').hide()
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
                toast('Only png, jpg, and jpeg are allowed','error');
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
            toast('Address copied to clipboard')
        })
</script>
@endpush
