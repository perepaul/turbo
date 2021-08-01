<form action="{{ route('admin.settings.plans.attach') }}" method="POST">
    <div class="d-flex justify-content-between">
        <h4>Featurest</h4>
        <a href="javascript:void(0)" class="add-feature">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    @csrf
    <div class="features">
        @include('includes.back.feature-field')
    </div>
    <button type="submit" class="btn btn-primary">Add Features</button>
</form>
