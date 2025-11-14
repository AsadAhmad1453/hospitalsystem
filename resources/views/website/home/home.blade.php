@extends('website.layouts.main')
@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
@section('content')
    <main class="main">
        <!-- hero section start -->
        <section class="hero-section-1" data-img-src="{{ asset('website-assets/images/hero/banner_bg.png') }}">
            <!-- hero shape start -->
            <div class="hero-shape">
                <img class="hero-shape-one" src="{{ asset('website-assets/images/shape/shape-4.png') }}" alt="hero shape one">
                <img class="hero-shape-two" src="{{ asset('website-assets/images/shape/square-blue.png') }}" alt="hero shape two">
                <img class="hero-shape-three" src="{{ asset('website-assets/images/shape/plus-orange.png') }}" alt="hero shape three">
            </div>
            <!-- hero shape end -->
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5">
                        <!-- hero content start -->
                        <div class="hero-content wow fadeInUp" data-wow-delay=".2s">
                            <!-- section title start -->
                            <div class="section-title">
                                <span class="sub-title">Welcome to Shafayaat</span>
                                <h1>Shaping the Future of Healthcare</h1>
                                <p class="text-black">
                                    We bring modern, affordable, and patient-centered healthcare that blends technology with natural solutions. With a focus on prevention and personalized care, we empower you to take control of your health.
                                </p>
                            </div>
                            <!-- section title end -->
                            <!-- hero button wappper start -->
                            <div class="hero-button-wappper">
                                <button
                                    type="button"
                                    class="theme-button style-1 book-appointment-btn"
                                    aria-label="Book Appointment"
                                    data-bs-toggle="modal"
                                    data-bs-target="#bookAppointmentModal"
                                >
                                    <span data-text="Book Appointment">Book Appointment</span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </button>
                                <a href="{{route('home')}}#services" class="theme-button style-2" aria-label="Our Services">
                                    <span data-text="Our Services">Our Services</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- hero button wappper end -->
                        </div>
                        <!-- hero content end -->
                    </div>
                    <div class="col-lg-6">
                        <!-- hero image start -->
                        <div class="hero-image wow fadeInUp" data-wow-delay=".3s">
                            <div class="row align-items-end">
                                <div class="col-6">
                                    <!-- hero image left start -->
                                    <div class="hero-image-left">
                                        <figure class="image-anime">
                                            <img src="{{ asset('website-assets/images/hero/hero1.jpg') }}" alt="hero image one">
                                        </figure>
                                    </div>
                                    <!-- hero image left end -->
                                </div>
                                <div class="col-6">
                                    <!-- hero image right start -->
                                    <div class="hero-image-right">
                                        <div class="hero-image-right-top">
                                            <figure class="image-anime">
                                                <img src="{{ asset('website-assets/images/hero/hero2.jpg') }}" alt="hero image two">
                                            </figure>
                                        </div>
                                        <div class="hero-image-right-bottom">
                                            <figure class="image-anime">
                                                <img src="{{ asset('website-assets/images/hero/hero3.jpg') }}" alt="hero image three">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- hero image right end -->
                                </div>
                            </div>
                            <!-- round shape start -->
                            <div class="round-shape">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <!-- round shape end -->
                        </div>
                        <!-- hero image end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- hero section end -->

        <!-- micon section start -->
        <section class="micon-section pt-100 md-pt-80 pb-70 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <!-- micon items start -->
                        <div class="micon-items micon-items-one wow fadeInUp"  data-wow-delay=".2s">
                            <div class="micon-icon">
                                <figure>
                                    <img src="{{ asset('website-assets/images/micon/book-appointment.png') }}" alt="micon book appointment">
                                </figure>
                            </div>
                            <div class="micon-content">
                                <h2>Book Appointment</h2>
                                <p>Choose a date and time that works for you we'll take care of the rest.</p>
                                <div class="micon-button">
                                    <a
                                        type="button"
                                        class="read-more-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#bookAppointmentModal"
                                    >
                                        Request an Appointment
                                </a>
                                </div>
                            </div>
                        </div>
                        <!-- micon items end -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- micon items start -->
                        <div class="micon-items micon-items-two wow fadeInUp"  data-wow-delay=".3s">
                            <div class="micon-icon">
                                <figure>
                                    <img src="{{ asset('website-assets/images/micon/qualified-doctors.png') }}" alt="micon qualified doctors">
                                </figure>
                            </div>
                            <div class="micon-content">
                                <h2>Qualified Doctors</h2>
                                <p>Our team of expert doctors ensures top-quality treatment every time.</p>
                                <div class="micon-button">
                                    <a href="{{route('home')}}#doctors" class="read-more-btn">View All Doctor</a>
                                </div>
                            </div>
                        </div>
                        <!-- micon items end -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- micon items start -->
                        <div class="micon-items micon-items-three wow fadeInUp"  data-wow-delay=".4s">
                            <div class="micon-icon">
                                <figure>
                                    <img src="{{ asset("website-assets/images/micon/services.png") }}" alt="micon services">
                                </figure>
                            </div>
                            <div class="micon-content">
                                <h2>24/7 Services</h2>
                                <p>24/7 care you can count on anybody, anytime, anywhere.</p>
                                <div class="micon-button">
                                    <a href="{{route('home')}}#contact" class="read-more-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <!-- micon items end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- micon section end -->

        <!-- about section start -->
        <section class="about-section-1 pb-100 md-pb-80">
            <div class="about-shape-1">
                <figure>
                    <img src="{{ asset('website-assets/images/about/about-shape-1.png') }}" alt="about shape one">
                </figure>
            </div>
            <div class="about-shape-2">
                <figure>
                    <img src="{{ asset('website-assets/images/about/about-shape-2.png') }}" alt="about shape two">
                </figure>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <!-- section title start -->
                        <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">About Us</span>
                            <h2>A New Era of Patient-Centered Care</h2>
                            <p>We are a modern healthcare facility committed to delivering high-quality, affordable, and patient-focused care. By integrating technology, research, and natural solutions, we provide holistic health management for individuals and families.</p>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <!-- about image start -->
                        <div class="about-image">
                            <!-- about img 1 start -->
                            <div class="about-img-1 text-center">
                                <figure class="image-anime">
                                    <img src="{{ asset('website-assets/images/hero/hero1.jpg') }}" alt="about image one">
                                </figure>
                            </div>
                            <!-- about img 1 end -->
                        </div>
                        <!-- about image end -->
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <!-- about content start -->
                        <div class="about-content">
                            <!-- about features wappper start -->
                            <div class="about-features-wappper">
                                <!-- about features item start -->
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/diabetes-icon.png') }}" alt="icon about one">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Diabetes</h3>
                                        <p>Lifestyle support, digital monitoring, and personalized plans for effective management.</p>
                                    </div>
                                </div>
                                <!-- about features item end -->
                                <!-- about features item start -->
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/heart-icon.png') }}" alt="icon about two">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Heart Disease</h3>
                                        <p>Preventive care and tailored treatments to ensure long-term heart health.</p>
                                    </div>
                                </div>
                                <!-- about features item end -->
                                <!-- about features item start -->
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/kidney.png') }}" alt="icon about three">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Kidney Disease</h3>
                                        <p>Early detection and sustainable management to protect kidney function.</p>
                                    </div>
                                </div>
                                <!-- about features item end -->
                                <!-- about features item start -->
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/about/mental-icon.png') }}" alt="icon about three">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Mental Health</h3>
                                        <p>Compassionate support and therapy for emotional and mental well-being.</p>
                                    </div>
                                </div>
                                <!-- about features item end -->
                            </div>
                            <!-- about features wappper end-->
                            <!-- hero button wappper start -->
                            <div class="about-button-wappper">
                                <a href="{{route('about')}}" class="theme-button style-1" aria-label="More About Us">
                                    <span data-text="More About Us">More About Us</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- hero button wappper end -->
                        </div>
                        <!-- about content end -->
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                        <!-- about image start -->
                        <div class="about-image">
                            <!-- about img 2 start -->
                            <div class="about-img-2">
                                <figure class="image-anime">
                                    <img src="{{ asset('website-assets/images/image222.avif') }}" height="100%" alt="about image two">
                                </figure>
                            </div>
                            <!-- about img 2 end -->
                        </div>
                        <!-- about image end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->

        <!-- services section start -->
        <section id="services" class="services-section-1 background-one pt-100 md-pt-80 pb-100 md-pb-80" data-img-src="{{ asset('website-assets/images/shape/bg-shape-1.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Our Services</span>
                                <h2>Comprehensive Solutions for Every Stage of Health</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>From chronic disease management to everyday care, our services are designed to meet your health needs at every stage of life. We combine technology, expertise, and compassion to ensure the best outcomes.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- services slider start -->
                        <div class="swiper services-slider">
                            <!-- swiper wrapper start -->
                            <div class="swiper-wrapper">
                                @foreach ($services as $service)
                                <!-- swiper slide start -->
                                <div class="swiper-slide">
                                    <!-- service items start -->
                                    <div class="service-items">
                                        <div class="service-icon">
                                            <figure>
                                                <img src="{{ asset('website-assets/images/services/medical-service.png') }}" alt="icon service two">
                                            </figure>
                                        </div>
                                        <div class="service-content">
                                            <div class="h-100">
                                                <h2><a href="{{route('service-detail', $service->id)}}">{{$service->service_name}}</a></h2>
                                                <p>{{$service->description}}</p>
                                            </div>

                                            <!-- Book Appointment Button -->
                                            <div class="d-flex flex-column align-items-start mt-4 ">
                                                <button
                                                    type="button"
                                                    class="btn book-appointment-btn my-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#bookAppointmentModal"
                                                    data-service-id="{{$service->id}}"
                                                    data-service-name="{{$service->service_name}}">
                                                    Book Appointment
                                                </button>
                                                <a href="{{route('service-detail', $service->id)}}" class="read-more-btn mt-2">More Details</a>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- service items end -->
                                </div>
                                <!-- swiper slide end -->
                                @endforeach
                            </div>
                            <!-- swiper wrapper end -->
                            <!-- swiper actions start -->
                            <div class="swiper-actions text-center">
                                <div class="dot"></div>
                            </div>
                            <!-- swiper actions end -->
                        </div>
                        <!-- services slider end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- services section end -->
        <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="bookAppointmentForm" method="POST" action="{{route('save-web-req')}}" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookAppointmentModalLabel">Book Appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="appointment_name">Name</label>
                                <input type="text" class="form-control" id="appointment_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="appointment_phone">Phone No.</label>
                                <input type="text" class="form-control" id="appointment_phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="appointment_date">Date</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="appointment_date"
                                    name="appointment_date"
                                    required
                                    autocomplete="off"
                                    placeholder="Select a date"
                                >
                            </div>
                            <style>
                                /* Minimalistic, modern, lush Flatpickr calendar styles */
                                .flatpickr-calendar {
                                    background: #fff;
                                    border: 1px solid #0e9a8c;
                                    border-radius: 12px;
                                    box-shadow: 0 4px 24px rgba(3,94,88,0.10);
                                    font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
                                    z-index: 99999 !important;
                                    min-width: 240px;
                                    max-width: 280px;
                                    width: 100%;
                                    padding: 0;
                                    transition: box-shadow 0.2s;
                                }
                                .flatpickr-calendar.open {
                                    animation: fadeInScale 0.18s cubic-bezier(.4,0,.2,1);
                                }
                                @keyframes fadeInScale {
                                    from { opacity: 0; transform: scale(0.97);}
                                    to { opacity: 1; transform: scale(1);}
                                }
                                .flatpickr-months {
                                    background: #035E58;
                                    color: #fff !important;
                                    border-radius: 12px 12px 0 0;
                                    padding: 0.3em 0;
                                }
                                .flatpickr-month {
                                    font-weight: 600;
                                    font-size: 1em;
                                    letter-spacing: 0.2px;
                                }
                                .flatpickr-weekdays {
                                    background: #f4fbfa;
                                    border-bottom: 1px solid #e6f7f5;
                                    border-radius: 0 0 6px 6px;
                                }
                                .flatpickr-weekday {
                                    color: #0e9a8c;
                                    font-weight: 500;
                                    font-size: 0.95em;
                                    letter-spacing: 0.1em;
                                    text-transform: uppercase;
                                }
                                .flatpickr-days {
                                    padding: 0.2em 0.3em 0.3em 0.3em;
                                }
                                .flatpickr-day {
                                    border-radius: 7px;
                                    transition: background 0.15s, color 0.15s, box-shadow 0.15s;
                                    font-size: 0.98em;
                                    color: #035E58;
                                    font-weight: 500;
                                    margin: 1.5px 0;
                                    position: relative;
                                    width: 32px;
                                    height: 32px;
                                    line-height: 32px;
                                    max-width: 32px;
                                    max-height: 32px;
                                }
                                .flatpickr-day:hover, .flatpickr-day:focus {
                                    background: #0e9a8c;
                                    color: #fff;
                                    box-shadow: 0 1px 4px rgba(3,94,88,0.08);
                                    cursor: pointer;
                                }
                                .flatpickr-day.today {
                                    background: #e6f7f5;
                                    color: #035E58;
                                    border: 1.5px solid #0e9a8c;
                                    font-weight: 600;
                                }
                                .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange {
                                    background: linear-gradient(90deg, #035E58 80%, #0e9a8c 100%);
                                    color: #fff;
                                    font-weight: 600;
                                    box-shadow: 0 1px 6px rgba(3,94,88,0.10);
                                }
                                .flatpickr-day.inRange {
                                    background: #b2e6e2;
                                    color: #035E58;
                                }
                                .flatpickr-day.disabled, .flatpickr-day.prevMonthDay, .flatpickr-day.nextMonthDay {
                                    color: #b0b0b0;
                                    background: #fafbfb;
                                    cursor: not-allowed;
                                    opacity: 0.6;
                                }
                                .flatpickr-current-month input.cur-year {
                                    background: transparent;
                                    color: #fff;
                                    font-weight: 500;
                                    border: none;
                                    font-size: 1em;
                                }
                                .flatpickr-calendar.arrowTop:before, .flatpickr-calendar.arrowTop:after {
                                    border-bottom-color: #0e9a8c;
                                }
                                .flatpickr-time {
                                    border-top: 1px solid #e6f7f5;
                                    background: #f8f8f8;
                                    border-radius: 0 0 12px 12px;
                                }
                                .flatpickr-time input, .flatpickr-time .flatpickr-am-pm {
                                    font-size: 0.98em;
                                    color: #035E58;
                                }
                                /* Remove custom close button for minimalism */
                                .flatpickr-close {
                                    display: none !important;
                                }
                            </style>
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    flatpickr("#appointment_date", {
                                        minDate: "{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}",
                                        dateFormat: "Y-m-d",
                                        disableMobile: true
                                    });
                                });
                            </script>

                            <div class="form-group mt-2 ">
                                <label for="appointment_services">Select Services</label>
                                <select class="form-select" name="appointment_services[]" id="appointment_services" multiple required>
                                    @foreach($services ?? [] as $srv)
                                        <option value="{{ $srv->service_name }}"
                                            @if(collect(old('appointment_services'))->contains($srv->service_name)) selected @endif
                                        >{{ $srv->service_name }}</option>
                                    @endforeach
                                </select>
                                @error('appointment_services')
                                    <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Hidden fields to store converted values -->
                            <input type="hidden" name="date" id="converted_date">
                            <input type="hidden" name="services" id="converted_services">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="theme-button style-2 btn-cross" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="theme-button style-1">Book</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <!-- why-section start -->
        <section class="why-choose-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <!-- why content start -->
                        <div class="why-content">
                            <!-- section-title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Why Choose Us</span>
                                <h2>Where Innovation Meets Compassion</h2>
                                <p>Our goal is to make healthcare accessible, affordable, and effective. By using digital innovation and focusing on patients first, we deliver solutions that improve lives.</p>
                            </div>
                            <!-- section-title end -->
                            <!-- why choose box list start -->
                            <div class="why-choose-box-list wow fadeInUp" data-wow-delay=".3s">
                                <!-- why choose box start -->
                                <div class="why-choose-box">
                                    <div class="icon-box">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/why-choose/patient-centered.png') }}" alt="icon why choose one">
                                        </figure>
                                    </div>
                                    <div class="why-choose-box-content">
                                        <h3>Patient-Centered Excellence</h3>
                                        <p>Every decision and treatment is built around your needs.</p>
                                    </div>
                                </div>
                                <!-- why choose box end -->
                                <!-- why choose box start -->
                                <div class="why-choose-box">
                                    <div class="icon-box">
                                        <figure>
                                            <img src="{{ asset('website-assets/images/why-choose/healthcare.png') }}" alt="icon why choose two">
                                        </figure>
                                    </div>
                                    <div class="why-choose-box-content">
                                        <h3>Smart Healthcare Technology</h3>
                                        <p>Electronic records, telemedicine, and monitoring for seamless care.</p>
                                    </div>
                                </div>
                                <!-- why choose box end -->
                            </div>
                            <!-- why choose box list end -->
                            <!-- why choose list start -->
                            <div class="why-choose-list wow fadeInUp" data-wow-delay=".4s">
                                <ul>
                                    <li>Highly skilled medical team</li>
                                    <li>Affordable & accessible care</li>
                                </ul>
                            </div>
                            <!-- why choose list end -->
                        </div>
                        <!-- why content end -->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- why choose image start -->
                        <div class="why-choose-image">
                            <!-- why choose img 1 start -->
                            <div class="why-choose-img-1">
                                <figure class="image-anime">
                                    <img src="{{ asset('website-assets/images/diabetes.jpg') }}" alt="why choose image one">
                                </figure>
                            </div>
                            <!-- why choose img 1 end -->
                            <!-- why choose img 2 start -->
                            <div class="why-choose-img-2">
                                <figure class="image-anime">
                                    <img src="{{ asset('website-assets/images/compass.jpg') }}" alt="why choose image two">
                                </figure>
                            </div>
                            <!-- why choose img 2 end -->
                            <!-- why choose about circle start -->
                            <div class="why-choose-about-circle">
                                <a class="about-circle" href="{{route('about')}}" aria-label="about circle">
                                    <img src="{{ asset('website-assets/images/shape/round-about-us.png') }}" alt="round about us">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- why choose contact circle end -->
                        </div>
                        <!-- why choose image end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- why-section end -->

        <!-- appointment section start -->
        <section id="contact" class="appointment-section-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <!-- appointment image start -->
                        <div class="appointment-image">
                            <figure>
                                <img src="{{ asset('website-assets/images/appointment/appointment-1-1.png') }}" alt="appointment image one">
                            </figure>
                        </div>
                        <!-- appointment image end -->
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1">
                        <!-- appointment wapper start -->
                        <div class="appointment-wapper">
                            <!-- section-title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">General Queries</span>
                                <h2>Ask Us Anything</h2>
                            </div>
                            <!-- section-title end -->
                            <!-- default form start -->
                            <div class="default-form appointment-form wow fadeInUp" data-wow-delay=".3s">
                                <form action="{{ route('query-submit') }}" method="POST" id="appointmentForm" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input class="form-control" id="name" name="name" type="text" placeholder="Full Name Here" autocomplete="off" required value="{{ old('name') }}">
                                                    <label for="name">Name*</label>
                                                    <span class="error" id="name-error">
                                                        @error('name') {{ $message }} @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Here" autocomplete="off" required value="{{ old('phone') }}">
                                                    <label for="phone">Phone*</label>
                                                    <span class="error" id="phone-error">
                                                        @error('phone') {{ $message }} @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <textarea class="form-control" id="message" name="message" placeholder="Type your message here" style="height: 120px;" required>{{ old('message') }}</textarea>
                                                    <label for="message">Message*</label>
                                                    <span class="error" id="message-error">
                                                        @error('message') {{ $message }} @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="appointment-btn-wapper mt-10">
                                                <button type="submit" class="theme-button style-1" data-text="Send Message" id="submitBtn">
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
                            <!-- default form end -->
                        </div>
                        <!-- appointment wapper end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- appointment section end -->

        <!-- product section start -->
        <section class="product-section background-one pt-100 md-pt-50 pb-70 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Best Drivers</span>
                            <h2>Complete eye care with all the you require</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <!-- product grid item 1 start -->
                        <div class="product-grid-item-1 wow fadeInUp" data-wow-delay=".3s">
                            <!-- product tags start -->
                            <div class="product-tags">
                                <!-- product tags sale start -->
                                <div class="product-tags-sale">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/product/sale.png') }}" alt="sale one">
                                    </figure>
                                </div>
                                <!-- product tags sale end -->
                            </div>
                            <!-- product tags end -->
                            <!-- product grid image start -->
                            <div class="product-grid-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/product/product-1.png') }}" alt="product image one">
                                </figure>
                                <!-- product grid action start -->
                                <div class="product-grid-action">
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                    <a href="wishlist.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                                <!-- product grid action end -->
                            </div>
                            <!-- product grid image end -->
                            <!-- product grid content start -->
                            <div class="product-grid-content">
                                <h2><a href="shop-details.html">CM 4336 RG Luxury Stethoscope</a></h2>
                                <ul class="product-price-list">
                                    <li class="price">$120.00</li>
                                    <li><i class="fas fa-star active"></i>4.9 (25)</li>
                                </ul>
                                <div class="product-buton-wapper">
                                    <a href="cart.html" class="theme-button style-1" aria-label="Add To Cart">
                                        <span data-text="Add To Cart">Add To Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- product grid content end -->
                        </div>
                        <!-- product grid item 1 end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <!-- product grid item 1 start -->
                        <div class="product-grid-item-1 wow fadeInUp" data-wow-delay=".4s">
                            <!-- product tags start -->
                            <div class="product-tags">
                                <!-- product tags sale start -->
                                <div class="product-tags-sale">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/product/bestseller.png') }}" alt="bestseller two">
                                    </figure>
                                </div>
                                <!-- product tags sale end -->
                            </div>
                            <!-- product tags end -->
                            <!-- product grid image start -->
                            <div class="product-grid-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/product/product-2.png') }}" alt="product image two">
                                </figure>
                                <!-- product grid action start -->
                                <div class="product-grid-action">
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                    <a href="wishlist.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                                <!-- product grid action end -->
                            </div>
                            <!-- product grid image end -->
                            <!-- product grid content start -->
                            <div class="product-grid-content">
                                <h2><a href="shop-details.html">Adjustable blood pressure machine</a></h2>
                                <ul class="product-price-list">
                                    <li class="price">$120.00</li>
                                    <li><i class="fas fa-star active"></i>4.9 (25)</li>
                                </ul>
                                <div class="product-buton-wapper">
                                    <a href="cart.html" class="theme-button style-1" aria-label="Add To Cart">
                                        <span data-text="Add To Cart">Add To Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- product grid content end -->
                        </div>
                        <!-- product grid item 1 end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <!-- product grid item 1 start -->
                        <div class="product-grid-item-1 wow fadeInUp" data-wow-delay=".5s">
                            <!-- product tags start -->
                            <div class="product-tags">
                                <!-- product tags sale start -->
                                <div class="product-tags-sale">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/product/sale.png') }}" alt="sale three">
                                    </figure>
                                </div>
                                <!-- product tags sale end -->
                            </div>
                            <!-- product tags end -->
                            <!-- product grid image start -->
                            <div class="product-grid-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/product/product-3.png') }}" alt="product image three">
                                </figure>
                                <!-- product grid action start -->
                                <div class="product-grid-action">
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                    <a href="wishlist.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                                <!-- product grid action end -->
                            </div>
                            <!-- product grid image end -->
                            <!-- product grid content start -->
                            <div class="product-grid-content">
                                <h2><a href="shop-details.html">Oral Lamp with 8 LED Light Bulbs</a></h2>
                                <ul class="product-price-list">
                                    <li class="price">$120.00</li>
                                    <li><i class="fas fa-star active"></i>4.9 (25)</li>
                                </ul>
                                <div class="product-buton-wapper">
                                    <a href="cart.html" class="theme-button style-1" aria-label="Add To Cart">
                                        <span data-text="Add To Cart">Add To Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- product grid content end -->
                        </div>
                        <!-- product grid item 1 end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <!-- product grid item 1 start -->
                        <div class="product-grid-item-1 wow fadeInUp" data-wow-delay=".6s">
                            <!-- product tags start -->
                            <div class="product-tags">
                                <!-- product tags sale start -->
                                <div class="product-tags-sale">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/product/bestseller.png') }}" alt="bestseller four">
                                    </figure>
                                </div>
                                <!-- product tags sale end -->
                            </div>
                            <!-- product tags end -->
                            <!-- product grid image start -->
                            <div class="product-grid-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/product/product-4.png') }}" alt="product image four">
                                </figure>
                                <!-- product grid action start -->
                                <div class="product-grid-action">
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="shop.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                    <a href="wishlist.html" class="icon-btn" aria-label="icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                                <!-- product grid action end -->
                            </div>
                            <!-- product grid image end -->
                            <!-- product grid content start -->
                            <div class="product-grid-content">
                                <h2><a href="shop-details.html">Zoom Microscope for Eye Surgery</a></h2>
                                <ul class="product-price-list">
                                    <li class="price">$120.00</li>
                                    <li><i class="fas fa-star active"></i>4.9 (25)</li>
                                </ul>
                                <div class="product-buton-wapper">
                                    <a href="cart.html" class="theme-button style-1" aria-label="Add To Cart">
                                        <span data-text="Add To Cart">Add To Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- product grid content end -->
                        </div>
                        <!-- product grid item 1 end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- product section end -->

        <!-- portfolio section start -->
        <section class="portfolio-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Our Portfolio</span>
                                <h2>Explore our showcase of featured works</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptates modi omnis dolore et mollitia dolorem alias voluptatibus tempora soluta ut officia ullam magnam obcaecati accusantium.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- portfolio items start -->
                        <div class="portfolio-items wow fadeInUp" data-wow-delay=".3s">
                            <div class="portfolio-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/portfolio/portfolio-1-1.jpg') }}" alt="portfolio image one">
                                </figure>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-title">
                                    <h3><a href="portfolio-details.html">Transitions Lenses</a></h3>
                                    <ul class="portfolio-meta">
                                        <li>Laser Eye Surgery</li>
                                        <li>Retina Checkup</li>
                                    </ul>
                                </div>
                                <div class="portfolio-button-wapper">
                                    <a href="" class="portfolio-button-icon" aria-label="portfolio button icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- portfolio items end -->
                    </div>
                    <div class="col-lg-6">
                        <!-- portfolio items start -->
                        <div class="portfolio-items wow fadeInUp" data-wow-delay=".4s">
                            <div class="portfolio-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/portfolio/portfolio-1-2.jpg') }}" alt="portfolio image two">
                                </figure>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-title">
                                    <h3><a href="portfolio-details.html">Visual impairment</a></h3>
                                    <ul class="portfolio-meta">
                                        <li>Glaucoma Surgery</li>
                                        <li>Vision Correction</li>
                                    </ul>
                                </div>
                                <div class="portfolio-button-wapper">
                                    <a href="" class="portfolio-button-icon" aria-label="portfolio button icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- portfolio items end -->
                    </div>
                    <div class="col-lg-6">
                        <!-- portfolio items start -->
                        <div class="portfolio-items wow fadeInUp" data-wow-delay=".5s">
                            <div class="portfolio-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/portfolio/portfolio-1-3.jpg') }}" alt="portfolio image three">
                                </figure>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-title">
                                    <h3><a href="portfolio-details.html">Cochrane Eyes &amp; Vision</a></h3>
                                    <ul class="portfolio-meta">
                                        <li>Cataract Surgery</li>
                                        <li>Vision Correction</li>
                                    </ul>
                                </div>
                                <div class="portfolio-button-wapper">
                                    <a href="" class="portfolio-button-icon" aria-label="portfolio button icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- portfolio items end -->
                    </div>
                    <div class="col-lg-6">
                        <!-- portfolio items start -->
                        <div class="portfolio-items wow fadeInUp" data-wow-delay=".6s">
                            <div class="portfolio-image">
                                <figure>
                                    <img src="{{ asset('website-assets/images/portfolio/portfolio-1-4.jpg') }}" alt="portfolio image four">
                                </figure>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-title">
                                    <h3><a href="portfolio-details.html">Computerized Eye Exam</a></h3>
                                    <ul class="portfolio-meta">
                                        <li>Laser Eye Surgery</li>
                                        <li>Oculoplastic Surgery</li>
                                    </ul>
                                </div>
                                <div class="portfolio-button-wapper">
                                    <a href="" class="portfolio-button-icon" aria-label="portfolio button icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- portfolio items end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- more portfolio content start -->
                        <div class="more-portfolio-content wow fadeInUp" data-wow-delay=".7s">
                            <p>From preventive care to specialized treatments, our wide range of services is designed to support your health at every stage.</p>
                            <!-- portfolio button wappper start -->
                            <div class="service-button-wappper">
                                <a href="portfolio.html" class="theme-button style-1" aria-label="View All Portfolio">
                                    <span data-text="View All Portfolio">View All Portfolio</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- portfolio button wappper end -->
                        </div>
                        <!-- more portfolio content end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio section end -->

        <!-- testimonials section start -->
        <section class="testimonials-section-1 background-one pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <!-- testimonials image start -->
                        <div class="testimonials-image wow fadeInLeft" data-wow-delay=".2s">
                            <figure>
                                <img src="{{ asset('website-assets/images/testimonials/testimonial-1-1.jpg') }}" alt="testimonials image one">
                            </figure>
                            <div class="success-rate">
                                <div class="success-rate-review">2K+ Review</div>
                                <div class="success-rate-star">
                                    <i class="fa-solid fa-star active"></i>
                                    <i class="fa-solid fa-star active"></i>
                                    <i class="fa-solid fa-star active"></i>
                                    <i class="fa-solid fa-star active"></i>
                                    <i class="fa-solid fa-star active"></i>
                                </div>
                            </div>
                        </div>
                        <!-- testimonials image end -->
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1">
                        <div class="testimonials-wapper">
                            <!-- section title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Our Testimonials</span>
                                <h2>Voices of Trust and Care</h2>
                            </div>
                            <!-- section title end -->
                            <!-- testimonials slider start -->
                            <div class="swiper testimonials-slider">
                                <!-- swiper wrapper start -->
                                <div class="swiper-wrapper">
                                    <!-- swiper slide start -->
                                    <div class="swiper-slide">
                                        <!-- testimonials item start -->
                                        <div class="testimonials-item">
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
                                            <div class="testimonials-content">
                                                <p>"The personalized care I received here made managing my diabetes so much easier. The doctors explained everything clearly, and the continuous monitoring gave me peace of mind. I finally feel in control of my health."</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-1.jpg') }}" alt="avatar one">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h3>Ayesha</h3>
                                                    <p>Patient</p>
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
                                            <div class="testimonials-content">
                                                <p>“Their telemedicine service allowed me to get help quickly without leaving home. The consultation was smooth, and I felt like I was given the same attention as if I were in the hospital. Truly a modern approach to healthcare.”</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-2.jpg') }}" alt="avatar two">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h3>Ali</h3>
                                                    <p>Patient</p>
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
                                            <div class="testimonials-content">
                                                <p>“Affordable, reliable, and compassionate care—I couldn’t ask for better. They guided me through every step of my treatment and also helped me access affordable medicines. It feels like they genuinely care about patients, not just numbers.”</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-3.jpg') }}" alt="avatar three">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h3>Fatima</h3>
                                                    <p>Patient</p>
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
                                            <div class="testimonials-content">
                                                <p>“The doctors here truly listen and provide long-term solutions, not just quick fixes. I’ve never felt rushed in appointments, and the support staff is equally kind and professional. It feels like a place built for patients, not just treatments.”</p>
                                            </div>
                                            <div class="testimonials-author">
                                                <div class="testimonials-author-image">
                                                    <figure>
                                                        <img src="{{ asset('website-assets/images/avatar/avatar-4.jpg') }}" alt="avatar four">
                                                    </figure>
                                                </div>
                                                <div class="testimonials-author-content">
                                                    <h3>Hassan</h3>
                                                    <p>Patient</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- testimonials item end -->
                                    </div>
                                    <!-- swiper slide end -->
                                </div>
                                <!-- swiper wrapper end -->
                                <!-- swiper actions start -->
                                <div class="swiper-actions ms-2">
                                    <div class="dot"></div>
                                </div>
                                <!-- swiper actions end -->
                            </div>
                            <!-- testimonials slider end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio section end -->

        <!-- marquee ticker section start -->
        <div class="marquee-ticker-section">
            <div class="marquee-ticker-box">
                <div class="marquee-content">
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image one">
                    </div>
                    <p data-text="Online Consultation">
                        Online Consultation
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image two">
                    </div>
                    <p data-text="Book Appointment">
                        Book Appointment
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image three">
                    </div>
                    <p data-text="Quality Eyecare">
                        Quality Eyecare
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image four">
                    </div>
                    <p data-text="Health Screening">
                        Health Screening
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image five">
                    </div>
                    <p data-text="Emergency">
                        Emergency
                    </p>
                </div>
                <div class="marquee-content">
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image six">
                    </div>
                    <p data-text="Online Consultation">
                        Online Consultation
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image seven">
                    </div>
                    <p data-text="Book Appointment">
                        Book Appointment
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image eight">
                    </div>
                    <p data-text="Quality Eyecare">
                        Quality Eyecare
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image nine">
                    </div>
                    <p data-text="Health Screening">
                        Health Screening
                    </p>
                    <div class="marquee-icon">
                        <img src="{{ asset('website-assets/images/icon-sub-heading.svg') }}" alt="marquee image ten">
                    </div>
                    <p data-text="Emergency">
                        Emergency
                    </p>
                </div>
            </div>
        </div>
        <!-- marquee ticker section end -->

        <!-- doctor section start -->
        <section id="doctors" class="doctor-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Our Doctor</span>
                                <h2>The Experts Behind Your Care</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>Our team of highly qualified doctors combines expertise with compassion to deliver trusted, high-quality care for patients of all ages.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <!-- doctor image wrapper start -->
                        <div class="doctor-image-wrapper wow fadeInUp" data-wow-delay=".3s">
                            <!-- doctor image item start -->
                            <div class="doctor-image-item">
                                <figure>
                                    <img src="{{ asset("website-assets/images/doctor/doctor-1-1.png") }}" alt="doctor image one">
                                </figure>
                                <div class="doctor-overlay">
                                    <div class="doctor-overlay-content">
                                        <h3><a href="doctor-details.html">Dr. Sarah Khan</a></h3>
                                        <p>Endocrinologist (Diabetes Specialist)</p>
                                        <div class="doctor-overlay-meta">
                                            <div class="doctor-social-media">
                                                <ul>
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
                                            <div class="doctor-review">
                                                <div class="doctor-review-content">
                                                    <i class="fa-solid fa-star active"></i>
                                                    4.9
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- doctor image item end -->
                        </div>
                        <!-- doctor image wrapper end -->
                    </div>
                    <div class="col-lg-7">
                        <!-- doctor list start -->
                        <div class="doctor-list">
                            <!-- doctor item start -->
                            <div class="doctor-item wow fadeInUp" data-wow-delay=".4s">
                                <div class="doctor-item-image">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/doctor/doctor-1-2.jpg') }}" alt="doctor image two">
                                    </figure>
                                </div>
                                <div class="doctor-item-content">
                                    <h3><a href="doctor-details.html">Dr. Ahmed Malik</a></h3>
                                    <p>Cardiologist</p>
                                </div>
                            </div>
                            <!-- doctor item end -->
                            <!-- doctor item start -->
                            <div class="doctor-item wow fadeInUp" data-wow-delay=".5s">
                                <div class="doctor-item-image">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/doctor/doctor-1-3.jpg') }}" alt="doctor image three">
                                    </figure>
                                </div>
                                <div class="doctor-item-content">
                                    <h3><a href="doctor-details.html">Dr. Rabia Shah</a></h3>
                                    <p>Nephrologist (Kidney Specialist)</p>
                                </div>
                            </div>
                            <!-- doctor item end -->
                            <!-- doctor item start -->
                            <div class="doctor-item wow fadeInUp" data-wow-delay=".6s">
                                <div class="doctor-item-image">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/doctor/doctor-1-4.jpg') }}" alt="doctor image four">
                                    </figure>
                                </div>
                                <div class="doctor-item-content">
                                    <h3><a href="doctor-details.html">Dr. Usman Ali</a></h3>
                                    <p>Psychiatrist</p>
                                </div>
                            </div>
                            <!-- doctor item end -->
                            <!-- doctor item start -->
                            <div class="doctor-item wow fadeInUp" data-wow-delay=".7s">
                                <div class="doctor-item-image">
                                    <figure>
                                        <img src="{{ asset('website-assets/images/doctor/doctor-1-5.jpg') }}" alt="doctor image five">
                                    </figure>
                                </div>
                                <div class="doctor-item-content">
                                    <h3><a href="doctor-details.html">Dr. Keanu Reeves</a></h3>
                                    <p>Clarivu eye</p>
                                </div>
                            </div>
                            <!-- doctor item end -->
                        </div>
                        <!-- doctor list end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- doctor section end -->

        <!-- cta section start -->
        <section class="cta-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="cta-content wow fadeInUp" data-wow-delay=".2s">
                            <!-- section title start -->
                            <div class="section-title">
                                <span class="sub-title">Get In Touch</span>
                                <h2>Your Health Journey Starts Here</h2>
                                <p>Whether you need medical advice, an appointment, or just more information, we’re here to help. Reach out today and take the first step toward better health.</p>
                            </div>
                            <!-- section title end -->
                            <!-- cta button wapper start -->
                            <div class="cta-button-wapper">
                                <button
                                    type="button"
                                    class="theme-button style-4 book-appointment-btn"
                                    aria-label="Get Appointment"
                                    data-bs-toggle="modal"
                                    data-bs-target="#bookAppointmentModal"
                                >
                                    <span data-text="Get Appointment">Get Appointment</span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </button>
                                <a href="contact.html" class="theme-button style-5" aria-label="Explore More">
                                    <span data-text="Explore More">Explore More</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- cta button wapper end -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- cta video wapper start -->
                        <div class="cta-video-wapper wow fadeInUp" data-wow-delay=".2s">
                            <a class="video-popup video-play play-center" href="https://www.youtube.com/watch?v=Y-x0efG1seA" aria-label="play video">
                                <span class="icon"><i class="fa-solid fa-play"></i></span>
                            </a>
                        </div>
                        <!-- cta video wapper end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- cta section end -->

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
                                    <img src="{{ asset('website-assets/images/faqs.jpg') }}" alt="faq image one">
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

        <!-- pricing section start -->
        <section class="pricing-section-1 bg-section pt-100 md-pt-80 pb-70 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Plans &amp; Pricing</span>
                                <h2>Our pricing is simple with no hidden fees</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptates modi omnis dolore et mollitia dolorem alias voluptatibus tempora soluta ut officia ullam magnam obcaecati accusantium.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- pricing tabs start -->
                        <div class="pricing-tabs wow fadeInUp" data-wow-delay=".3s">
                            <!-- nav start -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-monthly-tab" data-bs-toggle="tab" data-bs-target="#nav-monthly" type="button" role="tab" aria-controls="nav-monthly" aria-selected="true">Monthly</button>
                                    <button class="nav-link" id="nav-yearly-tab" data-bs-toggle="tab" data-bs-target="#nav-yearly" type="button" role="tab" aria-controls="nav-yearly" aria-selected="false">Yearly</button>
                                </div>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- pricing tabs end -->
                    </div>
                </div>
                <!-- tab content start -->
                <div class="tab-content wow fadeInUp" data-wow-delay=".4s">
                    <!-- tab pane start -->
                    <div class="tab-pane fade active show" id="nav-monthly" role="tabpanel" aria-labelledby="nav-monthly-tab" tabindex="0">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">Individual Plans</p>
                                            <h3 class="pricing-plan-price monthly_text">$30<span>/Monthly</span></h3>
                                            <p>This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-black">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-2" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item tagged">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">
                                                Family Plans
                                                <span>Popular</span>
                                            </p>
                                            <h3 class="pricing-plan-price monthly_text">$70<span>/Monthly</span></h3>
                                            <p class="text-white">This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-white">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-4" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">Group Plans</p>
                                            <h3 class="pricing-plan-price monthly_text">$90<span>/Monthly</span></h3>
                                            <p>This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-black">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-2" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                        </div>
                    </div>
                    <!-- tab pane end -->
                    <!-- tab pane start -->
                    <div class="tab-pane fade" id="nav-yearly" role="tabpanel" aria-labelledby="nav-yearly-tab" tabindex="0">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">Individual Plans</p>
                                            <h3 class="pricing-plan-price monthly_text">$310<span>/Yearly</span></h3>
                                            <p>This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-black">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-2" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item tagged">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">
                                                Family Plans
                                                <span>Popular</span>
                                            </p>
                                            <h3 class="pricing-plan-price monthly_text">$790<span>/Yearly</span></h3>
                                            <p class="text-white">This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-white">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-4" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <!-- pricing item start -->
                                <div class="pricing-item">
                                    <!-- pricing content start -->
                                    <div class="pricing-content">
                                        <!-- pricing text start -->
                                        <div class="pricing-text">
                                            <p class="pricing-plan-title">Group Plans</p>
                                            <h3 class="pricing-plan-price monthly_text">$1030<span>/Yearly</span></h3>
                                            <p>This plan includes online consultation options for all users</p>
                                        </div>
                                        <!-- pricing text end -->
                                        <!-- pricing list start -->
                                        <div class="pricing-list">
                                            <p class="text-black">What's included?</p>
                                            <!-- check list start -->
                                            <div class="check-list mb-30">
                                                <ul>
                                                    <li>Routine Checkups</li>
                                                    <li>Medical Specialist</li>
                                                    <li>Nutritional Guidance</li>
                                                    <li>Professional Consultation</li>
                                                    <li>Online Booking</li>
                                                    <li>Emergency Care</li>
                                                </ul>
                                            </div>
                                            <!-- check list end -->
                                            <!-- pricing button wapper start -->
                                            <div class="pricing-button-wapper">
                                                <a href="pricing.html" class="theme-button style-2" aria-label="Choose Plan">
                                                    <span data-text="Choose Plan">Choose Plan</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                            <!-- pricing button wapper end -->
                                        </div>
                                        <!-- pricing list end -->
                                    </div>
                                    <!-- pricing content end -->
                                </div>
                                <!-- pricing item end -->
                            </div>
                        </div>
                    </div>
                    <!-- tab pane end -->
                </div>
                <!-- tab content end -->
            </div>
        </section>
        <!-- pricing section end -->

        <!-- blog section start -->
        <section class="blog-section background-one pt-100 md-pt-80 pb-70 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Blog &amp; Article</span>
                            <h2>Update with our latest trends &amp; insights</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <!-- blog grid item 1 start -->
                        <div class="blog-grid-item-1 wow fadeInUp" data-wow-delay=".3s">
                            <div class="blog-title">
                                <h3><a href="blog-details.html">How do Inherited Retinal Diseases Happen?</a></h3>
                            </div>
                            <ul class="blog-meta">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>March 14, 2025</span>
                                </li>
                            </ul>
                            <div class="blog-grid-image">
                                <a href="blog-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/blog/blog-1.jpg') }}" alt="blog image one">
                                    </figure>
                                </a>
                            </div>
                            <div class="blog-grid-content">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <div class="blog-grid-button">
                                    <a href="blog-details.html" class="read-more-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- blog grid item 1 end -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- blog grid item 1 start -->
                        <div class="blog-grid-item-1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="blog-title">
                                <h3><a href="blog-details.html">Protect your eyes from dust and disease</a></h3>
                            </div>
                            <ul class="blog-meta">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>March 15, 2025</span>
                                </li>
                            </ul>
                            <div class="blog-grid-image">
                                <a href="blog-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/blog/blog-2.jpg') }}" alt="blog image two">
                                    </figure>
                                </a>
                            </div>
                            <div class="blog-grid-content">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <div class="blog-grid-button">
                                    <a href="blog-details.html" class="read-more-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- blog grid item 1 end -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- blog grid item 1 start -->
                        <div class="blog-grid-item-1 wow fadeInUp" data-wow-delay=".5s">
                            <div class="blog-title">
                                <h3><a href="blog-details.html">We're ready to enhance your clear vision</a></h3>
                            </div>
                            <ul class="blog-meta">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>March 17, 2025</span>
                                </li>
                            </ul>
                            <div class="blog-grid-image">
                                <a href="blog-details.html">
                                    <figure class="image-anime">
                                        <img src="{{ asset('website-assets/images/blog/blog-3.jpg') }}" alt="blog image three">
                                    </figure>
                                </a>
                            </div>
                            <div class="blog-grid-content">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <div class="blog-grid-button">
                                    <a href="blog-details.html" class="read-more-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- blog grid item 1 end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- blog section end -->
    </main>
