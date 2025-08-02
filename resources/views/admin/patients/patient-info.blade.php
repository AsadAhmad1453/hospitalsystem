@extends('admin.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">@endsection
@section('content')
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <h2 class="mb-3"><strong>Patient Info</strong></h2>
                        <div class=" m-0">
                            <div class="row">
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Unique Id: </strong></h5>
                                        <p>{{ $patient->unique_number }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>CNIC: </strong></h5>
                                        <p>{{ $patient->cnic }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Name: </strong></h5>
                                        <p>{{ $patient->name }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Sex: </strong></h5>
                                        <p>{{ $patient->sex }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Date of Birth: </strong></h5>
                                        <p>{{ $patient->dateofbirth }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>E-mail: </strong></h5>
                                        <p>{{ $patient->email }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Phone#: </strong></h5>
                                        <p>{{ $patient->phone }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between col-6">
                                        <h5 class="fw-bold "><strong>Address: </strong></h5>
                                        <p>{{ $patient->address }}, {{ $patient->city }}</p>
                                    </div>
                                
                            </div>  
                        </div>

                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                        @if($patient->medicalRecords->count())
                            @foreach($patient->medicalRecords as $record)
                                <div class="col-xl-12 p-0 mt-xl-0 my-2  ">
                                    <h3 class="mb-2"><strong>Patient Visit #{{ $patient->medicalRecords->count() - $loop->index }}</strong></h3>
                                    @if($loop->first)
                                        <p class="badge badge-success ">Most Recent</p>
                                    @endif         
                                    <p class="float-right">{{ $record->created_at->format('F j, Y') }} | {{ $record->created_at->format('h:i A') }}</p>
                                                            
                                </div>
                                 <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Age: </strong></h5>
                                    <p>{{ $patient->age }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Weight (kg): </strong></h5>
                                    <p>{{ $record->weight }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Height (m/cm): </strong></h5>
                                    <p>{{ $record->height }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Pulse: </strong></h5>
                                    <p>{{ $record->pulse }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Systolic BP: </strong></h5>
                                    <p>{{ $record->systolic_blood_pressure }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Diastolic BP: </strong></h5>
                                    <p>{{ $record->diasystolic_blood_pressure }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Temperature (C): </strong></h5>
                                    <p>{{ $record->temperature }}</p>
                                </div>
                                <div class="d-flex justify-content-between col-4">
                                    <h5 class="fw-bold "><strong>Weather: </strong></h5>
                                    <p>{{ $record->weather }}</p>
                                </div> 

                                <hr class="" style=" width: 100%; height: 1px; ">

                                <div class=" col-12">
                                    <h5 class="fw-bold "><strong>Problems / Complaint: </strong></h5>
                                    {!! $record->complaint ?? 'N/A' !!}
                                </div> 
                                <div class=" col-12">
                                    <h5 class="fw-bold "><strong>Symptoms: </strong></h5>
                                    {!! $record->symptoms ?? 'N/A' !!}
                                </div> 
                                <div class=" col-12">
                                    <h5 class="fw-bold "><strong>Diagnosis: </strong></h5>
                                    {!! $record->final_diagnosis ?? 'N/A' !!}
                                </div> 
                                <div class=" col-12">
                                    <h5 class="fw-bold "><strong>Prescription: </strong></h5>
                                    {!! $record->recommended_medication ?? 'N/A' !!}
                                </div> 
                                <div class=" col-12">
                                    <h5 class="fw-bold "><strong>Further Tests: </strong></h5>
                                    {!! $record->further_investigation ?? 'N/A' !!}
                                </div> 
                                <hr class="mb-3" style="background-color: rgb(226, 226, 226); width: 100%; height: 2px; ">

                            @endforeach
                        @else
                            <div class="col-xl-12 p-0 mt-xl-0 my-4">
                                <h1 class="mb-2"><strong>No Medical Records Found</strong></h1>
                                <p class="text-muted">This patient has no medical records yet.</p>
                            </div>
                        @endif
                        </div>
                    </div>
                    <!-- Address and Contact ends -->

                </div>
            </div>
            <!-- /Invoice -->
        </div>
    </section>
@endsection
@section('custom-js')
        <script src="{{ asset('admin-assets/js/scripts/pages/app-invoice.js') }}"></script>
@endsection
