@extends('layouts.back')
@section('title','Withdraw history')
@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="order-user">
                        <i class="fas fa-user text-white bg-primary"></i>
                    </div>
                    <div class="ms-4 customer">
                        <h2 class="mb-0  font-w600">{{$withdrawals->count()}}</h2>
                        <p class="mb-0 font-w500">Withdraws</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="order-user">
                        <i class="far fa-building bg-warning text-white"></i>
                    </div>
                    <div class="ms-4 customer">
                        <h5 class="mb-0  font-w600">{{format_money($withdrawals->where('status','pending')->sum('amount'))}}</h5>
                        <p class="mb-0  font-w300">Pending balance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row order-card text-center">
                    <div class="col-4 customer">
                        <h2 class="mb-0  font-w600">{{$withdrawals->where('status','pending')->count()}}</h2>
                        <p class="mb-0 font-w500">Pending</p>
                    </div>
                    <div class="col-4 customer">
                        <h2 class="mb-0 font-w600">{{$withdrawals->where('status','approved')->count()}}</h2>
                        <p class="mb-0  font-w500">Approved</p>
                    </div>
                    <div class="col-4 border-0 customer">
                        <h2 class="mb-0 font-w600">{{$withdrawals->where('status','declined')->count()}}</h2>
                        <p class="mb-0 font-w500">Declined</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="table-responsive fs-14">
            <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($withdrawals as $withdrawal)
                    <tr>
                        <td>{{$withdrawal->reference}}</td>
                        <td class="wspace-no">{{$withdrawal->created_at->toDateString()}}</td>
                        <td>{{$withdrawal->user->name}}</td>
                        <td>{{format_money($withdrawal->amount,$withdrawal?->user?->currency?->symbol)}}</td>
                        <td>{{ucfirst($withdrawal->status)}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No data found</td>
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
