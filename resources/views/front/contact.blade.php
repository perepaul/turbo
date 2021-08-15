@extends('layouts.front')
@section('title', 'Contact us')
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
                    {{-- <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolore eu fugiat nulla pariatur. </p> --}}
                </div>
                <ul class="contact-detail">
                    <li><i class="fa fa-phone" aria-hidden="true"></i> <a
                            href="tel:{{ optional($contact)->phone }}">{{ optional($contact)->phone }}</a></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>
                        <a
                            href="mailto:{{ optional($contact)->support_email }}">{{ optional($contact)->support_email }}</a>
                    </li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <span>
                            {{ optional($contact)->address }}
                        </span></li>
                </ul>
            </div>
            <div class="col-md-6 wow fadeInRight">
                <h3 class="blog-comment-heading">Leave a message here</h3>
                <form action="{{route('front.send.conotact')}}" method="POST">
                    @csrf
                    <input type="text" name="validity" style="visibility:hidden">
                    <x-message />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name*" required="">
                                <x-error :key="'name'" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email*" required="">
                                <x-error :key="'email'" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject*" required="">
                                <x-error :key="'subject'" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Massage*" required></textarea>
                                <x-error :key="'message'" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
