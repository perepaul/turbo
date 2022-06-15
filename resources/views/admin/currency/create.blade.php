@extends('layouts.back')
@section('title', 'Create currency')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <x-alert />
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.currency.store') }}" method="post" class="row p-lg-3 d-flex justify-content-center">
                    @csrf
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="USD">
                            <x-error :key="'name'" />
                        </div>
                        <div class="form-group">
                            <label for="symbol">Symbol</label>
                            <input type="text" id="symbol" name="symbol" class="form-control" value="{{old('symbol')}}" placeholder="$">
                            <x-error :key="'symbol'" />
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
