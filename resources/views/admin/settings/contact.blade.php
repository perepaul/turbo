@extends('layouts.back')
@section('title', 'Contact Details')
@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div>
    <div class="row">
        <div class="col-xl-7 mx-auto">
            <x-alert />
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.contact.update') }}" method="post" enctype="multipart/form-data" class="row d-flex">
                        @csrf
                        <div class="form-group">
                            <label for="notification_email">Notification Email</label>
                            <input type="email" id="notification_email" name="notification_email" class="form-control" value="{{ $contact->notification_email ?? '' }}">
                            <x-error :key="'notification_email'" />
                        </div>
                        <div class="form-group">
                            <label for="support_email">Support Email</label>
                            <input type="email" id="support_email" name="support_email" class="form-control" value="{{ $contact->support_email ?? '' }}">
                            <x-error :key="'support_email'" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone ?? '' }}">
                            <x-error :key="'phone'" />
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address ?? '' }}">
                            <x-error :key="'address'" />
                        </div>

                        <div class="form-group">
                            <label for="chat_script">Live chat script</label>
                            <textarea class="form-control" name="chat_script" id="chat_script" rows="3" style="min-height: calc(6em + 0.75rem + 2px);">{{$contact->chat_script ?? ''}}</textarea>
                            <x-error :key="'chat_script'" />
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">Whatsapp</label>
                            <select name="whatsapp" id="whatsapp" class="form-select form-select-lg fs-12">
                                <option value="active" @if($contact?->whatsapp !='inactive') selected @endif>Activate</option>
                                <option value="inactive" @if($contact?->whatsapp =='inactive') selected @endif>Deactivate</option>
                            </select>
                            <x-error key="whatsapp" />
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info mt-3">Update</button>
                        </div>
                    </form>
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
