@extends('layouts.back')
@section('title', 'Trades')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive fs-14">
            <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Account</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Currrency</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Profit/Loss</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trades as $trade)
                    <tr>
                        <td>{{ $trade->reference }}</td>
                        <td>
                            <span class="badge badge-outline-{{$trade?->is_demo == 'yes' ? 'warning' : 'success'}}">{{$trade?->is_demo == 'yes' ? 'Demo Account' : 'Main Account'}}</span>
                        </td>
                        <td class="wspace-no">{{ $trade?->created_at?->toDateString() }}</td>
                        <td>{{ $trade?->user?->name }}</td>
                        <td class="text-ov">{{ $trade?->trade_currency?->name }}</td>
                        <td>{{ format_money($trade?->amount, $trade?->user?->currency?->symbol) }}</td>
                        <td>{{ ucfirst($trade?->type) }}</td>
                        <td>{{ $trade?->time }}</td>
                        <td>{{ format_money($trade?->profit, $trade?->user?->currency?->symbol) }}</td>
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
                                    @if ($trade?->status == 'active')
                                    <a class="dropdown-item text-black" href="{{ route('admin.trades.edit', $trade?->id) }}">Edit</a>
                                    <a class="dropdown-item text-black" href="{{ route('admin.trades.end', $trade?->id) }}">End Trade</a>
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
            {{ $trades->links() }}
        </div>
    </div>
</div>
@endsection