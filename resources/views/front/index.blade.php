@extends('layouts.front')
@section('title', 'Home')
@section('content')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area clearfix dzsparallaxer auto-init ico fullwidth" data-options='{direction: "normal"}' id="home">
    <div class="divimage dzsparallaxer--target" style="width: 101%; height: 130%; background-image: url(img/bg-img/bg-2.jpg)"></div>

    <!-- Hero Content -->
    <div class="hero-content dark-blue">
        <!-- blip -->
        <div class="dream-blip blip1"></div>
        <div class="dream-blip blip2"></div>
        <div class="dream-blip blip3"></div>
        <div class="dream-blip blip4"></div>

        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="welcome-content">
                        <div class="promo-section">
                            <div class="integration-link">
                                <span class="integration-icon">
                                    <img draggable="false" src="/assets/front/img/svg/img-dollar.svg" width="24" height="24" alt="">
                                </span>
                                <span class="integration-text">Discover a new ways to enjoy your World!</span>
                            </div>
                        </div>
                        <h1 class="wow fadeInUp" data-wow-delay="0.2s">Get Into The Enhanced Digital World Of Trading</h1>
                        <p class="wow fadeInUp" data-wow-delay="0.3s">Invest in the world's most popular and sought-after assets. Everything you are looking for in an ultimate investment platform — on the device of your choice.</p>
                        <div class="dream-btn-group wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{route('register')}}" class="btn dream-btn mr-3">Start Now <i class="fa fa-arrow-right"></i></a>
                            <a href="{{route('login')}}" class="btn dream-btn">Login <i class="fa fa-lock"></i></a>
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
<!-- ##### Welcome Area End ##### -->

{{-- <div class="vertical-social">
    <ul>
        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-medium" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>

    </ul>
</div> --}}

<!-- ##### trust Area Start ##### -->
<div class="trust-section section-padding-100">
    <div class="section-heading text-center">

        <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <h2 class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">We are trusted</h2>
        <p class="wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">We have run on military grade 256bit encryption along side with Secure Socket Layer (SSL), so your data is in safe hands.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src="data:image/png;base64,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"
                          alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
                        <!-- <div class="value">8.9</div> -->
                        <div class="check-icon"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src="data:image/png;base64,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"
                          alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
                        <div class="value">8.9</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src="data:image/png;base64,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"
                          alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
                        <!-- <div class="value">8.9</div> -->
                        <div class="check-icon"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src="data:image/png;base64,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"
                          alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
                        <!-- <div class="value">8.9</div> -->
                        <div class="check-icon"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.6s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src="data:image/png;base64,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"
                          alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
                        <div class="value">7.4</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.7s">
                    <div class="ico-platform-logo">
                        <img draggable="false"
                          src=data:image/png;base64,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" alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class=" check">
                        <!-- <div class="value">8.9</div> -->
                        <div class="check-icon"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ##### trust Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area section-padding-0-100 clearfix" id="about">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-lg-6">
                <div class="welcome-meter wow fadeInUp" data-wow-delay="0.7s">
                    <img draggable="false" src="/assets/front/img/svg/about1.svg" class="img-responsive center-block" alt="">
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
                    <h4 class="wow fadeInUp" data-wow-delay="0.3s">We’ve built the platform for you to buy and sell stocks, crypto and forex</h4>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">Get access to the world most sought out stocks and cryptos, generate trading strategies with the help of our sophisticated but simple market data analysis section. </p>
                    <p class="wow fadeInUp" data-wow-delay="0.5s">Make your profit with ease as we have partnered with secure payment gateway providers that offer military grade encryption for your information and your funds.</p>
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
                    <h4 class="wow fadeInUp" data-wow-delay="0.3s">Benefit - Demo trading balance & first deposit bonus</h4>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">We value our users and to assure them the safety of their investments, we came up with a demo account feature that is tailored to help newbies practice on a free credit on their account to help them learn how to trade.</p>
                    <p class="wow fadeInUp" data-wow-delay="0.5s">We also give first time deposit bonus. This bonus percentage varies according to the account plan you have subscribed to.</p>
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
                    <p>Trading has never been easier. With our 3 click trade system, you can place a trade under 40 seconds. How fast is that?.</p>
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
                    <p>After subscribing to a plan, you get practice bonus that you can use to learn how to trade with us, see how every feature works to boost your confidence.</p>
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
                    <p>It takes about a minute to request a withdrawal, and get your funds sent to your selected withdrawal method in minutes.</p>
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
                    <p>We have provided multiple means of reaching out to us, from whatsapp, to live chat to email, we are here for you, to solve your issues.</p>
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
                    <p>For us, open discussion and self-expression are the greatest keys to unlocking understanding, with a strong social network at its core.</p>
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
                    <p>We never lose sight of the fact that millions of traders invest their hard-earned capital based on what they see on our platform. </p>
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
        <h2 class="wow fadeInUp" data-wow-delay="0.3s">4 simple steps</h2>
        <p class="wow fadeInUp" data-wow-delay="0.4s">All it takes to trade and make profit.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="timeline-split">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="timeline section-box-margin">
                        <div class="block block-left">
                            <h3>Practice</h3>
                            <p>Sign up, subscribe to a trading account, get free credit according to the plan you subscribed to. Start practicing with those funds.</p>
                        </div>

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


