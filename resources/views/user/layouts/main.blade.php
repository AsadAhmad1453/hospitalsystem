<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Staff Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" href="{{ asset('admin-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/page-profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style>
        :root {
            --u-primary: #0d7a65;
            --u-primary-dark: #04382c;
            --u-accent: #14c8a1;
            --u-bg: #f4fbf8;
            --u-border: #d9ebe3;
        }

        body.vertical-layout {
            background: radial-gradient(circle at top left, #f8fffb 0, #f0f7f4 45%, #e5f2ec 100%);
        }

        .header-navbar {
            border-radius: 18px;
            margin-top: 1.2rem;
            box-shadow: 0 16px 40px rgba(6, 61, 47, 0.15);
            color: black;
        }



        .main-menu.menu-light {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 24px;
            box-shadow: 0 26px 60px rgba(6, 51, 40, 0.22);
            border-right: 0;
        }

        .main-menu .navbar-header {
            padding-top: 1.4rem;
            padding-bottom: .4rem;
        }

        .main-menu .navbar-header h3 {
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--u-primary-dark);
        }

        .navigation-main>li>a.sidelink {
            border-radius: 14px;
            padding: .7rem 1rem;
            margin: .15rem .6rem;
            transition: background .2s ease, color .2s ease, transform .15s ease;
        }

        .navigation-main>li.active>a.sidelink,
        .navigation-main>li:hover>a.sidelink {
            background: linear-gradient(135deg, var(--u-primary), var(--u-primary-dark));
            color: #fff !important;
            box-shadow: 0 10px 24px rgba(6, 61, 47, 0.3);
            transform: translateY(-1px);
        }

        .navigation-main>li.active>a.sidelink i,
        .navigation-main>li:hover>a.sidelink i {
            color: #fff !important;
        }

        .navigation-main>li>a.sidelink i {
            color: var(--u-primary);
        }

        .card {
            border-radius: 20px;
            border: 1px solid rgba(217, 235, 227, 0.9);
            box-shadow: 0 14px 40px rgba(6, 61, 47, 0.12);
        }

        .data-table-page-hero {
            margin-bottom: 1.25rem;
            padding: 1.4rem 1.6rem;
            border-radius: 20px;
            background: linear-gradient(130deg, var(--u-primary), var(--u-primary-dark));
            color: #fff;
            box-shadow: 0 20px 45px rgba(6, 61, 47, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
        }

        .data-table-page-hero h2 {
            margin: 0;
            font-weight: 700;
        }

        .data-table-page-hero p {
            margin: 0;
            opacity: .85;
        }

        .table thead th {
            border-bottom: none;
            background: linear-gradient(135deg, #f4fbf8, #e6f2ec);
            color: #064337;
            font-weight: 600;
        }

        .table tbody tr:nth-child(even) {
            background-color: #fafdfb;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--u-primary), var(--u-primary-dark));
            border: none;
            box-shadow: 0 12px 24px rgba(6, 61, 47, 0.3);
        }

        .badge-success {
            background: rgba(13, 122, 101, 0.12);
            color: var(--u-primary-dark);
        }

        .app-content .content-wrapper {
            padding-top: 1.6rem;
        }

        .card-congratulations {
            background: radial-gradient(circle at top left, #12b488, #0d7a65 40%, #04382c 100%);
            border: none;
            box-shadow: 0 26px 60px rgba(6, 61, 47, 0.25);
            border-radius: 24px;
        }

        .card-congratulations .avatar.bg-warning {
            background: rgba(255, 255, 255, 0.15) !important;
        }

        .card-congratulations .avatar .avatar-content i {
            color: #fff;
        }

        .footer.footer-light {
            border-top: none;
            background: transparent;
        }

        @media (max-width: 767px) {
            .header-navbar {
                border-radius: 0 0 18px 18px;
                margin-top: 0;
            }

            .main-menu.menu-fixed {
                border-radius: 20px;
            }
        }
    </style>

    @yield('custom-css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Header-->


    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span
                                class="user-status">
                                @foreach ($roles as $role)
                                    @if ($role->id == Auth::user()->role_id)
                                        <span>{{ ucfirst($role->name) }}</span>
                                    @endif
                                @endforeach
                            </span></div><span class="avatar"><img class="round"
                                src="{{ asset('admin-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="mr-50 fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action={{ route('staff-logout') }} method="POST">@CSRF</form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand"><span class="brand-logo">
                        </span>
                        <h3 class="">
                            @foreach ($roles as $role)
                                @if ($role->id == Auth::user()->role_id)
                                    <strong>{{ ucfirst($role->name) }}</strong>
                                @endif
                            @endforeach
                        </h3>
                    </a></li>
                <li class="nav-item nav-toggle "><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
            <hr>
        </div>
        <div class="shadow-bottom"></div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Route::is('user-dashboard') ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center sidelink" href="{{ route('user-dashboard') }}"><i
                            data-feather="bar-chart-2"></i><span class="menu-title text-truncate"
                            data-i18n="Dashboards">Dashboard</span></a>
                </li>
                @can('patient entry')
                    <li class="{{ Route::is('patient-entry') || Route::is('patient-add') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink"href="{{ route('patient-entry') }}">
                            <i data-feather="user"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Patient Entry</span>
                        </a>
                    </li>
                @endcan
                @can('appointment schedule')
                    <li class="{{ Route::is('appointments') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink" href="{{ route('appointments') }}">
                            <i data-feather="calendar"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Appointment Schedule</span>
                        </a>
                    </li>
                @endcan
                @can('past patients')
                    <li class="{{ Route::is('past-patients') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink" href="{{ route('past-patients') }}">
                            <i data-feather="users"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Past Patients</span>
                        </a>
                    </li>
                @endcan
                @can('website requests')
                    <li class="{{ Route::is('web-reqs') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink" href="{{ route('web-reqs') }}">
                            <i data-feather="users"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Website Requests</span>
                        </a>
                    </li>
                @endcan
                @can('app-reg')
                    <li class="{{ Route::is('app-reg') ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink" href="{{ route('app-reg') }}">
                            <i data-feather="users"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">App Registration</span>
                        </a>
                    </li>
                @endcan
                @can('fill form')
                    @foreach ($forms as $form)
                        @php
                            // Try to get the form id from route parameters or query string
                            $formId = null;
                            // Check route parameters for both 'form' and 'id'
                            $routeParams = request()->route() ? request()->route()->parameters() : [];
                            if (isset($routeParams['form'])) {
                                $formId = $routeParams['form'];
                            } elseif (isset($routeParams['id'])) {
                                $formId = $routeParams['id'];
                            } elseif (request()->has('form_id')) {
                                $formId = request()->get('form_id');
                            }
                            // Now check if this form is active
                            $isActive =
                                (Route::is('patients-data-table') && $formId == $form->id) ||
                                (Route::is('data-collector') && $formId == $form->id);
                        @endphp
                        <li class="nav-item {{ $isActive ? 'active' : '' }}">
                            <a class="d-flex align-items-center sidelink"
                                href="{{ route('patients-data-table', $form->id) }}">
                                <i data-feather="file-text"></i>
                                <span class="menu-title text-truncate" data-i18n="Dashboards">{{ $form->name }}</span>
                            </a>
                        </li>
                    @endforeach
                @endcan
                @can('bio marker')
                    <li
                        class="{{ (Route::is('biomarker') ? 'active' : '' || Route::is('biomarker-add')) ? 'active' : '' }} nav-item">
                        <a class="d-flex align-items-center sidelink" href="{{ route('biomarker') }}"><i
                                data-feather="activity"></i><span class="menu-title text-truncate"
                                data-i18n="Dashboards">BIO Markers Entry</span></a>
                    </li>
                @endcan
                @can('patient form')
                    <li class="{{ Route::is('doctor-form') ? 'active' : '' }} nav-item"><a
                            class="d-flex align-items-center sidelink" href="{{ route('doctor-form') }}"><i
                                data-feather="clipboard"></i><span class="menu-title text-truncate"
                                data-i18n="Dashboards">Patient Form</span></a>
                    </li>
                @endcan
                @can('examine patients')
                    <li class="{{ Route::is('examine-patients') ? 'active' : '' }} nav-item"><a
                            class="d-flex align-items-center sidelink" href="{{ route('examine-patients') }}"><i
                                data-feather="search"></i><span class="menu-title text-truncate"
                                data-i18n="Dashboards">Examine Patients</span></a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @yield('content')
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
                    class="ml-25" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights
                    Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i
                    data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-assets/vendors/js/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/pages/page-profile.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        // Global SweetAlert Helper Functions
        function showSuccess(message, title = 'Success!') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: message,
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true
                });
            } else {
                alert(message);
            }
        }

        function showError(message, title = 'Error!') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33'
                });
            } else {
                alert(message);
            }
        }

        function showWarning(message, title = 'Warning!') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'warning',
                    title: title,
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107'
                });
            } else {
                alert(message);
            }
        }

        function showInfo(message, title = 'Information') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'info',
                    title: title,
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#17a2b8'
                });
            } else {
                alert(message);
            }
        }

        function showLoading(message = 'Processing...') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: message,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            }
        }

        function hideLoading() {
            if (typeof Swal !== 'undefined') {
                Swal.close();
            }
        }

        function showToast(message, type = 'success') {
            if (typeof Swal !== 'undefined') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: type,
                    title: message
                });
            } else {
                alert(message);
            }
        }

        function confirmDelete(message = 'Are you sure you want to delete this item?') {
            if (typeof Swal !== 'undefined') {
                return Swal.fire({
                    title: 'Are you sure?',
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                });
            } else {
                return Promise.resolve({
                    isConfirmed: confirm(message)
                });
            }
        }
    </script>
    @yield('custom-js')
    <!-- END: Page JS-->




</body>
<!-- END: Body-->

</html>
