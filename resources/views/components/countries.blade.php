@foreach ($countries as $c)
<option value="{{$c['iso2']}}">{{$c['name']}}</option>
@endforeach
