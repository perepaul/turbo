@extends('layouts.back')
@section('title', 'Add Deposit')
@section('content')
<div class="col-md-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.add-deposit', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for=""><strong>User</strong></label>
                        <input type="text" class="form-control" value="{{$user->name}}" readonly disabled>
                        <hr class="my-4">
                    </div>


                    <div class="form-group">
                        <label for=""><strong>Method</strong></label>
                        <select name="method" id="method" class="form-select">
                            <option value="">Select Method</option>
                            @foreach ($methods as $method)
                            <option value="{{$method->id}}" @if(old("method")==$method->id ) selected @endif>{{$method->name}}</option>
                            @endforeach

                        </select>
                        <x-error key="method" />
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
                    <div class="mb-3 col-md-4">
                        <label class="mb-1 d-block"><strong>Proof of Payment</strong></label>
                        <input type="file" name="proof" id="proof" style="display:none" accept="image/png;image/jpg;image/jpeg">
                        <label for="proof" class="mt-3">
                            <span class="btn btn-outline-warning btn-sm">Upload <i class="fa fa-upload"></i></span>
                            <div class="preview">

                            </div>
                        </label>
                        <x-error :key="'proof'" />

                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary w-100 mt-3" type="submit">Deposit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
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
            toast('Only png, jpg, and jpeg are allowed', 'error');
            return;
        }
        var url = URL.createObjectURL(file);
        $(_this).next('label').find('span').hide();
        $(_this).next('label').find('.preview').html(
            `<img src="${url}" class="img-responsive" style="width:100%;height:auto;"/>`
        )
    })
</script>

@endpush