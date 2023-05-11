@extends('layouts.back')
@section('title', 'Attach ')
@section('content')
<div class="col-md-5 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.link-referrals', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for=""><strong>User</strong></label>
                        <input type="text" class="form-control" value="{{$user->name}}" readonly disabled>
                        <hr class="my-4">
                    </div>


                    <div class="form-group mb-3">
                        <label for="users"><strong>Users (select multiple)</strong></label>
                        <select name="users[]" id="users" class="form-select" style="height: 200px" multiple>
                            @foreach ($users as $_user)
                            <option value="{{$_user->id}}" @if($_user->referral_id == $user->id) selected @endif>{{$_user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-primary w-100 mt-3" type="submit">Attach</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection