@extends('layouts.back')
@section('title', 'Create Payment method')
@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
        <h4 class="mb-3 me-auto">@yield('title')</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-alert />
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.methods.store') }}" method="post" enctype="multipart/form-data" class="row p-lg-3 d-flex justify-content-center">
                        @csrf
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Bitcoin">
                                <x-error :key="'name'" />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="xxxxxxxxxxxxxxxxxxx">
                                <x-error :key="'address'" />
                            </div>
                            <div class="form-group">
                                <label for="status">Address</label>
                                <select name="status" id="status" class="form-select form-control-lg">
                                    <option value="active" @if(old('status') !='inactive' ) selected @endif>Active</option>
                                    <option value="inactive" @if(old('status')=='inactive' ) selected @endif>Inactive</option>
                                </select>
                                <x-error :key="'address'" />
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="mb-1 d-block"><strong>Image / QR Code</strong></label>
                                <input type="file" name="image" id="image" style="display:none" accept="image/png;image/jpg;image/jpeg">
                                <label for="image" class="mt-3">
                                    <span class="btn btn-outline-warning">Upload <i class="fa fa-upload"></i></span>
                                    <div class="preview">
                                    </div>
                                </label>
                                <x-error :key="'image'" />

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info mt-3">Create</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .form-group {
        margin-bottom: 10px;
    }
</style>
@endpush

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
                alert('Only png, jpg, and jpeg are allowed');
                return;
            }
            var url = URL.createObjectURL(file);
            $(_this).next('label').find('span').hide();
            $(_this).next('label').find('.preview').html(
                `<img src="${url}" class="img-responsive" style="width:100%;height:auto;"/>`
            )
        })

        $(document).on('click', '.add-feature', (e) => {
            e.preventDefault();
            $.get("{{ route('admin.feature-field') }}").then(
                res => {
                    $('.features').append(res.data);
                },
                err => {
                    console.error(err);
                    alert('failed to add field')
                }
            )
        })
        $(document).on('click', '.remove-feature', (e) => {
            e.preventDefault();
            if ($('.remove-feature').length > 1) {
                $(e.target).parent().parent().remove();
            } else {
                alert('at least a feature is required');
            }
        })
</script>
@endpush
