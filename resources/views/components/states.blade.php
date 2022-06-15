@if(empty($states))
<option value="">Please choose a country</option>
@else
<option value="">Select a State/Region</option>
@foreach ($states as $state)
<option @if($selected==$state) selected="selected" @endif value="{{$state}}">{{$state}}</option>
@endforeach
@endif
