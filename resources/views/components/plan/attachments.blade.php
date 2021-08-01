@if (session()->has('attachments') && ($plan = session('attachments')))
    <form action="{{ route('admin.settings.plans.attachUpdate', $plan->id) }}" method="POST">
        <div class="d-flex justify-content-between">
            <h4>Featurest</h4>
            <a href="javascript:void(0)" class="add-feature">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        @csrf
        <div class="features">
            @foreach ($plan->features as $feature)
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Plan feature" name="features[]"
                            value="{{ $feature }}">
                        <a class="input-group-text bg-danger text-white d-block remove-feature">x</a>
                    </div>
                    <x-error :key="'name'" />
                </div>
            @endforeach
            {{-- @include('includes.back.feature-field',['features' => $plan->features]) --}}
        </div>
        <button type="submit" class="btn btn-primary">Update Features</button>
    </form>
@endif
