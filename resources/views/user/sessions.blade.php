@extends('layouts.back')
@section('title', 'Active Sessions')
@section('content')
<div class="mx-auto col-md-11">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end w-100">
                <button class="btn btn-outline-danger btn-sm logout">Logout other devices</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th class="fs-16">Name</th>
                            <th class="fs-16">Type</th>
                            <th class="fs-16">Platform</th>
                            <th class="fs-16">IP Address</th>
                            <th class="fs-16">Country</th>
                            <th class="fs-16">Region</th>
                            <th class="fs-16">City</th>
                            <th class="fs-16">Last Login</th>
                            <th class="fs-16">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->devices()->latest()->get() as $device)
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
                                <span class="text-info">This Device</span>
                                @else
                                {{-- <button class="btn btn-outline-danger btn-sm logout" data-id="{{$device->id}}">Logout</button> --}}
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

@push('modals')

<div class="modal fade" id="logoutModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="" method="POST" id="logoutForm">
                <div class="modal-body text-center">
                    <p>This will log you out of other device(s). You will have to log into the device(s) manually. Continue?</p>
                    @csrf
                    <input type="password" class="form-control" name="password" placeholder="Enter password to confirm." required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Nevermind</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $(document).on('click','.logout', e =>{
        console.log(e)
        let id = e.currentTarget.dataset.id;
        let url = `/secuirty/sessions/logout-others`;
        $('#logoutForm').attr('action',url);
        $('#logoutModal').modal('show');
    })
</script>
@endpush
