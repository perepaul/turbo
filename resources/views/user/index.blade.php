@extends('layouts.back')
@section('title', 'Dashboard')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        <h2 class="mb-3 me-auto">Dashboard</h2>
    </div>
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
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="card-data me-2">
                        <h5>Demo Balance</h5>
                        <h6 class="fs-40 font-w600">{{ format_money($user->demo_balance) }}</h6>
                    </div>
                    <div><span class="donut1"
                            data-peity='{ "fill": ["rgb(255, 135, 35,1)", "rgba(242, 246, 252)"]}'>1</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="card-data me-2">
                        <h5>Active Withdrawals</h5>
                        <h6 class="fs-40 font-w600">{{ $user->withdrawals->where('status','active')->count() }}</h6>
                    </div>
                    <div><span class="donut1"
                            data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'>1</span>
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
                    <div><span class="donut1"
                            data-peity='{ "fill": ["rgb(51, 62, 75,1)", "rgba(242, 246, 252)"]}'>1</span>
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
                                        @forelse ($user->deposits->where('status','pending')->sortBy('created_at')->take(5) as $deposit )

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
                                        @forelse ($user->withdrawals->where('status','pending')->sortBy('created_at')->take(5) as $withdrawal )

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
                                        @forelse ($user->trades->where('status','active')->sortBy('created_at')->take(5) as $trade )

                                        <tr>
                                            <td>{{$trade->reference}}</td>
                                            <td>{{format_money($trade->amount,$trade->user->currency->symbol)}}</td>
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

                {{-- Recent Users --}}
                {{-- <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0  flex-wrap">
                            <h4 class="fs-20">Recent Trades</h4>
                        </div>
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table stripped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users->where('status','pending')->sortBy('created_at')->take(5) as $user )

                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->status}}</td>
                                            <td>{{$user->created_at->toDateTimeString()}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No recent users!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'pending')->count() . '/' . $user->withdrawals->count() }}</span>
                            </p>
                            <div class="progress mb-4" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'pending')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'approved')->count() . '/' . $user->withdrawals->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'approved')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Declined
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->withdrawals->where('status', 'declined')->count() . '/' . $user->withdrawals->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->withdrawals->count() > 0 ? ($user->withdrawals->where('status', 'declined')->count() * 100) / $user->withdrawals->count() : 0 }}%; height:18px;"
                                    role="progressbar">
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
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'pending')->count() . '/' . $user->deposits->count() }}</span>
                            </p>
                            <div class="progress mb-4" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'pending')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'approved')->count() . '/' . $user->deposits->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'approved')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Declined
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->deposits->where('status', 'declined')->count() . '/' . $user->deposits->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->deposits->count() > 0 ? ($user->deposits->where('status', 'declined')->count() * 100) / $user->deposits->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- User Stat --}}
                {{-- <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-3">
                            <h4>Users Stats</h4>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Pending
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $users->where('status', 'pending')->count() . '/' . $users->count() }}</span>
                            </p>
                            <div class="progress mb-4" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $users->count() > 0 ? ($users->where('status', 'pending')->count() * 100) / $users->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $users->where('status', 'active')->count() . '/' . $users->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $users->count() > 0 ? ($users->where('status', 'active')->count() * 100) / $users->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Inactive
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $users->where('status', 'inactive')->count() . '/' . $users->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $users->count() > 0 ? ($users->where('status', 'inactive')->count() * 100) / $users->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Rejected
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $users->where('status', 'rejected')->count() . '/' . $users->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $users->count() > 0 ? ($users->where('status', 'rejected')->count() * 100) / $users->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- Trade Stats --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-3">
                            <h4>Trade Stats</h4>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Active
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->trades->where('status', 'active')->count() . '/' . $user->trades->count() }}</span>
                            </p>
                            <div class="progress mb-4" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->trades->count() > 0 ? ($user->trades->where('status', 'active')->count() * 100) / $user->trades->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                            <p class="mb-2 d-flex  fs-16 text-black font-w500">Closed
                                <span
                                    class="ms-auto text-dark fs-14 font-w400">{{ $user->trades->where('status', 'inactive')->count() . '/' . $user->trades->count() }}</span>
                            </p>
                            <div class="progress mb-3" style="height:18px">
                                <div class="progress-bar bg-primary progress-animated"
                                    style="width:{{ $user->trades->count() > 0 ? ($user->trades->where('status', 'inactive')->count() * 100) / $user->trades->count() : 0 }}%; height:18px;"
                                    role="progressbar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-xl-12 col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20">Customer Review</h4>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="pb-3 border-bottom mb-3">
                                <div class="d-flex mb-3 flex-wrap align-items-end">
                                    <img class="rounded me-3" src="/assets/back/images/contacts/pic11.jpg" width="40"
                                        alt="">
                                    <div>
                                        <h6 class="fs-16 text-black font-w500 mb-0">Hawkins Maru</h6>
                                        <span class="fs-14">5m ago</span>
                                    </div>
                                    <div class="star-icons ms-auto">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star text-light"></i>
                                        <i class="las la-star text-light"></i>
                                        <i class="las la-star text-light"></i>
                                    </div>
                                </div>
                                <p class="fs-14 mb-0">I viewed a number of properties with Just Property and
                                    found them to be professional, efficient, patient, courteous and helpful
                                    every time.
                                </p>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <div class="d-flex mb-3 flex-wrap align-items-end">
                                    <img class="rounded me-3" src="/assets/back/images/contacts/pic22.jpg" width="40"
                                        alt="">
                                    <div>
                                        <h6 class="fs-16 text-black font-w500 mb-0">Bella Smith</h6>
                                        <span class="fs-14">20m ago</span>
                                    </div>
                                    <div class="star-icons ms-auto">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star text-light"></i>
                                    </div>
                                </div>
                                <p class="fs-14 mb-0">Dealing with Syamsudin and Bakri was a joy. I got in
                                    touch with Just Property after seeing a couple of properties that caught
                                    my eye. Both Syamsudin and Bakri strive to deliver a professional
                                    service and surpassed my expectations - they were not only helpful but
                                    extremely approachable and not at all bumptious...
                                </p>
                            </div>
                            <div class="pb-3 border-bottom mb-3">
                                <div class="d-flex mb-3 flex-wrap align-items-end">
                                    <img class="rounded me-3" src="/assets/back/images/contacts/pic33.jpg" width="40"
                                        alt="">
                                    <div>
                                        <h6 class="fs-16 text-black font-w500 mb-0">John Doe</h6>
                                        <span class="fs-14">4h ago</span>
                                    </div>
                                    <div class="star-icons ms-auto">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star text-light"></i>
                                        <i class="las la-star text-light"></i>
                                    </div>
                                </div>
                                <p class="fs-14 mb-0">Friendly service Josh, Lunar and everyone at Just
                                    Property in Hastings deserved a big Thank You from us for moving us from
                                    Jakarta to Medan during the lockdown.
                                </p>
                            </div>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a href="javascript:void();" class="btn btn-primary btn-block">See More
                                Reviews</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20">Recent Customer</h4>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                            stroke="#342E59" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic-111.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">Benny Chagur</h5>
                                    <p class="font-w600 mb-0 text-primary">MEMBER</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic222.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">Chynita Bella</h5>
                                    <p class="font-w600 mb-0 text-primary">MEMBER</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic-333.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">David Heree</h5>
                                    <p class="font-w600 mb-0">Regular Customer</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic444.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">Evan D. Mas</h5>
                                    <p class="font-w600 mb-0 text-primary">MEMBER</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic555.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">Supratman</h5>
                                    <p class="font-w600 mb-0">Regular Customer</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="recent-customer me-3">
                                    <img src="/assets/back/images/contacts/pic666.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-0">John Kusnaidi</h5>
                                    <p class="font-w600 mb-0">Regular Customer</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <a href="javascript:void(0);" class="btn btn-primary btn-block">+Add New
                                Customer</a>
                        </div>
                    </div>
                </div> --}}
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
