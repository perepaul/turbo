@extends('layouts.back')
@section('title','Market Data')

@section('content')
<x-trade.marquee />
<div class="card">
    <div class="card-body">
        <x-trade.market-chart />
    </div>
</div>
@endsection
