@extends('layouts.back')
@section('title', 'Subscriptions')
@section('content')

<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="section-title text-center">
            <h2>Our Trading Plans</h2>
            <p> Click on subcribe button to choose to a plan </p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between row">
    @foreach ($subscriptions as $k => $plan)
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center "><i class="fa fa-gift fa-2x"></i></h4>
                <h4 class="card-title text-center">{{ $plan->name }}</h4>
                <h6 class="text-center">
                    <span class="p-2">
                        ({{format_money($plan->amount)}} Min. Deposit)
                    </span>
                </h6>
                <div class="basic-list-group p-0">
                    <ul class="list-group list-group-flush text-sm rounded p-0">
                        <li class="list-group-item pl-0 pr-0"><i class="fa fa-check text-success">
                            </i>&nbsp;&nbsp; Get
                            ${{ number_format($plan->bonus,2) }}% bonus of your first deposit
                        </li>
                        <li class="list-group-item pl-0 pr-0"><i class="fa fa-check text-success">
                            </i>&nbsp;&nbsp;
                            {{ $plan->trade_tenure }} Days Plan Tenure
                        </li>
                        @foreach ($plan->features as $feature)
                        <li class="list-group-item pl-0 pr-0"><i class="fa fa-check text-success">
                            </i>&nbsp;&nbsp;
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center">
                    <a href="{{route('user.subscriptions.subscribe',$plan->id)}}" @class(['btn text-white mt-3','btn-secondary'=> $plan->id == auth()->user()->plan_id,'btn-primary' => $plan->id != auth()->user()->plan_id])>
                        @if ($plan->id == auth()->user()->plan_id)
                        Subscribed
                        @else
                        Subscribe
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
