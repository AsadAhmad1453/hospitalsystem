<!doctype html>
<html lang="en">
   <!-- Mirrored from adminuiux.com/adminuiux/digiclinic-mobile-uiux/clinic-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Oct 2025 06:19:32 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>DigiClinic AdminUIUX - Bootstrap HTML Admin template - adminuiux.com</title>
      <link rel="icon" type="image/png" href="assets/img/favicon.png">
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@100;400;500;600&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&amp;display=swap" rel="stylesheet">
      <style>:root{--adminuiux-content-font:'Roboto';--adminuiux-content-font-weight:400;--adminuiux-title-font:"Fira Sans Condensed";--adminuiux-title-font-weight:500}</style>
      @yield('custom-css')      
      <script defer="defer" src="{{asset('assets/js/app4243.js?3fe71add01af24cee59f')}}"></script>
      <link href="{{asset('assets/css/app4243.css?3fe71add01af24cee59f')}}" rel="stylesheet">
   </head>
   <body class="main-bg main-bg-opac main-bg-blur overflow-hidden">
      <div class="pageloader">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center h-100">
               <div class="col-12 mb-auto pt-4"></div>
               <div class="col-auto">
                  <img src="assets/img/logo.svg" alt="" class="height-60 mb-3">
                  <p class="h6 mb-0">AdminUIUX</p>
                  <p class="h3 mb-4">Digi Clinic</p>
                  <div class="loaderplus mb-2"></div>
               </div>
               <div class="col-12 mt-auto pb-4">
                  <p class="text-secondary">Please wait we are preparing awesome things to preview...</p>
               </div>
            </div>
         </div>
      </div>
      <header class="adminuiux-header">
         <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
               <button class="btn btn-link btn-square sidebar-toggler" type="button" onclick="initSidebar()"><i class="sidebar-svg" data-feather="menu"></i></button> 
               <a class="navbar-brand" href="clinic-dashboard.html">
                  <img data-bs-img="light" src="{{asset('assets/img/logo-light.svg')}}" alt=""> <img data-bs-img="dark" src="assets/img/logo.svg" alt="">
                  <div class="">
                     <span class="company-name text-uppercase h4"><b>Digi</b>Clinic</span>
                     <p class="company-tagline">Mobile HTML template</p>
                  </div>
               </a>
               <div class="ms-auto"></div>
               <div class="ms-auto">
                  <button class="btn btn-link btn-square btnsunmoon btn-link-header" id="btn-layout-modes-dark-page"><i class="sun mx-auto" data-feather="sun"></i> <i class="moon mx-auto" data-feather="moon"></i></button> <button class="btn btn-link btn-square btn-icon btn-link-header d-inline-block d-xxl-none" type="button" onclick="openSearch()"><i data-feather="search"></i></button>
                  <div class="dropdown d-none d-sm-inline-block">
                     <button class="btn btn-link btn-square btn-icon btn-link-header dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="grid"></i></button>
                     <div class="dropdown-menu dropdown-menu-end width-300 pt-0 px-0">
                        <div class="bg-theme-1-space rounded py-3 mb-2 dropdown-dontclose text-center">
                           <p class="mb-0">Applications</p>
                           <p class="opacity-50 small">Make your app innovative</p>
                        </div>
                        <div class="px-2">
                           <div class="row g-0 text-center mb-2">
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-finance.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-bank fs-4 mx-0"></i></div>
                                    <p class="mb-0">Finance</p>
                                    <p class="fs-12 opacity-50 mb-2">Accounting</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-network.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-globe fs-4 mx-0"></i></div>
                                    <p class="mb-0">Network</p>
                                    <p class="fs-12 opacity-50 mb-2">Stabilize</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-ecommerce.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-box fs-4 mx-0"></i></div>
                                    <p class="mb-0">Inventory</p>
                                    <p class="fs-12 opacity-50 mb-2">Assuring</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-project.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-folder fs-4 mx-0"></i></div>
                                    <p class="mb-0">Project</p>
                                    <p class="fs-12 opacity-50 mb-2">Management</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-social.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-people fs-4 mx-0"></i></div>
                                    <p class="mb-0">Social</p>
                                    <p class="fs-12 opacity-50 mb-2">Tracking</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="dropdown-item square-item" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-learning.html">
                                    <div class="avatar avatar-40 rounded mb-2"><i class="bi bi-journal-bookmark fs-4 mx-0"></i></div>
                                    <p class="mb-0">Learning</p>
                                    <p class="fs-12 opacity-50 mb-2">Make-easy</p>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="text-center"><a class="btn btn-link text-center" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/app-demo.html">View all <i class="bi bi-arrow-right fs-14"></i></a></div>
                     </div>
                  </div>
                  <div class="dropdown d-none d-sm-inline-block">
                     <button class="btn btn-link btn-square btn-icon btn-link-header dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-translate"></i></button>
                     <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item active" data-value="EN">EN - English</a></li>
                        <li><a class="dropdown-item" data-value="FR">FR - French</a></li>
                        <li><a class="dropdown-item" data-value="CH">CH - Chinese</a></li>
                        <li><a class="dropdown-item" data-value="HI">HI - Hindi</a></li>
                     </ul>
                  </div>
                  <a href="clinic-notifications.html" class="btn btn-link btn-square btn-icon btn-link-header position-relative"><i data-feather="bell"></i> <span class="position-absolute top-0 end-0 badge rounded-pill bg-danger p-1"><small>9+</small> <span class="visually-hidden">unread messages</span></span></a>
                  <div class="dropdown d-inline-block">
                     <a class="dropdown-toggle btn btn-link btn-link-header style-none" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                        <div class="row gx-0 d-inline-flex">
                           <div class="col-auto align-self-center">
                              <figure class="avatar avatar-28 rounded-circle coverimg align-middle"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt="" id="userphotoonboarding2"></figure>
                           </div>
                           <div class="col align-self-center d-none d-xl-block px-2"><span class="mb-0">AdminUIUX</span></div>
                        </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end width-300 pt-0 px-0" aria-labelledby="userprofiledd">
                        <div class="bg-theme-1-space rounded py-3 mb-3 dropdown-dontclose">
                           <div class="row gx-0">
                              <div class="col-auto px-3">
                                 <figure class="avatar avatar-50 rounded-circle coverimg align-middle"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt=""></figure>
                              </div>
                              <div class="col align-self-center">
                                 <p class="mb-1"><span>AdminUIUX</span></p>
                                 <p><i class="bi bi-wallet2 me-2"></i> $1100.00 <small class="opacity-50">Balance</small></p>
                              </div>
                           </div>
                        </div>
                        <div class="px-2">
                           <div><a class="dropdown-item" href="clinic-myprofile.html"><i data-feather="user" class="avatar avatar-18 me-1"></i> My Profile</a></div>
                           <div>
                              <a class="dropdown-item" href="clinic-dashboard.html">
                                 <div class="row g-0">
                                    <div class="col align-self-center"><i data-feather="layout" class="avatar avatar-18 me-1"></i> My Dashboard</div>
                                    <div class="col-auto">
                                       <figure class="avatar avatar-20 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-1.jpg')}}" alt=""></figure>
                                       <figure class="avatar avatar-20 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-2.jpg')}}" alt=""></figure>
                                       <figure class="avatar avatar-20 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-4.jpg')}}" alt=""></figure>
                                       <div class="avatar avatar-20 bg-theme-1 rounded-circle text-center align-middle"><small class="fs-10 align-middle">9+</small></div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div><a class="dropdown-item" href="clinic-earning.html"><i data-feather="dollar-sign" class="avatar avatar-18 me-1"></i> Earning</a></div>
                           <div>
                              <a class="dropdown-item" href="clinic-mysubscription.html">
                                 <div class="row">
                                    <div class="col"><i data-feather="gift" class="avatar avatar-18 me-1"></i> Subscription</div>
                                    <div class="col-auto">
                                       <p class="small text-success">Upgrade</p>
                                    </div>
                                    <div class="col-auto"><span class="arrow bi bi-chevron-right"></span></div>
                                 </div>
                              </a>
                           </div>
                           <div class="dropdown open-left dropdown-dontclose">
                              <a class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 <div class="row">
                                    <div class="col"><i class="bi bi-translate avatar avatar-18 me-1"></i> Language</div>
                                    <div class="col-auto"><small class="vm">EN - English</small> <i class="bi bi-translate"></i></div>
                                    <div class="col-auto"><span class="arrow bi bi-chevron-right"></span></div>
                                 </div>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                 <div><a class="dropdown-item active" data-value="EN">EN - English</a></div>
                                 <div><a class="dropdown-item" data-value="FR">FR - French</a></div>
                                 <div><a class="dropdown-item" data-value="CH">CH - Chinese</a></div>
                                 <div><a class="dropdown-item" data-value="HI">HI - Hindi</a></div>
                              </div>
                           </div>
                           <div><a class="dropdown-item" href="clinic-settings.html"><i data-feather="settings" class="avatar avatar-18 me-1"></i> Account Setting</a></div>
                           <div><a class="dropdown-item theme-red" href="clinic-login.html"><i data-feather="power" class="avatar avatar-18 me-1"></i> Logout</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <div class="adminuiux-search-full">
            <div class="row gx-2 align-items-center">
               <div class="col-auto"><button class="btn btn-square btn-icon" type="button" onclick="closeSearch()"><i data-feather="arrow-left"></i></button></div>
               <div class="col"><input class="form-control pe-0 border-0" type="search" placeholder="Type something here..."></div>
               <div class="col-auto">
                  <div class="dropdown input-group-text border-0 p-0">
                     <button class="dropdown-toggle btn btn-link no-caret" type="button" id="searchfilter2" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="sliders"></i></button>
                     <div class="dropdown-menu dropdown-menu-end dropdown-dontclose width-300" aria-labelledby="searchfilter2">
                        <ul class="nav adminuiux-nav" id="searchtab2" role="tablist">
                           <li class="nav-item" role="presentation"><button class="nav-link active" id="searchall-tab2" data-bs-toggle="tab" data-bs-target="#searchall2" type="button" role="tab" aria-controls="searchall2" aria-selected="true">All</button></li>
                           <li class="nav-item" role="presentation"><button class="nav-link" id="searchorders-tab2" data-bs-toggle="tab" data-bs-target="#searchorders2" type="button" role="tab" aria-controls="searchorders2" aria-selected="false" tabindex="-1">Orders</button></li>
                           <li class="nav-item" role="presentation"><button class="nav-link" id="searchcontacts-tab2" data-bs-toggle="tab" data-bs-target="#searchcontacts2" type="button" role="tab" aria-controls="searchcontacts2" aria-selected="false" tabindex="-1">Contacts</button></li>
                        </ul>
                        <div class="tab-content py-3" id="searchtabContent2">
                           <div class="tab-pane fade active show" id="searchall2" role="tabpanel" aria-labelledby="searchall-tab2">
                              <ul class="list-group adminuiux-list-group list-group-flush bg-none show">
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Search apps</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch1"> <label class="form-check-label" for="searchswitch1"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Include Pages</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch2" checked=""> <label class="form-check-label" for="searchswitch2"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Internet resource</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch3" checked=""> <label class="form-check-label" for="searchswitch3"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">News and Blogs</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch4"> <label class="form-check-label" for="searchswitch4"></label></div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <div class="tab-pane fade" id="searchorders2" role="tabpanel" aria-labelledby="searchorders-tab2">
                              <ul class="list-group adminuiux-list-group list-group-flush bg-none show">
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Show order ID</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch5"> <label class="form-check-label" for="searchswitch5"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">International Order</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch6" checked=""> <label class="form-check-label" for="searchswitch6"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Taxable Product</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch7" checked=""> <label class="form-check-label" for="searchswitch7"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Published Product</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch8"> <label class="form-check-label" for="searchswitch8"></label></div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <div class="tab-pane fade" id="searchcontacts2" role="tabpanel" aria-labelledby="searchcontacts-tab2">
                              <ul class="list-group adminuiux-list-group list-group-flush bg-none show">
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Have email ID</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch9"> <label class="form-check-label" for="searchswitch9"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Have phone number</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch10" checked=""> <label class="form-check-label" for="searchswitch10"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Photo available</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch11" checked=""> <label class="form-check-label" for="searchswitch11"></label></div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="row">
                                       <div class="col">Referral</div>
                                       <div class="col-auto">
                                          <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="searchswitch12"> <label class="form-check-label" for="searchswitch12"></label></div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="">
                           <div class="row">
                              <div class="col"><button class="btn btn-link">Reset</button></div>
                              <div class="col-auto"><button class="btn btn-theme">Apply</button></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="adminuiux-wrap">
         <div class="adminuiux-sidebar">
            <div class="adminuiux-sidebar-inner">
               <div class="px-3 not-iconic mt-3">
                  <div class="row">
                     <div class="col align-self-center">
                        <p class="h6">Main Menu</p>
                     </div>
                     <div class="col-auto"><a class="btn btn-link btn-square" data-bs-toggle="collapse" data-bs-target="#usersidebarprofile" aria-expanded="false" role="button" aria-controls="usersidebarprofile"><i data-feather="user"></i></a></div>
                  </div>
                  <div class="text-center collapse" id="usersidebarprofile">
                     <figure class="avatar avatar-100 rounded-circle coverimg my-3"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt=""></figure>
                     <p class="mb-1 h5">Dr. AdminUIUX</p>
                     <p class="small">The Clinical UI Kit</p>
                  </div>
               </div>
               <ul class="nav flex-column menu-active-line my-3">
                  <li class="nav-item"><a href="clinic-dashboard.html" class="nav-link"><i class="menu-icon" data-feather="grid"></i> <span class="menu-name">Dashboard</span></a></li>
                  <li class="nav-item dropdown">
                     <a href="javascrit:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="menu-icon" data-feather="calendar"></i> <span class="menu-name">Schedule</span></a>
                     <div class="dropdown-menu">
                        <div class="nav-item"><a href="clinic-schedule.html" class="nav-link"><i class="menu-icon" data-feather="calendar"></i> <span class="menu-name">Schedule Calendar</span></a></div>
                        <div class="nav-item"><a href="clinic-schedule-grid.html" class="nav-link"><i class="menu-icon" data-feather="table"></i> <span class="menu-name">Schedule List</span></a></div>
                        <div class="nav-item"><a href="clinic-schedule-cards.html" class="nav-link"><i class="menu-icon" data-feather="layers"></i> <span class="menu-name">Schedule Progress</span></a></div>
                        <div class="nav-item"><a href="clinic-schedule-staff.html" class="nav-link"><i class="menu-icon" data-feather="user-check"></i> <span class="menu-name">Schedule Staff</span></a></div>
                     </div>
                  </li>
                  <li class="nav-item"><a href="clinic-patients.html" class="nav-link"><i class="menu-icon" data-feather="users"></i> <span class="menu-name">Patients</span></a></li>
                  <li class="nav-item"><a href="clinic-statistics.html" class="nav-link"><i class="menu-icon" data-feather="pie-chart"></i> <span class="menu-name">Statistics</span></a></li>
                  <li class="nav-item"><a href="clinic-blogs.html" class="nav-link"><i class="menu-icon" data-feather="file-text"></i> <span class="menu-name">My Publication</span></a></li>
                  <li class="nav-item"><a href="clinic-billing.html" class="nav-link"><i class="menu-icon bi bi-cash-stack"></i> <span class="menu-name">Billings</span></a></li>
                  <li class="nav-item dropdown">
                     <a href="javascrit:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="menu-icon" data-feather="folder"></i> <span class="menu-name">Documents</span></a>
                     <div class="dropdown-menu">
                        <div class="nav-item"><a href="clinic-patients-documents.html" class="nav-link"><i class="menu-icon" data-feather="users"></i> <span class="menu-name">Patient Documents</span></a></div>
                        <div class="nav-item"><a href="clinic-staff-documents.html" class="nav-link"><i class="menu-icon" data-feather="briefcase"></i> <span class="menu-name">Staff Documents</span></a></div>
                     </div>
                  </li>
                  <li class="nav-item"><a href="clinic-pages.html" class="nav-link"><i data-feather="layers" class="menu-icon"></i> <span class="menu-name">Pages</span> <span class="badge text-bg-primary mx-2">40+</span></a></li>
                  <li class="nav-item"><a href="clinic-personalization.html" class="nav-link"><i class="menu-icon bi bi-palette h4"></i> <span class="menu-name">Personalize ❤️</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="components.html"><i data-feather="cpu" class="menu-icon"></i> <span class="menu-name">Components</span></a></li>
               </ul>
               <div class="mt-auto"></div>
               <div class="px-3 mb-3 not-iconic">
                  <p class="mb-3 h6">Quick Links</p>
                  <div class="card border-0">
                     <div class="card-body p-2">
                        <div class="row gx-2">
                           <div class="col-12 d-flex justify-content-between"><a href="clinic-myprofile.html" class="btn btn-square btn-link"><span class="position-relative"><i data-feather="user"></i> <span class="position-absolute top-0 start-100 translate-middle p-1 bg-success rounded-circle"><span class="visually-hidden">New alerts</span> </span></span></a><a href="clinic-schedule.html" class="btn btn-square btn-link"><span class="position-relative"><i data-feather="calendar"></i> <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning rounded-circle"><span class="visually-hidden">New alerts</span> </span></span></a><a href="clinic-inbox.html" class="btn btn-square btn-link"><i data-feather="inbox"></i> </a><a href="clinic-help-center.html" class="btn btn-square btn-link"><i data-feather="help-circle"></i></a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <ul class="nav flex-column menu-active-line">
                  <li class="nav-item"><a href="clinic-chat-call.html" class="nav-link"><i class="menu-icon" data-feather="message-circle"></i> <span class="menu-name">Chat & Calls</span></a></li>
                  <li class="nav-item"><a href="clinic-settings.html" class="nav-link"><i class="menu-icon" data-feather="settings"></i> <span class="menu-name">Settings</span></a></li>
               </ul>
            </div>
         </div>
         <main class="adminuiux-content has-sidebar" onclick="contentClick()">
          @yield('content')
        </main>
      </div>
      <footer class="adminuiux-footer has-adminuiux-sidebar text-center mt-auto">
         <p class="text-secondary small mb-2">&copy;2025, Rights reserved by <a href="https://adminuiux.com/" target="_blank" class="style-none">DigiClinicUIUX</a></p>
         <ul class="nav small justify-content-center">
            <li class="nav-item"><a class="nav-link" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/help-center.html">Help</a></li>
            <li class="nav-item">|</li>
            <li class="nav-item"><a class="nav-link" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/terms-of-use.html">Terms of Use</a></li>
            <li class="nav-item">|</li>
            <li class="nav-item"><a class="nav-link" href="https://www.adminuiux.com/adminuiux/digiclinic-mobile-uiux/privacy-policy.html">Privacy</a></li>
         </ul>
      </footer>
      <script src="{{asset('assets/js/clinic/clinic-dashboard.js')}}"></script>
      @yield('custom-js')
   </body>
   <!-- Mirrored from adminuiux.com/adminuiux/digiclinic-mobile-uiux/clinic-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Oct 2025 06:19:55 GMT -->
</html>
