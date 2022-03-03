@extends('layouts.back')
@section('title', 'Trades')
@section('content')
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
        <h2 class="mb-3 me-auto">@yield('title')</h2>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <div class="col-md-8 col-sm-12">
                        <form action="{{route('admin.trades.update',$trade->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{$trade->user->name}}" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Currency</label>
                                <input type="text" class="form-control" value="{{$trade->trade_currency->name}}" readonly disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" class="form-control" value="{{format_money($trade->amount,$trade->user->currency->symbol)}}" readonly disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" class="form-control" value="{{ucfirst($trade->type)}}" readonly disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Demo Trade?</label>
                                <input type="text" class="form-control" value="{{ucfirst($trade->is_demo)}}" readonly disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Profit/Loss</label>
                                <input type="text" class="form-control" value="{{old('profit') ?? $trade->profit}}" name="profit">
                                <x-error :key="'profit'" />
                            </div>

                            <div class="form-group">
                                <label for="">Bid</label>
                                <input type="text" class="form-control" value="{{old('bid') ?? $trade->bid}}" name="bid">
                                <x-error key="bid" />
                            </div>
                            <div class="form-group">
                                <label for="">Ask</label>
                                <input type="text" class="form-control" value="{{old('ask') ?? $trade->ask}}" name="ask">
                                <x-error key="ask" />
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
