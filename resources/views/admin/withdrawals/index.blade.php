@extends('layouts.back')
@section('title', 'Withdrawals')
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
                        <th>Amount</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($withdrawals as $w)
                    <tr>
                        <td>{{ $w->reference }}</td>
                        <td class="wspace-no">{{ $w->created_at->toDateString() }}</td>
                        <td>{{ $w->user->name }}</td>
                        <td>{{ format_money($w->amount, $w->user->currency->symbol) }}</td>
                        <td>{{$w->address}}</td>
                        <td>
                            @if ($w->status == 'pending')
                            <a href="{{route('admin.withdrawals.decline',$w->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            <a href="{{route('admin.withdrawals.approve',$w->id)}}" class="btn btn-primary"><i class="fa fa-check"></i></a>
                            @else
                            {{ ucfirst($w->status) }}
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No Withdrawal found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$withdrawals->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
