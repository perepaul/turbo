<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="{{config('app.name')}},{{route('front.index')}},bitcoin broker, reliable bitcoin trading platform, best online trading platfrom" />
        <meta name="author" content="{{config('app.name')}} Developer team" />
        <meta name="robots" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:description" content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
        <meta name="format-detection" content="telephone=no">

        <!-- PAGE TITLE HERE -->
        <title>@yield('title') | {{config('app.name')}}</title>

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{favicon()}}" />
        <link href="/assets/back/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/back/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/assets/back/vendor/toastr/css/toastr.min.css">
        <!-- Style css -->
        <link href="/assets/back/css/style.css" rel="stylesheet">
        <style>
            .form-group {
                margin-bottom: 10px;
            }

            .form-select {
                height: 3.5rem;
            }

            .form-control {
                border: 1px solid rgb(243, 237, 237);
            }
        </style>
        @stack('css')

    </head>

    <body>

        <!--*******************
        Preloader start
    ********************-->
        <div id="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!--*******************
        Preloader end
    ********************-->

        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
            Nav header start
        ***********************************-->
            <div class="nav-header">
                <a href="/" class="brand-logo">
                    <img src="{{logo()}}" alt="" style="width:180px; height:auto">
                </a>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
            <!--**********************************
            Nav header end
        ***********************************-->

            <!--**********************************
            Header start
        ***********************************-->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                <div class="nav-item">
                                    <div class="input-group search-area">
                                        <input type="text" class="form-control" placeholder="Search here">
                                        <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                        <div class="header-info me-3">
                                            <span class="fs-18 font-w500 text-end">{{auth()->user()->firstname}}</span>
                                            <small class="text-end fs-14 font-w400">{{auth()->user()->email}}</small>
                                        </div>
                                        <img src="{{profile_picture()}}" width="20" alt="" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{request()->isAdmin() ? route('admin.settings.profile.index') : route('user.profile')}}" class="dropdown-item ai-icon">
                                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="ms-2">Profile </span>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item ai-icon" onclick="document.getElementById('logout-form').submit()">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ms-2">Logout </span>
                                            <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

            <!--**********************************
            Sidebar start
        ***********************************-->
            <div class="deznav">
                <div class="deznav-scroll">
                    @if (request()->isAdmin())
                    <x-admin.sidebar />
                    @elseif(request()->isUser())
                    <x-user.sidebar />
                    @endif
                </div>
            </div>
            <!--**********************************
            Sidebar end
        ***********************************-->

            <!--**********************************
            Content body start
        ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                        <h3 class="mb-3 me-auto">@yield('title')</h3>
                    </div>

                    @if (request()->isUser() && auth()->user()->trade_cert != 'verified')
                    <div class="alert alert-outline-warning fade show" role="alert">
                        <strong><i class="fa fa-exclamation-circle"></i></strong> Your account is currently <strong>inactive</strong> as we have requested for your trading licence, your account will be activated when it is verified. <a href="{{route('user.kyc.index')}}">click to continue</a>
                    </div>
                    @endif

                    {{-- Content --}}
                    @yield('content')
                    {{-- End Content --}}
                </div>
            </div>
            <!--**********************************
            Content body end
        ***********************************-->



            <!--**********************************
            Footer start
        ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © {{base_domain()}}; {{now()->format('Y')}}</p>
                </div>
            </div>
            <!--**********************************
            Footer end
        ***********************************-->

            <!--**********************************
           Support ticket button start
        ***********************************-->

            <!--**********************************
           Support ticket button end
        ***********************************-->


        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        @stack('modals')
        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        <script src="/assets/back/vendor/global/global.min.js"></script>
        <script src="/assets/back/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="/assets/back/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>



        <!-- Chart piety plugin files -->
        <script src="/assets/back/vendor/peity/jquery.peity.min.js"></script>
        <!-- JS for dotted map -->
        <script src="/assets/back/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
        <script src="/assets/back/vendor/dotted-map/js/contrib/suntimes.js"></script>
        <script src="/assets/back/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>

        <script src="/assets/back/vendor/dotted-map/js/world.js"></script>
        <script src="/assets/back/vendor/dotted-map/js/smallimap.js"></script>

        <script src="/assets/back/vendor/toastr/js/toastr.min.js"></script>



        <script src="/assets/back/js/custom.min.js"></script>
        <script src="/assets/back/js/deznav-init.js"></script>
        <script src="/assets/back/js/styleSwitcher.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('includes.chat')

        <script>
            function toast(message, type = 'success') {
            let data = {
                timeOut: 5000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            };
            if (type == 'success') {
                toastr.success(message, "Sucess", data)
            } else {
                toastr.error(message, "Error", data)
            }
        }
        </script>

        @if(session()->has('success'))
        <script>
            toast("{{session()->get('success')}}")
        </script>
        @endif

        @if(session()->has('error'))
        <script>
            toast("{{session()->get('error')}}","error")
        </script>
        @endif

        {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toast("{{ $error }}", 'error')
        </script>
        @endforeach
        @endif --}}


        @stack('js')


    </body>


</html>
