@extends('website.layouts.main')
@section('content')
<!-- main start -->
    <main class="main">
        <!-- breadcrumb section start -->
        <section class="breadcrumb-section" data-img-src="{{ asset('website-assets/images/breadcrumb/breadcrumb.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb content start -->
                        <div class="breadcrumb-content">
                            <!-- breadcrumb title start -->
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>About Us</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
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

        <!-- about section start -->
        <section class="about-section-4 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <!-- section title start -->
                        <div class="section-title mb-20 wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">About Us</span>
                            <h2>We're on a mission to change view of eye.</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <!-- about content start -->
                        <div class="about-content wow fadeInUp" data-wow-delay=".3s">
                            <!-- about content text start -->
                            <div class="about-content-text">
                                <p>
                                    It doesn't matter how organized you are — a surplus of toys will always ensure your house is a mess waiting to happen. Fortunately, getting kids on board with the idea of ditching their stuff is a
                                    lot easier than it sounds.
                                </p>
                                <p>
                                    Maecenas quis viverra metus, et efficitur ligula. Nam congue augue et ex congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor eget condimentum tempor.
                                    Praesent sollicitudin lectus ut pharetra pulvinar.
                                </p>
                                <p>
                                    There are many variations of pass of lorem ipsum available but the majority have suffered alteration in some form. Injected humour randomised words which don't look even slightly believable you
                                    need to be sure there isn't anything embarrassing. Praesent arcu gravida vehicula est node maecenas loareet.
                                </p>
                            </div>
                            <!-- about content text end -->
                            <!-- about features wappper start -->
                            <div class="about-features-wappper">
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/icon-about-1.png') }}" alt="icon about one">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Personalized Eye Exams</h3>
                                        <p>There are many variations of pasrsfgses of Lorem Ipsum btmred ine form injected humour.</p>
                                    </div>
                                </div>
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/icon-about-2.png') }}" alt="icon about two">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Chronic Eye Conditions</h3>
                                        <p>There are many variations of pasrsfgses of Lorem Ipsum btmred ine form injected humour.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- about features wappper end -->
                        </div>
                        <!-- about content end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->

        <!-- doctor section start -->
        <section class="doctor-section-3 pt-100 md-pt-80 pb-70 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Our Doctor</span>
                                <h2>Meet The Talented Team Driving Our Doctors</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptates modi omnis dolore et mollitia dolorem alias voluptatibus tempora soluta ut officia ullam magnam obcaecati accusantium.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <!-- doctor items start -->
                        <div class="doctor-items wow fadeInUp" data-wow-delay=".3s">
                            <!-- doctor image start -->
                            <div class="doctor-image">
                                <a href="doctor-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/doctor/doctor-1.jpg') }}" alt="doctors image one">
                                    </figure>
                                </a>
                                <div class="doctor-share">
                                    <ul class="social-icon social-vertical">
                                        <li>
                                            <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                    </ul>
                                    <div class="doctor-share-icon">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                </div>
                                <div class="doctor-review">
                                    <p><i class="fas fa-star active"></i> 4.9</p>
                                </div>
                            </div>
                            <!-- doctor image end -->
                            <!-- doctor content start -->
                            <div class="doctor-content">
                                <h3><a href="doctor-details.html">Dr. Catherine Denuve</a></h3>
                                <p>Optegra Eye</p>
                            </div>
                            <!-- doctor content end -->
                        </div>
                        <!-- doctor items end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <!-- doctor items start -->
                        <div class="doctor-items wow fadeInUp" data-wow-delay=".4s">
                            <!-- doctor image start -->
                            <div class="doctor-image">
                                <a href="doctor-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/doctor/doctor-2.jpg') }}" alt="doctors image two">
                                    </figure>
                                </a>
                                <div class="doctor-share">
                                    <ul class="social-icon social-vertical">
                                        <li>
                                            <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                    </ul>
                                    <div class="doctor-share-icon">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                </div>
                                <div class="doctor-review">
                                    <p><i class="fas fa-star active"></i> 4.8</p>
                                </div>
                            </div>
                            <!-- doctor image end -->
                            <!-- doctor content start -->
                            <div class="doctor-content">
                                <h3><a href="doctor-details.html">Dr. Laurence Olivier</a></h3>
                                <p>Lens replacement</p>
                            </div>
                            <!-- doctor content end -->
                        </div>
                        <!-- doctor items end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <!-- doctor items start -->
                        <div class="doctor-items wow fadeInUp" data-wow-delay=".5s">
                            <!-- doctor image start -->
                            <div class="doctor-image">
                                <a href="doctor-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/doctor/doctor-3.jpg') }}" alt="doctors image three">
                                    </figure>
                                </a>
                                <div class="doctor-share">
                                    <ul class="social-icon social-vertical">
                                        <li>
                                            <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                    </ul>
                                    <div class="doctor-share-icon">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                </div>
                                <div class="doctor-review">
                                    <p><i class="fas fa-star active"></i> 4.8</p>
                                </div>
                            </div>
                            <!-- doctor image end -->
                            <!-- doctor content start -->
                            <div class="doctor-content">
                                <h3><a href="doctor-details.html">Dr. Susan Hopkins</a></h3>
                                <p>Cataract surgery</p>
                            </div>
                            <!-- doctor content end -->
                        </div>
                        <!-- doctor items end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <!-- doctor items start -->
                        <div class="doctor-items wow fadeInUp" data-wow-delay=".6s">
                            <!-- doctor image start -->
                            <div class="doctor-image">
                                <a href="doctor-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset("website-assets/images/doctor/doctor-4.jpg") }}" alt="doctors image four">
                                    </figure>
                                </a>
                                <div class="doctor-share">
                                    <ul class="social-icon social-vertical">
                                        <li>
                                            <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                    </ul>
                                    <div class="doctor-share-icon">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                </div>
                                <div class="doctor-review">
                                    <p><i class="fas fa-star active"></i> 4.7</p>
                                </div>
                            </div>
                            <!-- doctor image end -->
                            <!-- doctor content start -->
                            <div class="doctor-content">
                                <h3><a href="doctor-details.html">Dr. Keanu Reeves</a></h3>
                                <p>Clarivu eye</p>
                            </div>
                            <!-- doctor content end -->
                        </div>
                        <!-- doctor items end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- doctor section end -->

        <!-- counter section start -->
        <section class="counter-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- counter list start -->
                        <div class="counter-list">
                            <!-- counter item start -->
                            <div class="counter-item wow fadeInUp" data-wow-delay=".2s">
                                <div class="counter-content">
                                    <div class="counter-text"><span class="counter-value" data-stop="90" data-speed="3000">0</span>+</div>
                                    <h2 class="counter-title">Expert Doctors</h2>
                                </div>
                            </div>
                            <!-- counter item end -->
                            <!-- counter item start -->
                            <div class="counter-item wow fadeInUp" data-wow-delay=".3s">
                                <div class="counter-content">
                                    <div class="counter-text"><span class="counter-value" data-stop="26" data-speed="3000">0</span>+</div>
                                    <h2 class="counter-title">Diffrent Services</h2>
                                </div>
                            </div>
                            <!-- counter item end -->
                            <!-- counter item start -->
                            <div class="counter-item wow fadeInUp" data-wow-delay=".4s">
                                <div class="counter-content">
                                    <div class="counter-text"><span class="counter-value" data-stop="35" data-speed="3000">0</span>+</div>
                                    <h2 class="counter-title">Happy Patients</h2>
                                </div>
                            </div>
                            <!-- counter item end -->
                            <!-- counter item start -->
                            <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                                <div class="counter-content">
                                    <div class="counter-text"><span class="counter-value" data-stop="10" data-speed="3000">0</span>+</div>
                                    <h2 class="counter-title">Awards Win</h2>
                                </div>
                            </div>
                            <!-- counter item end -->
                        </div>
                        <!-- counter list end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- counter section end -->

        <!-- testimonials section start -->
        <section class="testimonials-section-3 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Our Testimonials</span>
                            <h2>Real Experiences Exceptional Healthcare</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptates modi omnis dolore et mollitia dolorem alias voluptatibus tempora soluta ut officia ullam magnam obcaecati accusantium.</p>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- testimonials slider three start -->
                        <div class="swiper testimonials-slider-three">
                            <!-- swiper wrapper start -->
                            <div class="swiper-wrapper">
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- testimonials item start -->
                                    <div class="testimonials-item">
                                        <div class="testimonials-content">
                                            <div class="testimonials-content-item">
                                                <div class="testimonials-meta">
                                                    <div class="testimonials-rating">
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                    </div>
                                                    <div class="testimonials-quote">
                                                        <figure>
                                                            <img src="{{ asset('website-assets/images/testimonials/quote.png') }}" alt="quote">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <h3>Patient Centered Care</h3>
                                                <p class="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here,</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-1.jpg') }}" alt="testimonials avatar one">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Mia Scott</h4>
                                                    <p>Head of Director</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- testimonials item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- testimonials item start -->
                                    <div class="testimonials-item">
                                        <div class="testimonials-content">
                                            <div class="testimonials-content-item">
                                                <div class="testimonials-meta">
                                                    <div class="testimonials-rating">
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                    </div>
                                                    <div class="testimonials-quote">
                                                        <figure>
                                                            <img src="{{ asset('website-assets/images/testimonials/quote.png') }}" alt="quote">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <h3>Dry Eye Treatment</h3>
                                                <p class="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here,</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-2.jpg') }}" alt="testimonials avatar two">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Liam Rodri</h4>
                                                    <p>Product Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- testimonials item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- testimonials item start -->
                                    <div class="testimonials-item">
                                        <div class="testimonials-content">
                                            <div class="testimonials-content-item">
                                                <div class="testimonials-meta">
                                                    <div class="testimonials-rating">
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                        <i class="fa-solid fa-star active"></i>
                                                    </div>
                                                    <div class="testimonials-quote">
                                                        <figure>
                                                            <img src="{{ asset('website-assets/images/testimonials/quote.png') }}" alt="quote">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <h3>Contact Lens Fitting</h3>
                                                <p class="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here,</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-3.jpg') }}" alt="testimonials avatar three">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Lucas Jackson</h4>
                                                    <p>Lead Enginee</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- testimonials item end -->
                                </div>
                                <!-- swiper slide end -->
                            </div>
                            <!-- swiper wrapper end -->
                            <!-- swiper actions start -->
                            <div class="swiper-actions text-center">
                                <div class="dot"></div>
                            </div>
                            <!-- swiper actions end -->
                        </div>
                        <!-- testimonials slider three end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonials section end -->

        <!-- faq section start -->
        <section class="faq-section-3 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- section title start -->
                        <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Faq's</span>
                            <h2>Clear Answers To Your Questions</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptates modi omnis dolore et mollitia dolorem alias voluptatibus tempora soluta ut officia ullam magnam obcaecati accusantium.</p>
                        </div>
                        <!-- section title end -->
                        <!-- faq image start -->
                        <div class="faq-image wow fadeInUp" data-wow-delay=".3s">
                            <figure class="image-anime">
                                <img src="{{ asset('website-assets/images/faqs/faqs-3-1.jpg') }}" alt="faq image">
                            </figure>
                        </div>
                        <!-- faq image end -->
                    </div>
                    <div class="col-lg-6">
                        <!-- faq-content start -->
                        <div class="faq-content wow fadeInUp" data-wow-delay=".2s">
                            <!-- accordion start -->
                            <div class="accordion" id="accordionExample">
                                <!-- accordion item start -->
                                <div class="accordion-item">
                                    <!-- accordion-header start -->
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What are common signs of serious eye problems?
                                        </button>
                                    </h2>
                                    <!-- accordion header end -->
                                    <!-- accordion collapse start -->
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <!-- accordion body start -->
                                        <div class="accordion-body">
                                            <div class="inner">
                                                <div class="accordion-content">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                                        more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion body end -->
                                    </div>
                                    <!-- accordion collapse end -->
                                </div>
                                <!-- accordion item end -->
                                <!-- accordion item start -->
                                <div class="accordion-item">
                                    <!-- accordion-header start -->
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Are contact lenses better than glasses?
                                        </button>
                                    </h2>
                                    <!-- accordion header end -->
                                    <!-- accordion collapse start -->
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <!-- accordion body start -->
                                        <div class="accordion-body">
                                            <div class="inner">
                                                <div class="accordion-content">
                                                    <p>
                                                        It depends on your lifestyle. Contact lenses offer convenience for sports and aesthetics, while glasses are easier to maintain and cost-effective over time. An eye doctor can
                                                        help you decide what suits you best.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion body end -->
                                    </div>
                                    <!-- accordion collapse end -->
                                </div>
                                <!-- accordion item end -->
                                <!-- accordion item start -->
                                <div class="accordion-item">
                                    <!-- accordion-header start -->
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Are contact lenses safe to wear every day?
                                        </button>
                                    </h2>
                                    <!-- accordion header end -->
                                    <!-- accordion collapse start -->
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <!-- accordion body start -->
                                        <div class="accordion-body">
                                            <div class="inner">
                                                <div class="accordion-content">
                                                    <p>Yes, as long as you follow proper hygiene and your eye doctor’s instructions. Always clean and store lenses properly, and never sleep in them unless advised.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion body end -->
                                    </div>
                                    <!-- accordion collapse end -->
                                </div>
                                <!-- accordion item end -->
                                <!-- accordion item start -->
                                <div class="accordion-item">
                                    <!-- accordion-header start -->
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            How often should I get my eyes checked?
                                        </button>
                                    </h2>
                                    <!-- accordion-header end -->
                                    <!-- accordion collapse start -->
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <!-- accordion body start -->
                                        <div class="accordion-body">
                                            <div class="inner">
                                                <div class="accordion-content">
                                                    <p>
                                                        Adults should get a comprehensive eye exam every 1 to 2 years, even if they have no vision issues. Children, seniors, and individuals with existing conditions may need more
                                                        frequent visits.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion body end -->
                                    </div>
                                    <!-- accordion collapse end-->
                                </div>
                                <!-- accordion item end -->
                                <!-- accordion item start -->
                                <div class="accordion-item">
                                    <!-- accordion-header start -->
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Why do we respect your time and prioritize you?
                                        </button>
                                    </h2>
                                    <!-- accordion-header end -->
                                    <!-- accordion collapse start -->
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <!-- accordion body start -->
                                        <div class="accordion-body">
                                            <div class="inner">
                                                <div class="accordion-content">
                                                    <p>
                                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                                        more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion body end -->
                                    </div>
                                    <!-- accordion collapse end-->
                                </div>
                                <!-- accordion item end -->
                            </div>
                            <!-- accordion end -->
                        </div>
                        <!-- faq-content end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- faq section end -->

        <!-- partners section start -->
        <section class="partners-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Our Partners</span>
                            <h2>Partners Who Trust Industrie</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- partners slider start -->
                        <div class="swiper partners-slider">
                            <!-- swiper wrapper start -->
                            <div class="swiper-wrapper">
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-1.png') }}" alt="partners one">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-2.png') }}" alt="partners two">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-3.png') }}" alt="partners three">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-4.png') }}" alt="partners four">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-5.png') }}" alt="partners five">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- partners item start -->
                                    <div class="partners-item">
                                        <div class="partners-image text-center">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/partners/partners-6.png') }}" alt="partners six">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- partners item end -->
                                </div>
                                <!-- swiper slide end -->
                            </div>
                            <!-- swiper wrapper end -->
                        </div>
                        <!-- partners slider end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- partners section end -->
    </main>
<!-- main end -->
@endsection
