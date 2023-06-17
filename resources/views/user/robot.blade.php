@extends('layouts.back')
@section('title', 'Trade Robot')
@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            @if (!is_null($robot))
                                <td>Trade Robot: </td>
                                <td>{{ $robot->name }}</td>
                                <td>
                                    <button class="btn btn-outline-success btn-sm" id="upgrade-button">
                                        <i class="fa fa-robot"></i>
                                        Upgrade Robot
                                    </button>
                                </td>
                            @else
                                <td class="text-center" colspan="2">
                                    <p>There are no trade bots linked to your account.</p> <br>
                                    <button class="btn btn-outline-success btn-sm" id="link-button">
                                        <i class="fa fa-link"></i>
                                        Link Robot
                                    </button>
                                </td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('modals')
    <div class="modal fade" id="robot-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if (is_null($robot))
                            Link
                        @else
                            Upgrade
                        @endif trade robot
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center mb-2">To @if (is_null($robot))
                            link
                        @else
                            upgrade
                        @endif a trade robot, please enter the unique 10 digits key that
                        was sent to you.</p>
                    <div class="form-group mb-2">
                        <input type="text" name="key" id="key" class="form-control">
                        <x-error key="key" />
                        @csrf
                    </div>
                    <div class="text-center">
                        @if (is_null($robot))
                            <button class="btn btn-outline-primary" id="link-robot">
                                <i class="fa fa-link"></i>
                                Link
                            </button>
                        @else
                            <button class="btn btn-outline-primary" id="upgrade-robot">
                                <i class="fas fa-robot"></i>
                                Upgrade
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script>
        var modal = $('#robot-modal');
        var key = $('input[name=key]');
        var token = $('input[name=_token]');
        var form = new FormData();

        $(document).on('click', '#link-button', function(e) {
            modal.modal('show');
        });

        $(document).on('click', '#upgrade-button', function(e) {
            modal.modal('show');
        });

        $(document).on('click', '#link-robot', function(e) {
            form.append('key', key.val())
            form.append('_token', token.val())
            sendRequest("{{ route('user.robots.link') }}", form, 'link')
        })

        $(document).on('click', '#upgrade-robot', function(e) {
            form.append('key', key.val())
            form.append('_token', token.val())
            sendRequest("{{ route('user.robots.upgrade') }}", form, 'upgrade');
        })

        function sendRequest(url, data, action) {
            $.ajax({
                    url,
                    data,
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    dataType: 'json',
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
                        for (e in error.errors) {
                            $(`#${e}_error`).html(error.errors[e]);
                        }
                        return;
                    }
                    toast(`Failed to ${action} robot`, error);
                })
        }
    </script>
@endpush
