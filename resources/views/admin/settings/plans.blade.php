@extends('layouts.back')
@section('title', 'Plans')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <x-alert />
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('attach'))
                        <x-plan.attach />
                        @elseif(session()->has('attachments'))
                        <x-plan.attachments />
                        @else
                        <x-plan.create />
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h4>Plans</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Bonus</th>
                                        <th>Demo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($plans as $plan)

                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->amount }}</td>
                                        <td>{{ $plan->bonus }}</td>
                                        <td>{{ $plan->demo_balance }}</td>
                                        <td>
                                            <a href="{{ route('admin.settings.plans.attachments', $plan->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-paperclip"></i></a>
                                            <a href="{{ route('admin.settings.plans.edit', $plan->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.settings.plans.delete', $plan->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Plans found</td>
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
