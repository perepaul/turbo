@extends('layouts.back')
@section('title','Region Representative')
@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{route('user.representative')}}" method="POST" class="row p-4" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="firstname">First name</label>
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $rep?->firstname ?? old('firstname') }}">
                    <x-error key="firstname" />
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last name</label>
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $rep?->lastname ?? old('lastname') }}">
                    <x-error key="lastname" />
                </div>
                <div class="form-group col-md-6">
                    <label for="">Country</label>
                    <select name="country" id="country" class="form-select">
                        <x-countries country="{{$rep?->country ?? old('country')}}" />
                    </select>
                    <x-error key="country" />
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">State/Region</label>
                    <select name="state" id="state" class="form-select">
                        <x-states selected="{{$rep?->state ?? old('state') }}" country="{{$rep?->country ?? old('country') }}" />
                    </select>
                    <x-error key="state" />
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-control" name="address" value="{{$rep?->address ?? old('address') }}">
                    <x-error key="address" />
                </div>

                <div class="form-group col-md-8">
                    <label for="city">City</label>
                    <input id="city" type="text" class="form-control" name="city" value="{{$rep?->city ?? old('city') }}">
                    <x-error key="city" />
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="zip_code">Zip/Postal Code</label>
                    <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{$rep?->zip_code ?? old('zip_code') }}">
                    <x-error key="zip_code" />
                </div>
                <div class="col-12 mb-3">
                    <p>Would you love to share our platform on your social media account?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="question_one" id="question_one_yes" value="yes" @if($rep?->question_one == 'yes' ?? old('question_one') == 'yes') checked="checked" @endif>
                        <label class="form-check-label" for="question_one_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="question_one" id="question_one_no" value="no" @if($rep?->question_one == 'no' ?? old('question_one') == 'no') checked="checked" @endif>
                        <label class="form-check-label" for="question_one_no">No</label>
                    </div>
                    <x-error key="question_one" />
                </div>

                <div class="col-12 mb-3">
                    <p>Would you do promotional materials on behalf of the company for marketing purposes?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="question_two" id="question_two_yes" value="yes" @if($rep?->question_two == 'yes' ?? old('question_two') == 'yes') checked="checked" @endif>
                        <label class="form-check-label" for="question_two_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="question_two" id="question_two_no" value="no" @if($rep?->question_two == 'no' ?? old('question_two') == 'no') checked="checked" @endif>
                        <label class="form-check-label" for="question_two_no">No</label>
                    </div>
                    <x-error key="question_two" />
                </div>

                <div class="form-group">
                    <label for="question_three">To what extent do you intent to promote the platform?</label>
                    <textarea style="min-height: 100px;" name="question_three" id="question_three" class="form-control" placeholder="To what extent do you intent to promote the platform?">{{$rep?->question_three ?? old('question_three')}}</textarea>
                    <x-error key="question_three" />
                </div>

                <div class="form-group">
                    <input type="file" name="passport" id="passport" style="display:none" accept="image/*">
                    <label for="passport" id="placeholder">
                        @if($rep?->passport)
                        <img src="{{asset(config('dir.passport').$rep?->passport)}}" alt="">
                        @else
                        <span>
                            <i class="fa fa-upload"></i> <br>
                            Upload Passport
                        </span>
                        @endif
                    </label>
                    <x-error key="passport" />

                </div>

                <button class="btn btn-block btn-primary mt-3" @if(in_array($rep?->status, ['pending','approved'])) disabled="disabled" style="cursor: not-allowed;" @endif>
                    @if($rep?->status == 'pending')
                    Application submited
                    @elseif($rep?->status == 'approved')
                    Approved
                    @else
                    Apply Now
                    @endif
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

@if (in_array($rep?->status,['pending','approved']))
<script>
    $('input,textarea,select').attr('disabled',true).attr('readonly',true);
</script>
@endif
<script>
    $(document).on('change','#passport', function(e){
        let file = $(e.currentTarget).prop('files')[0];
        if(!file.type.startsWith('image/')){
            toast('Only images can be used as passport','error');
            return;
        }
        let url = URL.createObjectURL(file);
        $('#placeholder').html(`<img src='${url}' />`);
    })
</script>
@endpush

@push('css')
<style>
    label#placeholder {
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

    label#placeholder span {
        padding: 49% 0 50%;
    }

    label#placeholder img {
        height: 100%;
        width: 100%;

    }
</style>
@endpush
