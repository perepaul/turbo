@extends('layouts.back')
@section('title', 'Users');
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
            <h2 class="mb-3 me-auto">{{ ucfirst(request('status')) }} Users</h2>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                </ol>
            </div>
        </div>
        <div class="row contacts-list-area">
            <div class="col-xl-12">
                <div class="d-flex flex-wrap">
                    <div class="table-search mb-3 pe-3">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search customer name here">
                            <span class="input-group-text"><a href="javascript:void(0)"><i
                                        class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            @forelse ($users as $user)
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3  col-lg-6 col-sm-12 align-items-center customers">
                                    <img class="me-sm-4 me-3 img-fluid " width="95" src="images/customers/11.jpg"
                                        alt="DexignZone">
                                    <div class="media-body">
                                        {{-- <span class="text-primary d-block fs-16">#C01234</span> --}}
                                        <h3 class="fs-20 text-black font-w600">{{ $user->name }}</h3>
                                        <span
                                            class="d-block mb-lg-0 mb-0">{{ $user->created_at->format('d M, Y. G:ia') }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3">
                                    <small class="mb-3 d-block fs-16 ">Address</small>
                                    <h4 class="text-black font-w600">{{ $user->address }}</h4>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-center">
                                    <small class="mb-3 d-block fs-16">Phone Number</small>
                                    <h4 class="text-black font-w600">{{ $user->phone }}</h4>
                                </div>
                                <div class="col-xl-2  col-lg-6 col-sm-4 mb-sm-3 mb-3">
                                    <small class="mb-3 d-block fs-16">Email Address</small>
                                    <h4 class="text-black font-w600">{{ $user->email }}</h4>
                                </div>
                                <div class="col-xl-3  col-lg-6 col-sm-6 mb-sm-4 mb-0 d-flex ">
                                    <div class="mt-auto mb-auto me-auto">
                                        <div class="newest mb-3 me-3">
                                            <form action="{{ route('admin.users.status', $user->id) }}" method="POST">
                                                @csrf
                                                <select class="form-control default-select ms-0 border" name="status"
                                                    onchange="$(this).parent().submit();">
                                                    <option value="active" @if ($user->status == 'active') selected @endif>Active</option>
                                                    <option value="inactive" @if ($user->status == 'inactive') selected @endif>In Active</option>
                                                    <option value="pending" @if ($user->status == 'pending') selected @endif>Pending</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="dropdown ms-4  mt-auto mb-auto">
                                        <div class="btn-link" data-bs-toggle="dropdown">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                    stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                    stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                    stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('admin.users.login-as', $user->id) }}"
                                                target="_blank">Login as</a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.users.delete', $user->id) }}">Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted mt-5">
                    <h4>No {{ request('status') }} Users found</h4>
                </div>
            @endforelse


        </div>
        <div class="d-flex align-items-center justify-content-between  flex-wrap">
            {{ $users->links() }}
        </div>
    </div>
@endsection
