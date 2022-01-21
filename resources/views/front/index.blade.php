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

<div class="vertical-social">
    <ul>
        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
        {{-- <li><a href="#"><i class="fa fa-medium" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> --}}

    </ul>
</div>

<!-- ##### trust Area Start ##### -->
<div class="trust-section section-padding-100">
    <div class="section-heading text-center">

        <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <h2 class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">We are trusted</h2>
        <p class="wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <!-- Single Cool Fact -->
                <div class="trust-item text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="ico-platform-logo">
                        <img draggable="false" src="img/ico-platforms/1.png" alt="">
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
                        <img draggable="false" src="/assets/front/img/ico-platforms/2.png" alt="">
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
                        <img draggable="false" src="/assets/front/img/ico-platforms/3.png" alt="">
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
                        <img draggable="false" src="/assets/front/img/ico-platforms/4.png" alt="">
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
                        <img draggable="false" src="/assets/front/img/ico-platforms/5.png" alt="">
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
                        <img draggable="false" src="/assets/front/img/ico-platforms/6.png" alt="">
                    </div>
                    <!-- Single Cool Detail -->
                    <div class="check">
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

{{--
<section class="demo-video section-before section-padding-100">
    <div class="container">
        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <h2 class="wow fadeInUp" data-wow-delay="0.3s">Watch our demo video</h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
        </div>
        <!-- Welcome Video Area -->
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
            <div class="welcome-video-area wow fadeInUp" data-wow-delay="0.5s">
                <!-- Welcome Thumbnail -->
                <div class="welcome-thumb">
                    <img draggable="false" src="/assets/front/img/bg-img/bg-4.jpg" alt="">
                </div>
                <!-- Video Icon -->
                <div class="video-icon">
                    <a href="https://www.youtube.com/watch?v=gbXEPHsTkgU" class="btn dream-btn video-btn" id="videobtn"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> --}}

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
                    <p>We never lose sight of the fact that millions of traders invest their hard-won capital based on what they see on our platform. </p>
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
                            <h3>Practise</h3>
                            <p>Sign up, subscribe to a trading account, get free credit according to the pland you subscribed to. Start practicing with those funds.</p>
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


<!-- ##### Our features Area start ##### -->
{{-- <section class="features section-padding-100">

    <div class="section-heading text-center">

        <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <h2 class="wow fadeInUp" data-wow-delay="0.3s">Our Wallet Application</h2>
        <p class="wow fadeInUp" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="services-column col-lg-5 col-lg-offset-1 col-md-10 offset-md-1 col-xs-10 offset-xs-1">
                <!--Services Block Four-->
                <div class="services-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon ti-mobile"></span>
                        </div>
                        <h3><a href="#">Powerfull Mobile and Online App</a></h3>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium modi assumenda beatae provident non hic eum dolores natus, vitae, quae, facere perferendis quas tempore. Consequuntur commodi facilis sed similique.</div>

                    </div>
                </div>

                <!--Services Block Four-->
                <div class="services-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon ti-widget"></span>
                        </div>
                        <h3><a href="#">Brings more Transparency and Speed</a></h3>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati aut repudiandae harum, fugit, necessitatibus veritatis molestias a eligendi distinctio. Nostrum expedita deserunt maiores adipisci.</div>
                    </div>
                </div>

                <!--Services Block Four-->
                <div class="services-block-four" style="margin-bottom:0">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon ti-settings"></span>
                        </div>
                        <h3><a href="#">Special for Multiple Use Capabilities</a></h3>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia maiores, ducimus animi a. Nulla ab dolor doloribus, aperiam, quam dolorum dicta vitae tempora, vero at quod error alias incidunt quidem.</div>
                    </div>
                </div>

            </div>
            <div class="service-img-wrapper col-lg-6 col-md-12 col-sm-12">
                <div class="image-box">
                    <img draggable="false" src="/assets/front/img/phone.png" class="center-block img-responsive phone-img" alt="">
                    <img draggable="false" src="/assets/front/img/core-img/rings-bg.png" class="center-block img-responsive rings " alt="">
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- ##### Our features Area End ##### -->

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
<!-- ##### FAQ & Timeline Area End ##### -->

<!-- ##### token-distribution Area start ##### -->
{{-- <section class="token-distribution">
    <div class="container">

        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <h2 class="wow fadeInUp" data-wow-delay="0.3s">Our ICO Distribution</h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2 class="text-center mb-30">Token Allocation</h2>
            <div class="token-allocation">
                <img draggable="false" src="/assets/front/img/core-img/allocation.png" class="center-block" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="token-info-wapper"></div>
            <h2 class="text-center mb-30">More Token Info</h2>
            <div class="token-info">
                <div class="info-wrapper">
                    <div class="token-icon" style="background-image: url('/assets/front/img/svg/token-icon-1.svg');"></div>
                    <div class="token-descr">Lorem ipsum dolor sit amet, conse ctetur elit</div>
                </div>
            </div>
            <div class="token-info">
                <div class="info-wrapper">
                    <div class="token-icon" style="background-image: url('/assets/front/img/svg/token-icon-2.svg');"></div>
                    <div class="token-descr">Sed quis accumsan nisi Ut ut felis</div>
                </div>
            </div>
            <div class="token-info">
                <div class="info-wrapper">
                    <div class="token-icon" style="background-image: url('/assets/front/img/svg/token-icon-3.svg');"></div>
                    <div class="token-descr">felis congue nisl hendrerit commodo</div>
                </div>
            </div>
            <div class="token-info" style="margin-bottom:0">
                <div class="info-wrapper">
                    <div class="token-icon" style="background-image: url('/assets/front/img/svg/token-icon-4.svg');"></div>
                    <div class="token-descr">arch nemo sequi rem saepe ad quasi ullam.</div>
                </div>
            </div>
        </div>
    </div>

</section> --}}
<!-- ##### token-distribution Area End ##### -->


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
                        <h5>Mark Wilson</h5>
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
