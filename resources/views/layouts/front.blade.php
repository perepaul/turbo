<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="keywords" content="{{config('app.name')}},{{route('front.index')}},bitcoin broker, reliable bitcoin trading platform, best online trading platfrom" />
        <meta name="author" content="{{config('app.name')}} Developer team" />
        <meta name="robots" content="" />
        <meta name="description" content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
        <meta property="og:title" content="Home - {{config('app.name')}}" />
        <meta property="og:description" content="Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section" />
        <meta name="format-detection" content="telephone=no">

        <!-- Title -->
        <title>Home - {{config('app.name')}}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{favicon()}}">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="/assets/front/css/style.css">

        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="/assets/front/css/responsive.css">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

        @stack('css')
        @laravelPWA
    </head>

    <body class="darker-blue">
        <!-- Preloader -->
        <div id="preloader">
            <div class="preload-content">
                <div id="dream-load"></div>
            </div>
        </div>

        <!-- ##### Header Area Start ##### -->
        <header class="header-area wow fadeInDown" data-wow-delay="0.2s">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="dreamNav">

                        <!-- Logo -->
                        {{-- <a class="nav-brand" href="#"><img draggable="false" src="/assets/front/img/core-img/logo.png" alt="logo"> {{ucfirst(config('app.name'))}}.</a> --}}
                        <a class="nav-brand" href="#"><img draggable="false" src="{{logo()}}" alt="logo" style="width: 180px; height: auto;"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#roadmap">Roadmap</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>

                                <!-- Button -->
                                @auth('user')
                                <a href="{{route('user.index')}}" class="btn login-btn ml-50">Dashboard</a>
                                @else
                                <a href="{{route('login')}}" class="btn login-btn ml-50">Log in</a>
                                @endauth
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        @yield('content')


        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area bg-img" style="background-image: url(/assets/front/img/core-img/pattern.png);">



            <div class="footer-content-area " style="background-image: url(/assets/front/img/core-img/footer-bg1.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="footer-copywrite-info">
                                <!-- Copywrite -->
                                <div class="copywrite_text wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="footer-logo">
                                        <a href="{{route('front.index')}}"><img draggable="false" src="{{logo()}}" alt="logo" style="width:180px"></a>
                                    </div>
                                    <p>Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="contact_info_area">
                                <div class="contact_info text-center wow fadeInUp" data-wow-delay="0.2s">
                                    <h5>NAVIGATE</h5>
                                    <a href="#top">
                                        <p>Home</p>
                                    </a>
                                    <a href="#about">
                                        <p>About</p>
                                    </a>
                                    <a href="#services">
                                        <p>Services</p>
                                    </a>
                                    {{-- <a href="#team">
                                        <p>Team</p>
                                    </a> --}}
                                    <a href="#contact">
                                        <p>Contact</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- Content Info -->
                            <div class="contact_info_area">
                                <!-- Content Info -->
                                <div class="contact_info text-center wow fadeInUp" data-wow-delay="0.4s">
                                    <h5>CONTACT US</h5>
                                    <p>{{$contact?->address}}</p>
                                    <p><a href="tel:{{$contact?->phone}}">{{$contact?->phone}}</a></p>
                                    <p><a href="mailto:{{$contact?->support_email}}">{{$contact?->support_email}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-center text-white text-sm">
                    © {{date('Y')}} {{config('app.name')}}. All rights reserved.
                </p>
            </div>

        </footer>
        <!-- ##### Footer Area End ##### -->

        <!-- ########## All JS ########## -->
        <!-- jQuery js -->
        <script src="/assets/front/js/jquery.min.js"></script>
        <!-- Popper js -->
        <script src="/assets/front/js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="/assets/front/js/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="/assets/front/js/plugins.js"></script>
        <!-- Parallax js -->
        <script src="/assets/front/js/dzsparallaxer.js"></script>

        <script src="/assets/front/js/jquery.syotimer.min.js"></script>

        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- script js -->
        <script src="/assets/front/js/script.js"></script>

        @include('includes.chat')

        @stack('js')

    </body>

</html>
