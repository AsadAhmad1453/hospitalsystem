@extends('website.layouts.main')
@section('content')
           <!-- main start -->
           <main class="main">
            <!-- breadcrumb section start -->
            <section class="breadcrumb-section" data-img-src="{{ asset('website-assets/images/breadcrumb/breadcrumb.html') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- breadcrumb content start -->
                            <div class="breadcrumb-content">
                                <!-- breadcrumb title start -->
                                <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                    <h1>Contact Us</h1>
                                </div>
                                <!-- breadcrumb title end -->
                                <!-- nav start -->
                                <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                    </ol>
                                </nav>
                                <!-- nav end -->
                            </div>
                            <!-- breadcrumb content end -->
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-shape">
                    <img class="breadcrumb-shape-one" src="{{ asset('website-assets/images/shape/shape-4.png') }}" alt="breadcrumb shape one">
                    <img class="breadcrumb-shape-two" src="{{ asset('website-assets/images/shape/square-blue.png') }}" alt="breadcrumb shape two">
                    <img class="breadcrumb-shape-three" src="{{ asset('website-assets/images/shape/plus-orange.png') }}" alt="breadcrumb shape three">
                </div>
            </section>
            <!-- breadcrumb section end -->

            <!-- contact section start -->
            <section class="contact-section pt-100 md-pt-80 md-pb-50">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <!-- section title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Contact Me</span>
                                <h2>Stay connect with us today</h2> 
                            </div>
                            <!-- section title end -->
                            <!-- contact item wrapper start -->
                            <div class="contact-item-wrapper">
                                <!-- contact items start -->
                                <div class="contact-item wow fadeInUp" data-wow-delay=".5s">
                                    <div class="contact-icon"><i class="fa-solid fa-phone-volume"></i></div>
                                    <div class="contact-content">
                                        <p>Call Now</p>
                                        <h3>+1 234 467 88</h3>
                                    </div>
                                </div>
                                <!-- contact items end -->
                                <!-- contact items start -->
                                <div class="contact-item wow fadeInUp" data-wow-delay=".4s">
                                    <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                                    <div class="contact-content">
                                        <p>Email</p>
                                        <h3>info@example.com</h3>
                                    </div>
                                </div>
                                <!-- contact items end --> 
                                <!-- contact items start -->
                                <div class="contact-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                                    <div class="contact-content">
                                        <p>Address</p>
                                        <h3>123 Serenity Lane, Suite 101 United Kingdom</h3>
                                    </div>
                                </div>
                                <!-- contact items end -->  
                            </div>
                            <!-- contact item wrapper end -->

                            <div class="contact-social-links wow fadeInUp" data-wow-delay=".6s">
                                <span class="follow-text">Follow Us Today :</span>
                                <ul class="social-icon">
                                    <li>
                                        <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6"> 
                            <!-- contact form box start -->
                            <div class="contact-form-box">  
                                <div class="section-title">
                                    <h2>Send us a message</h2>
                                </div>
                                <!-- default-form start -->
                                <div class="default-form contact-form">
                                    <form action="{{ route('query-submit') }}" method="POST" id="contactForm" novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-floating field-inner">
                                                        <input id="name" class="form-control" name="name" type="text" autocomplete="off" placeholder="Name Here" required="required" value="{{ old('name') }}">
                                                        <label for="name">Name*</label>
                                                        <span class="error" id="name-error">
                                                            @error('name') {{ $message }} @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-floating field-inner">
                                                        <input id="phone" class="form-control" name="phone" type="text" autocomplete="off" placeholder="Phone Number Here" required="required" value="{{ old('phone') }}">
                                                        <label for="phone">Phone Number*</label>
                                                        <span class="error" id="phone-error">
                                                            @error('phone') {{ $message }} @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-floating field-inner">
                                                        <textarea id="message" class="form-control" name="message" autocomplete="off" placeholder="Type Message Here" required="required">{{ old('message') }}</textarea>
                                                        <label for="message">Message*</label>
                                                        <span class="error" id="message-error">
                                                            @error('message') {{ $message }} @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contact-btn-wapper mt-10">
                                                    <button type="submit" class="theme-button style-1" data-text="Send Message">
                                                        <span data-text="Send Message">Send Message</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @if(session('success'))
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if(session('error'))
                                            <div class="alert alert-danger mt-3">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </form>
                                </div>
                                <!-- default-form end -->
                            </div>
                            <!-- contact form box end -->
                        </div>
                    </div> 
                </div>
            </section>
            <!-- contact section end -->

            <!-- Google Map start -->
            <div class="google-map">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <!-- google map iframe start -->
                            <div class="google-map-iframe">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2396791.478889806!2d-5.623982693932331!3d54.08054089214548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1746685564327!5m2!1sen!2sin"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="google map"
                                ></iframe>
                            </div>
                            <!-- google map iframe end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Google Map end --> 
        </main>
        <!-- main end -->
@endsection