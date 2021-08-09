@extends('layouts.back')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
            <h2 class="mb-3 me-auto">@yield('title')</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <x-message />
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.profile.update')}}" class="col-md-8 mx-auto" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" name="firstname" value="{{$user->firstname ?? old('firstname')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="{{$user->lastname ?? old('lastname')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" value="{{$user->email ?? old('email')}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" value="{{$user->country ?? old('country')}}">
                                <x-error :key="'country'" />
                            </div>
                            <div class="form-group">
                                <label for="">Province/State</label>
                                <input type="text" class="form-control" name="state" value="{{$user->state ?? old('state')}}">
                                <x-error :key="'state'" />
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" value="{{$user->city ?? old('city')}}">
                                <x-error :key="'city'" />
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address ?? old('address')}}">
                                <x-error :key="'address'" />
                            </div>
                            <div class="form-group">
                                <label for="">Zip code</label>
                                <input type="text" class="form-control" name="zip_code" value="{{$user->zip_code ?? old('zip_code')}}">
                                <x-error :key="'zip_code'" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .form-group {
            margin-bottom: 20px;
        }

    </style>
@endpush

{{-- @push('js')
    <script>
        $(document).on('change', '[name=country]', (e) => {
            let value = e.target.value;
            var element = '[name=state]'
            var firstChild = element + ' option:first-child';
            var text = "Select Province/State"
            $(element + ' option').not(':first-child').remove()
            $(firstChild).html('Loading...')

            $.get("{{ route('admin.state') }}", {
                country_id: value
            }).then(json => {
                $(firstChild).html(text);
                $(element).append(json.data);
            }, err => {
                alert('Failed to load pronvince/state, try again.')
                console.error(err);
            })
        })

        $(document).on('change', '[name=state]', (e) => {
            alert('changed');
            let state_id = e.target.value;
            var country_id = $('[name=country').val();
            var element = '[name=city]'
            var firstChild = element + ' option:first-child';
            var text = "Select City"
            $(element + ' option').not(':first-child').remove()
            $(firstChild).html('Loading...')

            $.get("{{ route('admin.city') }}", {
                country_id,
                state_id
            }).then(json => {
                $(firstChild).html(text);
                $(element).append(json.data);
            }, err => {
                $(firstChild).html(text);
                alert('Failed to load pronvince/state, try again.')
                console.error(err);
            })
        })
    </script>
@endpush --}}
