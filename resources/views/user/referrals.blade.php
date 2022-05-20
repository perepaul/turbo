@extends('layouts.back')
@section('title','Referrals')

@section('content')
<div class="mx-auto col-md-10">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between w-100">
                <h6>Referrals</h6>
                <p>{{route('front.referral',$user->referral_code)}}</p>
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
                        @endforeach
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
