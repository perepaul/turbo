@if (old('features'))
    @foreach (old('features') as $k => $value)
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Plan feature" name="features[]"
                    value="{{ $value }}">
                <a class="input-group-text bg-danger text-white d-block remove-feature">x</a>
            </div>
            <x-error :key="'features.'.$k" />
        </div>
    @endforeach
@elseif(isset($features) && count($features))
    @foreach ($features as $value)
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Plan feature" name="features[]"
                    value="{{ $value }}">
                <a class="input-group-text bg-danger text-white d-block remove-feature">x</a>
            </div>
        </div>
    @endforeach
@else
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Plan feature" name="features[]">
            <a class="input-group-text bg-danger text-white d-block remove-feature">x</a>
        </div>
    </div>
@endif
