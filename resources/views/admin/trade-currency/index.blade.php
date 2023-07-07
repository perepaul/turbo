@extends('layouts.back')
@section('title', 'Trade Currency')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <x-alert />
        <div class="card">
            <div class="card-body">
                <div class="p-lg-5">
                    <div class="text-end">
                        <a href="{{ route('admin.trade-currency.create') }}" class="btn btn-success">Create Currency</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($currencies as $currency)
                                <tr>
                                    <td>{{ $currency->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.trade-currency.destroy', $currency->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.trade-currency.edit', $currency->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Currency found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
