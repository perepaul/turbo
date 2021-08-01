@extends('layouts.back')
@section('title', 'Create currency')
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
            <h2 class="mb-3 me-auto">@yield('title')</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <x-alert />
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.trade-currency.store') }}" method="post" class="row p-lg-3 d-flex justify-content-center">
                            @csrf
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="name">Currency</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="USDGBP">
                                    <x-error :key="'name'" />
                                </div>

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info mt-3">Create currency</button>
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
