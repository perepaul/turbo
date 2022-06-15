@extends('layouts.activation')
@section('title', 'Activation Complete')

@section('content')
<h4 class="text-center mb-1 mt-2">@yield('title')</h4>

<div class="text-justify">
    <h5>Congratulations!</h5>
    <p>Your account has been set up successfully, please hold on as our agents review your account, if more information
        is required you will be contacted via the email you submited.</p>
    <p>You will be allowed to access your trading dashboard after the review excercise.</p>
    <p><strong>PS:</strong> Account review might take up to 3 working hours to complete.</p>
    <p>
        Thanks, <br>
        <strong>
            {{ config('app.name') }} Team.
        </strong>
    </p>
</div>
@endsection
