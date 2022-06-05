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
                                    <a href="" class="btn btn-outline-info btn-sm fs-12">
                                        <i class="fa fay-eye"></i> View
                                    </a>
                                    @if (!$method->unlinked)
                                    <a href="" class="btn btn-outline-danger btn-sm fs-12">
                                        <i class="fa fa-times"></i> Unlink
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No Withdrawal found</td>
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

@endpush

@push('js')

@endpush
