@error($key)
<span class="text-sm text-danger d-block" id="{{$key}}_error">{{$message}}</span>
@else
<span class="text-sm text-danger d-block" id="{{$key}}_error"></span>
@enderror
