@extends('layouts.back')
@section('title', 'Plans')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <x-alert />
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.plan.store') }}" method="post" class="row p-lg-3">
                    @csrf
                    <div class="col-md-7">
                        <h3>Plan Data</h3>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            <x-error key="name" />
                        </div>
                        <div class="form-group">
                            <label for="amount">Minimum Deposit Amount</label>
                            <input type="text" id="amount" name="amount" class="form-control" value="{{old('amount')}}">
                            <x-error key="amount" />
                        </div>
                        <div class="form-group">
                            <label for="bonus">Topup Bonus</label>
                            <input type="text" id="bonus" name="bonus" class="form-control" value="{{old('bonus')}}">
                            <x-error key="bonus" />
                        </div>
                        <div class="form-group">
                            <label for="referral_commission">Referral Commission (%)</label>
                            <input type="text" id="referral_commission" name="referral_commission" class="form-control" value="{{old('referral_commission')}}">
                            <x-error key="referral_commission" />
                        </div>
                        <div class="form-group">
                            <label for="trade_tenure">Trade Tenure (days)</label>
                            <input type="text" id="trade_tenure" name="trade_tenure" class="form-control" value="{{old('trade_tenure')}}">
                            <x-error key="trade_tenure" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between mb-4">
                            <h3>Plan Features</h3>
                            <a href="" class="btn btn-sm btn-info add-feature"><i class="fa fa-plus"></i> Add
                                Feature</a>
                        </div>
                        <div class="features">
                            @include('includes.back.feature-field')
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-info mt-3">Create Plan</button>
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
