@extends('layouts.back')
@section('title', 'Robots')
@section('content')
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <span class="btn btn-outline-primary btn-sm" id="add-btn">
                        <i class="fa fa-plus"></i>
                        Add Robot
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($robots as $robot)
                                <tr>
                                    <td>{{ $robot->key }}</td>
                                    <td>{{ $robot->name }}</td>
                                    <td>{{ $robot->type }}</td>
                                    <td>{{ $robot->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="btn btn-outline-primary btn-sm edit-button"
                                            data-url="{{ route('admin.robots.show', $robot->id) }}"
                                            data-update-url="{{ route('admin.robots.update', $robot->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        <span class="btn btn-outline-danger btn-sm delete-button"
                                            data-url="{{ route('admin.robots.destroy', $robot->id) }}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center fs-12" colspan="5">No robots created</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    <div class="modal fade" id="robots-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{-- Js content here --}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    {{-- JS content here --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-success btn-sm" id="confirm-button">
                        {{-- Js content here --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('css')
    <style>
        .table thead th {
            font-size: 15px !important;
        }

        .table tbody td {
            font-size: 13px !important;
        }

        label.placeholder {
            height: 150px;
            width: 130px;
            background-color: rgb(200, 192, 192);
            margin-top: 15px;
            border-radius: 8px;
            text-align: center;
            display: flex;
            justify-content: center;
            overflow: hidden;
            font-size: 14px;
            object-fit: cover;
        }

        label.placeholder span {
            padding: 30% 0 30%;
        }

        label.placeholder img {
            height: 100%;
            width: 100%;

        }
    </style>
@endpush

@push('js')
    <script>
        var modal = $('#robots-modal');
        var modalTitle = modal.find('.modal-title');
        var modalBody = modal.find('.modal-body');
        var confirmButton = modal.find('.modal-footer #confirm-button')

        $(document).on('click', '#add-btn', function(e) {
            $.get("{{ route('admin.robots.create') }}")
                .done(function(data) {
                    modalTitle.html('Create Robot');
                    confirmButton.attr('data-url', "{{ route('admin.robots.store') }}").html('Create Robot');
                    modalBody.html(data.html);
                    modal.modal('show', {
                        keyboard: false,
                        backdrop: "static"
                    });
                })
                .fail(function(error) {
                    toast('Error loading create robot', 'error');
                })
        });

        $(document).on('click', '.edit-button', function(e) {
            var elem = $(e.currentTarget);
            $.get(elem.data('url'))
                .done(function(data) {
                    modalTitle.html('Update Robot');
                    confirmButton.attr('data-method', 'PUT').attr('data-url', elem.data('update-url')).html(
                        'Update Robot');
                    modalBody.html(data.html);
                    modal.modal('show', {
                        keyboard: false,
                        backdrop: "static"
                    });
                })
                .fail(function(error) {
                    toast('Error loading create robot', 'error');
                })
        });

        $(document).on('click', '#confirm-button', function(e) {
            var elem = $(e.currentTarget);
            var form = new FormData;
            form.append('key', $('input[name=key]').val());
            form.append('name', $('input[name=name]').val());
            form.append('type', $('select[name=type]').val());
            form.append('_token', $('input[name=_token]').val());
            var method = elem.data('method') || 'POST';
            if (method != 'POST') {
                form.append('_method', method);
            }
            var action = method == 'POST' ? 'create' : 'update';
            $.ajax({
                    method: 'POST',
                    url: elem.data('url'),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    data: form
                })
                .done(function(data) {
                    toast(data.message);
                    modal.modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail(function(error) {
                    error = error.responseJSON;
                    if (error.errors) {
                        for (error in errors) {
                            $(`#${error}_error`).html(errors[error]);
                        }
                        return;
                    }
                    toast(`Failed to ${action} robot`, error);
                })
        });

        $(document).on('click', '.delete-button', function(e) {
            var elem = $(e.currentTarget);
            var url = elem.data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteRobot(url)
                }
            })
        });

        function deleteRobot(url) {
            $.ajax({
                    url,
                    method: 'POST',
                    data: "_method=delete&_token={{ csrf_token() }}",
                    dataType: 'json',
                })
                .done(function(data) {
                    toast(data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail(function(error) {
                    error = error.responseJSON;
                    if (error.message) {
                        toast(error.message, 'error');
                        return;
                    }
                    toast('Failed to delete robot', 'error');
                })
        }
    </script>
@endpush
