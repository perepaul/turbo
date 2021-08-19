@extends('layouts.front')
@section('title', 'Home')
@section('content')
<section class="home-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 position-u flex-align wow fadeInLeft">
                <div class="banner-contain">
                    <h1 class="banner-heading">Invest, Trade and exchange Cryptos and Forex</h1>
                    <p class="banner-des">Invest in the world's most popular and sought-after assets. Everything you are
                        looking for in an ultimate investment platform — on the device of your choice.</p>
                    <a href="{{ route('register') }}" class="btn">Start Now!</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 position-u wow fadeInRight">
                <div class="banner-img">
                    <img src="/assets/front/images/forex.jpg" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>

<x-trade.marquee />

<section class="work-part darkblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <h2 class="heading-title">How it Works</h2>
                    <p class="heading-des">
                        Deposit - Trade - Earn profits
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center flex-align justify-center wow fadeInLeft">
                <div class="work-box">
                    <div class="work-box-bg"></div>
                    <img src="/assets/front/images/work-process.png" class="rotation-img" alt="Work Process">
                </div>
            </div>
            <div class="col-md-6 flex-align wow fadeInRight">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">We’ve built the platform for you to buy and sell shares, crypto
                        and forex.</h3>
                    <p class="work-des pb-20"></p>

                    <ul class="check-list">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Get access to world most sought out stocks and cryptos</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Generate trading strategies with the help of our sophisticated market data section </p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Withdraw your profits with ease as we have partnered with secure third party payment
                                gateways.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-part skyblue bg-pattern pt-100 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <h2 class="heading-title">Best Features</h2>
                    <p class="heading-des">See what to expect from our carefully crafted, all in one trading platform.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="/assets/front/images/feature-1.png" alt="Safe & Secure">
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Safe & Secure</a>
                        <p class="feature-des">You don't have anythng to worry about security as we use 128bytes
                            military grade encryption and secure SSL/TLS connection to secure your data.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="/assets/front/images/feature-2.png" alt="Early Bonus"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Early Bonus</a>
                        <p class="feature-des">As early as your first Deposit you get to enjoy our topup bonuses and
                            lots more... </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="/assets/front/images/feature-3.png" alt="Univarsal Access"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Univarsal Access</a>
                        <p class="feature-des">Our services are available to everyone in every countries of the world,
                            just a device to access the internet, that's all you need.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="/assets/front/images/feature-4.png" alt="Secure Storage"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Practice</a>
                        <p class="feature-des">Open a demo account and start trading for free. Practise with an
                            unlimited amount of virtual funds.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="/assets/front/images/feature-5.png" alt="Low Cost"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Trade</a>
                        <p class="feature-des">Open a real account, make a deposit, and start trading for real. Trade
                            forex, indices, commodities, and more. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="/assets/front/images/feature-6.png" alt="Several Profit"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Withdraw</a>
                        <p class="feature-des">Get your funds quickly and easily. We support a variety of withdrawal
                            options. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="timeline darkblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading">roadmap</label>
                    <h2 class="heading-title">The Timeline</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
            </div>
        </div>
        <div class="main-roadmap">
            <div class="row">
                <div class="col-md-12">
                    <div class="h-border wow fadeInLeft"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="roadmap-slider owl-carousel">
                        <div class="roadmap wow fadeInLeft">
                            <div class="roadmap-box text-center">
                                <div class="date-title">March 2018</div>
                                <div class="map-graphic">
                                    <div class="small-round"><span></span></div>
                                    <div class="v-row"></div>
                                </div>
                                <div class="roadmap-detail-box">
                                    <p>Lorem Ipsum has been the industry's standard dummy text </p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap wow fadeInLeft">
                            <div class="roadmap-box text-center">
                                <div class="date-title">April 2018</div>
                                <div class="map-graphic">
                                    <div class="small-round"><span></span></div>
                                    <div class="v-row"></div>
                                </div>
                                <div class="roadmap-detail-box">
                                    <p>Lorem Ipsum has been the industry's standard dummy text </p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap wow fadeInLeft">
                            <div class="roadmap-box text-center">
                                <div class="date-title">May 2018</div>
                                <div class="map-graphic">
                                    <div class="small-round"><span></span></div>
                                    <div class="v-row"></div>
                                </div>
                                <div class="roadmap-detail-box">
                                    <p>Lorem Ipsum has been the industry's standard dummy text </p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap wow fadeInLeft">
                            <div class="roadmap-box text-center">
                                <div class="date-title">August 2018</div>
                                <div class="map-graphic">
                                    <div class="small-round"><span></span></div>
                                    <div class="v-row"></div>
                                </div>
                                <div class="roadmap-detail-box">
                                    <p>Lorem Ipsum has been the industry's standard dummy text </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="team-part skyblue bg-pattern pt-100 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <h2 class="heading-title">What our clients say about Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft pb-45">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="/assets/front/images/team-1.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">Paul Mugenda</a>
                        <p class="member-des">The {{ config('app.name') }} platform is fast, easy to navigate, and
                            very
                            user-friendly. It
                            looks great and it’s packed with many appealing features. Deposits and withdrawals are easy.
                        </p>
                        {{-- <ul class="pt-15">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-45 wow fadeInRight">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="/assets/front/images/team-2.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">Tuelo Ronald</a>
                        <p class="member-des">What I like most is that my withdrawals are processed fast. This is the
                            platform of the future: it offers more functionality as well as different ways to trade. No
                            other broker has given me the same satisfaction as Deriv has. A great broker indeed.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInLeft pb-45">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="/assets/front/images/team-3.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">Paul Vilca</a>
                        <p class="member-des">I have more than a decade’s worth of online trading experience, and I
                            think that {{ config('app.name') }} is one of the best brokers in the world. I like the
                            new
                            features on the
                            {{ config('app.name') }} platform. Being able to trade on weekends on volatility indices
                            is
                            a plus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-45 wow fadeInRight">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="/assets/front/images/team-4.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">María del Carmen</a>
                        <p class="member-des">The {{ config('app.name') }} platform is very attractive, intuitive, and
                            user-friendly, and
                            it’s equipped with all the tools I need.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-trade.market-chart />

{{-- <section id="tokensale-part" class="token-sale darkblue parallax ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft flex-align">
                <div class="w-100">
                    <div class="section-heading pb-20">
                        <label class="sub-heading">token</label>
                        <h2 class="heading-title">Token Sale</h2>
                        <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    </div>
                    <div class="token-graphic-detail">
                        <ul>
                            <li class="color-code-1">73% Finacial Overhead</li>
                            <li class="color-code-2">55% Bonus & found</li>
                            <li class="color-code-3">12% Gift Code Inventory</li>
                            <li class="color-code-4">32% Bounty and Overhead</li>
                            <li class="color-code-5">38% it infastrueture</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 flex-align justify-center-r">
                <div class="token-graph w-100">
                    <div class='donut'>
                        <div data-lcolor="#f8c04e">12.2</div>
                        <div data-lcolor="#ac56f7">32.6</div>
                        <div data-lcolor="#61f89f">38.2</div>
                        <div data-lcolor="#5ad6f8">55.2</div>
                        <div data-lcolor="#f85d77">73.2</div>
                    </div>
                    <div class="graph-logo">
                        <img src="/assets/front/images/graph-logo.png" alt="cryptoz">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
