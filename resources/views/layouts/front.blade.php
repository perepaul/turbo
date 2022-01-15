<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Home - {{config('app.name')}}</title>

        <!-- Favicon -->
        <link rel="icon" href="/assets/front/img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="/assets/front/css/style.css">

        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="/assets/front/css/responsive.css">

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
                        <a class="nav-brand" href="#"><img draggable="false" src="/assets/front/img/core-img/logo.png" alt="logo"> {{ucfirst(config('app.name'))}}.</a>

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
                                    <li><a href="#team">Team</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>

                                <!-- Button -->
                                <a href="{{route('login')}}" class="btn login-btn ml-50">Log in</a>
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

            <!-- ##### Contact Area Start ##### -->
            <div class="contact_us_area" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-heading text-center">

                                <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                                    <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                </div>
                                <h2 class="wow fadeInUp" data-wow-delay="0.3s">Contact With Us</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="contact_form">
                                <form action="#" method="post" id="main_contact_form" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="success_fail_info"></div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="group wow fadeInUp" data-wow-delay="0.2s">
                                                <input type="text" name="name" id="name" required>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="group wow fadeInUp" data-wow-delay="0.3s">
                                                <input type="text" name="email" id="email" required>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="group wow fadeInUp" data-wow-delay="0.4s">
                                                <input type="text" name="subject" id="subject" required>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="group wow fadeInUp" data-wow-delay="0.5s">
                                                <textarea name="message" id="message" required></textarea>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                            <button type="submit" class="btn dream-btn">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ##### Contact Area End ##### -->

            <div class="footer-content-area " style="background-image: url(/assets/front/img/core-img/footer-bg1.png);">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-12 col-md-5">
                            <div class="footer-copywrite-info">
                                <!-- Copywrite -->
                                <div class="copywrite_text wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="footer-logo">
                                        <a href="#"><img draggable="false" src="img/core-img/logo.png" alt="logo"> Coinland.</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit ducimus voluptatibus neque illo id repellat quisquam? Autem expedita earum quae laborum ipsum ad, a eaque officiis eligendi blanditiis odio necessitatibus.</p>
                                </div>
                                <!-- Social Icon -->
                                <div class="footer-social-info wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <!-- Content Info -->
                            <div class="contact_info_area d-sm-flex justify-content-between">
                                <div class="contact_info text-center wow fadeInUp" data-wow-delay="0.2s">
                                    <h5>NAVIGATE</h5>
                                    <a href="">
                                        <p>Advertisers</p>
                                    </a>
                                    <a href="">
                                        <p>Developers</p>
                                    </a>
                                    <a href="">
                                        <p>Resources</p>
                                    </a>
                                    <a href="">
                                        <p>Company</p>
                                    </a>
                                    <a href="">
                                        <p>Connect</p>
                                    </a>
                                </div>
                                <!-- Content Info -->
                                <div class="contact_info text-center wow fadeInUp" data-wow-delay="0.3s">
                                    <h5>PRIVACY & TOS</h5>
                                    <a href="">
                                        <p>Advertiser Agreement</p>
                                    </a>
                                    <a href="">
                                        <p>Acceptable Use Policy</p>
                                    </a>
                                    <a href="">
                                        <p>Privacy Policy</p>
                                    </a>
                                    <a href="">
                                        <p>Technology Privacy</p>
                                    </a>
                                    <a href="">
                                        <p>Developer Agreement</p>
                                    </a>
                                </div>
                                <!-- Content Info -->
                                <div class="contact_info text-center wow fadeInUp" data-wow-delay="0.4s">
                                    <h5>CONTACT US</h5>
                                    <p>Mailing Address:xx00 E. Union Ave</p>
                                    <p>Suite 1100. Denver, CO 80237</p>
                                    <p>+999 90932 627</p>
                                    <p>support@yourdomain.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        <!-- script js -->
        <script src="/assets/front/js/script.js"></script>

    </body>

</html>
