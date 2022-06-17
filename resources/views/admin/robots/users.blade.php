@extends('layouts.back')

@section('title', 'Connected Users')

@section('content')

    <div class="col-md-7 mx-auto">
        <a href="{{ route('admin.robots.index') }}" class="btn btn-outline-primary btn-sm mb-3">
            <i class="fa fa-chevron-left"></i>
            Back
        </a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($robot->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->pivot->created_at?->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="3">No user linked to this bot</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
