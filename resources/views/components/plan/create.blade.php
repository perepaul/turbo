<form action="{{route('admin.settings.plans.store')}}" method="POST">
    <h4>Create Plan</h4>
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
        <x-error :key="'name'" />
    </div>
    <div class="form-group">
        <label for="">Min. Deposit Amount</label>
        <input type="text" class="form-control" name="amount" value="{{old('amount')}}">
        <x-error :key="'amount'" />
    </div>
    <div class="form-group">
        <label for="">Topup Bonus</label>
        <input type="text" class="form-control" name="bonus" value="{{old('bonus')}}">
        <x-error :key="'bonus'" />
    </div>
    <div class="form-group">
        <label for="">Demo Amount</label>
        <input type="text" class="form-control" name="demo_balance" value="{{old('demo_balance')}}">
        <x-error :key="'demo_balance'" />
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
