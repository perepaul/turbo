<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"
        content="{{ config('app.name') }},{{ route('front.index') }},bitcoin broker, reliable bitcoin trading platform, best online trading platfrom" />
    <meta name="author" content="{{ config('app.name') }} Developer team" />
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description"
        content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title') | Authentication</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ favicon() }}" />
    <link href="/assets/back/css/style.css" rel="stylesheet">
    @stack('css')
    {{-- @laravelPWA --}}
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    {{-- <div class="text-center mb-1">
                                        <a href="index-2.html"><img src="{{logo()}}" alt=""></a>
                                    </div> --}}
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/assets/back/vendor/global/global.min.js"></script>
    <script src="/assets/back/js/custom.min.js"></script>
    <script src="/assets/back/js/deznav-init.js"></script>
    <script src="/assets/back/js/styleSwitcher.js"></script>
    @include('includes.chat')
    @stack('js')
</body>

<!-- Mirrored from griya.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jul 2021 11:48:05 GMT -->

</html>
