@extends('layouts.back')
@section('title', 'Withdrawals')
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
            <div class="col-xl-12">
                <div class="table-responsive fs-14">
                    <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawals  as $w)
                                <tr>
                                    <td>{{ $w->reference }}</td>
                                    <td class="wspace-no">{{ $w->created_at->toDateString() }}</td>
                                    <td>{{ $w->user->name }}</td>
                                    <td>{{ format_money($w->amount, $w->user->currency->symbol) }}</td>
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
                </div>
            </div>
        </div>
    </div>
@endsection