@endsection
@section('custom-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#bookAppointmentModal').on('shown.bs.modal', function () {
            $('#appointment_services').select2({
                dropdownParent: $('#bookAppointmentModal'),
                placeholder: "Select services",
                allowClear: true,
                width: '100%'
            });
        });

        // Attach click event to all .book-appointment-btn to open modal and handle service selection
        $(document).on('click', '.book-appointment-btn', function (e) {
            // If the button has a data-service-name, preselect it
            var serviceName = $(this).attr('data-service-name');
            var $select = $('#appointment_services');
            if ($select.length) {
                // Deselect all
                $select.find('option').prop('selected', false);
                if (serviceName) {
                    $select.find('option').each(function () {
                        if ($(this).val() == serviceName) {
                            $(this).prop('selected', true);
                        }
                    });
                }
                // If using select2, trigger change for UI update
                if ($select.hasClass('select2-hidden-accessible')) {
                    $select.trigger('change');
                }
            }
            // Open the modal (in case not opened by data-bs-toggle)
            $('#bookAppointmentModal').modal('show');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('bookAppointmentForm');
        form.addEventListener('submit', function (e) {
            // Convert date to string (YYYY-MM-DD to readable format)
            const dateInput = document.getElementById('appointment_date');
            const dateValue = dateInput.value;
            if (dateValue) {
                const dateObj = new Date(dateValue);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                document.getElementById('converted_date').value = dateObj.toLocaleDateString(undefined, options);
            } else {
                document.getElementById('converted_date').value = '';
            }

            // Convert selected services to comma-separated string
            const servicesSelect = document.getElementById('appointment_services');
            const selected = Array.from(servicesSelect.selectedOptions).map(opt => opt.value);
            document.getElementById('converted_services').value = selected.join(', ');
        });
    });
