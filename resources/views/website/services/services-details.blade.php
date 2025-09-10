@extends('website.layouts.main')
@section('content')
    <!-- main start -->
    <main class="main">
        <!-- breadcrumb section start -->
        <section class="breadcrumb-section" data-img-src="{{asset('website-assets/images/breadcrumb/breadcrumb.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb content start -->
                        <div class="breadcrumb-content">
                            <!-- breadcrumb title start -->
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>{{$service->service_name}}</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="services.html">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$service->service_name}}</li>
                                </ol>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- breadcrumb content end -->
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <img class="breadcrumb-shape-one" src="{{asset('website-assets/images/shape/shape-4.png')}}" alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="{{asset('website-assets/images/shape/square-blue.png')}}" alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="{{asset('website-assets/images/shape/plus-orange.png')}}" alt="breadcrumb shape three">
            </div>
        </section>
        <!-- breadcrumb section end -->

        <!-- service single section start -->
        <section class="service-single-section pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row flex-lg-row-reverse">
                    <div class="col-xl-8 col-md-12">
                        <div class="service-single-post">
                            <div class="service-single-media">
                                <figure class="image-anime">
                                    <img src="{{asset($service->image)}}" alt="service single image">
                                </figure>
                            </div>
                            <div class="service-single-contain">
                                <div class="service-entry-content">
                                    {!! $service->detail_description !!}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="widget-sidebar">
                            <!-- widget categories list -->
                            <div class="widget widget-categories-list">
                                <div class="widget-title">
                                    <h3>Other Services</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        @foreach ($services as $srvc)
                                            
                                        <li>
                                            <a href="{{route('service-detail', $srvc->id)}}" @if ($srvc->id == $service->id)
                                                class="active"
                                            @endif><span class="categories-name">{{$srvc->service_name}}</span> <span class="categories-count">(18)</span></a>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                            <!-- widget company profile -->
                            <div class="widget widget-company-profile">
                                <div class="widget-title">
                                    <h3>Company Profile</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="company-profile-list">
                                        <li>
                                            <a href="#">
                                                <span class="company-profile-icon d-flex align-items-center justify-content-center flex-shrink-0">
                                                    <i class="fa-solid fa-file-pdf" aria-hidden="true"></i>
                                                </span>
                                                <span class="download-content">
                                                    Download PDF File
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="company-profile-icon d-flex align-items-center justify-content-center flex-shrink-0">
                                                    <i class="fa-solid fa-file-word" aria-hidden="true"></i>
                                                </span>
                                                <span class="download-content">
                                                    Download Word File
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget cta -->
                            <div class="widget widget-cta">
                                <div class="widget-title">
                                    <h3>Needs Any Help?</h3>
                                </div>
                                <div class="widget-content">
                                    <p>Our Client care managers are on call 24/7 to answer your questions representative or submit a business inquiry online.</p>
                                    <div class="service-cta-item">
                                        <div class="service-cta-list d-flex gap-3">
                                            <div class="service-cta-icon d-flex align-items-center justify-content-center flex-shrink-0">
                                                <i class="fa-solid fa-phone-volume"></i>
                                            </div>
                                            <div class="service-cta-content flex-grow-1">
                                                <p>Phone Number</p>
                                                <a href="tel:123446788">+1 234 467 88</a>
                                            </div>
                                        </div>
                                        <div class="service-cta-list d-flex gap-3">
                                            <div class="service-cta-icon d-flex align-items-center justify-content-center flex-shrink-0">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="service-cta-content flex-grow-1">
                                                <p>Email Address</p>
                                                <a href="mailto:info@domain.com">info@domain.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service single section end -->

        <!-- cta section start -->
        <section class="cta-section-3 pb-100 md-pb-80">
            <div class="container">
                <div class="cta-wapper" data-img-src="{{asset('website-assets/images/cta/background-cta-shape.png')}}">
                    <div class="row align-items-end justify-content-between">
                        <div class="col-lg-5">
                            <div class="cta-content">
                                <!-- section title start -->
                                <div class="section-title">
                                    <h2>Subscribe &amp; Join With Us Now !</h2>
                                    <p>Get free suggestion for carenix for the future</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- cta form start -->
                            <div class="cta-form">
                                <div class="cta-shape"><img src="{{asset('website-assets/images/cta/cta-shape-1.png')}}" alt="image"></div>
                                <!-- form start -->
                                <form action="#">
                                    <div class="form-group mb-0">
                                        <div class="form-floating field-inner">
                                            <input id="subscribe" name="subscribe" class="form-control white-field" placeholder="Enter Address" type="text" autocomplete="off">
                                            <label for="subscribe">Enter Address </label>
                                            <button type="submit" class="theme-button style-3" aria-label="subscribe" data-text="Subscribe Now" >
                                                <span data-text="Subscribe Now">Subscribe Now</span>
                                                <i class="fa-solid fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                            <!-- cta form end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta section end -->
    </main>
    <!-- main end -->
@endsection