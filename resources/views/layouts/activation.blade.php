<!DOCTYPE html>
<html lang="en" class="h-100">



    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Griya : Real Estate Admin" />
        <meta property="og:title" content="Griya : Real Estate Admin" />
        <meta property="og:description" content="Griya : Real Estate Admin" />
        <meta property="og:image" content="page-error-404.html" />
        <meta name="format-detection" content="telephone=no">

        <!-- PAGE TITLE HERE -->
        <title>@yield('title') | Authentication</title>

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ favicon() }}" />
        <link href="/assets/back/css/style.css" rel="stylesheet">
        @laravelPWA
    </head>

    <body class="vh-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-7">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        {{-- <div class="text-center mb-1">
                                        <a href="index-2.html"><img src="{{logo()}}" alt=""></a>
                                    </div> --}}
                                    <h2 class="text-center">Account Set Up</h2>
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
        <script src="/assets/back/vendor/jquery-nice-select/jquery-nice-select.min.js"></script>
        <script src="/assets/back/vendor/global/global.min.js"></script>
        <script src="/assets/back/js/custom.min.js"></script>
        <script src="/assets/back/js/deznav-init.js"></script>
        <script src="/assets/back/js/styleSwitcher.js"></script>
        @stack('js')
    </body>


</html>
