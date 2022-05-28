@extends('layouts.back')
@section('title','Edit Post')
@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.post.update',$post->id)}}" method="post" class="p-lg-5" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.posts.form',['post'=>$post])
                <button class="btn btn-block btn-primary">Edit Post</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function(){
        var elem = document.getElementById('created_at')
        elem.valueAsDate = new Date(elem.getAttribute('data-val'));
    });
</script>
@endpush

@push('css')
<style>
    label.placeholder {
        height: 150px;
        width: 130px;
        background-color: rgb(200, 192, 192);
        margin-top: 15px;
        border-radius: 8px;
        text-align: center;
        display: flex;
        justify-content: center;
        overflow: hidden;
        font-size: 14px;
        object-fit: cover;
    }

    label.placeholder span {
        padding: 40% 0 50%;
    }

    label.placeholder img {
        height: 100%;
        width: 100%;

    }
</style>
@endpush

@push('js')
<script>
    $(document).on('change','#image', function(e){
        let file = $(e.currentTarget).prop('files')[0];
        if(!file.type.startsWith('image/')){
            toast('Only images can be uploaded','error');
            return;
        }
        let url = URL.createObjectURL(file);
        $(e.currentTarget).siblings('.placeholder').html(`<img src='${url}' />`);
    })
</script>
@endpush
