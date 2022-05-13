@extends('layouts.back')
@section('title', 'Active Sessions')
@section('content')
<div class="mx-auto col-md-11">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th class="fs-16">Name</th>
                            <th class="fs-16">Type</th>
                            <th class="fs-16">Operating system</th>
                            <th class="fs-16">IP Address</th>
                            <th class="fs-16">Country</th>
                            <th class="fs-16">Region</th>
                            <th class="fs-16">City</th>
                            <th class="fs-16">Last Login</th>
                            <th class="fs-16">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->devices as $device)
                        <tr>
                            <td class="fs-14">{{$device->name}}</td>
                            <td class="fs-14">{{$device->type}}</td>
                            <td class="fs-14">{{$device->os}}</td>
                            <td class="fs-14">{{$device->ip}}</td>
                            <td class="fs-14">{{$device->country}}</td>
                            <td class="fs-14">{{$device->region}}</td>
                            <td class="fs-14">{{$device->city}}</td>
                            <td class="fs-14">{{$device->last_login->diffForHumans()}}</td>
                            <td class="fs-14">
                                @if($device->isActive())
                                no logout
                                @else
                                logout
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
