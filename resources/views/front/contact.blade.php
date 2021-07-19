@extends('layouts.front')
@section('title','Contact us')
@section('content')
<section class="sub-page-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="page-banner text-center">
                    <h1 class="sub-banner-title">Contact</h1>
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form skyblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
                <div class="section-heading">
                    <h2 class="heading-title-2 pb-20">Contact Us</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolore eu fugiat nulla pariatur. </p>
                </div>
                <ul class="contact-detail">
                    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:123456789">+91 123 456 789</a></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="https://themes.templatescoder.com/cdn-cgi/l/email-protection#7a090f0a0a15080e3a1908030a0e1514541315"><span class="__cf_email__" data-cfemail="196a6c6969766b6d597a6b60696d7677377076">[email&#160;protected]</span></a></li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Headley Ln, Dorking RH5 6DF, UK 7M7P+96 Leatherhead, United Kingdom</span></li>
                </ul>
            </div>
            <div class="col-md-6 wow fadeInRight">
                <h3 class="blog-comment-heading">Leave a message here</h3>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name*" required="">
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email*" required="">
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject*" required="">
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone*" required="">
                              </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Massage*" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row pt-100">
            <div class="col-md-12 wow fadeInUp">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.1812836849363!2d144.95343106869794!3d-37.81739907631358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sin!4v1562916623921!5m2!1sen!2sin" height="500" style="border:0;width:100%;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
