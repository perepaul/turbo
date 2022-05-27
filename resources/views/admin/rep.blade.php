@extends('layouts.back')
@section('title','Zonal Reps.')
@section('content')
<div class="col-md-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between w-100">
                <h5 class="card-title">@yield('title')</h5>
                <select name="filter" id="filter">
                    <option value="">All</option>
                    <option value="accepted" @if(request()->input('filter') == 'accepted') selected="selected" @endif>Accepted</option>
                    <option value="pending" @if(request()->input('filter') == 'pending') selected="selected" @endif>Pending</option>
                    <option value="rejected" @if(request()->input('filter') == 'rejected') selected="selected" @endif>Rejected</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th>Frist name</th>
                            <th>Last name</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reps as $rep)
                        <tr>
                            <td>{{$rep->firstname}}</td>
                            <td>{{$rep->lastname}}</td>
                            <td>{{$rep->country}}</td>
                            <td>{{$rep->state}}</td>
                            <td>{{$rep->city}}</td>
                            <td>{{$rep->status}}</td>
                            <td>{{$rep->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="dropdown ms-4  mt-auto mb-auto">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <a class="dropdown-item" href="{{route('admin.zonal-rep.view',$rep->id)}}">
                                        <i class="fa fa-eye"></i> View
                                        </a> --}}
                                        <a class="dropdown-item" href="{{route('admin.zonal-rep.approve',$rep->id)}}">
                                            <i class="fa fa-check"></i> Approve
                                        </a>
                                        <a class="dropdown-item" href="{{route('admin.zonal-rep.reject',$rep->id)}}">
                                            <i class="fa fa-times"></i> Reject
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No data found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$reps->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .table thead th {
        font-size: 15px !important;
    }

    .table tbody td {
        font-size: 13px !important;
    }
</style>
@endpush

@push('js')
<script>
    $(document).on('change', '#filter', function(e){
        let url = '{{route("admin.zonal-rep.index")}}'
        let value = e.currentTarget.value;
        if(value != ''){
            url += '?filter='+value;
        }
        window.location.href = url;
    })
</script>
@endpush
