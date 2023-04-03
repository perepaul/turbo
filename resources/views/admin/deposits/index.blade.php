@extends('layouts.back')
@section('title', 'Deposits')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive fs-14">
            <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Method</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deposits as $deposit)
                    <tr>
                        <td>{{ $deposit->reference }}</td>
                        <td class="wspace-no">{{ $deposit?->created_at?->toDateString() }}</td>
                        <td>{{ $deposit?->user?->name }}</td>
                        <td>{{ $deposit?->method?->name }}</td>
                        <td class="text-ov">{{ $deposit?->address }}</td>
                        <td>{{ format_money($deposit?->amount, $deposit?->user?->currency?->symbol) }}</td>
                        <td>
                            <a href="{{ asset(config('dir.deposits').$deposit?->proof) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            @if ($deposit?->status == 'pending')
                            <a href="{{ route('admin.deposits.approve', $deposit?->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                            <a href="{{ route('admin.deposits.decline', $deposit?->id) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No Trades found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection