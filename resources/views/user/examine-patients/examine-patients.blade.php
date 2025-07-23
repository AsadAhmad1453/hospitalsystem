<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Staff Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/page-profile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
    <!-- Bootstrap CSS & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/ai.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    * {
        font-family: "Red Hat Display", sans-serif !important;
    }

    html {
        overflow-x: hidden;
    }

    .multiple-column-form {
        padding: 30px;
    }

    .form-group.card {
        background: rgba(255, 255, 255, 0.1) !important;
        border-radius: 15px;
        padding: 20px 30px !important;
        border: none;
    }

    .form-group.card h5 {
        font-weight: 600;
    }

    .form-card {
        background: #DFF5EF;
        border-radius: 15px;
        margin-top: 20px;
    }

    .form-card textarea {
        background: #f1faf7;

    }

    .patient-info {
        background: linear-gradient(230deg, #169978 0%, #024134 100%) !important;
        padding: 25px;
        border-radius: 15px;
        color: #fff;
        border: none
    }

    .bg-gradient {
        background: radial-gradient(circle, #0f795e 0%, #000000 100%) !important;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        /* background: linear-gradient(135deg, #1cbe96 0%, #02493b 100%) !important; */
    }
    .bg-gradient::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: -1;
        background: radial-gradient(circle, #1cbe96 0%, #011a15 100%);
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .buttons {
        position: absolute;
        bottom: 20px;
        width: 100%;
        transform: translateX(-50%);
        left: 50%;
        padding: 0 20px;
    }

    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      overflow-y: auto;
      background-color: transparent;
      flex-shrink: 0;
      width: 350px;
    }

    .input-container {
      overflow: hidden;
    }

    .nav-tabs .nav-link {
      cursor: pointer;
    }

    .token {
        max-height: 300px !important;
        background-color: rgb(231, 231, 231);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        font-weight: 600;
        padding-left: 5px;
    }

    .form-group textarea {
        border-radius: 10px
    }

    .btn-danger {
        position: fixed;
        left: 50px;
        bottom: 15px;
        width: 100px !important;
        z-index: 9999;
        text-align: center;
        display: flex;
        height: 40px;
    }

    .btn-primary {
        display: flex;
        position: fixed;
        right: 50px;
        bottom:  15px;
        padding: 10px 20px;
        width: 100px !important;
        z-index: 9999;
        text-align: center;
        background:  linear-gradient(135deg, #118568 0%, #035544 100%) !important;
        border: none;
    }

    .btn-block {
        right: 160px;
        text-align: center;
        position: fixed;
        width: 80px !important;
        padding: 10px 25px;
    }

    .nav-link {
        color: #fff !important;
        height: 50px;
        margin: 0;
    }

    .nav-link:hover {
        border: none;
        background: rgba(255, 255, 255, 0.1) !important;

    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.1) !important;
        border: none;
    }

 

    .nav-tabs {
        border: none;
        border-radius: 10px;
        height: 50px;
        padding: 0;
        background: rgba(255, 255, 255, 0.1) !important;
        display: flex;
        justify-content: start;
        align-items: center;
        overflow: hidden;
    }

    .data-collector {
        background: #035544;
        border-radius: 15px;
        margin-top: 20px;
        padding: 20px 30px;
    }

    .invoice-preview-card {
        background: #DFF5EF;
        border-radius: 15px;
        margin-top: 20px;
    }

    .ck-editor__editable {
        min-height: 300px;
        color: black;
        }

    .dropify-wrapper .dropify-message span.file-icon p{
        font-size: 16px;
    }
  </style>
</head>
<body class="bg-gradient">
  <div class="container-fluid p-0">
    <section id="multiple-column-form ">
      <div class="d-flex p-4">
        <!-- Sidebar -->
        <div class="sidebar  p-3 m-0">
            <div class="d-flex justify-content-between align-items-center card p-5  patient-info">
                <h4 class="text-white"><strong>Token #</strong>{{ $round->token }}</h4>
            </div>

            <div class="card patient-info">
                <h4 class="text-center text-white mb-4" style="font-weight: bold">Patient Information</h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <strong>Unique ID: </strong>
                    <span class="">{{ $patient->unique_number }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <strong>CNIC: </strong>
                    <span class="">{{ $patient->cnic}}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <strong>E-mail: </strong>
                    <span class="">{{ $patient->email}}</span>
                </div>
                <div class="row d-flex justify-content-between align-items-center mb-3">
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Name: </strong>
                        <span class="">{{ $patient->name }}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Age: </strong>
                        <span class="">{{ $patient->age }}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Weight: </strong>
                        <span class="">{{ $medicalRecord->weight }}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Height: </strong>
                        <span class="">{{ $medicalRecord->height }}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Systolic BP: </strong>
                        <span class="">{{ $medicalRecord->systolic_blood_pressure}}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Diastolic BP: </strong>
                        <span class="">{{ $medicalRecord->diasystolic_blood_pressure }}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Temperature: </strong>
                        <span class="">{{ $medicalRecord->temperature}}</span>
                    </div>
                    <div class="col-6 d-flex justify-content-between align-items-center mb-3">
                        <strong>Weather: </strong>
                        <span class="">{{ $medicalRecord->weather }}</span>
                    </div>
                </div>
            </div>


        </div>
        <a href="{{ route('doctor-form') }}" class="btn btn-danger w-25 float-left d-flex align-items-center" ><i data-feather="arrow-left" class="mx-2"></i> Exit</a>
        <a id="submit-diagnosis-form" class="btn btn-primary w-25 float-right d-flex align-items-center" >Next <i data-feather="arrow-right" class="mx-2"></i></a>

        <!-- Right-side Content -->
        <div class="flex-grow-1 ml-3 p-2">
          <!-- Tabs -->
          <ul class="nav nav-tabs mb-2" id="contentTabs" role="tablist">
            <li class="nav-item ">
              <a class="nav-link active" id="diagnosis-tab" data-toggle="tab" href="#diagnosis-content" role="tab">Diagnosis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="collector-tab" data-toggle="tab" href="#collector-content" role="tab">Data Collector</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="prescription-tab" data-toggle="tab" href="#prescription-content" role="tab">Prescription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="appointment-tab" data-toggle="tab" href="#appointment-content" role="tab">Scheduale Appointment</a>
            </li>
          </ul>

          <div class="tab-content">
            <!-- Diagnosis Tab -->
            <div class="tab-pane fade show active" id="diagnosis-content" role="tabpanel">
              <div class="row">
                <!-- Form -->
                <div class="col-md-7 col-12">
                  <div class="card form-card p-3">
                        <div class="card-header">
                            <h3 class=""><strong>Fill the form</strong></h3>
                        </div>
                        <div class="card-body">
                            <form id="diagnosis-form" action="{{ route('save-doctor-reports') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="complaint">Present Complaint</label>
                                            <textarea class="form-control" id="complaint" rows="3" name="complaint" placeholder="Present Complaint"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="symptoms">Symptoms</label>
                                            <textarea class="form-control" id="symptoms" rows="3" name="symptoms" placeholder="Symptoms"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="blood_pressure">Blood Pressure</label>
                                            <textarea class="form-control" id="blood_pressure" rows="1" name="blood_pressure" placeholder="Blood Pressure"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="diagnosis">Provisional Diagnosis</label>
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <textarea class="form-control" id="diagnosis" rows="3" name="final_diagnosis" placeholder="Provisional Diagnosis"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="medication">Prescription</label>
                                            <textarea class="form-control" id="medication" rows="3" name="recommended_medication" placeholder="Prescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="investigation">Lab Investigation</label>
                                            <textarea class="form-control" id="investigation" rows="3" name="further_investigation" placeholder="Lab Investigation"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12 col-form-label">
                                                <label for="reports">Reports</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="file" id="reports" class="form-control file-input" name="reports" placeholder="Reports File" />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-9 mt-2">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- AI Assistant -->
                <div class="col-md-5 col-12">
                    <div class="container card p-0">
                        <header class="header">
                            <div class="header-title">
                                <h1>AI Assistant</h1>
                                <div class="bot-status">
                                    <div class="status-indicator"></div>
                                    <span>Online</span>
                                </div>
                            </div>
                            <div class="controls">
                                <button class="theme-toggle" aria-label="Toggle theme">
                                    <i class="fas fa-moon"></i>
                                </button>
                            </div>
                        </header>

                        <div class="chat-container" id="chatContainer">
                            <!-- Messages will be added here -->
                        </div>

                        <div class="typing-indicator">
                            <div class="typing-dots">
                                <div class="typing-dot"></div>
                                <div class="typing-dot"></div>
                                <div class="typing-dot"></div>
                            </div>
                        </div>

                        <div class="input-container">
                            <div class="input-wrapper">
                                <input type="text" class="message-input" placeholder="Type your message..." aria-label="Message input">
                                <div class="action-buttons">
                                    <button class="action-button" aria-label="Add attachment">
                                        <i class="fas fa-paperclip"></i>
                                    </button>
                                    <button class="action-button" aria-label="Voice input">
                                        <i class="fas fa-microphone"></i>
                                    </button>
                                    <button class="send-button">
                                        <span>Send</span>
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Data Collector Tab -->
            <div class="tab-pane fade" id="collector-content" role="tabpanel">
              <div class="card data-collector ">
                <h3 class="text-center text-white my-5"><strong>Patient's Collected Data</strong></h3>
                @if($patient->answers->isNotEmpty())
                  <div class="row">
                    @foreach ($patient->answers as $answer)
                      <div class="col-md-6 col-12 mb-2 ">
                        <div class="form-group card p-2">
                          <h5 class="text-white">{{ $answer->question }}</h5>
                          <p class="text-start text-white mb-0">{{ $answer->answer }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                @else
                  <p class="text-center text-white">No data available.</p>
                @endif
              </div>
            </div>

            <div class="tab-pane fade" id="prescription-content" role="tabpanel">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-xl-12 col-md-12 col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">
                                <!-- Header starts -->
                                <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper mt-4">
                                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="84">
                                                <defs>
                                                    <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                        <stop stop-color="#000000" offset="0%"></stop>
                                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="invoice-linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                    </linearGradient>
                                                </defs>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-400.000000, -178.000000)">
                                                        <g transform="translate(400.000000, 178.000000)">
                                                            <path class="text-primary" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                            <path d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#invoice-linearGradient-1)" opacity="0.2"></path>
                                                            <polygon fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                            <polygon fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                            <polygon fill="url(#invoice-linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <h3 class="text-primary invoice-logo"></h3>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="card-text mb-25"><strong>{{ Auth::user()->name}}</strong></h2>
                                        <span>Doctor</span>
                                        <p class="card-text mb-25 mt-3">Address: Street 1 main boulevard, California</p>
                                        <p class="card-text mb-0">mb: {{ $patient->phone }}</p>
                                    </div>

                                    <div class=" mt-2">
                                        <h4 class="invoice-title">
                                            <span class="invoice-number">
                                                {{ $patient->unique_number }}
                                            </span>
                                        </h4>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Date Issued:</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Due Date:</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-12 p-0">
                                        <h2 class="mb-4"><strong>Patient Info</strong></h2>
                                    </div>
                                    <div class="col-xl-8 p-0 ">
                                        <h6 class="mb-1"><strong>Name: </strong> {{ $patient->name }}</h6>
                                        <h6 class="mb-1"><strong>Age: </strong> {{ $patient->age }}</h6>
                                        <h6 class="mb-1"><strong>Address: </strong> {{ $patient->address }}, {{ $patient->city }}</h6>
                                        <h6 class="mb-1"><strong>Weight: </strong> {{ $patient->latestMedicalRecord->weight }}kg </h6>
                                    </div>
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                        <h6 class="mb-1"><strong>Phone: </strong> {{ $patient->phone }}</h6>
                                        <h6 class="mb-1"><strong>E-mail: </strong> {{ $patient->email }}</h6>
                                        <h6 class="mb-1"><strong>Gender: </strong> {{ $patient->sex }}</h6>
                                    </div>
                                    <div class="col-12 p-0">
                                        <hr class="my-2">
                                        <h6 class="mb-1"><strong>Diagnosis: </strong> </h6>
                                        <p class="ml-5" id="display-diagnosis">{{ $patient->latestMedicalRecord->final_diagnosis }}</p>
                                        <h6 class="mb-1"><strong>Symptoms: </strong> </h6>
                                        <p class="ml-5" id="display-symptoms">{{ $patient->latestMedicalRecord->symptoms }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Address and Contact ends -->

                            <!-- Invoice Description starts -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="bg-secondary">
                                            <td class="py-1 ">
                                                <span class="text-white"><strong>Prescription:</strong></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <span class="ml-5" id="display-medication">{{ $patient->latestMedicalRecord->recommended_medication }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Invoice Description ends -->

                            <hr class="invoice-spacing" />

                            <!-- Invoice Note starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <span class="ml-0 pl-0"><strong>Further Tests:</strong></span>
                                        <span id="display-investigation">{{ $patient->latestMedicalRecord->further_investigation }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Note ends -->
                        </div>
                    </div>
                    <!-- /Invoice -->

                    <button class="btn btn-primary btn-block " >
                        Print
                    </button>
                    <!-- Invoice Actions -->
                  
                    <!-- /Invoice Actions -->
                </div>
            </div>
            <div class="tab-pane fade" id="appointment-content" role="tabpanel">
                <div class="col-12 invoice-actions mt-md-0 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#exampleModalCenter">Next Appointment</button>
                        </div>
                    </div>
                </div>
                 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Next Appointment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('request-appointment', $patient->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mt-1">
                                        <label for="appointment_date">Appointment Scheduale</label>
                                        <input type="date" class="my-1 form-control" name="appointment_date" id="appointment_date" required value="{{ old('appointment_date') }}">
                                        @error('appointment_date')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS Dependencies -->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>

    <script src="{{asset('admin-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-assets/js/core/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin-assets/js/ai.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        $(document).ready(function () {
            $('.file-input').dropify();
            // Diagnosis field
            // $('#diagnosis').on('input', function () {
            // $('#display-diagnosis').text($(this).val());
            // });

            // // Symptoms
            // $('#symptoms').on('input', function () {
            // $('#display-symptoms').text($(this).val());
            // });

            // // Medication
            // $('#medication').on('input', function () {
            // $('#display-medication').text($(this).val());
            // });

            // // Investigation
            // $('#investigation').on('input', function () {
            // $('#display-investigation').text($(this).val());
            // });

            $('#submit-diagnosis-form').on('click', function (e) {
                e.preventDefault(); // prevent anchor default action
                $('#diagnosis-form').submit(); // trigger the form submit
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editors = {};
    
            function bindEditor(id, targetSelector) {
                ClassicEditor
                    .create(document.querySelector(id))
                    .then(editor => {
                        editors[id] = editor;
    
                        // Sync changes to display element in real-time
                        editor.model.document.on('change:data', () => {
                            const value = editor.getData();
                            $(targetSelector).html(value); // Use `.html()` to preserve formatting
                        });
                    })
                    .catch(error => {
                        console.error(`Error initializing editor for ${id}:`, error);
                    });
            }
    
            // Bind each field to its matching preview display
            bindEditor('#complaint', null); // no preview for this?
            bindEditor('#symptoms', '#display-symptoms');
            bindEditor('#blood_pressure', null); // no preview for this?
            bindEditor('#diagnosis', '#display-diagnosis');
            bindEditor('#medication', '#display-medication');
            bindEditor('#investigation', '#display-investigation');
        });
    </script>
    
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor
                .create(document.querySelector('#complaint'))
                .catch(error => console.error(error));
    
            ClassicEditor
                .create(document.querySelector('#symptoms'))
                .catch(error => console.error(error));
    
            ClassicEditor
                .create(document.querySelector('#blood_pressure'))
                .catch(error => console.error(error));
    
            ClassicEditor
                .create(document.querySelector('#diagnosis'))
                .catch(error => console.error(error));
    
            ClassicEditor
                .create(document.querySelector('#medication'))
                .catch(error => console.error(error));
    
            ClassicEditor
                .create(document.querySelector('#investigation'))
                .catch(error => console.error(error));
        });
    </script> --}}
    
</body>
</html>
