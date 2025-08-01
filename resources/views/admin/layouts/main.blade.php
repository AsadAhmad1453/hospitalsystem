<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Admin Panel</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice-list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/page-profile.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/style.css')}}">
    @yield('custom-css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">

            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{Auth::user()->name }}</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="{{asset('admin-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mr-50 fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action={{ route('logout') }} method="POST">@CSRF</form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('admin-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('admin-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('admin-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('admin-assets/images/icons/doc.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('admin-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('admin-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('admin-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('admin-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                            {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span> --}}
                        <h1 class="brand-text" style="color: black">ADMIN PANEL</h1>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{Route::is('admin-dashboard') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin-dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
                </li>
                <li class="{{Route::is('roles') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('roles')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Manage Roles</span></a>
                </li>
                <li class="{{Route::is('relations') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('relations')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Relations</span></a>
                </li>
                <li class="{{Route::is('users') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('users')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Users</span></a>
                </li>
                <li class="{{Route::is('staff') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('staff')}}"><i data-feather='user-check'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Staff</span></a>
                </li>

                <li class="{{Route::is('permissions') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('permissions')}}"><i data-feather='check-circle'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Permissions</span></a>
                </li>

                <li class=" nav-item {{ request()->routeIs('roles-table*') ? 'active open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='trello'></i><span class="menu-title text-truncate" data-i18n="Invoice">Roles</span></a>
                    <ul class="menu-content">
                        @foreach ($roles as $role)
                        <li><a class="d-flex align-items-center {{ request()->routeIs('roles-table') && request()->route('id') == $role->id ? 'active' : '' }}" href="{{route('roles-table', $role->id)}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ ucfirst($role->name) }}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{Route::is('patients') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('patients')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Patients</span></a>
                </li>
                <li class="{{Route::is('forms') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('forms')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Forms</span></a>
                </li>
                <li class="{{Route::is('services') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('services')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Services</span></a>
                </li>
                <li class=" nav-item {{Route::is('question-sections') || Route::is('questions') || Route::is('question-add')  ? 'active open' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather='trello'></i><span class="menu-title text-truncate" data-i18n="Invoice">Questions</span></a>
                    <ul class="menu-content">

                        <li><a class="d-flex align-items-center {{Route::is('question-sections') ? 'active' : ''}}" href="{{route('question-sections')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Sections</span></a>
                        </li>
                        <li><a class="d-flex align-items-center {{Route::is('questions') || Route::is('question-add') ? 'active' : ''}}" href="{{route('questions')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Questions</span></a>
                        </li>

                    </ul>
                </li>
                <li class="{{Route::is('banks') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('banks')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Banks</span></a>
                </li>
                <li class="{{Route::is('blood-investigation') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('blood-investigation')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Blood Investigation</span></a>
                </li>
                <li class="{{Route::is('xrays') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('xrays')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Xrays</span></a>
                </li>
                <li class="{{Route::is('uss') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('uss')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Ultrasounds</span></a>
                </li>
                <li class="{{Route::is('ctscans') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('ctscans')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Ct Scans</span></a>
                </li>
                <li class="{{Route::is('medicines') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('medicines')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Medicines</span></a>
                </li>
                <li class="{{Route::is('dosage') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('dosage')}}"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dosage</span></a>
                </li>
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
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    @yield('custom-js')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
      <script src="{{ asset('admin-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/moment.min.js') }}"></script>
  <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
     <script src="{{ asset('admin-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <script src="{{asset('admin-assets/js/scripts/pages/page-profile.js')}}"></script>
    <!-- END: Page JS-->


    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>
