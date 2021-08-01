@extends('layouts.back')
@section('title', 'Deposits')
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
            <h2 class="mb-3 me-auto">@yield('title')</h2>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="order-user">
                                <i class="fas fa-user text-white bg-primary"></i>
                            </div>
                            <div class="ms-4 customer">
                                <h2 class="mb-0  font-w600">245</h2>
                                <p class="mb-0 font-w500">Total Trades</p>
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
                                <h2 class="mb-0  font-w600">5,623</h2>
                                <p class="mb-0  font-w500">Estimated returns</p>
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
                                <h2 class="mb-0  font-w600">421</h2>
                                <p class="mb-0 font-w500">Active</p>
                            </div>
                            <div class="col-4 customer">
                                <h2 class="mb-0 font-w600">8,313</h2>
                                <p class="mb-0  font-w500">Inactive</p>
                            </div>
                            <div class="col-4 border-0 customer">
                                <h2 class="mb-0 font-w600">4.6</h2>
                                <p class="mb-0 font-w500">Demo</p>
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
                                    <td class="wspace-no">{{ $deposit->created_at->toDateString() }}</td>
                                    <td>{{ $deposit->user->name }}</td>
                                    <td class="text-ov">{{ $deposit->address }}</td>
                                    <td>{{ 'Bitcoin' }}</td>
                                    <td>{{ format_money($deposit->amount, $deposit->user->currency->symbol) }}</td>
                                    <td>
                                        <a href="{{ asset(config('dir.deposits').$deposit->image) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        @if ($deposit->status == 'pending')
                                            <a href="{{ route('admin.deposits.approve', $deposit->id) }}"
                                                class="btn btn-success"><i class="fa fa-check"></i></a>
                                            <a href="{{ route('admin.deposits.decline', $deposit->id) }}"
                                                class="btn btn-danger"><i class="fa fa-times"></i></a>
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
    </div>
@endsection
