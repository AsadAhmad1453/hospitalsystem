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
                            <h2>Redefining Healthcare with Compassion and Innovation.</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <!-- about content start -->
                        <div class="about-content wow fadeInUp" data-wow-delay=".3s">
                            <!-- about content text start -->
                            <div class="about-content-text">
                                <p>
                                    We are redefining healthcare with a focus on accessibility, affordability, and innovation. Our vision is to create a patient-centered ecosystem that combines modern medical practices with natural solutions, ensuring every individual has the opportunity to manage their health with confidence.
                                </p>
                                <p>
                                    By integrating the latest digital technologies, we provide smarter healthcare solutions such as electronic medical records, telemedicine, and remote monitoring. These tools not only improve the quality of care but also make it easier for patients to stay informed and actively involved in their health journey.
                                </p>
                                <p>
                                    Beyond treatment, we are dedicated to continuous research, education, and community support. From developing preventive strategies to offering affordable natural health products, our mission is to empower patients with knowledge and choices that improve both their physical and mental well-being.
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
                                        <h3>Patient-First Approach</h3>
                                        <p>Every decision, service, and treatment is designed around the needs of our patients.</p>
                                    </div>
                                </div>
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/icon-about-2.png') }}" alt="icon about two">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Innovation for Better Care</h3>
                                        <p>We use advanced technologies and evidence-based methods to provide healthcare that is modern, reliable, and affordable.</p>
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
                                <span class="sub-title">Our Doctors</span>
                                <h2>The Experts Behind Your Care</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>Our team of highly qualified doctors combines expertise with compassion to deliver trusted, high-quality care for patients of all ages.</p>
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
                                <h3><a href="doctor-details.html">Dr. Rabia Shah</a></h3>
                                <p>Cardiologist</p>
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
                                <h3><a href="doctor-details.html">Dr. Ahmed Malik</a></h3>
                                <p>Nephrologist (Kidney Specialist)</p>
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
                                <h3><a href="doctor-details.html">Dr. Usman Ali</a></h3>
                                <p>Psychiatrist</p>
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
                                <h3><a href="doctor-details.html">Dr. Sarah Khan</a></h3>
                                <p>Endocrinologist (Diabetes Specialist)</p>
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
                            <p>Our patients’ experiences reflect the care, compassion, and commitment we bring to every interaction. Here’s what they have to say about their journey with us</p>
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
                                                <h3>Diabetes Care</h3>
                                                <p class="desc">I was struggling to manage my diabetes for years, but the team here gave me the right guidance and constant support. Their digital monitoring system made it so much easier to track my progress. I finally feel in control of my health.</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-1.jpg') }}" alt="testimonials avatar one">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Hassan Ali</h4>
                                                    <p>Patient</p>
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
                                                <h3>Telemedicine</h3>
                                                <p class="desc">The telemedicine service saved me so much time and effort. I was able to connect with a specialist from home and still received the same level of care as an in-person visit. It’s healthcare made simple.</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-2.jpg') }}" alt="testimonials avatar two">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Hania Aslam</h4>
                                                    <p>Patient</p>
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
                                                <h3>Heart Disease Care</h3>
                                                <p class="desc">I’ve visited many hospitals, but this one stands out because of its compassion. The doctors take time to listen, explain everything clearly, and ensure you’re comfortable with your treatment plan. That human touch makes all the difference.</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-3.jpg') }}" alt="testimonials avatar three">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h4>Iftikhar Ahmad</h4>
                                                    <p>Patient</p>
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
        <section class="faq-section-1 pt-100 md-pt-80">
            <div class="container">
                <!-- faq wapper start -->
                <div class="faq-wapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- section title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Faq's</span>
                                <h2>Your Questions, Answered</h2>
                                <p>Here are answers to some frequently asked questions about our healthcare services and approach.</p>
                            </div>
                            <!-- section title end -->
                            <!-- faq image start -->
                            <div class="faq-image wow fadeInUp" data-wow-delay=".3s">
                                <figure class="image-anime">
                                    <img src="{{ asset('website-assets/images/faqs/faqs-1-1.jpg') }}" alt="faq image one">
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
                                                Do you provide online consultations?
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
                                                            Yes, we offer telemedicine services so you can consult doctors from home through your phone or computer. This makes it easier for patients with chronic conditions, mobility challenges, or busy schedules to get timely care without visiting the hospital.
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
                                                Are your services affordable?
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
                                                            Affordability is at the core of our mission. By working directly with producers and using efficient systems, we reduce costs on medicines and services. We also provide flexible insurance options to ensure patients from different backgrounds can access quality care.
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
                                                Do you provide mental health support?
                                            </button>
                                        </h2>
                                        <!-- accordion header end -->
                                        <!-- accordion collapse start -->
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <!-- accordion body start -->
                                            <div class="accordion-body">
                                                <div class="inner">
                                                    <div class="accordion-content">
                                                        <p>Yes, we have dedicated mental health professionals who provide counseling, therapy, and psychiatric care. Whether it’s stress, anxiety, or long-term challenges, our team ensures patients receive the right support in a safe and compassionate environment.</p>
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
                                                What makes you different from other hospitals?
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
                                                            We combine modern digital healthcare—like electronic medical records and remote monitoring—with natural and preventive solutions. Our approach is holistic, focusing not only on treatment but also on long-term well-being and affordability.
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
                                                Can patients without financial means get treatment?
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
                                                            Yes, we support underprivileged patients through charity programs and donations. Our goal is to make sure financial difficulties never prevent anyone from receiving the care they need.
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
                <!-- faq wapper end -->
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