<!-- ##### Subscribe Area start ##### -->
<section class="container pt-5" style="padding-bottom: 0px" id="start">
    <div class="subscribe">
        <div class="row">
            <div class="col-sm-12">
                <div class="subscribe-wrapper">
                    <div class="section-heading text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Subscribe to our newsletter</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Get our latest news delivered to your mail.</p>
                    </div>
                    <div class="service-text">

                        <div class="col-lg-8 col-lg-offset-2 col-md-8 offset-md-2 col-xs-12 text-center">
                            <div class="group">
                                <input type="text" name="subject" required="">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>enter your email</label>
                                <button class="dream-btn"><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Subscribe Area End ##### -->

<!-- ##### FAQ & Timeline Area Start ##### -->
<div class="faq-timeline-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-12 offset-lg-2">
                <div class="section-heading">

                    <div class="dream-dots wow fadeInUp" data-wow-delay="0.2s">
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay="0.3s">Frequently Asked Questions</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.4s" style="margin-left:0">Here are questions users frequently ask us.</p>
                </div>

                <div class="dream-faq-area">
                    <dl>
                        <!-- Single FAQ Area -->
                        <dt class="wave wow fadeInUp" data-wow-delay="0.2s">How much money can I make on the practice account?</dt>
                        <dd class="wow fadeInUp" data-wow-delay="0.3s">
                            <p>You can't take any profit from transactions you complete on the practice account. You get virtual funds and make virtual transactions. It is intended for training purposes only. To trade using real money, you need to deposit funds to a real account.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave wow fadeInUp" data-wow-delay="0.3s">How much money can I make?</dt>
                        <dd>
                            <p>Your success depends on your skills and patience, your chosen trading strategy, and the amount you are able to invest. Beginner traders can try out their skills and practice on the practice account.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave wow fadeInUp" data-wow-delay="0.4s">How do i switch between the practice account and my real account.</dt>
                        <dd>
                            <p>On the trading page use the demo account to make the trade.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How long does it take for the money I deposited to be credited to my account?</dt>
                        <dd>
                            <p>Money deposited into your account takes about 3 hour for week days and up to 48 hours on weekends to be credited into your account.</p>
                        </dd>

                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">Can I deposit using someone else's account? </dt>
                        <dd>
                            <p>No. All deposit means must belong to you, as well as the ownership of cards, CPF and other data.</p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How so I make a deposit?</dt>
                        <dd>
                            <p>Log into your account, go to the deposit page where you can make deposit. The minimum deposit amount depends on your subscription plan.</p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How long does it take for a withdrawal to be processed?</dt>
                        <dd>
                            <p>It takes 3 hours on weekdays and upto 48 hours on weekends.</p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">Why did you charge 5% of my withdrawal?</dt>
                        <dd>
                            <p>The 5% charge is our commission that we take to run the platform and provide you the opportunity to access to trade.</p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How do I make a withdrawal?</dt>
                        <dd>
                            <p>
                                Log into your account, go to the withdrawal section, input amount and the withdrawal method you prefer.

                                <strong>Note</strong> Funds on your demo account cannot be withdrawn.
                            </p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">What are the min and max withdrawal amounts?</dt>
                        <dd>
                            <p>Minimum and maximum withdrawal amounts depends on the subscription plan you are subscribed to.</p>
                        </dd>
                        <dt class="wave wow fadeInUp" data-wow-delay="0.5s">How do i verify my account?</dt>
                        <dd>
                            <p>After creating your account, you will be directed to a page where you can input your personal information to complete the data capture, then our agents will review the data and process the activation process. It usually takes about an hour from the time of submission.
                            </p>
                        </dd>


                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- ##### Team Area Start ##### -->
<section class="our_team_area section-padding-0-0 clearfix" id="team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">

                    <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay="0.3s">Our Outstanding Team</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">Meet our world class team.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Image -->
                    <div class="team-member-thumb">
                        <img draggable="false" src="/assets/front/img/team-img/1.jpeg" class="center-block" alt="">
                    </div>
                    <!-- Team Info -->
                    <div class="team-info">
                        <h5>Ryan Nguyen </h5>
                        <p>Founder & Manager</p>
                    </div>
                    <!-- Social Icon -->
                </div>
            </div>

            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Image -->
                    <div class="team-member-thumb">
                        <img draggable="false" src="/assets/front/img/team-img/2.jpeg" class="center-block" alt="">
                    </div>
                    <!-- Team Info -->
                    <div class="team-info">
                        <h5>Laura Atkinson</h5>
                        <p>Executive Officer</p>
                    </div>
                    <!-- Social Icon -->
                </div>
            </div>

            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member wow fadeInUp" data-wow-delay="0.4s">
                    <!-- Image -->
                    <div class="team-member-thumb">
                        <img draggable="false" src="/assets/front/img/team-img/3.jpeg" class="center-block" alt="">
                    </div>
                    <!-- Team Info -->
                    <div class="team-info">
                        <h5>Lauretta Jane</h5>
                        <p>Head of Marketing</p>
                    </div>
                </div>
            </div>

            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member wow fadeInUp" data-wow-delay="0.5s">
                    <!-- Image -->
                    <div class="team-member-thumb">
                        <img draggable="false" src="/assets/front/img/team-img/4.jpeg" class="center-block" alt="">
                    </div>
                    <!-- Team Info -->
                    <div class="team-info">
                        <h5>Vera Laura</h5>
                        <p>Business Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Team Area End ##### -->

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
                    <form action="{{route('front.send.contact')}}" method="post" id="main_contact_form" novalidate>
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
