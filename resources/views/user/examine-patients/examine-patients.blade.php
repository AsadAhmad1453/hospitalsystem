<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Staff Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    {{-- <link rel="apple-touch-icon" href="{{ asset('admin-assets/images/ico/apple-icon-120.png') }}"> --}}
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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.min.css') }}">


    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
    <!-- Bootstrap CSS & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="{{ asset('admin-assets/css/ai.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/examine.css') }}">
    <style>
        /* Clean, Modern Design */
        body {
            font-family: 'Red Hat Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Form Labels with Icons */
        .form-group label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .form-group label i {
            margin-right: 8px;
            color: #667eea;
        }

        /* CKEditor Container Spacing */
        .ckeditor-container {
            margin-bottom: 20px;
        }

        /* Ensure CKEditor is visible */
        .cke {
            visibility: visible !important;
            display: block !important;
        }
    </style>
</head>

<body class="bg-gradient" data-framework="laravel" data-asset-path="{{ asset('admin-assets') }}/">
    <div class="container-fluid p-0">
        <section id="multiple-column-form ">
            <div class="d-flex ">
                <!-- Sidebar -->
                <div class="sidebar p-4">
                    <div class="d-flex justify-content-between align-items-center card token mb-2 patient-info">
                        <h4 class="text-white m-0"><strong>Token #</strong>{{ $round->token }}</h4>
                    </div>
                    <div class="card mt-3 patient-info glass-card">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar-circle mr-3">
                                <span class="text-xl font-weight-bold">{{ substr($patient->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h4 class="text-white mb-0 font-weight-bold">{{ $patient->name }}</h4>
                                <small class="text-light opacity-75">{{ $patient->unique_number }}</small>
                            </div>
                        </div>

                        <div class="patient-details mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-id-card text-primary mr-3" style="width: 20px"></i>
                                <span class="text-light">{{ $patient->cnic }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-envelope text-primary mr-3" style="width: 20px"></i>
                                <span class="text-light">{{ $patient->email }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-birthday-cake text-primary mr-3" style="width: 20px"></i>
                                <span class="text-light">{{ $patient->age }} Years</span>
                            </div>
                        </div>

                        <div class="vitals-grid">
                            <div class="vital-card">
                                <i class="fas fa-weight-scale text-success mb-2"></i>
                                <span class="label">Weight</span>
                                <span class="value">{{ $medicalRecord->weight }} <small>kg</small></span>
                            </div>
                            <div class="vital-card">
                                <i class="fas fa-ruler-vertical text-warning mb-2"></i>
                                <span class="label">Height</span>
                                <span class="value">{{ $medicalRecord->height }}</span>
                            </div>
                            <div class="vital-card">
                                <i class="fas fa-heartbeat text-danger mb-2"></i>
                                <span class="label">BP (Sys)</span>
                                <span class="value">{{ $medicalRecord->systolic_blood_pressure }}</span>
                            </div>
                            <div class="vital-card">
                                <i class="fas fa-heart-broken text-danger mb-2"></i>
                                <span class="label">BP (Dia)</span>
                                <span class="value">{{ $medicalRecord->diasystolic_blood_pressure }}</span>
                            </div>
                            <div class="vital-card">
                                <i class="fas fa-thermometer-half text-info mb-2"></i>
                                <span class="label">Temp</span>
                                <span class="value">{{ $medicalRecord->temperature }}</span>
                            </div>
                            <div class="vital-card">
                                <i class="fas fa-cloud-sun text-primary mb-2"></i>
                                <span class="label">Weather</span>
                                <span class="value">{{ $medicalRecord->weather }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3 report-section glass-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white mb-0 font-weight-bold"><i
                                    class="fas fa-file-medical mr-2 text-warning"></i> Medical Records</h5>
                            <span
                                class="badge badge-primary badge-pill">{{ isset($patient->medicalRecords) ? count($patient->medicalRecords) : 0 }}</span>
                        </div>

                        <div class="reports-list custom-scroll"
                            style="max-height: 500px; overflow-y: auto; padding-right: 5px;">
                            @if (isset($patient->medicalRecords) && count($patient->medicalRecords))
                                @foreach ($patient->medicalRecords as $index => $record)
                                    <div class="report-item p-3 mb-2 rounded"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); transition: all 0.2s;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center" style="overflow: hidden;">
                                                <div class="file-icon mr-3 flex-shrink-0">
                                                    @if ($record->isImage())
                                                        <div class="bg-rgba-info p-2 rounded"><i
                                                                class="far fa-image text-info fa-lg"></i></div>
                                                    @elseif($record->isPdf())
                                                        <div class="bg-rgba-danger p-2 rounded"><i
                                                                class="far fa-file-pdf text-danger fa-lg"></i></div>
                                                    @elseif($record->isDoc())
                                                        <div class="bg-rgba-primary p-2 rounded"><i
                                                                class="far fa-file-word text-primary fa-lg"></i></div>
                                                    @else
                                                        <div class="bg-rgba-secondary p-2 rounded"><i
                                                                class="far fa-file text-secondary fa-lg"></i></div>
                                                    @endif
                                                </div>
                                                <div style="min-width: 0;">
                                                    <h6 class="mb-0 text-white text-truncate"
                                                        title="{{ $record->original_filename }}">
                                                        {{ $record->original_filename ?? 'Report File' }}</h6>
                                                    <small
                                                        class="text-muted">{{ $record->created_at ? $record->created_at->format('d M Y') : 'Date N/A' }}</small>
                                                </div>
                                            </div>

                                            <div class="actions flex-shrink-0 ml-2">
                                                @if ($record->report_file)
                                                    <a href="{{ $record->fileUrl() }}" target="_blank"
                                                        class="btn btn-sm btn-primary rounded-circle"
                                                        style="width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"
                                                        title="View Report">
                                                        <i class="fas fa-eye" style="font-size: 12px;"></i>
                                                    </a>
                                                    @if ($record->isImage())
                                                        <!-- Trigger Modal -->
                                                        <button type="button"
                                                            class="btn btn-sm btn-info rounded-circle ml-1"
                                                            data-toggle="modal"
                                                            data-target="#{{ $record->modalId($index) }}"
                                                            style="width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"
                                                            title="Preview">
                                                            <i class="fas fa-search-plus"
                                                                style="font-size: 12px;"></i>
                                                        </button>

                                                        <!-- Modal (Kept for compatibility) -->
                                                        <div class="modal fade" id="{{ $record->modalId($index) }}"
                                                            tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content glass-card border-0">
                                                                    <div class="modal-header modal-header-colored">
                                                                        <h5 class="modal-title text-white"
                                                                            id="imageModalLabel{{ $index }}">
                                                                            {{ $record->original_filename ?? 'Medical Report' }}
                                                                        </h5>
                                                                        <button type="button"
                                                                            class="close text-white"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center p-0">
                                                                        <img src="{{ $record->fileUrl() }}"
                                                                            class="img-fluid rounded"
                                                                            style="max-height: 80vh;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <i class="far fa-folder-open fa-3x text-muted mb-3 opacity-50"></i>
                                    <p class="text-muted mb-0">No medical records found.</p>
                                </div>
                            @endif
                        </div>
                    </div>



                </div>

                <!-- Floating Actions Bar -->

                <!-- Floating Corner Buttons -->
                <a href="{{ route('doctor-form') }}"
                    class="btn btn-exit btn-danger d-flex align-items-center justify-content-center">
                    <i class="fas fa-arrow-left mr-2"></i> Exit
                </a>
                <a id="submit-diagnosis-form"
                    class="btn btn-next btn-primary d-flex align-items-center justify-content-center">
                    Next <i class="fas fa-arrow-right ml-2"></i>
                </a>

                <!-- Right-side Content -->
                <div class="flex-grow-1 ml-3 p-4">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-2" id="contentTabs" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" id="diagnosis-tab" data-toggle="tab"
                                href="#diagnosis-content" role="tab">Diagnosis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="collector-tab" data-toggle="tab" href="#collector-content"
                                role="tab">Data Collected</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="prescription-tab" data-toggle="tab" href="#prescription-content"
                                role="tab">Prescription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="appointment-tab" data-toggle="tab" href="#appointment-content"
                                role="tab">
                                Scheduale Appointment</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Diagnosis Tab -->
                        <div class="tab-pane fade show active" id="diagnosis-content" role="tabpanel">
                            <div class="row">
                                <!-- Form -->
                                <div class="col-12">
                                    <div class="card form-card p-3">
                                        <div class="card-body">
                                            <form id="diagnosis-form" action="{{ route('save-doctor-reports') }}"
                                                method="POST" enctype="multipart/form-data"
                                                class="form form-horizontal">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="complaint"><i
                                                                    class="fas fa-notes-medical mr-2"></i>Present
                                                                Complaint</label>
                                                            <textarea class="form-control ckeditor-textarea" id="complaint" rows="3" name="complaint"
                                                                placeholder="Describe the patient's present complaint...">{{ old('complaint') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="symptoms"><i
                                                                    class="fas fa-stethoscope mr-2"></i>Sign &
                                                                Symptoms</label>
                                                            <textarea class="form-control ckeditor-textarea" id="symptoms" rows="3" name="symptoms"
                                                                placeholder="List all observed signs and symptoms...">{{ old('symptoms') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="blood_pressure">Blood Pressure</label>
                                                            <input type="number" class="form-control"
                                                                value="{{ old('blood_pressure') }}"
                                                                name="blood_pressure" placeholder="Blood Pressure">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="provisional-diagnosis"><i
                                                                    class="fas fa-diagnoses mr-2"></i>Provisional
                                                                Diagnosis</label>
                                                            <input type="hidden" name="patient_id"
                                                                value="{{ $patient->id }}">
                                                            <textarea class="form-control ckeditor-textarea" id="provisional-diagnosis" rows="3"
                                                                name="provisional_diagnosis" placeholder="Enter provisional diagnosis...">{{ old('provisional_diagnosis') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="final-diagnosis"><i
                                                                    class="fas fa-file-medical mr-2"></i>Final
                                                                Diagnosis</label>
                                                            <textarea class="form-control ckeditor-textarea" id="final-diagnosis" rows="3" name="final_diagnosis"
                                                                placeholder="Enter final diagnosis...">{{ old('final_diagnosis') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-2  form-group">
                                                        <label for="medication">Prescription</label>
                                                        <div id="medicine-dose-list">
                                                            <div
                                                                class="d-flex medicine-dose-row align-items-center mb-2">
                                                                <div class="col-6 p-0">
                                                                    <select
                                                                        class="select2 form-control form-control-lg w-50"
                                                                        name="medicine_id[]">
                                                                        @foreach ($medicines as $medicine)
                                                                            <option value="{{ $medicine->id }}"
                                                                                {{ old('medicine_id') == $medicine->id ? 'selected' : '' }}>
                                                                                {{ $medicine->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('medicine_id')
                                                                        <span class="text-danger"
                                                                            style="font-weight: 600">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-6 p-0 ml-1">
                                                                    <select
                                                                        class="select2 form-control form-control-lg w-50"
                                                                        name="dose_id[]">
                                                                        @foreach ($dosage as $dose)
                                                                            <option value="{{ $dose->id }}"
                                                                                {{ old('dose_id') == $dose->id ? 'selected' : '' }}>
                                                                                {{ $dose->dose }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('dose_id')
                                                                        <span class="text-danger"
                                                                            style="font-weight: 600">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <!-- No delete button for the first row -->
                                                            </div>
                                                        </div>
                                                        <!-- Add button below the list -->
                                                        <div class="mt-2">
                                                            <button type="button"
                                                                class="btn btn-success btn-add-medicine"><i
                                                                    class="fas fa-plus"></i> Add
                                                                Medicine</button>
                                                        </div>
                                                        <!-- Hidden template for new rows -->
                                                        <div class="medicine-dose-row align-items-center mb-2 d-none"
                                                            id="medicine-dose-template">
                                                            <div class="col-6 p-0">
                                                                <select
                                                                    class="form-control form-control-lg w-100 medicine-select"
                                                                    name="medicine_id[]">
                                                                    <option value="">Select Medicine
                                                                    </option>
                                                                    @foreach ($medicines as $medicine)
                                                                        <option value="{{ $medicine->id }}">
                                                                            {{ $medicine->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-5 p-0 ml-1">
                                                                <select
                                                                    class="form-control form-control-lg w-100 dose-select"
                                                                    name="dose_id[]">
                                                                    <option value="">Select Dose</option>
                                                                    @foreach ($dosage as $dose)
                                                                        <option value="{{ $dose->id }}">
                                                                            {{ $dose->dose }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-1 ">
                                                                <button type="button"
                                                                    class="btn btn-danger  btn-remove-medicine ml-2 d-flex align-items-center">
                                                                    <i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 mt-2 form-group">
                                                        <label for="lab_tests">Lab Investigation</label>

                                                        <div id="lab-test-list">
                                                            <div
                                                                class="container-fluid row gx-2 lab-test-row align-items-center mb-2">
                                                                <div class="col-6 p-2">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 blood-test-select"
                                                                        name="blood_test_id[]">
                                                                        <option value="">Select Blood
                                                                            Test
                                                                        </option>
                                                                        @foreach ($blood_tests as $test)
                                                                            <option value="{{ $test->id }}">
                                                                                {{ $test->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 xray-select"
                                                                        name="xray_id[]">
                                                                        <option value="">Select X-ray
                                                                        </option>
                                                                        @foreach ($xrays as $xray)
                                                                            <option value="{{ $xray->id }}">
                                                                                {{ $xray->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 ultrasound-select"
                                                                        name="ultrasound_id[]">
                                                                        <option value="">Select
                                                                            Ultrasound
                                                                        </option>
                                                                        @foreach ($ultrasounds as $ultrasound)
                                                                            <option value="{{ $ultrasound->id }}">
                                                                                {{ $ultrasound->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 ctscan-select"
                                                                        name="ctscan_id[]">
                                                                        <option value="">Select CT Scan
                                                                        </option>
                                                                        @foreach ($ctscans as $ctscan)
                                                                            <option value="{{ $ctscan->id }}">
                                                                                {{ $ctscan->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add button -->
                                                        <div class="mt-2">
                                                            <button type="button"
                                                                class="btn btn-success btn-add-lab-test">
                                                                <i class="fas fa-plus"></i> Add Lab Test
                                                            </button>
                                                        </div>

                                                        <!-- Hidden Template -->
                                                        <div class="d-none" id="lab-test-template">
                                                            <hr class="my-2">
                                                            <div
                                                                class="container-fluid row lab-test-row align-items-center mb-2">
                                                                <div class="col-6 p-2">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 blood-test-select"
                                                                        name="blood_test_id[]">
                                                                        <option value="">Select Blood
                                                                            Test
                                                                        </option>
                                                                        @foreach ($blood_tests as $test)
                                                                            <option value="{{ $test->id }}">
                                                                                {{ $test->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2 ">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 xray-select"
                                                                        name="xray_id[]">
                                                                        <option value="">Select X-ray
                                                                        </option>
                                                                        @foreach ($xrays as $xray)
                                                                            <option value="{{ $xray->id }}">
                                                                                {{ $xray->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2 ">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 ultrasound-select"
                                                                        name="ultrasound_id[]">
                                                                        <option value="">Select
                                                                            Ultrasound
                                                                        </option>
                                                                        @foreach ($ultrasounds as $ultrasound)
                                                                            <option value="{{ $ultrasound->id }}">
                                                                                {{ $ultrasound->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 p-2 d-flex align-items-center">
                                                                    <select
                                                                        class="form-control form-control-lg w-100 ctscan-select"
                                                                        name="ctscan_id[]">
                                                                        <option value="">Select CT Scan
                                                                        </option>
                                                                        @foreach ($ctscans as $ctscan)
                                                                            <option value="{{ $ctscan->id }}">
                                                                                {{ $ctscan->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 p-2">
                                                                    <button type="button"
                                                                        class="btn btn-danger w-100 d-flex align-items-center justify-content-center text-center py-2 btn-remove-lab-test ">
                                                                        <i class="fas fa-trash text-center"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="special_notes"><i
                                                                    class="fas fa-clipboard mr-2"></i>Special
                                                                Notes</label>
                                                            <textarea class="form-control ckeditor-textarea" id="special_notes" rows="3" name="special_notes"
                                                                placeholder="Add any special notes or instructions...">{{ old('special_notes') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- AI Assistant -->

                                <div class="container card p-0 ai-assistant d-none">
                                    <header class="header">
                                        <div class="header-title">
                                            <h1>AI Assistant</h1>
                                            <div class="bot-status">
                                                <div class="status-indicator"></div>
                                                <span>Online</span>
                                            </div>
                                        </div>

                                    </header>

                                    <div class="chat-container" id="chatContainer">
                                        <!-- Messages will be added here -->
                                    </div>

                                    <div class="input-container">
                                        <div class="input-wrapper">
                                            <input type="text" class="message-input" id="prompt"
                                                placeholder="Type your message..." aria-label="Message input">
                                            <div class="action-buttons">
                                                <button class="send-button" id="sendBtn">
                                                    <span>Send</span>
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Collector Tab -->
                        <div class="tab-pane fade" id="collector-content" role="tabpanel">
                            <div class="card data-collector">
                                <h3 class="text-center text-dark my-4 font-weight-bold">Patient's Collected
                                    Data</h3>
                                @if ($patient->answers->isNotEmpty())
                                    <div class="row">
                                        @foreach ($patient->answers as $answer)
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="card p-3 h-100 border shadow-sm"
                                                    style="background: #f8fafc;">
                                                    <h6 class="text-primary font-weight-bold mb-2">
                                                        {{ $answer->question }}</h6>
                                                    <p class="text-dark mb-0 form-control-static"
                                                        style="font-size: 1rem;">
                                                        {{ $answer->answer }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-5">
                                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3 opacity-50"></i>
                                        <p class="text-muted">No collected data available for this patient.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Prescription Tab -->
                        <div class="tab-pane fade" id="prescription-content" role="tabpanel">
                            <div id="printSection">
                                <div class="row invoice-preview">
                                    <!-- Invoice -->
                                    <div class="col-xl-12 col-md-12 col-12">
                                        <div class="card invoice-preview-card">
                                            <div class="card-body invoice-padding pb-0">
                                                <!-- Header starts -->
                                                <div
                                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                                    <div>
                                                        <div class="logo-wrapper mt-4">
                                                            <svg viewBox="0 0 139 95" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                height="84">
                                                                <defs>
                                                                    <linearGradient id="invoice-linearGradient-1"
                                                                        x1="100%" y1="10.5120544%"
                                                                        x2="50%" y2="89.4879456%">
                                                                        <stop stop-color="#000000" offset="0%">
                                                                        </stop>
                                                                        <stop stop-color="#FFFFFF" offset="100%">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <linearGradient id="invoice-linearGradient-2"
                                                                        x1="64.0437835%" y1="46.3276743%"
                                                                        x2="37.373316%" y2="100%">
                                                                        <stop stop-color="#EEEEEE" stop-opacity="0"
                                                                            offset="0%">
                                                                        </stop>
                                                                        <stop stop-color="#FFFFFF" offset="100%">
                                                                        </stop>
                                                                    </linearGradient>
                                                                </defs>
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <g transform="translate(-400.000000, -178.000000)">
                                                                        <g
                                                                            transform="translate(400.000000, 178.000000)">
                                                                            <path class="text-primary"
                                                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                                                style="fill: currentColor">
                                                                            </path>
                                                                            <path
                                                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                                                fill="url(#invoice-linearGradient-1)"
                                                                                opacity="0.2"></path>
                                                                            <polygon fill="#000000"
                                                                                opacity="0.049999997"
                                                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                                            </polygon>
                                                                            <polygon fill="#000000"
                                                                                opacity="0.099999994"
                                                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                                            </polygon>
                                                                            <polygon
                                                                                fill="url(#invoice-linearGradient-2)"
                                                                                opacity="0.099999994"
                                                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                                            </polygon>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <h3 class="text-primary invoice-logo"></h3>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h2 class="card-text mb-25">
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                        </h2>
                                                        <span>Doctor</span>
                                                        <p class="card-text mb-25 mt-3">Address: Street 1 main
                                                            boulevard, California</p>
                                                        <p class="card-text mb-0">mb: {{ $patient->phone }}
                                                        </p>
                                                    </div>

                                                    <div class=" mt-2">
                                                        <h4 class="invoice-title">
                                                            <span class="invoice-number">
                                                                {{ $patient->unique_number }}
                                                            </span>
                                                        </h4>
                                                        <div class="invoice-date-wrapper">
                                                            <p class="invoice-date-title">Date Issued:</p>
                                                            <p class="invoice-date">
                                                                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                                            </p>
                                                        </div>
                                                        <div class="invoice-date-wrapper">
                                                            <p class="invoice-date-title">Due Date:</p>
                                                            <p class="invoice-date">
                                                                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Header ends -->
                                            </div>

                                            <hr class="invoice-spacing mb-0" />

                                            <!-- Address and Contact starts -->
                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <div class="col-xl-12 p-0">
                                                        <h4 class="mb-4"><strong>Patient Info</strong></h4>
                                                    </div>
                                                    <div class="col-xl-8 p-0 ">
                                                        <h6 class="my-3"><strong>Name: </strong>
                                                            {{ $patient->name }}</h6>
                                                        <h6 class="my-3"><strong>Age: </strong>
                                                            {{ $patient->age }}
                                                        </h6>
                                                        <h6 class="my-3"><strong>Address: </strong>
                                                            {{ $patient->address }}, {{ $patient->city }}</h6>
                                                        <h6 class="my-3"><strong>Weight: </strong>
                                                            {{ $patient->latestMedicalRecord->weight }}kg </h6>
                                                    </div>
                                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                        <h6 class="my-3"><strong>Phone: </strong>
                                                            {{ $patient->phone }}</h6>
                                                        <h6 class="my-3"><strong>E-mail: </strong>
                                                            {{ $patient->email }}</h6>
                                                        <h6 class="my-3"><strong>Gender: </strong>
                                                            {{ $patient->sex }}</h6>
                                                    </div>
                                                    <div class="col-12 p-0">
                                                        <hr class="my-5">
                                                        <h6 class="mb-1"><strong>Complaint: </strong> </h6>
                                                        <p class="ml-5" id="display-complaint">
                                                            {{ $patient->latestMedicalRecord->final_diagnosis }}
                                                        </p>
                                                        <h6 class="mb-1"><strong>Provisional Diagnosis:
                                                            </strong>
                                                        </h6>
                                                        <p class="ml-5" id="display-provisional-diagnosis">
                                                            {{ $patient->latestMedicalRecord->final_diagnosis }}
                                                        </p>
                                                        <h6 class="mb-1"><strong>Final Diagnosis: </strong>
                                                        </h6>
                                                        <p class="ml-5" id="display-final-diagnosis">
                                                            {{ $patient->latestMedicalRecord->final_diagnosis }}
                                                        </p>
                                                        <h6 class="mb-1"><strong>Lab Investigation: </strong>
                                                        </h6>
                                                        <p class="ml-5" id="display-investigation"></p>
                                                        <h6 class="mb-1"><strong>Symptoms: </strong> </h6>
                                                        <p class="ml-5" id="display-symptoms">
                                                            {{ $patient->latestMedicalRecord->symptoms }}</p>
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
                                                                <span
                                                                    class="text-white"><strong>Prescription:</strong></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">
                                                                <span class="ml-5"
                                                                    id="display-medication">{{ $patient->latestMedicalRecord->recommended_medication }}</span>
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
                                                        <span class="ml-0 pl-0"><strong>Note:</strong></span>
                                                        <span
                                                            id="display_special_notes">{{ $patient->latestMedicalRecord->further_investigation }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Invoice Note ends -->
                                        </div>
                                    </div>
                                    <!-- /Invoice -->

                                    <button
                                        class="btn btn-primary btn-block d-flex align-items-center justify-content-center py-3"
                                        id="printButton"><i class="fas fa-print"></i></button>
                                    <!-- Invoice Actions -->

                                    <!-- /Invoice Actions -->
                                </div>
                            </div>
                        </div>
                        <!-- Appointment Tab -->
                        <div class="tab-pane fade" id="appointment-content" role="tabpanel">
                            <div class="col-12 invoice-actions mt-md-0 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('admin-assets/images/illustration/appoint.jpg') }}"
                                            alt="">

                                        <button type="button" class="btn btn-warning w-100 my-2" data-toggle="modal"
                                            data-target="#exampleModalCenter">Next
                                            Appointment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalCenterTitle">
                                                Next
                                                Appointment</h5>

                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mt-1">
                                                <label for="appointment_date">Appointment Scheduale</label>
                                                <div class="alert alert-info mt-2" role="alert">
                                                    <i class="fas fa-info-circle"></i>
                                                    Your appointment request will be forwarded to the
                                                    receptionist for
                                                    confirmation once you proceed to the next patient.
                                                </div>
                                                <input type="date" class="my-1 form-control"
                                                    name="appointment_date" id="appointment_date"
                                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                                    value="{{ old('appointment_date') }}">
                                                @error('appointment_date')
                                                    <span class="text-danger"
                                                        style="font-weight: 600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="appointment_services">Select Services</label>
                                                <select class="form-control select2" name="appointment_services[]"
                                                    id="appointment_services" multiple required>
                                                    @foreach ($services ?? [] as $service)
                                                        <option value="{{ $service->id }}"
                                                            @if (collect(old('appointment_services'))->contains($service->id)) selected @endif>
                                                            {{ $service->service_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('appointment_services')
                                                    <span class="text-danger"
                                                        style="font-weight: 600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal"
                                                class="btn btn-primary">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Floating AI Assistant Widget -->
        <div class="ai-assistant-widget">
            <!-- Toggle Button -->
            <button class="ai-toggle-btn" onclick="toggleAI()">
                <div class="ai-icon-pulse"></div>
                <i class="fas fa-robot"></i>
                <span class="ml-2 font-weight-bold">AI Assistant</span>
            </button>

            <!-- Chat Window -->
            <div class="ai-chat-window d-none" id="ai-chat-window">
                <div class="header">
                    <div class="d-flex align-items-center">
                        <div class="avatar-icon mr-2">
                            <i class="fas fa-user-md text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold text-dark">Dr. Assistant</h6>
                            <small class="text-success"><span class="status-dot"></span> Online</small>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-icon text-muted" onclick="toggleAI()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="chat-container custom-scroll" id="chat-container">
                    <div class="message bot-message">
                        <div class="message-bubble">
                            Hello {{ Auth::user()->name }}! I'm here to assist with diagnosis, drug interactions,
                            or general queries.
                        </div>
                    </div>
                </div>

                <div class="input-container">
                    <div class="input-wrapper">
                        <input type="text" id="user-input" class="message-input"
                            placeholder="Ask a medical question..." autocomplete="off">
                        <button class="send-button" id="ai-send-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Dependencies -->
    <script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CKEditor - Load before initialization -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('admin-assets/js/scripts/components/components-collapse.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/components/components-collapse.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin-assets/js/scripts/examine.js') }}"></script>

    <script>
        // Toggle AI Chat Window
        function toggleAI() {
            const chatWindow = document.getElementById('ai-chat-window');
            if (chatWindow.classList.contains('d-none')) {
                chatWindow.classList.remove('d-none');
            } else {
                chatWindow.classList.add('d-none');
            }
        }

        // Allow Enter key to send in the floating widget
        document.getElementById('user-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                $('#ai-send-btn').click();
            }
        });

        // Initialize Feather Icons
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // Initialize CKEditor for all textareas with class 'ckeditor-textarea'
            // Initialize CKEditor for all textareas with class 'ckeditor-textarea'
            // Handled in examine.js to include data binding
            // if (typeof CKEDITOR !== 'undefined') {
            // const config = {
            // height: 150,
            // toolbar: [{
            // name: 'basicstyles',
            // items: ['Bold', 'Italic', 'Underline']
            // },
            // {
            // name: 'paragraph',
            // items: ['NumberedList', 'BulletedList']
            // },
            // {
            // name: 'colors',
            // items: ['TextColor', 'BGColor']
            // }
            // ],
            // uiColor: '#F8FAFC'
            // };

            // // Initialize specific IDs to ensure they are caught
            // const ids = ['complaint', 'symptoms', 'provisional-diagnosis', 'final-diagnosis', 'special_notes'];
            // ids.forEach(function(id) {
            // if (document.getElementById(id)) {
            // CKEDITOR.replace(id, config);
            // }
            // });
            // }
        });
    </script>
</body>

</html>
