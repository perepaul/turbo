@extends('layouts.back')
@section('title','Zonal Representative')
@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <x-view-rep :rep="$rep" button="true" />
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).on('change','#passport,#id_card', function(e){
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
        padding: 30% 0 50%;
    }

    label.placeholder img {
        height: 100%;
        width: 100%;

    }
</style>
@endpush
