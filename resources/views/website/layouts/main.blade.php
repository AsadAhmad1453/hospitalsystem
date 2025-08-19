<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- meta tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="pus_infotech">
        <meta name="description" content="Medical Care and Clinic HTML Template">
        <meta name="keywords" content="Html Template">
        <!-- page title -->
        <title>Home | Shafayaat</title>
        <!-- favicon icon -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{ asset('website-assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('website-assets/images/favicon.png') }}" type="image/x-icon">
        <!-- font awesome css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/all.min.css') }}">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/bootstrap.min.css') }}">
        <!-- swiper css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/swiper-bundle.min.css') }}">
        <!-- image comparision css -->
	    <link rel="stylesheet" href="{{ asset('website-assets/css/twentytwenty.css') }}">
        <!-- magnific css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/magnific-popup.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/animate.css') }}">
        <!-- main css  -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/main.css') }}">
        <!-- style css -->
        <link rel="stylesheet" href="{{ asset('website-assets/css/style.css') }}">
    </head>

    <body>
        <!-- page wrapper start -->
        <div class="page-wrapper">
            <!-- preloader start -->
            <div class="preloader">
                <div class="preloader-icon">
                    <img src="{{ asset('website-assets/images/logo/Shafayaat.png') }}" alt="loader image">
                </div>
                <div class="preloader-text">
                    <p>S</p>
                    <p>H</p>
                    <p>A</p>
                    <p>F</p>
                    <p>A</p>
                    <p>Y</p>
                    <p>A</p>
                    <p>A</p>
                    <p>T</p>
                </div>
            </div>
            <!-- preloader end -->

            <!-- back to top start -->
            <button id="back-top" class="back-to-top" aria-label="back to top">
                <i class="fa-solid fa-chevron-up"></i>
            </button>
            <!-- back to top end -->

            <!-- mouse cursor start -->
            <div class="mouse-cursor cursor-outer"></div>
            <div class="mouse-cursor cursor-inner"></div>
            <!-- mouse cursor end -->

            <!-- offcanvas sidebar start -->
            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvas-sidebar" aria-labelledby="offcanvas-sidebar">
                <!-- offcanvas header start -->
                <div class="offcanvas-header">
                    <!-- offcanvas logo start -->
                    <div class="offcanvas-logo">
                        <figure>
                            <img src="{{ asset('website-assets/images/logo/Shafayaat.png') }}" width="80px" alt="offcanvas logo">
                            <strong class="text-uppercase text=primary h4 ms-2">Shafayaat</strong>
                        </figure>
                    </div>
                    <!-- offcanvas logo emd -->
                    <!-- offcanvas close start -->
                    <button type="button" class="offcanvas-close bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    <!-- offcanvas close end -->
                </div>
                <!-- offcanvas header end -->
                <!-- offcanvas body start -->
                <div class="offcanvas-body">
                    <!-- menu outer start -->
                    <div class="mobile-menu">
                        <!-- Here menu will come automatically via javascript / same menu as in header -->
                    </div>
                    <!-- menu outer end -->
                    <!-- offcanvas about start -->
                    <div class="offcanvas-about d-none d-xl-block">
                        <p>There are many variations of passages available sure there majority have suffered alteration in some form by inject humour or randomised words which don't look even slightly believable.</p>
                    </div>
                    <!-- offcanvas about end -->
                    <!-- offcanvas contact start -->
                    <div class="offcanvas-contact">
                        <!-- widget-contact start -->
                        <div class="widget widget-contact">
                            <!-- widget title start -->
                            <div class="widget-title">
                                <h3>Contact Info</h3>
                            </div>
                            <!-- widget title end -->
                            <!-- widget content start -->
                            <div class="widget-content">
                                <!-- offcanvas cta item start -->
                                <div class="offcanvas-cta-item">
                                    <!-- offcanvas cta list start -->
                                    <div class="offcanvas-cta-list">
                                        <div class="offcanvas-cta-icon">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="offcanvas-cta-content">
                                            <p>123 Serenity Lane, Suite 101, Hometown, CA 12345</p>
                                        </div>
                                    </div>
                                    <!-- offcanvas cta list end -->
                                     <!-- offcanvas cta list start -->
                                    <div class="offcanvas-cta-list">
                                        <div class="offcanvas-cta-icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="offcanvas-cta-content">
                                            <a href="mailto:info@example.com">info@example.com</a>
                                        </div>
                                    </div>
                                    <!-- offcanvas cta list end -->
                                    <!-- offcanvas cta list start -->
                                    <div class="offcanvas-cta-list">
                                        <div class="offcanvas-cta-icon">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </div>
                                        <div class="offcanvas-cta-content">
                                            <a href="tel:123446788">+1 234 467 88</a>
                                        </div>
                                    </div>
                                    <!-- offcanvas cta list end -->
                                </div>
                                <!-- offcanvas cta item end -->
                            </div>
                            <!-- widget content end -->
                        </div>
                        <!-- widget-contact end -->
                    </div>
                    <!-- offcanvas contact end -->
                    <!-- offcanvas button wapper start -->
                    <div class="offcanvas-button-wapper">
                        <a href="appointment.html" class="theme-button style-1" aria-label="Book Appointment">
                            <span data-text="Book Appointment">Book Appointment</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <!-- offcanvas button wapper end -->
                    <!-- offcanvas social start -->
                    <div class="offcanvas-social">
                        <!-- widget social media start -->
                        <div class="widget widget-social-media">
                            <!-- widget content start -->
                            <div class="widget-content">
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
                            <!-- widget content end -->
                        </div>
                        <!-- widget social media end -->
                    </div>
                    <!-- offcanvas-social end -->
                </div>
                <!-- offcanvas body end -->
            </div>
            <!-- offcanvas sidebar end -->

            <!-- header start -->
            <header class="header header-1">
                <!-- header top start -->
                <div class="header-top d-none d-xl-block">
                    <div class="container-fluid">
                        <div class="row justify-content-center justify-content-lg-between align-items-center">
                            <div class="col-auto">
                                <!-- header top left start -->
                                <div class="header-top-left">
                                    <!-- header contact info -->
                                    <div class="header-contact-info">
                                        <ul>
                                            <li>
                                                <p><i class="fa-solid fa-location-dot"></i> 123 Serenity Lane, Suite 101 UK</p>
                                            </li>
                                            <li>
                                                <p><i class="fa-solid fa-envelope"></i> info@example.com</p>
                                            </li>
                                            <li>
                                                <p><i class="fa-solid fa-clock"></i> Mon - Fri 8:00 - 6:30</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- header top left end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header top end -->
                <!-- header lower start -->
                <div class="header-lower">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-between g-0">
                            <div class="col-12">
                                <!-- header content start -->
                                <div class="header-content d-flex justify-content-between align-items-center">
                                    <!-- logo box start -->
                                    <div class="logo-box">
                                        <div class="logo my-2 m-4">
                                            <a href="{{ route('home') }}">
                                                <figure>
                                                    <img src="{{ asset('website-assets/images/logo/Shafayaat.png') }}" width="70px" alt="header logo">
                                                </figure>
                                            </a>
                                            <h4 class="ms-2 text-primary text-uppercase"><strong>Shafayaat</strong></h4>
                                        </div>
                                    </div>
                                    <!-- logo box end  -->

                                    <!-- header navigation start -->
                                    <div class="header-navigation d-flex align-items-center">
                                        <!-- main menu -->
                                        <div class="main-menu">
                                            <nav id="mobile-menu">
                                                <ul>
                                                    <li class="menu-thumb">
                                                        <a href="{{ route('home') }}">Home</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('about') }}">About Us</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("web-services")}}">services<i class="fa-solid fa-angle-down"></i></a>
                                                        <ul class="submenu">
                                                            <li><a href="{{route("web-services")}}">Services</a></li>
                                                            <li><a href="services-details.html">Services Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="contact.html">Contact Us</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <!-- header navigation end -->

                                    <!-- header right start -->
                                    <div class="header-right d-flex align-items-center gap-lg-4 gap-3">
                                        <!-- header button -->
                                        <div class="header-button">
                                            <a href="{{ route('staff-login') }}" class="theme-button style-1" aria-label="Book Appointment">
                                                <span data-text="Login">Login</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                        <!-- header sidebar  -->
                                        <div class="header-sidebar">
                                            <a class="sidebar-toggler color-one" data-bs-toggle="offcanvas" href="#offcanvas-sidebar" aria-label="sidebar toggler" role="button" aria-controls="offcanvas-sidebar">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- header right end -->
                                </div>
                                <!-- header content end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header lower end -->
            </header>
            <!-- header end-->
            @yield('content')


            <!-- footer start -->
            <footer class="footer footer-1" data-img-src="{{ asset('website-assets/images/footer/footer-1-1.png') }}">
                <!-- footer top start -->
                <div class="footer-top">
                    <div class="container">
                        <!-- footer top wrap start -->
                        <div class="footer-top-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-12">
                                    <!-- footer logo start -->
                                    <div class="footer-logo wow fadeInUp" data-wow-delay=".2s">
                                        <a href="{{ route('home') }}">
                                            <figure>
                                                <img src="{{ asset("website-assets/images/logo/logo-white.svg") }}" alt="footer logo">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- footer logo end -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- footer contact info start -->
                                    <div class="footer-contact-info wow fadeInUp" data-wow-delay=".3s">
                                        <div class="footer-contact-icon">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </div>
                                        <div class="footer-contact-content">
                                            <span>Have Any Question?</span>
                                            <a href="tel:123446788">+1 234 467 88</a>
                                        </div>
                                    </div>
                                    <!-- footer contact info end -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- footer contact info start -->
                                    <div class="footer-contact-info wow fadeInUp" data-wow-delay=".4s">
                                        <div class="footer-contact-icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="footer-contact-content">
                                            <span>Send Email</span>
                                            <a href="mailto:info@example.com">info@example.com</a>
                                        </div>
                                    </div>
                                    <!-- footer contact info end -->
                                </div>
                            </div>
                        </div>
                        <!-- footer top wrap end -->
                    </div>
                </div>
                <!-- footer top end -->
                <!-- footer bottom start -->
                <div class="footer-bottom">
                    <div class="container">
                        <!-- footer widget wrap start -->
                        <div class="footer-widget-wrap">
                            <div class="row justify-content-between">
                                <div class="col-xl-4 col-lg-12">
                                    <!-- footer widget start -->
                                    <div class="footer-widget footer-widget-about wow fadeInUp" data-wow-delay=".2s">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor asin cididunt ut labore et dolore magna ali qua. Lorem ipsum dolor sit amet.</p>
                                        <!-- footer social icon start -->
                                        <div class="footer-social-icon">
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
                                        <!-- footer social icon end -->
                                    </div>
                                    <!-- footer widget end -->
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <!-- footer widget start -->
                                    <div class="footer-widget footer-widget-quick-links wow fadeInUp" data-wow-delay=".3s">
                                        <h3 class="footer-widget-title">Quick Links</h3>
                                        <!-- widget link start -->
                                        <div class="widget-link">
                                            <ul class="link">
                                                <li>
                                                    <a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> Home</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> About Us</a>
                                                </li>
                                                <li>
                                                    <a href="doctor.html"><i class="fa-solid fa-chevron-right"></i> Doctors</a>
                                                </li>
                                                <li>
                                                    <a href="{{route("web-services")}}"><i class="fa-solid fa-chevron-right"></i> Services</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html"><i class="fa-solid fa-chevron-right"></i> Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- widget link end -->
                                    </div>
                                    <!-- footer widget end -->
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <!-- footer widget start -->
                                    <div class="footer-widget footer-widget-services wow fadeInUp" data-wow-delay=".4s">
                                        <h3 class="footer-widget-title">Our Services</h3>
                                        <!-- widget link start -->
                                        <div class="widget-link">
                                            <ul class="link">
                                                <li>
                                                    <a href="services-details.html"><i class="fa-solid fa-chevron-right"></i> Cataract Evaluation</a>
                                                </li>
                                                <li>
                                                    <a href="services-details.html"><i class="fa-solid fa-chevron-right"></i> Contact Lens Fitting</a>
                                                </li>
                                                <li>
                                                    <a href="services-details.html"><i class="fa-solid fa-chevron-right"></i> Dry Eye Treatment</a>
                                                </li>
                                                <li>
                                                    <a href="services-details.html"><i class="fa-solid fa-chevron-right"></i> Pediatric Eye Care</a>
                                                </li>
                                                <li>
                                                    <a href="services-details.html"><i class="fa-solid fa-chevron-right"></i> Glaucoma Surgery</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- widget link end -->
                                    </div>
                                    <!-- footer widget end -->
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <!-- footer widget start -->
                                    <div class="footer-widget footer-widget-opening-hours wow fadeInUp" data-wow-delay=".5s">
                                        <h3 class="footer-widget-title">Opening Hours</h3>
                                        <!-- widget opening hours start -->
                                        <div class="widget-opening-hours">
                                            <ul class="opening-list">
                                                <li>
                                                    <p>Monday - Friday: <span class="time">8:00am - 4:00pm</span></p>
                                                </li>
                                                <li>
                                                    <p>Saturday: <span class="time">8:00am - 12:00pm</span></p>
                                                </li>
                                                <li>
                                                    <p>Sunday: <span class="time">8:00am - 10:00am</span></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- widget opening hours end -->
                                    </div>
                                    <!-- footer widget end -->
                                </div>
                            </div>
                        </div>
                        <!-- footer widget wrap end -->
                    </div>
                </div>
                <!-- footer bottom end -->
                <!-- footer copyright start -->
                <div class="footer-copyright">
                    <div class="container">
                        <!-- footer copyright wrap start -->
                        <div class="footer-copyright-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- footer copyright start -->
                                    <div class="copyright-text wow fadeInUp" data-wow-delay=".2s">
                                        <p class="m-0">&#169; Copyright 2025 Carenix All Rights Reserved</p>
                                    </div>
                                    <!-- footer copyright end -->
                                </div>
                                <div class="col-lg-6 text-lg-end">
                                    <!-- footer bottom nav start -->
                                    <ul class="footer-bottom-nav wow fadeInUp" data-wow-delay=".3s">
                                        <li><a class="line-effect" href="contact.html">Terms and Conditions</a></li>
                                        <li><a class="line-effect" href="contact.html">Privacy Policy</a></li>
                                    </ul>
                                    <!-- footer bottom nav end -->
                                </div>
                            </div>
                        </div>
                        <!-- footer copyright wrap end -->
                    </div>
                </div>
                <!-- footer copyright end -->
            </footer>
            <!-- footer end -->
        </div>
        <!-- page wrapper end -->

        <!-- jQuery -->
        <script src="{{ asset('website-assets/js/jquery-3.7.1.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        {{-- <script src="{{ asset('website-assets/js/bootstrap.bundle.min.js') }}"></script> --}}
        <!-- jquery meanmenu js -->
        <script src="{{ asset('website-assets/js/jquery.meanmenu.min.js') }}"></script>
        <!-- swiper js -->
        <script src="{{ asset('website-assets/js/swiper-bundle.min.js') }}"></script>
        <!-- wow Js -->
        <script src="{{ asset('website-assets/js/wow.min.js') }}"></script>
        <!-- validate js -->
        <script src="{{ asset('website-assets/js/validate.min.js') }}"></script>
        <!-- ajax form Js -->
        <script src="{{ asset('website-assets/js/ajax-form.js') }}"></script>
        <!-- image comparision js -->
        <script src="{{ asset('website-assets/js/jquery.event.move.js') }}"></script>
        <script src="{{ asset('website-assets/js/jquery.twentytwenty.js') }}"></script>
        <!-- appear Js -->
        <script src="{{ asset('website-assets/js/jquery.appear.js') }}"></script>
        <!-- magnific Js -->
        <script src="{{ asset('website-assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- SmoothScroll Js -->
        <script src="{{ asset('website-assets/js/SmoothScroll.js') }}"></script>
        <!-- main Js -->
        <script src="{{ asset('website-assets/js/main.js') }}"></script>
    </body>

</html>
