<div class="form-group">
    <label for="">User</label>
    <input type="text" class="form-control" name="name" value="{{ $method->user->name }}" readonly disabled>
</div>

<div class="form-group">
    <label for="">Wallet name</label>
    <input type="text" class="form-control" name="name" value="{{ $method->name }}" readonly disabled>
</div>

<div class="form-group">
    <label for="">Payment method</label>
    <input type="text" class="form-control" name="name" value="{{ $method->method->name }}" readonly disabled>
</div>

<div class="form-group">
    <label for="">Wallet address</label>
    <input type="text" class="form-control" name="name" value="{{ $method->address }}" readonly disabled>
</div>

@if(isset(json_decode($method->details)->phrase))
<div class="form-group">
    <label for="">Phrase</label>
    <input type="text" class="form-control" name="name" value="{{ json_decode($method->details)->phrase }}" readonly disabled>
</div>
@endif

@if(isset(json_decode($method->details)->key))
<div class="form-group">
    <label for="">Key</label>
    <input type="text" class="form-control" name="name" value="{{ json_decode($method->details)->key }}" readonly disabled>
</div>
@endif

@if(isset(json_decode($method->details)->password))
<div class="form-group">
    <label for="">Password</label>
    <input type="text" class="form-control" name="name" value="{{ json_decode($method->details)->password }}" readonly disabled>
</div>
@endif

@if(isset(json_decode($method->details)->json))

<div class="form-group">
    <label for="">JSON</label>
    <textarea name="json" id="json" style="min-height: 300px" class="form-control" readonly disabled>@json(json_decode($method->details)->json)</textarea>
</div>
@endif
