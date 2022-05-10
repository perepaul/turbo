@extends('layouts.back')
@section('title','KYC')
@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Kyc Status</h6>
            </div>
            <div class="card-body">
                <p><strong class="pr-3 w-100">Account Status:</strong> <span class="text-success">Active</span></p>
                <p>
                    <strong class="pr-3">Compliance Level:</strong>
                    <span class="text-default">
                        {{$user->trade_cert == 'verified' ? 'Level 2' : 'Level 1'}}
                    </span>
                </p>
                <p><strong class="pr-3">Action Required:</strong> <span class="text-success">NO</span></p>
                <p><strong class="pr-3">Trading License:</strong>
                    @if($user->trade_cert == 'require')
                    <span class="text-danger">Not uploaded</span>
                    @elseif($user->trade_cert == 'uploaded')
                    <span class="text-info">Uploaded</span>
                    @else
                    <span class="text-success">Verified</span>
                    @endif
                </p>
                @if($user->trade_cert == 'require')
                <hr>
                <form action="{{route('user.kyc.upload',$user->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="trading_licence" class="d-block">Upload Trading License</label>
                        <input type="file" name="trading_licence" id="trading_license" class="form-control-file ml-2">
                        <x-error key="trading_licence" />
                    </div>
                    <button class="btn btn-outline-primary btn-sm">Upload</button>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
