@extends('layouts.back')
@section('title', 'Emails')
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
            <h2 class="mb-3 me-auto">@yield('title')</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="text-end mb-3">
                    <a href="{{ route('admin.emails.send.page') }}" class="btn btn-success">
                        <i class="fa fa-paper-plane"></i>
                        Send Email
                    </a>
                </div>
                <div class="table-responsive fs-14">
                    <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>User</th>
                                <th>Body</th>
                                <th>Date</th>
                                <th>Attachments</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($emails as $email)
                                <tr>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $email->user->name }}</td>
                                    <td class="email-body">{!! $email->message !!}</td>
                                    <td>{{ $email->created_at }}</td>
                                    <td>{{ $email->hasAttachment() }}</td>
                                    <td>
                                        <a href="{{ route('admin.emails.view', $email->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.emails.delete', $email->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Emails found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $emails->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            var html = $('.email-body').html();
            // reduce the string later
        })
    </script>

@endpush
