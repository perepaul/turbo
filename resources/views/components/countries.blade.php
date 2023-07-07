<option value="">Select Country</option>
@foreach ($countries as $c)
<option @if($country==$c) selected="selected" @endif value="{{$c}}">{{$c}}</option>
@endforeach
