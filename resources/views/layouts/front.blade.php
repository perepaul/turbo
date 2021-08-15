<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link type="image/x-icon" href="{{ favicon() }}" rel="icon">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/front/css/color.css">
    <link rel="stylesheet" type="text/css" href="/assets/front/css/responsive.css">
</head>

<body>

    <!-- Start preloader -->
    <div id="preloader"></div>
    <!-- End preloader -->

    <!-- Top scroll -->
    <div class="top-scroll transition">
        <a href="#banner" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>
    <!-- Top scroll End -->

    <header class="transition">
        <div class="container">
            <div class="row flex-align">
                <div class="col-lg-4 col-md-3 col-8">
                    <div class="logo">
                        <a href="index-2.html"><img src="{{ logo() }}" class="transition" width="60"
                                alt="Bidpips"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-4 text-right">
                    <div class="menu-toggle">
                        <span></span>
                    </div>
                    <div class="menu">
                        <ul class="d-inline-block">
                            <li><a href="{{ route('front.index') }}/">Home</a></li>
                            <li><a href="{{ route('front.about') }}">About</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact</a></li>
                            <li><a href="{{ route('front.faq') }}">FAQ</a></li>
                        </ul>
                        <div class="signin d-inline-block">
                            <a href="{{ route('user.index') }}" class="btn">
                                @auth('user')
                                    Dashboard
                                @else
                                    Sign in
                                @endauth
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="bg-pattern darkblue ptb-100">
        <div class="container">
            {{-- <a class="text-primary" href="{{ route('front.index') }}">Home</a> --}}
            {{-- <div class="footer">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-logo pb-25">
                            <a href="index-2.html"><img src="images/logo.png" alt="Cryptcon"></a>
                        </div>
                        <div class="footer-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-link">
                            <ul>
                                <li><a href="#">What is ico</a></li>
                                <li><a href="#">ICO Apps</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="token-sale.html">Tokens</a></li>
                                <li><a href="#">Whitepaper</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="roadmap.html">Roadmap</a></li>
                                <li><a href="team.html">Teams</a></li>
                                <li><a href="faq.html">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="subscribe">
                            <div class="form-group">
                                <label>Subscribe to our Newsleter</label>
                                <input type="email" class="form-control" placeholder="Enter your email Address">
                                <input type="submit" name="submit" value="Subscribe" class="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="copyright">
                <div class="row">
                    <div class="col-lg-6">
                        <p>© All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/assets/front/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/front/js/bootstrap.min.js"></script>
    <script src="/assets/front/js/owl.carousel.min.js"></script>
    <script src="/assets/front/js/snap.svg-min.js"></script>
    <script src="/assets/front/js/jquery.listtopie.min.js"></script>
    <script src="/assets/front/js/animation.js"></script>
    <script src="/assets/front/js/custom.js"></script>
</body>

</html>
