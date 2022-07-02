@if(empty($states))
<option value="">Select a State/Region</option>
@else
<option value="">Select a State/Region</option>
@foreach ($states as $state)
<option @if($selected==$state) selected="selected" @endif value="{{$state}}">{{$state}}</option>
@endforeach
@endif
