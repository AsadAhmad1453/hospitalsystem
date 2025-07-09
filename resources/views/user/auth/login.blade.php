@extends('auth.layouts.main')
@section('custom-css')
    <style>
        .form-control {
            height: 50px;
        }

        .btn {
            height: 50px;
        }

        .form-label {
            font-size: 18px;
        }
    </style>
@endsection
@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <div class="auth-wrapper auth-v2">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            {{-- <a class="brand-logo" href="javascript:void(0);">
                <h1 class="brand-text fw-5  ml-1" style="font-weight: 700">STAFF PANEL</h1>
            </a> --}}
            <!-- /Brand logo-->

            <!-- Login-->
            <div class="d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-5 mx-auto">
                    <h1 class="text-center mb-2" style="font-size: 25px; font-family: "><strong>Welcome Back.</strong></h1>
                    <p class="card-text text-center mb-4" style="font-size: 25px">Please sign-in to your account.</p>
                    <form class="auth-login-form mt-2" action="{{ route('staff.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="login-email">Email</label>
                            <input class="form-control w-100 @error('email') is-invalid @enderror" id="login-email" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="email" autofocus="" tabindex="1" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Password</label>
                                {{-- <a href="page-auth-forgot-password-v2.html"><small>Forgot Password?</small> --}}
                                {{-- </a> --}}
                            </div>
                            <div class="input-group w-100 input-group-merge form-password-toggle">
                                <input class="form-control  form-control-merge  @error('password') is-invalid @enderror" id="login-password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2" />

                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                 @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="custom-control-label" for="remember-me"> Remember Me</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block w-100" tabindex="4">Sign in</button>
                    </form>
                    {{-- <p class="text-center mt-2"><span>New on our platform?</span><a href="page-auth-register-v2.html"><span>&nbsp;Create an account</span></a></p> --}}
                    {{-- <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div> --}}
                    {{-- <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div> --}}
                </div>
            </div>

            <!-- Left Text-->
            {{-- <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('admin-assets/images/illustration/staff-illustration.png')}}" alt="Login V2" /></div>
            </div> --}}

            <div id="carouselExampleSlidesOnly" class="carousel p-0 slide d-lg-flex col-lg-6 align-items-center" data-ride="carousel" >
                <div class="carousel-inner">

                    <div class="carousel-item active" data-interval="3000">
                        <img class="d-block w-fit" style="width: 100%; height: 100vh" src="{{asset('admin-assets/images/hos-imgs/hospital 2.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item" data-interval="3000">
                        <img class="d-block" style="width: 100%; height: 100vh" src="{{asset('admin-assets/images/hos-imgs/hospital 2.jpg')}}" alt="Third slide">
                    </div>
                </div>
            </div>
            <!-- /Left Text-->
        </div>
    </div>


@endsection
