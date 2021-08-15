@extends('layouts.front')
@section('title', 'About us')
@section('content')
<section class="sub-page-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-banner text-center">
                    <h1 class="sub-banner-title">About us</h1>
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>About us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-main skyblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center flex-align justify-center order-r-2 wow fadeInLeft">
                <div class="work-box w-100">
                    <div class="work-box-bg"></div>
                    <img src="/assets/front/images/work-process.png" class="rotation-img" alt="Work Process">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 flex-align order-r-1 mb-r-30 wow fadeInRight">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">Our Story</h3>
                    <p class="work-des pb-20">The story of {{ config('app.name') }} starts in 1999.
                        {{ config('app.name') }} Markets Group, the founding
                        company, was established with a mission to make online trading accessible to the masses. The
                        Group has since rebranded and evolved, but its founding mission remains unchanged. Our evolution
                        is powered by over 20 years of customer focus and innovation. </p>

                    {{-- <ul class="check-list">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-main darkblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 flex-align mb-r-30 wow fadeInLeft">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">Our Mission</h3>
                    <p class="about-des pb-20">
                        To become the best and number one trading platform and a one stop shop for all things trading.
                    </p>

                </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center flex-align justify-center order-r-2 wow fadeInLeft">
                <div class="work-box w-100">
                    <div class="work-box-bg"></div>
                    <img src="/assets/front/images/work-process.png" class="rotation-img" alt="Work Process">
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-12 text-center flex-align justify-center wow fadeInRight">
                <div class="work-box">
                    <img src="images/about-1.jpg" alt="Work Process">
                    <a href="javascript:void(0)" class="play-icon" data-toggle="modal" data-target="#form">
                        <span>
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <iframe class="video-play" src="https://www.youtube.com/embed/tt7gP_IW-1w"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<section class="about-main darkblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center flex-align justify-center order-r-2 wow fadeInLeft">
                <div class="work-box w-100">
                    <div class="work-box-bg"></div>
                    <img src="/assets/front/images/work-process.png" class="rotation-img" alt="Work Process">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 flex-align mb-r-30 wow fadeInLeft">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">Our Values</h3>

                    <h5>Integrity</h5>
                    <p class="about-des pb-20">
                        We believe that we should always do the right thing. This includes serving our customers with
                        honesty and transparency, settling all contracts by the book, and communicating in plain
                        language that can be easily understood.
                    </p>

                    <h5>Teamwork</h5>
                    <p class="about-des pb-20">
                        We value positive team players who can work together to overcome challenges and achieve common
                        goals.
                    </p>

                    <h5>Competence</h5>
                    <p class="about-des pb-20">
                        We love to work with smart and talented people who are eager to roll up their sleeves and get
                        things done.
                    </p>

                    <h5>Customer focus</h5>
                    <p class="about-des pb-20">
                        We always put our customers first and dedicate ourselves to building products and services that
                        give them the best trading experience possible.
                    </p>

                </div>
            </div>

            {{-- <div class="col-lg-6 col-md-12 text-center flex-align justify-center wow fadeInRight">
                <div class="work-box">
                    <img src="images/about-1.jpg" alt="Work Process">
                    <a href="javascript:void(0)" class="play-icon" data-toggle="modal" data-target="#form">
                        <span>
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <iframe class="video-play" src="https://www.youtube.com/embed/tt7gP_IW-1w"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

{{-- <section class="about-main darkblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center flex-align justify-center order-r-2 wow fadeInLeft">
                <div class="work-box">
                    <img src="images/about-2.png" alt="Work Process">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 flex-align mb-r-30 order-r-1 wow fadeInRight">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">Why are so many people investing Digitall currencies like
                        BitCoin</h3>

                    <p class="work-des">Bitcoin is different than any currency you’ve used before, so it’s very
                        important to understand some key points. You can use them to send or receive any amount of
                        money, with anyone, anywhere in the world, at very low cost. Bitcoin payments are impossible to
                        block and safety. Bitcoin is different than any currency you’ve used before, so it’s very
                        important to understand some key points. You can use them to send or receive any amount of
                        money, with anyone, anywhere in the world, at very low cost. Bitcoin payments are impossible to
                        block and safety.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-part skyblue bg-pattern pt-100 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading">meet the team</label>
                    <h2 class="heading-title">Our Team</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft pb-45">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="images/team-1.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">John Doe</a>
                        <p class="member-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor it amet, consectetur</p>
                        <ul class="pt-15">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-45 wow fadeInRight">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="images/team-2.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">John Doe</a>
                        <p class="member-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor it amet, consectetur</p>
                        <ul class="pt-15">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInLeft pb-45">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="images/team-3.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">John Doe</a>
                        <p class="member-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor it amet, consectetur</p>
                        <ul class="pt-15">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-45 wow fadeInRight">
                <div class="team-box flex-align">
                    <div class="team-img">
                        <a href="team.html"><img src="images/team-4.jpg" alt="team member"></a>
                    </div>
                    <div class="team-des">
                        <a href="team.html" class="member-name">John Doe</a>
                        <p class="member-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor it amet, consectetur</p>
                        <ul class="pt-15">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
