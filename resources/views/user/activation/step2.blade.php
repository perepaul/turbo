@extends('layouts.activation')
@section('title', 'Step 2')

@section('content')
@if(config('app.need_address'))
<h6 class="text-center mb-1">@yield('title') of 2</h6>
@endif
<form action="{{ route('user.activation.store.step.two') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="mb-1"><strong>Phone</strong></label>
        <input type="text" class="form-control" value="{{ old('phone') ?? auth('user')->user()->phone}}" name="phone" placeholder="Phone number eg. +123456789">
        <x-error key="phone" />
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Prefered Account Currency</strong></label>
        <select name="currency_id" id="" class="form-control">
            <option value="">Select Currency</option>
            @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}" @if(auth('user')->user()->currency_id == $currency->id) selected @endif>{{ $currency->name }} ({{ $currency->symbol }})</option>
            @endforeach
        </select>
        <x-error :key="'currency_id'" />
    </div>
    <div class="row justify-content-center">
        <div class="mb-3 col-md-4">
            <label class="mb-1 d-block"><strong>ID Card (Back)</strong></label>
            <input type="file" name="id_back" id="id_back" style="display:none" accept="image/png;image/jpg;image/jpeg">
            <label for="id_back" class="mt-3">
                <span class="btn btn-outline-warning @if (!is_null(auth('user')->user()->id_back)) d-none @endif">Upload <i class="fa fa-upload"></i></span>
                <div class="preview">
                    <div class="preview">
                        @if (!is_null(auth('user')->user()->id_back))
                        <img src="{{asset(config('dir.id').auth('user')->user()->id_back )}}" class="img-responsive" style="width:100%;height:auto;" />
                        @endif
                    </div>
                </div>
            </label>
            <x-error :key="'id_back'" />
        </div>

        <div class="mb-3 col-md-4">
            <label class="mb-1 d-block"><strong>ID Card (Front)</strong></label>
            <input type="file" name="id_front" id="id_front" style="display:none" accept="image/png;image/jpg;image/jpeg">
            <label for="id_front" class="mt-3">
                <span class="btn btn-outline-warning @if (!is_null(auth('user')->user()->id_front)) d-none @endif">Upload <i class="fa fa-upload"></i></span>
                <div class="preview">
                    @if (!is_null(auth('user')->user()->id_front))
                    <img src="{{asset(config('dir.id').auth('user')->user()->id_front )}}" class="img-responsive" style="width:100%;height:auto;" />
                    @endif
                </div>
            </label>
            <x-error :key="'id_front'" />
        </div>
        @if(config('app.enable_profile_picture'))
        <div class="mb-3 col-md-4">
            <label class="mb-1 d-block"><strong>Account Picture</strong></label>
            <input type="file" name="profile" id="profile" style="display:none" accept="image/png;image/jpg;image/jpeg">
            <label for="profile" class="mt-3">
                <span class="btn btn-outline-warning @if (!is_null(auth('user')->user()->profile)) d-none @endif">Upload <i class="fa fa-upload"></i></span>
                <div class="preview">
                    @if (!is_null(auth('user')->user()->profile))
                    <img src="{{asset(config('dir.profile').auth('user')->user()->profile )}}" class="img-responsive" style="width:100%;height:auto;" />
                    @endif
                </div>
            </label>
            <x-error :key="'profile'" />
        </div>
        @endif
    </div>

    <div class="d-flex justify-content-between ">
        <a href="{{ route('user.activation.step.one') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i>
            Back</a>

        <button type="submit" class="btn btn-primary">Finish <i class="fa fa-check"></i></button>
    </div>
</form>
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

            if(!passed){
                alert('Only png, jpg, and jpeg are allowed');
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
