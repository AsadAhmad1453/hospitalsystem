@extends('patient.layouts.main')
@section('custom-css')
<style>
    .breadcrumb-item+.breadcrumb-item:before {
        content: '' !important;
      }
</style>
@endsection
@section('content')
<div class="container-fluid mt-2">
    <div class="bg-theme-1-subtle rounded px-2 py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-truncate mb-0">
                <li class="breadcrumb-item bi"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i></li>
                <li class="breadcrumb-item active bi" aria-current="page">Appointment Booking</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container mt-3" id="main-content">
    <div class="row gx-3">
        <div class="col-12 col-md-12 col-xl-8 col-xxl-9">
            <div class="card adminuiux-card mb-3">
                <div class="card-body">
                    <p class="h6 mb-3">Category and Doctors</p>
                    <div class="mb-2">
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1 active"><i class="fa fa-clipboard2-pulse"></i> <span>Pediatric</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-hand-index-thumb"></i> <span>Orthopedic</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-heart-pulse"></i> <span>Cardiology</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-lungs"></i> <span>Lungs</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-eye"></i> <span>Eye</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-person-arms-up"></i> <span>Physiotherapist</span></button>
                        <button class="btn btn-sm btn-outline-theme mb-2 me-1"><i class="fa fa-prescription"></i> <span>Other</span></button>
                    </div>
                    <div class="swiper swiperautononav mb-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide width-220">
                                <div class="card adminuiux-card border">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-3">
                                                <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-8.jpg')}}" alt="" /></div>
                                            </div>
                                            <div class="col-9 mb-3">
                                                <p class="h6 mb-1">
                                                    <span class="position-relative">
                                                        Dr. Ryan Sylia
                                                        <span class="position-absolute top-50 start-100 translate-middle p-1 bg-success rounded-circle mx-2"><span class="visually-hidden">New alerts</span></span>
                                                    </span>
                                                </p>
                                                <p class="text-secondary small text-truncate">Orthopedic Specialist</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-plus"></i> <span>Select</span></button>
                                            </div>
                                            <div class="col-auto">
                                                <p><i class="text-yellow align-middle fa fa-star"></i> <small class="text-secondary">5.0</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide width-220">
                                <div class="card adminuiux-card border">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-3">
                                                <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-2.jpg')}}" alt="" /></div>
                                            </div>
                                            <div class="col-9 mb-3">
                                                <p class="h6 mb-1 text-truncate">
                                                    <span class="position-relative">
                                                        Dr. Chin Chou <span class="position-absolute top-50 start-100 translate-middle p-1 bg-orange rounded-circle mx-2"><span class="visually-hidden">New alerts</span></span>
                                                    </span>
                                                </p>
                                                <p class="text-secondary small text-truncate">Expert Dentist</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-plus"></i> <span>Select</span></button>
                                            </div>
                                            <div class="col-auto">
                                                <p><i class="text-yellow align-middle fa fa-star"></i> <small class="text-secondary">5.0</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide width-220">
                                <div class="card bg-theme-1-subtle border-theme-1">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-3">
                                                <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-4.jpg')}}" alt="" /></div>
                                            </div>
                                            <div class="col-9 mb-3">
                                                <p class="h6 mb-1 text-truncate">Dr. Sundar Vishwas</p>
                                                <p class="text-secondary small text-truncate">General Expert</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col text-warning">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-dash"></i> <span>Deselect</span></button>
                                            </div>
                                            <div class="col-auto">
                                                <p><i class="text-yellow align-middle fa fa-star"></i> <small class="text-secondary">5.0</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide width-220">
                                <div class="card adminuiux-card border">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-3">
                                                <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt="" /></div>
                                            </div>
                                            <div class="col-9 mb-3">
                                                <p class="h6 mb-1 text-truncate">Dr. Smita D'Souza</p>
                                                <p class="text-secondary small text-truncate">General Expert</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-plus"></i> <span>Select</span></button>
                                            </div>
                                            <div class="col-auto">
                                                <p><i class="text-yellow align-middle fa fa-star"></i> <small class="text-secondary">5.0</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide width-220">
                                <div class="card adminuiux-card border">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-3">
                                                <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-7.jpg')}}" alt="" /></div>
                                            </div>
                                            <div class="col-9 mb-3">
                                                <p class="h6 mb-1 text-truncate">Dr. Angelina</p>
                                                <p class="text-secondary small text-truncate">Skincare Specialist</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-plus"></i> <span>Select</span></button>
                                            </div>
                                            <div class="col-auto">
                                                <p><i class="text-yellow align-middle fa fa-star"></i> <small class="text-secondary">5.0</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="h6 mb-3">Patient Details</p>
                    <div class="row gx-3 align-items-center">
                        <div class="col col-sm mb-3">
                            <div class="input-group input-group-md search-wrap rounded w-100">
                                <span class="input-group-text bg-none"><i class="fa fa-search"></i></span> <input class="form-control" id="searchpatientname" placeholder="Search Patient" value="Alex" />
                            </div>
                        </div>
                        <div class="col-auto mb-3"><button class="btn btn-outline-theme" data-bs-toggle="collapse" data-bs-target=".patinetcollapse" aria-expanded="true" aria-controls="addnewpatient">+ New</button></div>
                    </div>
                    <div class="row patinetcollapse collapse show" id="resultpatient">
                        <div class="col-12 mb-3">
                            <p>We have found <b>2</b> search result...</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xxl-4 mb-3">
                            <div class="card adminuiux-card border">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-auto mb-3">
                                            <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-5.jpg')}}" alt="" /></div>
                                        </div>
                                        <div class="col mb-3">
                                            <p class="h6 mb-0">
                                                <span class="position-relative">
                                                    Alexa John <span class="position-absolute top-50 start-100 translate-middle p-1 bg-success rounded-circle mx-2"><span class="visually-hidden">online</span></span>
                                                </span>
                                            </p>
                                            <p class="opacity-75 small mb-2">United States</p>
                                            <span class="badge badge-sm badge-light rounded-pill text-bg-theme-accent-1">Revisit</span> <span class="badge badge-sm badge-light rounded-pill text-bg-theme-accent-1">VIP</span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-theme"><i class="me-1" data-feather="plus"></i><span>Select</span></button>
                                        </div>
                                        <div class="col text-end">
                                            <p class="opacity-75 small mb-0">Last Visit</p>
                                            <p class="small">26 July 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xxl-4 mb-3">
                            <div class="card bg-theme-1-subtle border-theme-1">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-auto mb-3">
                                            <div class="avatar avatar-40 rounded-circle coverimg mb-3"><img src="{{asset('assets/img/modern-ai-image/user-8.jpg')}}" alt="" /></div>
                                        </div>
                                        <div class="col mb-3">
                                            <p class="h6 mb-0">
                                                <span class="position-relative">
                                                    Alex Smith <span class="position-absolute top-50 start-100 translate-middle p-1 bg-success rounded-circle mx-2"><span class="visually-hidden">online</span></span>
                                                </span>
                                            </p>
                                            <p class="opacity-75 small mb-2">London, UK</p>
                                            <span class="badge badge-sm badge-light rounded-pill text-bg-theme-accent-1">Revisit</span> <span class="badge badge-sm badge-light rounded-pill text-bg-theme-accent-1">VIP</span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-danger"><i class="me-1 fa fa-dash"></i><span>Deselect</span></button>
                                        </div>
                                        <div class="col text-end">
                                            <p class="opacity-75 small mb-0">Last Visit</p>
                                            <p class="small">26 July 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse patinetcollapse" id="addnewpatient">
                        <p class="h6 mb-3">New Patient Details</p>
                        <div class="row mb-1">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="patientname" placeholder="Enter Patient First Name" value="Alex" /> <label for="patientname">Patient First Name</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="patientmlname" placeholder="Enter Patient Middle Name" /> <label for="patientmlname">Patient Middle Name</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="patientlname" placeholder="Enter Patient Last Name" value="Smith" /> <label for="patientlname">Patient Last Name</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="dobdate" placeholder="Select Birthday" /> <label for="dobdate">Select Birthday</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="phoneon" placeholder="Enter phone" value="+91 4152 21A45488004" /> <label for="phoneon">Enter Phone</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="emailaddresson" placeholder="Enter Email Address" value="alex.smith@tgmail.com" /> <label for="emailaddresson">Email Address</label>
                                </div>
                            </div>
                        </div>
                        <p class="h6 mb-3">New Patient Address</p>
                        <div class="row mb-1">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="house" placeholder="Enter house number" value="12" /> <label for="house">House Number</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="street" placeholder="Enter Street" value="Featherstone Street" /> <label for="street">Street</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="locality" placeholder="Enter locality" value="Ward" /> <label for="locality">Locality</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="town" placeholder="Enter Town" value="London" /> <label for="town">Town</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="city" placeholder="Enter City" value="London" /> <label for="city">City</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="postcode" placeholder="Enter Postcode" value="NG25 5AY" /> <label for="postcode">Postcode</label></div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="form-floating mb-3"><input class="form-control" id="country" placeholder="Enter Country" value="United Kingdom" /> <label for="country">Country</label></div>
                            </div>
                        </div>
                    </div>
                    <p class="h6 mb-3">Consultation</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="service">
                                    <option>Follow up</option>
                                    <option>Offline Consultation</option>
                                    <option>Online Consultation</option>
                                    <option>Surgery</option>
                                </select>
                                <label for="service">Select Service</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating"><input class="form-control" id="healthissue" placeholder="Health Issue in few words" /> <label for="healthissue">Health Issue in few words</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-xl-4 col-xxl-3">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl-12">
                    <p class="h6 mb-3">Select Date</p>
                    <div class="card adminuiux-card mb-3">
                        <div class="card-body px-2 pt-0">
                            <div class="inlinewrap1 inline-calendar mx-auto"></div>
                            <input id="inlinewrap1" class="d-none" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12 mb-2">
                    <p class="h6 mb-3">Select Time</p>
                    <button class="btn btn-sm btn-outline-theme mb-2 me-1 active"><span>11:00 AM</span></button> <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>11:30 AM</span></button>
                    <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>12:00 PM</span></button> <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>12:30 PM</span></button>
                    <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>1:00 PM</span></button> <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>1:30 PM</span></button>
                    <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>2:00 PM</span></button> <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>2:30 PM</span></button>
                    <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>3:00 PM</span></button> <button class="btn btn-sm btn-outline-theme mb-2 me-1"><span>3:30 PM</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-info mb-3">
        <p class="h6">Summary</p>
        <p>Appointment with <span class="fw-medium">Dr. Sundar Viswas</span> will be scheduled on <span class="fw-medium">26 July 2024 : 11:00 AM</span></p>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="col">
                <button class="btn btn-theme my-2"><i class="fa fa-floppy me-2"></i> Confirm</button> <button class="btn btn-outline-theme my-2 mx-2">Draft</button>
            </div>
            <div class="col-auto"><button class="btn btn-link my-2">Cancel</button></div>
        </div>
    </div>
</div>
@endsection


