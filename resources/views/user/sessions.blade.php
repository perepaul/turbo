@extends('layouts.back')
@section('title', 'Active Sessions')
@section('content')
<div class="mx-auto col-md-10">
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
                            <th class="fs-16">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Firefox 32</td>
                            <td>Desktop</td>
                            <td>Mac Os X</td>
                            <td>127.0.0.1</td>
                            <td>Nigeira</td>
                            <td>Delta</td>
                            <td>Asaba</td>
                            <td>This device or logout</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
