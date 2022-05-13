@extends('layouts.back')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Main Balance</h5>
                    <h6 class="fs-40 font-w600">{{ format_money($user->balance) }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["var(--primary)", "rgba(242, 246, 252)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

    {{-- // --}}

    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Invested Amount</h5>
                    <h6 class="fs-40 font-w600">{{ $user->invested_balance }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

    {{-- // --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Investment Profit</h5>
                    <h6 class="fs-40 font-w600">{{ format_money($user->trades()->where('status','active')->sum('profit')) }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["rgb(255, 135, 35,1)", "rgba(242, 246, 252)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Deposits</h5>
                    <h6 class="fs-40 font-w600">{{ $user->deposits->count() }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Active Trades</h5>
                    <h6 class="fs-40 font-w600">{{ $user->trades->where('status','active')->count() }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["rgb(51, 62, 75,1)", "rgba(242, 246, 252)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="card-data me-2">
                    <h5>Total Traes</h5>
                    <h6 class="fs-40 font-w600">{{ $user->trades->count() }}</h6>
                </div>
                <div><span class="donut1" data-peity='{ "fill": ["var(--primary)", "rgb(153, 0, 0)"]}'>1</span>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xl-9 col-xxl-8">
        <div class="row">
            {{-- Recent Deposits --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0  flex-wrap">
                        <h4 class="fs-20">Recent Deposits</h4>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table stripped">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->deposits->sortBy('created_at')->take(5) as $deposit )

                                    <tr>
                                        <td>{{$deposit->reference}}</td>
                                        <td>{{format_money($deposit->amount)}}</td>
                                        <td>{{$deposit->user->name}}</td>
                                        <td>{{$deposit->created_at->toDateTimeString()}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No recent deposits!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Withdrawals --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0  flex-wrap">
                        <h4 class="fs-20">Recent Withdrawals</h4>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table stripped">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->withdrawals->sortBy('created_at')->take(5) as $withdrawal )

                                    <tr>
                                        <td>{{$withdrawal->reference}}</td>
                                        <td>{{format_money($withdrawal->amount)}}</td>
                                        <td>{{$withdrawal->user->name}}</td>
                                        <td>{{$withdrawal->created_at->toDateTimeString()}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No recent withdrawals!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Trades --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0  flex-wrap">
                        <h4 class="fs-20">Recent Trades</h4>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table stripped">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->trades->sortBy('created_at')->take(5) as $trade )

                                    <tr>
                                        <td>{{$trade->reference}}</td>
                                        <td>{{format_money($trade->amount,$trade->user?->currency?->symbol)}}</td>
                                        <td>{{$trade->user->name}}</td>
                                        <td>{{$trade->created_at->toDateTimeString()}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No recent trades!</td>
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
    <div class="col-xl-3 col-xxl-4">
        <div class="row">
            {{-- withdrawal stats --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-3">
                        <h4>Withdrawal Stats</h4>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Pending
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'pending')->count() . '/' . $user->withdrawals->count() }}</span>
                        </p>
                        <div class="progress mb-4" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'pending')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'approved')->count() . '/' . $user->withdrawals->count() }}</span>
                        </p>
                        <div class="progress mb-3" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'approved')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Declined
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'declined')->count() . '/' . $user->withdrawals->count() }}</span>
                        </p>
                        <div class="progress mb-3" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'declined')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Deposit Stats --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-3">
                        <h4>Deposit Stats</h4>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Pending
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'pending')->count() . '/' . $user->deposits->count() }}</span>
                        </p>
                        <div class="progress mb-4" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'pending')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Approved
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'approved')->count() . '/' . $user->deposits->count() }}</span>
                        </p>
                        <div class="progress mb-3" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'approved')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Declined
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'declined')->count() . '/' . $user->deposits->count() }}</span>
                        </p>
                        <div class="progress mb-3" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'declined')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Trade Stats --}}
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-3">
                        <h4>Trade Stats</h4>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->trades->where('status', 'active')->count() . '/' . $user->trades->count() }}</span>
                        </p>
                        <div class="progress mb-4" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->trades->count() > 0 ? ($user->trades->where('status', 'active')->count() * 100) / $user->trades->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                        <p class="mb-2 d-flex  fs-16 text-black font-w500">Closed
                            <span class="ms-auto text-dark fs-14 font-w400">{{ $user->trades->where('status', 'inactive')->count() . '/' . $user->trades->count() }}</span>
                        </p>
                        <div class="progress mb-3" style="height:18px">
                            <div class="progress-bar bg-primary progress-animated" style="width:{{ $user->trades->count() > 0 ? ($user->trades->where('status', 'inactive')->count() * 100) / $user->trades->count() : 0 }}%; height:18px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Apex Chart -->
<script src="/assets/back/vendor/apexchart/apexchart.js"></script>
<script src="/assets/back/js/dashboard/dashboard-1.js"></script>
<script src="/assets/back/js/dashboard/dotted-map-init.js"></script>

@endpush
