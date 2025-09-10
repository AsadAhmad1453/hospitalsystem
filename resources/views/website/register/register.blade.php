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
                                            <h1>Register</h1>
                                        </div>
                                        <!-- breadcrumb title end -->
                                        <!-- nav start -->
                                        <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Register</li>
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
    
                    <!-- authentication section start -->
                    <section class="authentication-section-1 pt-100 md-pt-80 pb-100 md-pb-80">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <!-- authentication box start -->
                                    <div class="authentication-box">
                                        <!-- default form start -->
                                        <div class="default-form login-form">
                                            <!-- section title start -->
                                            <div class="section-title text-center">
                                                <h2>Create An Account</h2>
                                            </div>
                                            <!-- section title end -->
                                            <!-- form start -->
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="form-floating field-inner">
                                                                <input id="fullname" class="form-control" name="fullname" type="text" placeholder="Ex. Your name" autocomplete="off" required="required">
                                                                <label for="fullname">Full Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="form-floating field-inner">
                                                                <input class="form-control" id="email" name="email" placeholder="Ex. info@domain.com" type="email" autocomplete="off" required="required">
                                                                <label for="email">Email</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="form-floating field-inner">
                                                                <input class="form-control" id="password" name="password" placeholder="Password Here" type="password" autocomplete="off" required="required">
                                                                <label for="password">Password</label>
                                                                <div class="eye-icon">
                                                                    <i class="fa-solid fa-eye-slash"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="form-floating field-inner">
                                                                <input class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password Here" type="password" autocomplete="off" required="required">
                                                                <label for="confirmpassword">Confirm Password</label>
                                                                <div class="eye-icon">
                                                                    <i class="fa-solid fa-eye-slash"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="forgot-box mb-30 pt-10">
                                                            <div class="form-group mb-0">
                                                                <div class="field-inner checkbox">
                                                                    <input id="instockcheckbox" class="form-check-input" type="checkbox" name="checkbox">
                                                                    <label for="instockcheckbox">I agree with Terms and Privacy</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="button-wapper mb-20">
                                                            <button type="submit" class="theme-button style-1 w-100" data-text="Sign Up">
                                                                <span data-text="Sign Up">Sign Up</span>
                                                                <i class="fa-solid fa-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="sign-up-box">
                                                            <p>Already have an account?</p>
                                                            <a href="sign-in.html" class="primary-color">Sign In</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- form end -->
                                        </div>
                                        <!-- default form end -->
                                    </div>
                                    <!-- authentication box end -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- authentication section end -->
                </main>
                <!-- main end -->
@endsection