@extends('layouts.back')
@section('title', 'Select Methods')
@section('content')

<x-message />
<div class="col-lg-4 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($methods as $method)
                <div class="col-6">
                    <div class="method" data-id="{{$method->id}}" data-status="{{$method->status}}">
                        <img src="{{asset(config('dir.methods').$method->image)}}" alt="" style="width: 100%; height: auto;">
                    </div>
                </div>
                @if($loop->even)
                <hr class="my-3">
                @endif
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-primary btn-sm px-4" id="select"> Select</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .method:hover,
    .method.selected {
        border: var(--bs-teal) 1px solid;
        padding: 5px;
        border-radius: 8px;
    }
</style>
@endpush

@push('js')
<script>
    $('.method').on('click',function(e){
        $('.method').removeClass('selected');
        elem = $(e.currentTarget);
        if(elem.data('status') == 'inactive'){
            toast('The selected method is currently inactive','error');
            return false;
        }
        elem.addClass('selected');
    })

    $('#select').on('click', function(e){
        var selected = $('.method.selected');
        console.log(selected);
        if(! selected.length ){
            toast('Please select a withdrawal method','error');
            return false;
        }
        $(e.currentTarget).html('<span class="spinner-grow spinner-grow-sm"></span> Loading...');
        setTimeout(() => {
            var id = selected.data('id');
            location.href = '/withdrawal/methods/select/'+ id;
        }, Math.random() * (5000 - 3000) + 3000);
    })





    $(document).on('click', '#copy', e => {
            value = $(e.currentTarget).siblings('input.copy-text').val();
            element = document.createElement('input');
            element.value = value;
            $('body').append(element);
            element.select();
            document.execCommand('copy');
            alert('Copied');
    })
</script>
@endpush
