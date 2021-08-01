@extends('layouts.back')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
            <h2 class="mb-3 me-auto">Order List</h2>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="order-user">
                                <i class="fas fa-user text-white bg-primary"></i>
                            </div>
                            <div class="ms-4 customer">
                                <h2 class="mb-0  font-w600">245</h2>
                                <p class="mb-0 font-w500">Total Trades</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="order-user">
                                <i class="far fa-building bg-warning text-white"></i>
                            </div>
                            <div class="ms-4 customer">
                                <h2 class="mb-0  font-w600">5,623</h2>
                                <p class="mb-0  font-w500">Estimated returns</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row order-card text-center">
                            <div class="col-4 customer">
                                <h2 class="mb-0  font-w600">421</h2>
                                <p class="mb-0 font-w500">Active</p>
                            </div>
                            <div class="col-4 customer">
                                <h2 class="mb-0 font-w600">8,313</h2>
                                <p class="mb-0  font-w500">Inactive</p>
                            </div>
                            <div class="col-4 border-0 customer">
                                <h2 class="mb-0 font-w600">4.6</h2>
                                <p class="mb-0 font-w500">Demo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" class="col-md-8 mx-auto">
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" id="" class="form-control">
                                    <option value="">Choose Country</option>
                                    <x-countries />
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Province/State</label>
                                <select name="state" id="" class="form-control">
                                    <option value="">Choose Province/State</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <select name="city" id="" class="form-control">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control">
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

@push('js')
    <script>
        $(document).on('change','[name=country]', (e) => {
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

        $(document).on('change','[name=state]', (e) => {
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
@endpush
