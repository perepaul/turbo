@if (!isset($post))
@php
$post = null;
@endphp
@endif
<div class="row">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{$post?->title ?? old('title')}}" placeholder="Post title">
        <x-error key="title" />
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" name="link" value="{{$post?->link ?? old('link')}}" placeholder="Post link">
        <x-error key="link" />
    </div>

    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="form-control" style="min-height: 100px;" placeholder="Summary of post">{{$post?->excerpt ?? old('excerpt')}}</textarea>
        <x-error key="excerpt" />
    </div>

    <div class="form-group">
        <label for="created_at">Date</label>
        <input type="date" class="form-control" id="created_at" name="created_at" data-val="{{$post?->created_at ?? old('created_at') ?? now()->format('Y-m-d')}}">
        <x-error key="created_at" />
    </div>

    <div class="form-group">
        <input type="file" name="image" id="image" style="display:none" accept="image/*">
        <label for="image" class="placeholder">
            @if($post?->image)
            <img src="{{asset(config('dir.posts').$post?->image)}}" alt="">
            @else
            <span>
                <i class="fa fa-upload"></i> <br>
                Post Image
            </span>
            @endif
        </label>
        <x-error key="image" />
    </div>
</div>
