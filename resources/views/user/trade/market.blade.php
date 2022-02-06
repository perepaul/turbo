@extends('layouts.back')
@section('title','Market Data')

@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div>
    <x-trade.marquee />
    <div class="card">
        <div class="card-body">
            <x-trade.market-chart />
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            <h4>Market Data</h4>
            <x-trade.market-data />
        </div>
    </div> --}}
    {{-- <div class="card">
        <div class="card-body">
            <h4>Cryptocurrency Market</h4>
            <x-trade.market-cap />
        </div>
    </div> --}}

</div>
@endsection
