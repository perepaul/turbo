@extends('layouts.back')
@section('title',  ucfirst(request('status')).' Users');
@section('content')
<div class="row contacts-list-area">
    <div class="col-xl-12">
        <div class="d-flex flex-wrap justify-content-between pb-3 px-4">
            <div class="">
                <input type="checkbox" class="form-check-input me-3" id="user-select-all">
            </div>
            <div>
                <div class="dropdown ms-4  mt-auto mb-auto">
                    <div class="btn-link" data-bs-toggle="dropdown">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" onclick="deleteMultipleUsers()">
                            <i class="fa fa-trash text-danger"></i> Delete Selected
                        </buttom>
                    </div>
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
                        <input type="checkbox" class="form-check-input me-3 user-select" value="{{ $user->id }}">
                        <img class="me-sm-4 me-1 img-fluid " style="width: 30px; height:30px;" src="{{ profile_picture($user->profile) }}" alt="DexignZone">
                        <div class="media-body">
                            <h3 class="fs-12 text-black font-w600">{{ $user->name }}</h3>
                            <span class="d-block mb-lg-0 mb-0 fs-12">{{ $user->created_at->format('d M, Y. G:ia') }}</span>
                        </div>
                    </div>
                    @if(config('app.enable_address'))
                    <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3">
                        <small class="mb-3 d-block fs-12 font-w600 ">Address</small>
                        <h4 class="text-black fs-12">{{ $user->address }}</h4>
                    </div>
                    @endif

                    <div class="col-xl-{{config('app.enable_address')?'2':'4'}} col-lg-3 col-sm-4 col-6 mb-3 text-lg-center">
                        <small class="mb-3 d-block fs-12 font-w600">Phone Number</small>
                        <h4 class="text-black fs-12">{{ $user->phone }}</h4>
                    </div>
                    <div class="col-xl-3  col-lg-6 {{config('app.enable_address')?'col-sm-4':'col-6'}} mb-sm-3 mb-3">
                        <small class="mb-3 d-block fs-14 font-w500">Email Address</small>
                        <h4 class="text-black fs-12">{{ $user->email }}</h4>
                    </div>
                    <div class="col-xl-2  col-lg-6 col-sm-6 mb-sm-4 mb-0 d-flex ">
                        <div class="mt-auto mb-auto me-auto">
                            <div class="newest mb-3 me-3">
                                <form action="{{ route('admin.users.status', $user->id) }}" method="POST">
                                    @csrf
                                    <select class="default-select p-2  ms-0 border fs-12" name="status" onchange="$(this).parent().submit();">
                                        <option value="active" @if ($user->status == 'active') selected @endif>Active</option>
                                        <option value="inactive" @if ($user->status == 'inactive') selected @endif>In Active</option>
                                        <option value="pending" @if ($user->status == 'pending') selected @endif>Pending</option>
                                        <option value="rejected" @if ($user->status == 'rejected') selected @endif>Reject</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="dropdown ms-4  mt-auto mb-auto">
                            <div class="btn-link" data-bs-toggle="dropdown">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if (!is_null($user->id_front))
                                <a class="dropdown-item" href="{{ asset(config('dir.id') . $user->id_front) }}" target="_blank">
                                    <i class="fa fa-eye"></i> ID (front)</a>
                                @endif
                                @if (!is_null($user->id_back))
                                <a class="dropdown-item" href="{{ asset(config('dir.id') . $user->id_back) }}" target="_blank">
                                    <i class="fa fa-eye"></i> ID (Back)</a>
                                @endif
                                @if(is_null($user->trade_cert))
                                <a class="dropdown-item" href="{{route('admin.users.request-trade-cert',$user->id)}}">
                                    <i class="fa fa-eye"></i> Request Trade Cert</a>
                                @else
                                @if($user->trade_cert == 'uploaded' && !is_null($user->cert))
                                <a class="dropdown-item" href="{{route('admin.users.verify-trade-cert',$user->id)}}">
                                    <i class="fa fa-eye"></i> Verify Trade Cert</a>
                                @endif
                                @if(in_array($user->trade_cert,['uploaded','verified']))
                                <a class="dropdown-item" href="{{asset('uploads/certs/'.$user->cert)}}" target="_blank">
                                    <i class="fa fa-eye"></i> View Trade Cert</a>
                                @endif
                                @endif
                                <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.add-deposit', $user->id) }}">
                                    <i class="fa fa-plus-circle"></i> Add Deposit
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.add-withdrawal', $user->id) }}">
                                    <i class="fa fa-minus-circle"></i> Add Withdrawal
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.generate-trades', $user->id) }}">
                                    <i class="fa fa-chart-bar"></i> Generate Trades
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.link-referrals', $user->id) }}">
                                    <i class="fa fa-link"></i> Link referrals
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.login-as', $user->id) }}" target="_blank"> <i class="fa fa-lock"></i> Login as</a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" id="deleteForm{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="dropdown-item deleteUser" data-form-id="deleteForm{{$user->id}}">
                                    <i class="fa fa-trash"></i> Delete</button>
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
@endsection

@push('modals')

<div class="modal fade" id="confirmDelete" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Nevermind</button>
                <button type="button" class="btn btn-danger" id="deleteUser">Yes</button>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $(document).on('click', '.deleteUser', e => {
        console.log(e)
        let formId = $(e.currentTarget).attr('data-form-id');
        $('#deleteUser').attr('data-form-id', formId);
        $('#confirmDelete').modal('show');
    })

    $(document).on('click', '#deleteUser', e => {
        let formId = $('#deleteUser').attr('data-form-id');
        $(`#${formId}`).submit();
    })

    $(document).on('load', function() {
        $('.user-select').prop('checked', false);
    });

    $(document).on('click', '#user-select-all', function() {
        if ($(this).is(':checked')) {
            $('.user-select').prop('checked', true);
        } else {
            $('.user-select').prop('checked', false);
        }
    });



    function deleteMultipleUsers(){

        if(! confirm('Are you sure you want to delete selected users?')){
            return;
        }

        let selectedUsers = [];
        $('.user-select:checked').each(function() {
            selectedUsers.push($(this).val());
        });
        if (selectedUsers.length > 0) {
            fetch("{{ route('admin.users.delete-multiple') }}",{
                method: "post",
                body: JSON.stringify({
                    _token: "{{ csrf_token() }}",
                    ids: selectedUsers,
                    _method: 'delete'
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(async res => {
                let data = await res.json();
                if (res.status == 200) {
                    toast(data.message, 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    toast(data.message, 'error');
                }
            }).catch(err => {
                console.log(err);
                toast('Something went wrong', 'error');
            });
                
        } else {
            alert('Please select at least one user to delete.');
        }
    }
    
</script>
@endpush