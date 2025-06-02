@extends('user.layouts.main')
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
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <h1 class="text-primary fw-bold my-2"><strong>{{ $patient->name }}</strong></h1>
                            </div>
                            {{-- <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    Visit #
                                    <span class="invoice-number">#3</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Date Issued:</p>
                                    <p class="invoice-date">25/08/2020</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Due Date:</p>
                                    <p class="invoice-date">29/08/2020</p>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            {{-- <div class="col-xl-8 p-0">
                                <h3 class="mb-2">Patient Stats:</h3>
                                <p class="card-text mb-25">{{ $record->weight }}</p>
                                <p class="card-text mb-25">{{ $record->height }}</p>
                                <p class="card-text mb-25">{{ $record->blood_pressure }}</p>
                                <p class="card-text mb-25">{{ $record->heart_rate }}</p>
                                <p class="card-text mb-25">{{ $record->final_diagnosis }}</p>
                                <p class="card-text mb-25">{{ $record->recommended_medication }}</p>
                                <p class="card-text mb-25">{{ $record->further_investigation }}</p>
                            </div> --}}
                        @foreach($patient->medicalRecords as $record)
                            <div class="col-xl-12 p-0 mt-xl-0 my-4">
                                
                                <h1 class="mb-2"><strong>Patient Visit #{{ $patient->medicalRecords->count() - $loop->index }}</strong> @if($loop->first)
                                    <p class="badge badge-success ml-1">Most Recent</p>
                                @endif</h1>
                                <table style="border-collapse: separate; border-spacing: 0 20px; width: 100%; table-layout: fixed;">
                                    <tbody>
                                        <tr class="my-5 ">
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Weight:</strong></span></td>
                                            <td class="text-center"><span class="font-weight-bold h3">{{ $record->weight }}</span></td>
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Height:</strong></span> </td>
                                            <td class="text-center"><span class="font-weight-bold h3">{{ $record->height }}</span></td>
                                        </tr>
                                        <tr class="my-5 ">
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Heart Rate:</strong></span> </td>
                                            <td class="text-center"><span class="font-weight-bold h3">{{ $record->heart_rate }}</span></td>
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Blood Pressure:</strong></span> </td>
                                            <td class="text-center"><span class="font-weight-bold h3">{{ $record->blood_pressure }}</span></td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Final Diagnosis:</strong></span> </td>
                                        </tr>
                                        <tr class="py-2">
                                            <td><span class="font-weight-bold h3 py-2 pl-5">{{ $record->final_diagnosis }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Prescription:</strong></span> </td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold h3 pl-5">{{ $record->recommended_medication }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="pr-1"><span class="fw-bold h2"><strong>Further Investigation:</strong></span> </td>
                                        </tr>      
                                        <tr>
                                            <td><span class="font-weight-bold h3 pl-5">{{ $record->further_investigation }}</span></td>
                                        </tr>                
                                    </tbody>
                                </table>
                            </div>
                        @endforeach

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