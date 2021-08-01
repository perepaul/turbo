@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button> {{ $error }}.
        </div>
    @endforeach
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button> {{ session('success') }}.
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button> {{ session('error') }}.
    </div>
@endif
