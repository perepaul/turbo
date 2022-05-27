@extends('layouts.back')
@section('title','Referrals')

@section('content')
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="order-user">
                        <i class="fas fa-user text-white bg-primary"></i>
                    </div>
                    <div class="ms-4 customer">
                        <h6 class="mb-0  font-w600">{{format_money($user->referral_balance)}}</h6>
                        <p class="mb-0">Referral Balance</p>
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
                        <h5 class="mb-0  font-w600">{{$user->referrals->count()}}</h5>
                        <p class="mb-0  font-w300">Total Referrals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        {{-- <h6>Referral Link</h6> --}}
                        <p class="">{{route('front.referral',$user->referral_code)}}</p>
                        <button class="btn btn-sm btn-outline-success copy" data-link="{{route('front.referral',$user->referral_code)}}">
                            <i class="fa fa-copy"></i> Copy Referral Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h6>Referrals</h6>
            <button class="btn btn-sm btn-outline-success copy m-0" data-link="{{route('front.referral',$user->referral_code)}}">
                <i class="fa fa-copy"></i> Copy Referral Link
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-stripped sm">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Joined on</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($referrals as $referral)
                    <tr>
                        <td>{{$referral->firstname}}</td>
                        <td>{{$referral->lastname}}</td>
                        <td>{{$referral->email}}</td>
                        <td>{{$referral->created_at->diffForHumans()}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">You have not reffered a user</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-cener">
            {{$referrals->links()}}
        </div>
    </div>
</div>
</div>
@endsection

@push('js')
<script>
    $(document).on('click', '.copy', e => {
        navigator.clipboard.writeText($(e.currentTarget).attr('data-link'));
        toast('Referral link copied to clipboard');
    })
</script>

@endpush
