@extends('admin-new.layouts.main')
@section('title', 'Patient Full Report - ' . $patient->name)
@section('page-title', 'Patient Full Report')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="mb-2">Patient Full Medical Report</h2>
                                <p class="text-muted mb-0">Comprehensive medical history and records for {{ $patient->name }}
                                </p>
                            </div>
                            <div class="col text-md-end">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-primary text-nowrap" onclick="window.print()">
                                        <i class="fas fa-print me-2"></i>Print Report
                                    </button>
                                    <button class="btn btn-success text-nowrap" onclick="downloadPDF()">
                                        <i class="fas fa-file-pdf me-2"></i>Download PDF
                                    </button>
                                    <a href="{{ route('admin-new.patients') }}"
                                        class="btn btn-outline-secondary text-nowrap d-flex align-items-center">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Patients
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patient Information Card -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-user me-2"></i>Patient Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center mb-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 80px; height: 80px;">
                                        <i class="fas fa-user text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-3">{{ $patient->name }}</h4>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Unique ID:</strong></div>
                                            <div class="col-8">{{ $patient->unique_number ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>CNIC:</strong></div>
                                            <div class="col-8">{{ $patient->cnic ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Age:</strong></div>
                                            <div class="col-8">{{ $patient->age ?? 'N/A' }} years</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Gender:</strong></div>
                                            <div class="col-8">{{ ucfirst($patient->sex ?? ($patient->gender ?? 'N/A')) }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Date of Birth:</strong></div>
                                            <div class="col-8">{{ $patient->dateofbirth ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Phone:</strong></div>
                                            <div class="col-8">{{ $patient->phone ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Email:</strong></div>
                                            <div class="col-8">{{ $patient->email ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Blood Group:</strong></div>
                                            <div class="col-8">{{ $patient->blood_group ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Emergency Contact:</strong></div>
                                            <div class="col-8">{{ $patient->emergency_contact ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>City:</strong></div>
                                            <div class="col-8">{{ $patient->city ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><strong>Status:</strong></div>
                                            <div class="col-8">
                                                @if ($patient->patient_status == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Discharged</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($patient->address)
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <strong>Address:</strong><br>
                                            {{ $patient->address }}{{ $patient->city ? ', ' . $patient->city : '' }}
                                        </div>
                                    </div>
                                @endif
                                @if ($patient->medical_history)
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <strong>Medical History:</strong><br>
                                            {{ $patient->medical_history }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctor Information -->
        @if ($patient->doctor)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-user-md me-2"></i>Assigned Doctor</h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 60px; height: 60px;">
                                        <i class="fas fa-user-md text-white" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="mb-1">{{ $patient->doctor->name }}</h5>
                                    <p class="text-muted mb-0">{{ $patient->doctor->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Medical Records by Visit -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-file-medical-alt me-2"></i>Medical Records by Visit</h5>
                    </div>
                    <div class="card-body">
                        @if (isset($groupedRecords) && $groupedRecords->count() > 0)
                            @foreach ($groupedRecords as $visitDate => $records)
                                <div class="visit-section mb-4">
                                    <div class="visit-header bg-light p-3 rounded mb-3">
                                        <h6 class="mb-0">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            Visit #{{ $loop->iteration }} -
                                            {{ \Carbon\Carbon::parse($visitDate)->format('F j, Y') }}
                                            <span class="badge bg-primary ms-2">{{ $records->count() }} Record(s)</span>
                                        </h6>
                                    </div>

                                    @foreach ($records as $record)
                                        <div class="medical-record mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="text-primary mb-3">Vital Signs</h6>
                                                    <div class="row">
                                                        <div class="col-6 mb-2">
                                                            <strong>Weight:</strong> {{ $record->weight ?? 'N/A' }} kg
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <strong>Height:</strong> {{ $record->height ?? 'N/A' }} cm
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <strong>Pulse:</strong> {{ $record->pulse ?? 'N/A' }} bpm
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <strong>Temperature:</strong>
                                                            {{ $record->temperature ?? 'N/A' }}°C
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <strong>Systolic BP:</strong>
                                                            {{ $record->systolic_blood_pressure ?? 'N/A' }} mmHg
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <strong>Diastolic BP:</strong>
                                                            {{ $record->diasystolic_blood_pressure ?? 'N/A' }} mmHg
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="text-primary mb-3">Clinical Information</h6>
                                                    @if ($record->complaint)
                                                        <div class="mb-2">
                                                            <strong>Chief Complaint:</strong><br>
                                                            <div class="text-muted">{!! $record->complaint !!}</div>
                                                        </div>
                                                    @endif
                                                    @if ($record->symptoms)
                                                        <div class="mb-2">
                                                            <strong>Symptoms:</strong><br>
                                                            <div class="text-muted">{!! $record->symptoms !!}</div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            @if ($record->final_diagnosis || $record->recommended_medication || $record->further_investigation)
                                                <hr>
                                                <div class="row">
                                                    @if ($record->final_diagnosis)
                                                        <div class="col-md-4">
                                                            <h6 class="text-success">Diagnosis</h6>
                                                            <div class="text-muted">{!! $record->final_diagnosis !!}</div>
                                                        </div>
                                                    @endif
                                                    @if ($record->recommended_medication)
                                                        <div class="col-md-4">
                                                            <h6 class="text-warning">Prescription</h6>
                                                            <div class="text-muted">{!! $record->recommended_medication !!}</div>
                                                        </div>
                                                    @endif
                                                    @if ($record->further_investigation)
                                                        <div class="col-md-4">
                                                            <h6 class="text-info">Further Tests</h6>
                                                            <div class="text-muted">{!! $record->further_investigation !!}</div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="text-muted small mt-2">
                                                <i class="fas fa-clock me-1"></i>
                                                Recorded on {{ $record->created_at->format('M j, Y \a\t h:i A') }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-file-medical text-muted" style="font-size: 3rem;"></i>
                                <h5 class="text-muted mt-3">No Medical Records Found</h5>
                                <p class="text-muted">This patient has no medical records yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Blood Investigations -->
        @if (isset($bloodInvestigations) && $bloodInvestigations->count() > 0)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><i class="fas fa-vial me-2"></i>Blood Investigations</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Test Name</th>
                                            <th>Test Type</th>
                                            <th>Status</th>
                                            <th>Results</th>
                                            <th>Ordered By</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bloodInvestigations as $test)
                                            <tr>
                                                <td>{{ $test->test_name ?? 'N/A' }}</td>
                                                <td>{{ $test->test_type ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($test->status == 'completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif($test->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ ucfirst($test->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($test->results)
                                                        <div class="text-muted small">{{ Str::limit($test->results, 50) }}
                                                        </div>
                                                    @else
                                                        <span class="text-muted">No results</span>
                                                    @endif
                                                </td>
                                                <td>{{ $test->doctor->name ?? 'N/A' }}</td>
                                                <td>{{ $test->created_at->format('M j, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Imaging Studies -->
        @if (
            (isset($xrays) && $xrays->count() > 0) ||
                (isset($ultrasounds) && $ultrasounds->count() > 0) ||
                (isset($ctscans) && $ctscans->count() > 0))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><i class="fas fa-x-ray me-2"></i>Imaging Studies</h5>
                        </div>
                        <div class="card-body">
                            @if (isset($xrays) && $xrays->count() > 0)
                                <h6 class="text-primary mb-3">X-Ray Studies</h6>
                                <div class="table-responsive mb-4">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Study Type</th>
                                                <th>Body Part</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($xrays as $xray)
                                                <tr>
                                                    <td>{{ $xray->study_type ?? 'N/A' }}</td>
                                                    <td>{{ $xray->body_part ?? 'N/A' }}</td>
                                                    <td>{{ $xray->created_at->format('M j, Y') }}</td>
                                                    <td>
                                                        @if ($xray->status == 'completed')
                                                            <span class="badge bg-success">Completed</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if (isset($ultrasounds) && $ultrasounds->count() > 0)
                                <h6 class="text-primary mb-3">Ultrasound Studies</h6>
                                <div class="table-responsive mb-4">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Study Type</th>
                                                <th>Body Part</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ultrasounds as $ultrasound)
                                                <tr>
                                                    <td>{{ $ultrasound->study_type ?? 'N/A' }}</td>
                                                    <td>{{ $ultrasound->body_part ?? 'N/A' }}</td>
                                                    <td>{{ $ultrasound->created_at->format('M j, Y') }}</td>
                                                    <td>
                                                        @if ($ultrasound->status == 'completed')
                                                            <span class="badge bg-success">Completed</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if (isset($ctscans) && $ctscans->count() > 0)
                                <h6 class="text-primary mb-3">CT Scan Studies</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Study Type</th>
                                                <th>Body Part</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ctscans as $ctscan)
                                                <tr>
                                                    <td>{{ $ctscan->study_type ?? 'N/A' }}</td>
                                                    <td>{{ $ctscan->body_part ?? 'N/A' }}</td>
                                                    <td>{{ $ctscan->created_at->format('M j, Y') }}</td>
                                                    <td>
                                                        @if ($ctscan->status == 'completed')
                                                            <span class="badge bg-success">Completed</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Appointments -->
        @if (isset($appointments) && $appointments->count() > 0)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Appointments</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('M j, Y \a\t h:i A') : 'N/A' }}
                                                </td>
                                                <td>{{ $appointment->purpose ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($appointment->status == 'completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif($appointment->status == 'scheduled')
                                                        <span class="badge bg-primary">Scheduled</span>
                                                    @elseif($appointment->status == 'cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ ucfirst($appointment->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $appointment->notes ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Data Collection Answers -->
        @if (isset($patient->answers) && $patient->answers->count() > 0)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Data Collection Responses</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patient->answers as $answer)
                                            <tr>
                                                <td>{{ $answer->question->question ?? 'N/A' }}</td>
                                                <td>{{ $answer->answer ?? 'N/A' }}</td>
                                                <td>{{ $answer->created_at->format('M j, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Summary Statistics -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Summary Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div class="border rounded p-3">
                                    <h3 class="text-primary">{{ isset($groupedRecords) ? $groupedRecords->count() : 0 }}
                                    </h3>
                                    <p class="mb-0">Total Visits</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="border rounded p-3">
                                    <h3 class="text-success">
                                        {{ isset($bloodInvestigations) ? $bloodInvestigations->count() : 0 }}</h3>
                                    <p class="mb-0">Blood Tests</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="border rounded p-3">
                                    <h3 class="text-warning">
                                        {{ (isset($xrays) ? $xrays->count() : 0) + (isset($ultrasounds) ? $ultrasounds->count() : 0) + (isset($ctscans) ? $ctscans->count() : 0) }}
                                    </h3>
                                    <p class="mb-0">Imaging Studies</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="border rounded p-3">
                                    <h3 class="text-info">{{ isset($appointments) ? $appointments->count() : 0 }}</h3>
                                    <p class="mb-0">Appointments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {

            .btn,
            .dropdown,
            .card-header .btn {
                display: none !important;
            }

            .card {
                border: 1px solid #000 !important;
                page-break-inside: avoid;
            }

            .visit-section {
                page-break-inside: avoid;
            }

            body {
                font-size: 12px;
            }

            .container-fluid {
                padding: 0;
            }
        }

        .visit-section {
            border-left: 4px solid #28a745;
            padding-left: 15px;
            margin-bottom: 20px;
        }

        .medical-record {
            background-color: #f8f9fa;
            border-left: 3px solid #007bff;
        }

        .card-header {
            font-weight: 600;
        }

        .badge {
            font-size: 0.75em;
        }
    </style>
@endsection

@section('custom-js')
    <script>
        function downloadPDF() {
            // Create a new window for PDF generation
            const printWindow = window.open('', '_blank');

            // Get the current page content
            const content = document.documentElement.outerHTML;

            // Write the content to the new window
            printWindow.document.write(content);
            printWindow.document.close();

            // Trigger print dialog
            printWindow.print();
        }

        // Add print functionality
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                window.print();
            }
        });
    </script>
@endsection
