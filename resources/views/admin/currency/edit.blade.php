@extends('layouts.back')
@section('title', 'Update currency')
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
                        <form action="{{ route('admin.currency.update',$currency->id) }}" method="post" class="row p-lg-3 d-flex justify-content-center">
                            @csrf
                            @method('PUT')
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$currency->name}}" placeholder="USD">
                                    <x-error :key="'name'" />
                                </div>
                                <div class="form-group">
                                    <label for="symbol">Symbol</label>
                                    <input type="text" id="symbol" name="symbol" class="form-control" value="{{$currency->symbol}}" placeholder="$">
                                    <x-error :key="'symbol'" />
                                </div>

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info mt-3">Update currency</button>
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
