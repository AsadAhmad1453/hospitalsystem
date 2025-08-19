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
                                    <h1>Services</h1>
                                </div>
                                <!-- breadcrumb title end -->
                                <!-- nav start -->
                                <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Services</li>
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

            <!-- services section start -->
            <section class="services-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
                <div class="container"> 
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="{{asset('website-assets/images/services/icon-service-1.png')}}" alt="icon service one">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Cataract Evaluation</a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="{{asset('website-assets/images/services/icon-service-2.png')}}" alt="icon service two">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Contact Lens Fitting</a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="assets/images/services/icon-service-3.png" alt="icon service three">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Dry Eye Treatment</a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="{{asset('website-assets/images/services/icon-service-4.png')}}" alt="icon service four">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Pediatric Eye Care</a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="{{asset('website-assets/images/services/icon-service-5.png')}}" alt="icon service five">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Glaucoma Surgery </a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <!-- service items start -->
                            <div class="service-items background-one">
                                <!-- service icon start -->
                                <div class="service-icon">
                                    <figure>
                                        <img src="{{asset('website-assets/images/services/icon-service-6.png')}}" alt="icon service six">
                                    </figure>
                                </div>
                                <!-- service icon end -->
                                <!-- service content start -->
                                <div class="service-content">
                                    <h2><a href="services-details.html">Glaucoma &amp; Cornea</a></h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                    <a href="services-details.html" class="read-more-btn">More Details</a>
                                </div>
                                <!-- service content end -->
                            </div>
                            <!-- service items end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- pagination start -->
                            <div class="pagination justify-content-center mt-0">
                                <nav aria-label="page navigation">
                                    <ul class="page-list">
                                        <li><a aria-current="page" class="page-numbers current" href="#">1</a></li>
                                        <li><a class="page-numbers" href="#">2</a></li>
                                        <li><a class="next page-numbers" href="#">Next Page</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- pagination end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- services section end -->

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