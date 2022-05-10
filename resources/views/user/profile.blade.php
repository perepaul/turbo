@extends('layouts.back')
@section('title', 'Profile')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo rounded"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="{{profile_picture()}}" class="img-fluid rounded-circle" alt="" style="width:150px; height: auto">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0">{{$user->name}}</h4>
                            @if($user->trade_cert == 'verified')
                            <p>Level 2</p>
                            @else
                            <p>Level 1</p>
                            @endif
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0"><a href="mailto:{{$user->email}}">{{$user->email}}</a></h4>
                            <p>Email</p>
                        </div>
                        {{-- <div class="dropdown ms-auto">
                            <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                                <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0">{{$user->trades->count()}}</h3><span>Trades</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{$user->deposits->count()}}</h3><span>Deposits</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{$user->withdrawals->count()}}</h3><span>Withdrawals</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Recent Deposits</h5>

                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="fs-14">Ref</th>
                                            <th class="fs-14">Amount</th>
                                            <th class="fs-14">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user->deposits->take(5) as $deposit)
                                        <tr>
                                            <td>{{$deposit->reference}}</td>
                                            <td>{{$deposit->amount}}</td>
                                            <td>{{$deposit->created_at->format('d/m/Y')}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">No data found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Recent Withdrawals</h5>

                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="fs-14">Ref</th>
                                            <th class="fs-14">Amount</th>
                                            <th class="fs-14">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user->withdrawals->take(5) as $withdrawal)
                                        <tr>
                                            <td>{{$withdrawal->reference}}</td>
                                            <td>{{$withdrawal->amount}}</td>
                                            <td>{{$withdrawal->created_at->format('d/m/Y')}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">No data found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Recent Trades</h5>

                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="fs-14">Amount</th>
                                            <th class="fs-14">Profit/Loss</th>
                                            <th class="fs-14">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user->trades->take(5) as $trade)
                                        <tr>
                                            <td>{{$trade->amount}}</td>
                                            <td>
                                                <span class="text-{{$trade->profit > 0 ? 'success': 'danger'}}">
                                                    {{$trade->profit}}
                                                </span>
                                            </td>
                                            <td>{{$trade->created_at->format('d/m/Y')}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">No data found</td>
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

    <div class="col-xl-8">
        <div class="card" style="height: auto">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#about-me" data-bs-toggle="tab" class="nav-link active">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Update</a>
                            </li>
                            <li class="nav-item">
                                <a href="#password-update" data-bs-toggle="tab" class="nav-link">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a href="#twofa" data-bs-toggle="tab" class="nav-link">2FA</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane fade active show">
                                <div class="profile-personal-info mt-5">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->name}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><a href="mailto:{{$user->email}}">{{$user->email}}</a></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Joined Since <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Subscription Plan <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user?->plan?->name}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Country <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->country}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">State/Region <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->state}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">City/Town <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->city}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->address}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Zip <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$user->zip_code}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile-settings" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary py-2">Update Profile</h4>
                                        <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">First name</label>
                                                    <input type="text" name="firstname" placeholder="First Name" class="form-control" disabled value="{{$user->firstname}}">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Last name</label>
                                                    <input type="text" placeholder="Last name" name="lastname" class="form-control" disabled value="{{$user->lastname}}">
                                                </div>
                                            </div>

                                            <div class=" row">

                                                <div class="form-group col-md-5">
                                                    <label for="">Account Currency</label>
                                                    <select name="prefered_account_currency" id="prefered_account_currency" class="form-select">
                                                        <option value="">Select Country</option>
                                                        @foreach ($currencies as $currency)
                                                        <option @if ($currency->id == $user->currency_id) selected="selected" @endif value="{{$currency->id}}">{{$currency->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-error key="prefered_account_currency" />
                                                </div>

                                                <div class="form-group col-md-7">
                                                    <label for="">Country</label>
                                                    <select name="country" id="country" class="form-select">
                                                        <option value="">Select Country</option>
                                                        <x-countries country="{{$user->country}}" />
                                                    </select>
                                                    <x-error key="country" />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{$user->state}}">
                                                    <x-error key="state" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{$user->city}}">
                                                    <x-error key="city" />
                                                </div>
                                                <div class="col-md-9 mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" name="address" placeholder="Address" class="form-control" value="{{$user->address}}">
                                                </div>
                                                <div class=" mb-3 col-md-3">
                                                    <label class="form-label">Zip</label>
                                                    <input type="text" class="form-control" name="zip_code" value="{{$user->zip_code}}">
                                                    <x-error key="zip_code" />
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="profile_picture" class="d-block">Profile Picture</label>
                                                <input type="file" name="profile_picture" id="profile_picture">
                                                <x-error key="profile_picture" />
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary" type="submit">Upate profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="password-update" class="tab-pane fade p-2">
                                <div class="mx-auto col-md-7 my-3 border p-3">
                                    <form action="{{route('user.security.update')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Current password</label>
                                            <input type="password" class="form-control" name="current_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-sm">Change password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="twofa" class="tab-pane fade p-2">
                                <div class="mx-auto col-md-7 my-3 border p-3 text-center">
                                    <form action="{{url('/user/two-factor-authentication')}}" method="POST">
                                        @csrf
                                        @if (auth()->user()->two_factor_secret)
                                        @method('DELETE')
                                        <div class="pb-3">
                                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                        </div>
                                        <div>
                                            <button type="button" class="btn-outline-success btn btn-sm" id="recovery-modal-launcher" data-toggle="modal" data-target="#recovery-modal">Recovery Codes</button>
                                            <button class="btn-outline-danger btn btn-sm">Disable 2FA</button>
                                        </div>
                                        @else
                                        <button class="btn btn-outline-primary btn-sm align-self-center">
                                            Enable 2FA
                                        </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
@if(auth()->user()->two_factor_secret)
<div class="modal fade" id="recovery-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">2FA Recovery codes</h5>
                <span class="fs-24 text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="cursor:pointer">&times;</span>
                </span>
            </div>
            <div class="modal-body">
                @foreach (auth()->user()->recoveryCodes() as $code)
                <ol class="list-group">
                    <li class="list-group-item" style="cursor: pointer"><span class="copy">{{$code}}</span> <span class="text-info ml-3">copy</span></li>
                </ol>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endpush

@push('js')
<script>
    function copytext( text, successMsg = 'Copied to clipboard', failMessage = 'Oops, failed to copy to clipboard' ) {
        if ( !navigator.clipboard ) return copyFallBack( text, successMsg, failMessage );
        navigator.clipboard.writeText( text ).then(
            () => toast( successMsg ),
            () => toast( failMessage, 'error' )
    )
    }
    document.querySelectorAll('.list-group-item').forEach(element => {
        element.addEventListener('click', e => copytext($(element).find('span.copy').text()))
    });
</script>
@endpush

@push('css')
<style>
    .form-group {
        margin-bottom: 20px;
    }
</style>
@endpush
