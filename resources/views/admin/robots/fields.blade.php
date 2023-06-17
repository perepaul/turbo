@csrf
<div class="form-group mb-3">
    <label for="key">Key</label>
    <input type="text" class="form-control" name="key" value="{{ $robot?->key ?? Str::random(3).rand(1111,9999).Str::random(3) }}">
    <x-error key="key" />
</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{ $robot?->name ?? old('name') }}">
    <x-error key="name" />
</div>

<div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-select">
        @foreach (['Automated Trading','Dual Trading','Manual Trading'] as $type)
        <option value="{{$type}}" @if($type==$robot?->type || $type == old('type')) selected="selected" @endif>{{$type}}</option>
        @endforeach
    </select>
    <x-error key="type" />
</div>