</script>
<script>
    // Fix for submit button not working
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('appointmentForm');
        var btn = document.getElementById('submitBtn');
        if(form && btn) {
            btn.addEventListener('click', function(e) {
                // Let the form submit normally
                form.submit();
            });
        }
    });
</script>
{{--
<script>
    // Optional: If you want to pre-select the service in the modal when clicking "Book Appointment"
    document.addEventListener('DOMContentLoaded', function () {
        var bookButtons = document.querySelectorAll('.book-appointment-btn');
        var serviceSelect = document.getElementById('appointment_services');
        bookButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var serviceName = btn.getAttribute('data-service-name');
                if(serviceSelect) {
                    for (var i = 0; i < serviceSelect.options.length; i++) {
                        serviceSelect.options[i].selected = (serviceSelect.options[i].value === serviceName);
                    }
                }
            });
        });
    });
</script>
--}}
{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // When the Book Appointment button is clicked
        $('.book-appointment-btn').on('click', function () {
            var serviceName = $(this).data('service-name');
            // Set the selected service in the modal's select
            $('#appointment_services option').prop('selected', false);
            $('#appointment_services option').each(function() {
                if ($(this).val() === serviceName) {
                    $(this).prop('selected', true);
                }
            });
            $('#appointment_services').trigger('change');
        });

        // On form submit, join selected services as comma separated string
        $('#bookAppointmentForm').on('submit', function(e) {
            // Before submit, convert selected services to comma separated string
            var selected = $('#appointment_services').val() || [];
            // Remove the name attribute from the select to avoid sending as array
            $('#appointment_services').removeAttr('name');
            // Add a hidden input with comma separated services
            $(this).find('input[name="services"]').remove();
            $('<input>').attr({
                type: 'hidden',
                name: 'services',
                value: selected.join(', ')
            }).appendTo(this);
        });
    });
</script>
--}}
@endsection
