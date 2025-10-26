@extends('patient.layouts.main')
@section('content')
<div class="container mt-3" id="main-content">
  <div class="row align-items-center mb-3">
     <div class="col-auto col-sm-auto mb-sm-0">
        <figure class="avatar avatar-50 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt=""></figure>
     </div>
     <div class="col col-sm">
        <p class="h2 mb-0">Welcome back,</p>
        <p class="h5 text-secondary mb-0">{{ Auth::user()->name ?? 'Patient' }}</p>
     </div>
  </div>
  <div class="row gx-3">
     <div class="col-6 col-lg-6 col-xxl-3 mb-3">
        <div class="card adminuiux-card">
           <div class="card-body">
              <div class="row gx-2 gx-sm-3 align-items-center">
                 <div class="col">
                    <p class="h4 mb-0"><i class="fa fa-fire fs-4 text-warning"></i> 1,850</p>
                    <p class="text-secondary small">Calories Burned</p>
                 </div>
                 <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                    <div class="summarychart height-40 w-100">
                       <canvas id="areachartgreen1"></canvas>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="col-6 col-lg-6 col-xxl-3 mb-3">
        <div class="card adminuiux-card">
           <div class="card-body">
              <div class="row gx-2 gx-sm-3 align-items-center">
                 <div class="col">
                    <p class="h4 mb-0"><i class="fa-solid fa-moon fs-4 text-primary"></i> 7.2h</p>
                    <p class="text-secondary small">Sleep Duration</p>
                 </div>
                 <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                    <div class="summarychart height-40 w-100">
                       <canvas id="areachartblue1"></canvas>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="col-6 col-lg-6 col-xxl-3 mb-3">
        <div class="card adminuiux-card">
           <div class="card-body">
              <div class="row gx-2 gx-sm-3 align-items-center">
                 <div class="col">
                    <p class="h4 mb-0"><i class="fa fa-shoe-prints fs-4 text-success"></i> 9,230</p>
                    <p class="text-secondary small">Steps Today</p>
                 </div>
                 <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                    <div class="summarychart height-40 w-100">
                       <canvas id="areachartyellow1"></canvas>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="col-6 col-lg-6 col-xxl-3 mb-3">
        <div class="card adminuiux-card">
           <div class="card-body">
              <div class="row gx-2 gx-sm-3 align-items-center">
                 <div class="col">
                    <p class="h4 mb-0"><i class="fa fa-heart-pulse fs-4 text-danger"></i> 78</p>
                    <p class="text-secondary small">Avg Heart Rate</p>
                 </div>
                 <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                    <div class="summarychart height-40 w-100">
                       <canvas id="areachartred1"></canvas>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <div class="row gx-3">
     <div class="col-12 col-lg-12 col-xxl-9">
        <div class="row">
           <div class="col-12 col-lg-6 col-xxl-8 mb-3">
              <div class="card adminuiux-card">
                 <div class="card-header">
                    <p class="h6">My Health Overview</p>
                 </div>
                 <div class="card-body">
                    <div class="w-100 height-150 mb-3">
                       <canvas id="patientsummary"></canvas>
                    </div>
                    <div class="row">
                       <div class="col-auto">
                          <p class="h5 mb-0">12</p>
                          <p class="text-secondary small">Appointments</p>
                       </div>
                       <div class="col-auto">
                          <p class="h5 mb-0">8</p>
                          <p class="text-secondary small">Records</p>
                       </div>
                       <div class="col-auto">
                          <p class="h5 mb-0">5</p>
                          <p class="text-secondary small">Prescriptions</p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12 col-lg-6 col-xxl-4 mb-3">
              <div class="card adminuiux-card h-100">
                 <div class="card-body">
                    <div class="row gx-3 mb-3">
                       <div class="col-auto">
                          <figure class="avatar avatar-40 rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-6.jpg')}}" alt=""></figure>
                       </div>
                       <div class="col">
                          <p class="h6 mb-0">{{ Auth::user()->name ?? 'Patient' }}</p>
                          <p class="text-secondary small">Patient ID: #{{ Auth::id() ?? '001' }}</p>
                       </div>
                       <div class="col-auto"><a href="#" class="btn btn-link btn-square"><i data-feather="arrow-up-right"></i></a></div>
                    </div>
                    <p><span class="text-secondary small">Last Visit:</span><br>Regular checkup completed successfully.</p>
                    <div class="swiper swipernonav mb-3">
                       <div class="swiper-wrapper">
                          <div class="swiper-slide width-130">
                             <div class="card border">
                                <div class="card-body">
                                   <div class="avatar avatar-40 bg-danger-subtle text-danger-emphasis rounded mb-2"><i class="fa fa-heart-pulse fs-4"></i></div>
                                   <p class="h5 mb-0">72 <small class="opacity-50 h6 fw-normal">bpm</small></p>
                                   <p class="text-secondary small">Heart Rate</p>
                                </div>
                             </div>
                          </div>
                          <div class="swiper-slide width-130">
                             <div class="card border">
                                <div class="card-body">
                                   <div class="avatar avatar-40 bg-warning-subtle text-warning-emphasis rounded mb-2"><i class="fa fa-thermometer-half fs-4"></i></div>
                                   <p class="h5 mb-0">36.5<sup>&deg;</sup> <small class="opacity-50 h6 fw-normal">C</small></p>
                                   <p class="text-secondary small">Temperature</p>
                                </div>
                             </div>
                          </div>
                          <div class="swiper-slide width-130">
                             <div class="card border">
                                <div class="card-body">
                                   <div class="avatar avatar-40 bg-info-subtle text-info-emphasis rounded mb-2"><i class="fa fa-droplet fs-4"></i></div>
                                   <p class="h5 mb-0">99 <small class="opacity-50 h6 fw-normal">%</small></p>
                                   <p class="text-secondary small">O<sub>2</sub> Saturation</p>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="row align-items-center">
                       <div class="col-auto"><i class="fa fa-calendar-days fs-4 text-secondary"></i></div>
                       <div class="col">
                          <p class="h6 mb-0">9:30 AM, Today</p>
                          <p class="text-secondary small">2 minutes to go</p>
                       </div>
                       <div class="col-auto"><button type="button" class="btn btn-link text-success btn-square"><i data-feather="phone"></i></button></div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12 col-lg-6">
              <div class="row gx-3">
                 <div class="col mb-3">
                    <div class="card adminuiux-card bg-success-subtle">
                       <div class="card-body">
                          <i class="fa fa-check-circle fs-4 avatar avatar-40 bg-success text-white rounded mb-2"></i>
                          <p class="h5 mb-0">Good</p>
                          <p class="small opacity-75">Health Status</p>
                       </div>
                    </div>
                 </div>
                 <div class="col mb-3">
                    <div class="card adminuiux-card bg-info-subtle">
                       <div class="card-body">
                          <i class="fa fa-calendar-check fs-4 avatar avatar-40 bg-info text-white rounded mb-2"></i>
                          <p class="h5 mb-0">3</p>
                          <p class="small opacity-75">This Week</p>
                       </div>
                    </div>
                 </div>
                 <div class="col mb-3">
                    <div class="card adminuiux-card bg-warning-subtle">
                       <div class="card-body">
                          <i class="fa fa-clock fs-4 avatar avatar-40 bg-warning text-white rounded mb-2"></i>
                          <p class="h5 mb-0">2</p>
                          <p class="small opacity-75">Pending</p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12 col-lg-6 mb-3">
              <div class="card adminuiux-card bg-theme-1-space">
                 <div class="card-header">
                    <p class="h6"><i data-feather="calendar" class="me-2"></i> My Appointments</p>
                 </div>
                 <div class="card-body">
                    <div class="row">
                       <div class="col-auto">
                          <p class="h4 mb-0">12</p>
                          <p class="small opacity-75">Total</p>
                       </div>
                       <div class="col-auto">
                          <p class="h4 mb-0">8</p>
                          <p class="small opacity-75">Completed</p>
                       </div>
                       <div class="col-auto">
                          <p class="h4 mb-0">4</p>
                          <p class="small opacity-75">Upcoming</p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12">
              <div class="card adminuiux-card mb-3">
                 <div class="card-header">
                    <p class="h6">My Appointments</p>
                 </div>
                 <div class="card-body px-2 pt-0">
                    <table class="table mb-0" id="dataTable" data-show-toggle="true">
                       <thead>
                          <tr>
                             <th class="">ID</th>
                             <th>Schedule</th>
                             <th data-breakpoints="xs">Doctor</th>
                             <th data-breakpoints="xs sm">Department</th>
                             <th data-breakpoints="xs">Status</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td>2054ID</td>
                             <td>
                                <p class="mb-0 fw-medium">9:10 AM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-7.jpg')}}" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Dr. Sarah Johnson</p>
                                      <p class="text-secondary small">Cardiologist</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">Cardiology</p>
                                <p class="text-secondary small">Room 201</p>
                             </td>
                             <td><span class="badge badge-sm light bg-yellow">Pending</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">View Details</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Reschedule</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Cancel</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>105ID</td>
                             <td>
                                <p class="mb-0 fw-medium">10:30 AM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="{{asset('assets/img/modern-ai-image/user-8.jpg')}}" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Dr. Michael Chen</p>
                                      <p class="text-secondary small">General Medicine</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">General Medicine</p>
                                <p class="text-secondary small">Room 105</p>
                             </td>
                             <td><span class="badge badge-sm light bg-blue">Confirmed</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">View Details</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Reschedule</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Cancel</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>058ID</td>
                             <td>
                                <p class="mb-0 fw-medium">11:30 AM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-1.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Alicia Smith</p>
                                      <p class="text-secondary small">United States</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">alicia@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-green">Complete</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>500ID</td>
                             <td>
                                <p class="mb-0 fw-medium">11:55 AM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-2.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Jr. Chen Li</p>
                                      <p class="text-secondary small">United Kingdom</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">cheli@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-red">Rejected</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>2054ID</td>
                             <td>
                                <p class="mb-0 fw-medium">12:15 PM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">David Warner</p>
                                      <p class="text-secondary small">United Kingdom</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">david@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-yellow">Pending</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>105ID</td>
                             <td>
                                <p class="mb-0 fw-medium">1:30 PM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-4.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Winnie John</p>
                                      <p class="text-secondary small">Australia</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">winnie@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-blue">Waiting</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>058ID</td>
                             <td>
                                <p class="mb-0 fw-medium">2:20 AM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-5.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Alicia Smith</p>
                                      <p class="text-secondary small">United States</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">alicia@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-green">Complete</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                          <tr>
                             <td>500ID</td>
                             <td>
                                <p class="mb-0 fw-medium">3:30 PM</p>
                                <p class="text-secondary small">9 June 2024</p>
                             </td>
                             <td>
                                <div class="row align-items-center">
                                   <div class="col-auto">
                                      <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-6.jpg" alt=""></figure>
                                   </div>
                                   <div class="col ps-0">
                                      <p class="mb-0">Jr. Chen Li</p>
                                      <p class="text-secondary small">United Kingdom</p>
                                   </div>
                                </div>
                             </td>
                             <td>
                                <p class="mb-0">cheli@sales..core.com</p>
                                <p class="text-secondary small">+44 8466585****1154</p>
                             </td>
                             <td><span class="badge badge-sm light bg-red">Rejected</span></td>
                             <td>
                                <div class="dropdown d-inline-block">
                                   <a class="btn btn-link no-caret" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                      <li><a class="dropdown-item theme-red" href="javascript:void(0)">Delete</a></li>
                                   </ul>
                                </div>
                             </td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="col-12 col-lg-12 col-xxl-3">
        <div class="row">
           <div class="col-12 col-lg-6 col-xxl-12 mb-3">
              <div class="card adminuiux-card">
                 <div class="card-body p-2">
                    <div class="inlinewrap1 inline-calendar"></div>
                 </div>
                 <div class="card-footer">
                    <div class="row">
                       <div class="col"><input id="inlinewrap1" class="form-control"></div>
                       <div class="col-auto"><a href="#" class="btn btn-theme"><i class="bi bi-plus"></i> <span>Book Appointment</span></a></div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-12 col-lg-6 col-xxl-12 mb-3">
              <div class="card adminuiux-card">
                 <div class="card-header">
                    <p class="h6">My Schedule Today</p>
                 </div>
                 <div class="card-body p-0 overflow-y-auto height-dynamic" style="--h-dynamic: 648px">
                    <div class="position-relative table-timestamp-wrap mb-0">
                       <table class="table table-scheduled-fixed-cell timepunch-table">
                          <thead>
                             <tr>
                                <th class="text-center align-middle fw-normal"><i class="bi bi-clock h5"></i></th>
                                <th>
                                   <div class="card">
                                      <div class="card-body p-2">
                                         <div class="row gx-3 align-items-center">
                                            <div class="col-3">
                                               <figure class="avatar avatar-40 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-4.jpg" alt=""></figure>
                                            </div>
                                            <div class="col-9">
                                               <p class="mb-0 h6 text-truncate">Dr. Ryan Salia</p>
                                               <p class="text-secondary small fw-normal text-truncate">10:00am-7:00pm</p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </th>
                                <th class="">
                                   <div class="card">
                                      <div class="card-body p-2">
                                         <div class="row gx-2 align-items-center">
                                            <div class="col-3">
                                               <figure class="avatar avatar-40 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-6.jpg" alt=""></figure>
                                            </div>
                                            <div class="col-9">
                                               <p class="mb-0 h6 text-truncate">Dr. Angelina</p>
                                               <p class="text-secondary small fw-normal text-truncate">10:00am-7:00pm</p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </th>
                                <th class="">
                                   <div class="card">
                                      <div class="card-body p-2">
                                         <div class="row gx-2 align-items-center">
                                            <div class="col-3">
                                               <figure class="avatar avatar-40 coverimg rounded-circle"><img src="assets/img/modern-ai-image/user-7.jpg" alt=""></figure>
                                            </div>
                                            <div class="col-9">
                                               <p class="mb-0 h6 text-truncate">Dr. Smriti Vandana</p>
                                               <p class="text-secondary small fw-normal text-truncate">10:00am-7:00pm</p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </th>
                             </tr>
                          </thead>
                          <tbody class="position-relative">
                             <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">10 AM</span></td>
                                <td>
                                   <div class="card adminuiux-card bg-green-subtle status start" style="--aaptsminuts:90; --starttime: 0;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-success p-1 m-1"><i class="bi bi-coin"></i> Paid</span>
                                         <p class="mb-1 small fw-medium">10:00 am - 11:30 am</p>
                                         <div class="row gx-2 mb-1">
                                            <div class="col-auto"><img src="assets/img/modern-ai-image/user-4.jpg" class="avatar avatar-20 rounded-circle" alt=""> <img src="https://i.pravatar.cc/300" class="avatar avatar-20 rounded-circle" alt=""></div>
                                            <div class="col">Will Johnson</div>
                                         </div>
                                         <p class="mb-0 opacity-75 small text-truncated">High fever and cough</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-danger-subtle status start" style="--aaptsminuts:90; --starttime: 0;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-success p-1 m-1"><i class="bi bi-coin"></i> Paid</span>
                                         <p class="mb-1 small fw-medium">10:00 am - 11:30 am</p>
                                         <div class="row gx-2 mb-1">
                                            <div class="col-auto"><img src="assets/img/modern-ai-image/user-4.jpg" class="avatar avatar-20 rounded-circle" alt=""> <img src="https://i.pravatar.cc/300" class="avatar avatar-20 rounded-circle" alt=""></div>
                                            <div class="col">Will Johnson</div>
                                         </div>
                                         <p class="mb-0 opacity-75 small text-truncated">High fever and cough</p>
                                      </div>
                                   </div>
                                </td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-purple-subtle text-purple-emphasis text-center status start" data-bs-toggle="tooltip" title="Unavailable" style="--aaptsminuts:30; --starttime: 30;">
                                      <div class="card-body d-flex align-items-center justify-content-center"><i data-feather="clock" class="mx-2"></i> <span>Breakfast</span></div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">11 AM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-primary-subtle status start" style="--aaptsminuts:60; --starttime: 90;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-success p-1 m-1"><i class="bi bi-coin"></i> Paid</span>
                                         <p class="mb-1 small fw-medium">11:30 am - 12:30 pm</p>
                                         <div class="row gx-2 mb-1">
                                            <div class="col-auto"><img src="assets/img/modern-ai-image/user-4.jpg" class="avatar avatar-20 rounded-circle" alt=""> <img src="https://i.pravatar.cc/300" class="avatar avatar-20 rounded-circle" alt=""></div>
                                            <div class="col">Will Johnson</div>
                                         </div>
                                         <p class="mb-0 opacity-75 small text-truncated">High fever and cough</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">12 PM</span></td>
                                <td>
                                   <div class="card adminuiux-card bg-theme-1-space text-white status start" style="--aaptsminuts:60; --starttime: 120;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-danger p-1 m-1"><i class="bi bi-coin"></i> Unpaid</span>
                                         <p class="mb-1 small fw-medium">12:00 PM - 1:00 PM</p>
                                         <div class="row gx-2 align-items-center mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle"><img src="assets/img/modern-ai-image/user-2.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p class="mb-0">Alicia Deverak... <span class="badge text-bg-danger small">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">High fever and Vomiting</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-teal-subtle status start" style="--aaptsminuts:60; --starttime: 120;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-danger p-1 m-1"><i class="bi bi-coin"></i> Unpaid</span>
                                         <p class="mb-1 small fw-medium">12:00 PM - 1:00 PM</p>
                                         <div class="row gx-2 align-items-center mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle"><img src="assets/img/modern-ai-image/user-2.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p class="mb-0">Alicia Deverak... <span class="badge text-bg-danger small">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">High fever and Vomiting</p>
                                      </div>
                                   </div>
                                </td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">1 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td>
                                   <div class="card adminuiux-card bg-danger-subtle text-danger-emphasis text-center status start" data-bs-toggle="tooltip" title="Unavailable" style="--aaptsminuts:30; --starttime: 225;">
                                      <div class="card-body d-flex align-items-center justify-content-center"><span>Unavailable</span></div>
                                   </div>
                                </td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">2 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-orange-subtle status start" style="--aaptsminuts:60; --starttime: 240;">
                                      <div class="card-body">
                                         <span class="position-absolute top-0 end-0 badge bg-danger p-1 m-1"><i class="bi bi-coin"></i> Unpaid</span>
                                         <p class="mb-1 small fw-medium">2:00 PM - 3:00 PM</p>
                                         <div class="row gx-2 align-items-center mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle"><img src="assets/img/modern-ai-image/user-2.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p class="mb-0">Alicia Deverak... <span class="badge text-bg-danger small">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">High fever and Vomiting</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td>
                                   <div class="card adminuiux-card bg-primary-subtle status start" style="--aaptsminuts:30; --starttime: 270;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">2:30 AM - 3:00 AM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-primary-subtle status start overlap-2 one" style="--aaptsminuts:90; --starttime: 270;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">2:30 PM - 4:00 PM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-primary-subtle status start overlap-2 two" style="--aaptsminuts:90; --starttime: 270;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">2:30 PM - 4:00 PM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">3 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">4 PM</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-warning-subtle status start overlap-3 one" style="--aaptsminuts:75; --starttime: 360;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">4:00 PM - 5:15 AM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-orange-subtle status start overlap-3 two" style="--aaptsminuts:75; --starttime: 360;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">4:00 PM - 5:15 AM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-red-subtle status start overlap-3 three" style="--aaptsminuts:75; --starttime: 360;">
                                      <div class="card-body">
                                         <div class="row gx-2 mb-1">
                                            <div class="col">
                                               <p class="mw-100 text-truncate small mb-1 fw-medium">4:00 PM - 5:15 AM</p>
                                            </div>
                                            <div class="col-auto"><i class="text-theme-1 theme-red bi bi-coin h6" data-bs-toggle="tooltip" title="Unpaid"></i></div>
                                            <div class="col-auto"><i class="bi bi-pencil text-secondary"></i></div>
                                         </div>
                                         <div class="row gx-2 mb-2">
                                            <div class="col-auto"><span class="avatar avatar-20 rounded-circle me-1"><img src="assets/img/modern-ai-image/user-3.jpg" alt=""></span></div>
                                            <div class="col">
                                               <p>Sweetu Sinha <span class="badge text-bg-danger mx-2">F</span></p>
                                            </div>
                                         </div>
                                         <p class="small opacity-75">Vomiting Diaria</p>
                                      </div>
                                   </div>
                                </td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">5 PM</span></td>
                                <td></td>
                                <td></td>
                                <td>
                                   <div class="card adminuiux-card bg-danger-subtle text-danger-emphasis text-center status start" data-bs-toggle="tooltip" title="Unavailable" style="--aaptsminuts:30; --starttime: 425;">
                                      <div class="card-body d-flex align-items-center justify-content-center"><span>Unavailable</span></div>
                                   </div>
                                </td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">6 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">7 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">8 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">9 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">15</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">30</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr class="slot">
                                <td><span class="time-punch">45</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <td><span class="time-punch">10 PM</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

@endsection


