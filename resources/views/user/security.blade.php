@extends('layouts.back')
@section('title', 'Change password')
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
                        <form action="{{route('user.security.update')}}" class="col-md-8 mx-auto" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Current password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation">
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
