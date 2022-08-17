@extends('layouts.front')
@section('title', 'Home')
@section('content')
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area clearfix dzsparallaxer auto-init ico fullwidth" data-options='{direction: "normal"}'
        id="home">
        <div class="divimage dzsparallaxer--target"
            style="width: 101%; height: 130%; background-image: url(img/bg-img/bg-2.jpg)"></div>

        <!-- Hero Content -->
        <div class="hero-content dark-blue">
            <!-- blip -->
            <div class="dream-blip blip1"></div>
            <div class="dream-blip blip2"></div>
            <div class="dream-blip blip3"></div>
            <div class="dream-blip blip4"></div>

            <div class="container h-100">
                <div class="row align-items-center">
                    <!-- Welcome Content -->
                    <div class="col-12 col-lg-6 col-md-12">
                        <div class="welcome-content">
                            <div class="promo-section">
                                <div class="integration-link">
                                    <span class="integration-icon">
                                        <img draggable="false" src="/assets/front/img/svg/img-dollar.svg" width="24"
                                            height="24" alt="">
                                    </span>
                                    <span class="integration-text" style="font-size: 12px;">Investment banking worth talking
                                        about!</span>
                                </div>
                            </div>
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s">Get Into The Enhanced Digital World Of Trading
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.3s">Invest in the world's most popular and
                                sought-after assets. Everything you are looking for in an ultimate investment platform — on
                                the device of your choice.</p>
                            <div class="dream-btn-group wow fadeInUp" data-wow-delay="0.4s">
                                <a href="{{ route('register') }}" class="btn dream-btn mr-3">Register <i
                                        class="fa fa-arrow-right"></i></a>
                                <a href="{{ route('login') }}" class="btn dream-btn">Login <i class="fa fa-lock"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Welcome Video Area -->
                    <div class="col-12 col-lg-6 col-md-12">
                        <div class="main-ilustration wow fadeInUp" data-wow-delay="0.5s">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-trade.marquee />

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area section-padding-0-100 clearfix mt-5" id="about">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6">
                    <div class="welcome-meter wow fadeInUp" data-wow-delay="0.7s">
                        <img draggable="false" src="/assets/front/img/svg/about1.svg" class="img-responsive center-block"
                            alt="">
                        <!-- client meta -->
                        <div class="growing-company text-center mt-30 wow fadeInUp" data-wow-delay="0.8s">
                            <p>* Already growing up <span class="counter">5236</span> company</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="who-we-contant">

                        <div class="dream-dots wow fadeInUp" data-wow-delay="0.2s">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <h4 class="wow fadeInUp" data-wow-delay="0.3s">We’ve built the platform for you to buy and sell
                            stocks, crypto and forex</h4>
                        <p class="wow fadeInUp" data-wow-delay="0.4s">Get access to the world most sought out stocks and
                            cryptos, generate trading strategies with the help of our sophisticated but simple market data
                            analysis section. </p>
                        <p class="wow fadeInUp" data-wow-delay="0.5s">Make your profit with ease as we have partnered with
                            secure payment gateway providers that offer military grade encryption for your information and
                            your funds.</p>
                        {{-- <a class="btn dream-btn mt-30 wow fadeInUp" data-wow-delay="0.6s" href="#">Read More</a> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6">
                    <div class="who-we-contant">

                        <div class="dream-dots wow fadeInUp" data-wow-delay="0.2s">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <h4 class="wow fadeInUp" data-wow-delay="0.3s">Benefit - Demo trading balance & first deposit bonus
                        </h4>
                        <p class="wow fadeInUp" data-wow-delay="0.4s">We value our users and to assure them the safety of
                            their investments, we came up with a demo account feature that is tailored to help newbies
                            practice on a free credit on their account to help them learn how to trade.</p>
                        <p class="wow fadeInUp" data-wow-delay="0.5s">We also give first time deposit bonus. This bonus
                            percentage varies according to the account plan you have subscribed to.</p>
                        {{-- <a class="btn dream-btn mt-30 wow fadeInUp" data-wow-delay="0.6s" href="#">Read More</a> --}}
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="welcome-meter wow fadeInUp" data-wow-delay="0.7s">
                        <img draggable="false" src="/assets/front/img/solution.png" class="center-block" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <div class="clearfix"></div>

    <!-- ##### Our Services Area Start ##### -->
    <section class="our_services_area section-padding-100-70 clearfix" id="services">
        <div class="container">

            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay="0.3s">What you get, trading with us.</h2>
                <p class="wow fadeInUp" data-wow-delay="0.4s">Here are some feature hightlights</p>
            </div>


            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/1.svg" alt="">
                        </div>
                        <h6>Smart Trading Modules</h6>
                        <p>Trading has never been easier. With our 3 click trade system, you can place a trade under 40
                            seconds. How fast is that?.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow wow fadeInUp" data-wow-delay="0.3s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/2.svg" alt="">
                        </div>
                        <h6>Free Demo Balance</h6>
                        <p>After subscribing to a plan, you get practice bonus that you can use to learn how to trade with
                            us, see how every feature works to boost your confidence.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/3.svg" alt="">
                        </div>
                        <h6>Easy and secure withdrawals </h6>
                        <p>It takes about a minute to request a withdrawal, and get your funds sent to your selected
                            withdrawal method in minutes.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/4.svg" alt="">
                        </div>
                        <h6>Top notch customer service</h6>
                        <p>We have provided multiple means of reaching out to us, from whatsapp, to live chat to email, we
                            are here for you, to solve your issues.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/5.svg" alt="">
                        </div>
                        <h6>Finance should be social</h6>
                        <p>For us, open discussion and self-expression are the greatest keys to unlocking understanding,
                            with a strong social network at its core.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content text-left mb-100 wow fadeInUp" data-wow-delay="0.7s">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="/assets/front/img/services/6.svg" alt="">
                        </div>
                        <h6>We don't create charts</h6>
                        <p>We never lose sight of the fact that millions of traders invest their hard-earned capital based
                            on what they see on our platform. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Our Services Area End ##### -->


    <!-- ##### Our roadmap Area start ##### -->
    <section class="roadmap" style="padding-bottom:0" id="roadmap">
        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <h2 class="wow fadeInUp" data-wow-delay="0.3s">3 simple steps</h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s">All it takes to trade and make profit.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="timeline-split">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="timeline section-box-margin">
                            {{-- <div class="block block-left">
                            <h3>Practice</h3>
                            <p>Sign up, subscribe to a trading account, get free credit according to the plan you subscribed to. Start practicing with those funds.</p>
                        </div> --}}

                            <div class="block block-right mt-30">
                                <h3>Deposit</h3>
                                <p>Make a deposit, get first time deposit bonus according to the plan you subscribed to.</p>
                            </div>

                            <div class="block block-left mt-30">
                                <h3>Trade</h3>
                                <p>Trade forex, indices, commodities. And earn profit.</p>
                            </div>

                            <div class="block block-right mt-30">
                                <h3>Withdraw</h3>
                                <p>Get your funds quickly and easily. We support a variety of withdrawal options.</p>
                            </div>
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Our roadmap Area End ##### -->

    <!-- ##### FAQ & Timeline Area Start ##### -->
    <div class="faq-timeline-area section-padding-100">
        <div class="">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-12 offset-lg-2">
                    <div class="section-heading">

                        <div class="dream-dots wow fadeInUp" data-wow-delay="0.2s">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay="0.3s">Frequently Asked Questions</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.4s" style="margin-left:0">Here are questions users
                            frequently ask us.</p>
                    </div>

                    <div class="dream-faq-area">
                        <dl>
                            <!-- Single FAQ Area -->
                            <dt class="wave wow fadeInUp" data-wow-delay="0.3s">How much money can I make?</dt>
                            <dd>
                                <p>Your success depends on your skills and patience, your chosen trading strategy, and the
                                    amount you are able to invest. Practicing traders can try out their trading skills and
                                    practice with the practice account.</p>
                            </dd>

                            <!-- Single FAQ Area -->
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How long does it take for the money I
                                deposited to be credited to my account?</dt>
                            <dd>
                                <p>Money deposited into your account takes about 3 hour for week days and up to 48 hours on
                                    weekends to be credited into your account.</p>
                            </dd>

                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">Can I deposit using someone else's
                                account? </dt>
                            <dd>
                                <p>No. All deposit means must belong to you, as well as the ownership of cards, CPF and
                                    other data.</p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How do I make a deposit?</dt>
                            <dd>
                                <p>Log into your account, go to the deposit page where you can make deposit. The minimum
                                    deposit amount depends on your subscription plan.</p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How long does it take for a withdrawal to
                                be processed?</dt>
                            <dd>
                                <p>It takes 3 hours on weekdays and upto 48 hours on weekends.</p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">Why did you charge 25% of my withdrawal?
                            </dt>
                            <dd>
                                <p>The 25% charge is our commission that we take to run the platform and provide you the
                                    opportunity to access to trade.</p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How do I make a withdrawal?</dt>
                            <dd>
                                <p>
                                    Log into your account, go to the withdrawal section, input amount and the withdrawal
                                    method you prefer. (Withdrawals are only payable to the account type used in making
                                    deposit).

                                    <strong>Note</strong> bonuses can't be withdrawn without an available balance.
                                </p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">What are the min and max withdrawal
                                amounts?</dt>
                            <dd>
                                <p>Minimum and maximum withdrawal amounts depends on the subscription plan you are
                                    subscribed to.</p>
                            </dd>
                            <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How do i verify my account?</dt>
                            <dd>
                                <p>After creating your account, you will be directed to a page where you can input your
                                    personal information to complete the data capture, then our agents will review the data
                                    and process the activation process. It usually takes about an hour from the time of
                                    submission.
                                </p>
                            </dd>


                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <div class="contact_us_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">

                        <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay="0.3s">Contact Us</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.4s">Send us a message by filling the form below.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact_form">
                        <form action="{{ route('front.send.contact') }}" method="post" id="main_contact_form"
                            novalidate>
                            <div class="row">
                                <div class="col-12">
                                    <div id="success_fail_info"></div>
                                </div>
                                @csrf

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
@endsection

@push('css')
    <style>
        .card-img-top {
            height: 300px;
        }

        .blog-body,
        .card-title {
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: rgb(39, 38, 38);
            font-size: .8em;
            text-align: justify;
        }

        .card-title {
            font-size: 1.2em;
            font-weight: 600;
        }

        .blog-card:hover {
            box-shadow: 10px 10px 8px #888888;
        }

        .carousel {
            padding: 0 25px;
        }


        .slick-dots li {
            background-color: white;
        }
    </style>
@endpush

@push('js')
    <script>
        $('.carousel').slick({
            speed: 300,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                    }
                }
            ]
        });
    </script>
@endpush
