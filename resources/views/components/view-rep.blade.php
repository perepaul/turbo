<form action="{{route('user.representative')}}" method="POST" class="row p-4" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-md-6">
        <label for="firstname">First name</label>
        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $rep?->firstname ?? old('firstname') }}" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
        <x-error key="firstname" />
    </div>
    <div class="form-group col-md-6">
        <label for="lastname">Last name</label>
        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $rep?->lastname ?? old('lastname') }}" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
        <x-error key="lastname" />
    </div>
    <div class="form-group col-md-6">
        <label for="">Country</label>
        <select name="country" id="country" class="form-select" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <x-countries country="{{$rep?->country ?? old('country')}}" />
        </select>
        <x-error key="country" />
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">State/Region</label>
        <select name="state" id="state" class="form-select" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <x-states selected="{{$rep?->state ?? old('state') }}" country="{{$rep?->country ?? old('country') }}" />
        </select>
        <x-error key="state" />
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input id="address" type="text" class="form-control" name="address" value="{{$rep?->address ?? old('address') }}" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
        <x-error key="address" />
    </div>

    <div class="form-group col-md-8">
        <label for="city">City</label>
        <input id="city" type="text" class="form-control" name="city" value="{{$rep?->city ?? old('city') }}" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
        <x-error key="city" />
    </div>
    <div class="form-group col-md-4 mb-3">
        <label for="zip_code">Zip/Postal Code</label>
        <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{$rep?->zip_code ?? old('zip_code') }}" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
        <x-error key="zip_code" />
    </div>
    <div class="col-12 mb-3">
        <p>Would you love to share our platform on your social media account?</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_one" id="question_one_yes" value="yes" @if($rep?->question_one == 'yes' ?? old('question_one') == 'yes') checked="checked" @endif @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled"
            @endif>
            <label class="form-check-label" for="question_one_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_one" id="question_one_no" value="no" @if($rep?->question_one == 'no' ?? old('question_one') == 'no') checked="checked" @endif @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <label class="form-check-label" for="question_one_no">No</label>
        </div>
        <x-error key="question_one" />
    </div>

    <div class="col-12 mb-3">
        <p>Would you do promotional materials on behalf of the company for marketing purposes?</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_two" id="question_two_yes" value="yes" @if($rep?->question_two == 'yes' ?? old('question_two') == 'yes') checked="checked" @endif @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled"
            @endif>
            <label class="form-check-label" for="question_two_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_two" id="question_two_no" value="no" @if($rep?->question_two == 'no' ?? old('question_two') == 'no') checked="checked" @endif @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <label class="form-check-label" for="question_two_no">No</label>
        </div>
        <x-error key="question_two" />
    </div>

    <div class="form-group">
        <label for="question_three">To what extent do you intent to promote the platform?</label>
        <textarea style="min-height: 100px;" name="question_three" id="question_three" class="form-control" placeholder="To what extent do you intent to promote the platform?"
          @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>{{$rep?->question_three ?? old('question_three')}}</textarea>
        <x-error key="question_three" />
    </div>

    <div class="d-flex justify-content-between px-5">
        <div class="form-group">
            <input type="file" name="passport" id="passport" style="display:none" accept="image/*" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <label for="passport" class="placeholder">
                @if($rep?->passport)
                <img src="{{asset(config('dir.passport').$rep?->passport)}}" alt="">
                @else
                <span>
                    <i class="fa fa-upload"></i> <br>
                    Upload Passport Photograph
                </span>
                @endif
            </label>
            <x-error key="passport" />
        </div>

        <div class="form-group">
            <input type="file" name="id_card" id="id_card" style="display:none" accept="image/*" @if(in_array($rep?->status,['pending','accepted'])) readonly="readonly" disabled="disabled" @endif>
            <label for="id_card" class="placeholder">
                @if($rep?->passport)
                <img src="{{asset(config('dir.passport').$rep?->id_card)}}" alt="">
                @else
                <span>
                    <i class="fa fa-upload"></i> <br>
                    Upload Identity Card
                </span>
                @endif
            </label>
            <x-error key="id_card" />
        </div>

    </div>

    @if (isset($button))
    <button class="btn btn-block btn-primary mt-3" @if(in_array($rep?->status, ['pending','accepted','rejected'])) disabled="disabled" style="cursor: not-allowed;" @endif>
        @if($rep?->status == 'pending')
        Application submitted
        @elseif($rep?->status == 'accepted')
        Application Accepted
        @elseif($rep?->status == 'rejected')
        Application Declined
        @else
        Apply Now
        @endif
    </button>
    @endif

</form>
