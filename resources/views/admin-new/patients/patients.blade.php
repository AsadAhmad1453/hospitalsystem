@extends('admin-new.layouts.main')
@section('title', 'Patient Management')
@section('page-title', 'Patient Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Patient Management</h2>
                            <p class="text-muted mb-0">Manage patient records, medical history, and appointments.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="exportPatients()">
                                    <i class="fas fa-download me-2"></i>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-user-injured"></i>
                            </div>
                            <div>
                                <div class="number">{{ $patients->where('patient_status', '1')->count() }}</div>
                                <div class="label">Active Patients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div>
                                <div class="number">{{ $patients->where('patient_status', '0')->count() }}</div>
                                <div class="label">Discharged</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div>
                                <div class="number">{{ $patients->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                                <div class="label">This Week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <div class="number">{{ $patients->count() }}</div>
                                <div class="label">Total Patients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Search Patients</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Name, ID, or Phone..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select class="form-control select2" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="1">Active</option>
                                <option value="0">Discharged</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Doctor</label>
                            <select class="form-control select2" id="doctorFilter">
                                <option value="">All Doctors</option>
                                @foreach(\App\Models\User::role('doctors')->get() as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Date Range</label>
                            <input type="date" class="form-control" id="dateFrom">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">To</label>
                            <input type="date" class="form-control" id="dateTo">
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Patients Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Patient Records</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshTable()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-download me-1"></i>Export
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="exportToExcel()">Export to Excel</a></li>
                                <li><a class="dropdown-item" href="#" onclick="exportToPDF()">Export to PDF</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="patientsTable">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Info</th>
                                    <th>Contact</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Admission Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-primary">#{{ $patient->unique_number ?? $patient->id }}</div>
                                        <small class="text-muted">ID: {{ $patient->id }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $patient->name ?? 'N/A' }}</div>
                                                <small class="text-muted">{{ $patient->age ?? 'N/A' }} years old</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div><i class="fas fa-phone me-1"></i> {{ $patient->phone ?? 'N/A' }}</div>
                                            <div><i class="fas fa-envelope me-1"></i> {{ $patient->email ?? 'N/A' }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($patient->doctor)
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                 style="width: 30px; height: 30px;">
                                                <i class="fas fa-user-md text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $patient->doctor->name }}</div>
                                                <small class="text-muted">Doctor</small>
                                            </div>
                                        </div>
                                        @else
                                        <span class="text-muted">Not assigned</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($patient->patient_status == '1')
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Discharged</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($patient->payment_status == '1')
                                        <span class="badge bg-success">Paid</span>
                                        @else
                                        <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $patient->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin-new.patient-full-report', $patient->id) }}" 
                                               class="btn btn-sm btn-success" 
                                               title="View Full Report"
                                               style="min-width: 40px;">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('admin-new.patient-full-report', $patient->id) }}">
                                                        <i class="fas fa-info-circle me-2"></i>View Details
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="editPatient({{ $patient->id }})">
                                                        <i class="fas fa-edit me-2"></i>Edit Patient
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="viewMedicalHistory({{ $patient->id }})">
                                                        <i class="fas fa-file-medical me-2"></i>Medical History
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="generateReport({{ $patient->id }})">
                                                        <i class="fas fa-file-pdf me-2"></i>Generate PDF
                                                    </a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    @if($patient->patient_status == '1')
                                                    <li><a class="dropdown-item text-warning" href="#" onclick="dischargePatient({{ $patient->id }})">
                                                        <i class="fas fa-sign-out-alt me-2"></i>Discharge Patient
                                                    </a></li>
                                                    @endif
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deletePatient({{ $patient->id }})">
                                                        <i class="fas fa-trash me-2"></i>Delete Patient
                                                    </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Patient Modal -->
<div class="modal fade" id="editPatientModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editPatientForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Same form fields as add patient -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_age" class="form-label">Age *</label>
                            <input type="number" class="form-control" id="edit_age" name="age" required min="0" max="120">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="edit_phone" name="phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_gender" class="form-label">Gender *</label>
                            <select class="form-control" id="edit_gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_doctor_id" class="form-label">Assigned Doctor *</label>
                            <select class="form-control select2" id="edit_doctor_id" name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach(\App\Models\User::role('doctors')->get() as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit_address" class="form-label">Address</label>
                            <textarea class="form-control" id="edit_address" name="address" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit_medical_history" class="form-label">Medical History</label>
                            <textarea class="form-control" id="edit_medical_history" name="medical_history" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Patient
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('#patientsTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Filter functionality
    $('#statusFilter, #doctorFilter').on('change', function() {
        filterTable();
    });

    // Date range filter
    $('#dateFrom, #dateTo').on('change', function() {
        filterTable();
    });

});

// Filter table based on selected filters
function filterTable() {
    const status = $('#statusFilter').val();
    const doctor = $('#doctorFilter').val();
    const dateFrom = $('#dateFrom').val();
    const dateTo = $('#dateTo').val();
    
    $('#patientsTable tbody tr').each(function() {
        let show = true;
        
        if (status && !$(this).find('.badge').text().toLowerCase().includes(status === '1' ? 'active' : 'discharged')) {
            show = false;
        }
        
        if (doctor && !$(this).text().includes(doctor)) {
            show = false;
        }
        
        // Add date filtering logic here
        
        $(this).toggle(show);
    });
}

// Clear all filters
function clearFilters() {
    $('#searchInput').val('');
    $('#statusFilter').val('').trigger('change');
    $('#doctorFilter').val('').trigger('change');
    $('#dateFrom').val('');
    $('#dateTo').val('');
    $('#patientsTable tbody tr').show();
}

// Refresh table
function refreshTable() {
    location.reload();
}

// Edit patient
function editPatient(patientId) {
    // Load patient data and populate edit form
    $.get(`/admin/patients/${patientId}`, function(data) {
        $('#edit_name').val(data.name);
        $('#edit_age').val(data.age);
        $('#edit_phone').val(data.phone);
        $('#edit_email').val(data.email);
        $('#edit_gender').val(data.gender);
        $('#edit_doctor_id').val(data.doctor_id).trigger('change');
        $('#edit_address').val(data.address);
        $('#edit_medical_history').val(data.medical_history);
        
        $('#editPatientForm').attr('action', `/admin/patients/${patientId}`);
        $('#editPatientModal').modal('show');
    });
}

// Delete patient
function deletePatient(patientId) {
    confirmDelete('Are you sure you want to delete this patient? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/del-patient/${patientId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('Patient deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting patient: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Discharge patient
function dischargePatient(patientId) {
    Swal.fire({
        title: 'Discharge Patient',
        text: 'Are you sure you want to discharge this patient?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, discharge!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement discharge logic
            showSuccess('Patient discharged successfully!');
            location.reload();
        }
    });
}

// View medical history
function viewMedicalHistory(patientId) {
    // Implement medical history view
    window.open(`/admin/patients/${patientId}/medical-history`, '_blank');
}

// Generate report
function generateReport(patientId) {
    // Implement report generation
    window.open(`/admin/patients/${patientId}/report`, '_blank');
}

// Export functions
function exportPatients() {
    window.open('/admin/patients/export', '_blank');
}

function exportToExcel() {
    window.open('/admin/patients/export/excel', '_blank');
}

function exportToPDF() {
    window.open('/admin/patients/export/pdf', '_blank');
}
</script>
@endsection
