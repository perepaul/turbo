{{-- @extends('layouts.back')
@section('title', 'Trade history')
@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div> --}}
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="order-user">
                        <i class="fas fa-user text-white bg-primary"></i>
                    </div>
                    <div class="ms-4 customer">
                        <h2 class="mb-0  font-w600">{{ $user->trades->count() }}</h2>
                        <p class="mb-0 font-w500">Total Trades</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="order-user">
                        <i class="far fa-building bg-warning text-white"></i>
                    </div>
                    <div class="ms-4 customer">
                        <h5 class="mb-0  font-w600">
                            {{ format_money($user->trades->where('status', 'active')->where('is_demo', 'no')->sum('amount') + $user->trades->where('status', 'active')->where('is_demo', 'no')->sum('profit')) }}
                        </h5>
                        <p class="mb-0  font-w300">Estimated returns from open trades</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row order-card text-center">
                    <div class="col-6 customer">
                        <h2 class="mb-0  font-w600">{{ $trades->where('status', 'active')->count() }}</h2>
                        <p class="mb-0 font-w500">Active</p>
                    </div>
                    <div class="col-6">
                        <h2 class="mb-0 font-w600">{{ $trades->where('status', 'inactive')->count() }}</h2>
                        <p class="mb-0  font-w500">Closed</p>
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
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Currrency</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Profit/Loss</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trades as $trade)
                    <tr>
                        <td>{{ $trade->reference }}</td>
                        <td class="wspace-no">{{ $trade->created_at->toDateString() }}</td>
                        <td>{{ $trade->time }}</td>
                        <td class="text-ov">{{ $trade?->trade_currency?->name }}</td>
                        <td>{{ format_money($trade->amount, $trade?->user?->currency?->symbol) }}</td>
                        <td>{{ ucfirst($trade->type) }}</td>
                        <td>{{ format_money($trade->profit, $trade?->user?->currency?->symbol) }}</td>
                        <td><span class="badge badge-outline-{{$trade->status == 'active' ? 'success' : 'danger'}}">{{$trade->status == 'active' ? 'Open' : 'Closed'}}</span></td>
                        <td>
                            <div class="dropdown ml-auto">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if ($trade->status == 'active')
                                    <a class="dropdown-item text-black" href="{{ route('user.trade.end', $trade->id) }}">Close Trade</a>
                                    @else
                                    <span class="dropdown-item text-black">Closed</span>
                                    @endif
                                </div>
                            </div>
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
        <div class="d-flex justify-centent-center">
            {{ $trades->links() }}
        </div>
    </div>
</div>
{{-- </div>
@endsection --}}
