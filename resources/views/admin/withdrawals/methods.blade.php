@extends('layouts.back')
@section('title', 'Withdrawal Methods')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped" id="example5">
                        <thead>
                            <tr>
                                <th class="fs-16">Name</th>
                                <th class="fs-16">Method</th>
                                <th class="fs-16">Date</th>
                                <th class="fs-16">User</th>
                                <th class="fs-16">Status</th>
                                <th class="fs-16">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($methods as $method)
                            <tr>
                                <td class="fs-12">{{$method->name}}</td>
                                <td class="fs-12">{{$method->method->name}}</td>
                                <td class="fs-12">{{$method->created_at->format('d m, Y')}}</td>
                                <td class="fs-12">{{$method->user->name}}</td>
                                <td class="fs-12">{{$method->unlinked ? 'Unlinked': 'Linked'}}</td>
                                <td class="fs-12">
                                    <span class="btn btn-outline-info btn-sm fs-12 view" data-url="{{route('admin.withdrawals.methods.view',$method->id)}}">
                                        <i class="fa fa-eye"></i> View
                                    </span>
                                    <span class="btn btn-outline-primary btn-sm fs-12 view" data-url="{{route('admin.withdrawals.methods.view',['id' => $method->id, 'update_date'=>true])}}">
                                        <i class="fa fa-clock"></i> Change date
                                    </span>
                                    @if (!$method->unlinked)
                                    <a href="{{route('admin.withdrawals.methods.unlink', $method->id)}}" class="btn btn-outline-danger btn-sm fs-12">
                                        <i class="fa fa-times"></i> Unlink
                                    </a>
                                    @else
                                    <a href="{{route('admin.withdrawals.methods.link', $method->id)}}" class="btn btn-outline-success btn-sm fs-12">
                                        <i class="fa fa-check"></i> Link
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No Withdrawal methods found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$methods->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
<div class="modal fade" id="viewModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Withdrawal Method Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                {{-- Js content here --}}
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
    $('.view').on('click', function(e) {
        var elem = $(e.currentTarget);
        fetch(elem.data('url'))
            .then(response => response.json())
            .then(res => {
                console.log(res)
                $('#viewModal .modal-body').html(res.html);
                $('#viewModal').modal('show');
            })
    })
</script>
@endpush