@extends('admin-new.layouts.main')
@section('title', 'Blood Investigation')
@section('page-title', 'Blood Investigation Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Blood Investigation</h2>
                            <p class="text-muted mb-0">Manage blood tests, lab results, and diagnostic procedures.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group">
                                <a href="{{ route('admin-new.add-blood-test') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Add New Test
                                </a>
                                <button class="btn btn-outline-primary" onclick="importTests()">
                                    <i class="fas fa-upload me-2"></i>Import Tests
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
                                <i class="fas fa-tint"></i>
                            </div>
                            <div>
                                <div class="number">{{ $bloodTests->count() }}</div>
                                <div class="label">Total Tests</div>
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
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <div class="number">{{ $completedTests ?? 0 }}</div>
                                <div class="label">Completed</div>
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
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <div class="number">{{ $pendingTests ?? 0 }}</div>
                                <div class="label">Pending</div>
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
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <div class="number">{{ $abnormalResults ?? 0 }}</div>
                                <div class="label">Abnormal Results</div>
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
                            <label class="form-label">Search Tests</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Test name, patient..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Test Type</label>
                            <select class="form-control" id="typeFilter">
                                <option value="">All Types</option>
                                <option value="cbc">Complete Blood Count</option>
                                <option value="lipid">Lipid Profile</option>
                                <option value="liver">Liver Function</option>
                                <option value="kidney">Kidney Function</option>
                                <option value="diabetes">Diabetes Panel</option>
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

    <!-- Tests Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Blood Investigation Tests</h5>
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
                        <table class="table table-hover data-table" id="bloodTestsTable">
                            <thead>
                                <tr>
                                    <th>Test ID</th>
                                    <th>Patient</th>
                                    <th>Test Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Ordered By</th>
                                    <th>Order Date</th>
                                    <th>Results</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bloodTests as $test)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-primary">#{{ $test->id }}</div>
                                        <small class="text-muted">{{ $test->test_code ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 35px; height: 35px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $test->patient->name ?? 'N/A' }}</div>
                                                <small class="text-muted">{{ $test->patient->phone ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $test->test_name ?? 'N/A' }}</div>
                                        @if($test->description)
                                        <small class="text-muted">{{ Str::limit($test->description, 30) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($test->test_type ?? 'General') }}</span>
                                    </td>
                                    <td>
                                        @switch($test->status ?? 'pending')
                                            @case('completed')
                                                <span class="badge bg-success">Completed</span>
                                                @break
                                            @case('in-progress')
                                                <span class="badge bg-warning">In Progress</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">Pending</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($test->doctor)
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                 style="width: 25px; height: 25px;">
                                                <i class="fas fa-user-md text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $test->doctor->name }}</div>
                                                <small class="text-muted">Doctor</small>
                                            </div>
                                        </div>
                                        @else
                                        <span class="text-muted">Not assigned</span>
                                        @endif
                                    </td>
                                    <td>{{ $test->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($test->status === 'completed')
                                        <div class="d-flex align-items-center">
                                            @if($test->is_abnormal ?? false)
                                            <span class="badge bg-warning me-2">Abnormal</span>
                                            @else
                                            <span class="badge bg-success me-2">Normal</span>
                                            @endif
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewResults({{ $test->id }})">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        @else
                                        <span class="text-muted">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewTest({{ $test->id }})">
                                                    <i class="fas fa-eye me-2"></i>View Details
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="editTest({{ $test->id }})">
                                                    <i class="fas fa-edit me-2"></i>Edit Test
                                                </a></li>
                                                @if($test->status !== 'completed')
                                                <li><a class="dropdown-item" href="#" onclick="updateResults({{ $test->id }})">
                                                    <i class="fas fa-flask me-2"></i>Update Results
                                                </a></li>
                                                @endif
                                                <li><a class="dropdown-item" href="#" onclick="printReport({{ $test->id }})">
                                                    <i class="fas fa-print me-2"></i>Print Report
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteTest({{ $test->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete Test
                                                </a></li>
                                            </ul>
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

<!-- Add Test Modal -->
<div class="modal fade" id="addTestModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Blood Test</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('save-blood-inv') }}" method="POST" id="addTestForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="patient_id" class="form-label">Patient *</label>
                            <select class="form-control select2" id="patient_id" name="patient_id" required>
                                <option value="">Select Patient</option>
                                @foreach(\App\Models\Patient::all() as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }} - {{ $patient->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doctor_id" class="form-label">Ordered By *</label>
                            <select class="form-control select2" id="doctor_id" name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach(\App\Models\User::role('doctor')->get() as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="test_name" class="form-label">Test Name *</label>
                            <input type="text" class="form-control" id="test_name" name="test_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="test_type" class="form-label">Test Type *</label>
                            <select class="form-control" id="test_type" name="test_type" required>
                                <option value="">Select Type</option>
                                <option value="cbc">Complete Blood Count</option>
                                <option value="lipid">Lipid Profile</option>
                                <option value="liver">Liver Function</option>
                                <option value="kidney">Kidney Function</option>
                                <option value="diabetes">Diabetes Panel</option>
                                <option value="thyroid">Thyroid Function</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="test_code" class="form-label">Test Code</label>
                            <input type="text" class="form-control" id="test_code" name="test_code">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="normal">Normal</option>
                                <option value="urgent">Urgent</option>
                                <option value="stat">STAT</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description/Notes</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expected_date" class="form-label">Expected Completion</label>
                            <input type="datetime-local" class="form-control" id="expected_date" name="expected_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cost" class="form-label">Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="cost" name="cost" step="0.01" min="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Test
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Results Modal -->
<div class="modal fade" id="updateResultsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Test Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="updateResultsForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="result_status" class="form-label">Result Status *</label>
                            <select class="form-control" id="result_status" name="status" required>
                                <option value="completed">Completed</option>
                                <option value="in-progress">In Progress</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="is_abnormal" class="form-label">Result Type</label>
                            <select class="form-control" id="is_abnormal" name="is_abnormal">
                                <option value="0">Normal</option>
                                <option value="1">Abnormal</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="results" class="form-label">Test Results</label>
                            <textarea class="form-control" id="results" name="results" rows="6" placeholder="Enter detailed test results..."></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="interpretation" class="form-label">Interpretation</label>
                            <textarea class="form-control" id="interpretation" name="interpretation" rows="4" placeholder="Enter interpretation of results..."></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="recommendations" class="form-label">Recommendations</label>
                            <textarea class="form-control" id="recommendations" name="recommendations" rows="3" placeholder="Enter recommendations..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Results
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Results Modal -->
<div class="modal fade" id="viewResultsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewResultsContent">
                <!-- Results will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printReport()">
                    <i class="fas fa-print me-2"></i>Print Report
                </button>
            </div>
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
        $('#bloodTestsTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Filter functionality
    $('#statusFilter, #typeFilter').on('change', function() {
        filterTable();
    });

    // Form submission
    $('#addTestForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const button = $(this).find('button[type="submit"]');
        const originalText = showLoading(button);
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                hideLoading(button, originalText);
                $('#addTestModal').modal('hide');
                showSuccess('Blood test added successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error adding test: ' + xhr.responseJSON.message);
            }
        });
    });
});

// Filter table
function filterTable() {
    const status = $('#statusFilter').val();
    const type = $('#typeFilter').val();
    
    $('#bloodTestsTable tbody tr').each(function() {
        let show = true;
        
        if (status && !$(this).text().toLowerCase().includes(status.toLowerCase())) {
            show = false;
        }
        
        if (type && !$(this).text().toLowerCase().includes(type.toLowerCase())) {
            show = false;
        }
        
        $(this).toggle(show);
    });
}

// Clear filters
function clearFilters() {
    $('#searchInput').val('');
    $('#statusFilter').val('');
    $('#typeFilter').val('');
    $('#dateFrom').val('');
    $('#dateTo').val('');
    $('#bloodTestsTable tbody tr').show();
}

// Refresh table
function refreshTable() {
    location.reload();
}

// Update results
function updateResults(testId) {
    $('#updateResultsForm').attr('action', `/admin/blood-investigation/${testId}/update-results`);
    $('#updateResultsModal').modal('show');
}

// View results
function viewResults(testId) {
    $.get(`/admin/blood-investigation/${testId}/results`, function(data) {
        $('#viewResultsContent').html(`
            <div class="row">
                <div class="col-md-6">
                    <h6>Test Information</h6>
                    <table class="table table-sm">
                        <tr><td><strong>Test Name:</strong></td><td>${data.test_name}</td></tr>
                        <tr><td><strong>Test Type:</strong></td><td>${data.test_type}</td></tr>
                        <tr><td><strong>Patient:</strong></td><td>${data.patient_name}</td></tr>
                        <tr><td><strong>Ordered By:</strong></td><td>${data.doctor_name}</td></tr>
                        <tr><td><strong>Order Date:</strong></td><td>${new Date(data.created_at).toLocaleDateString()}</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>Results</h6>
                    <div class="p-3 bg-light rounded">
                        <p><strong>Status:</strong> <span class="badge bg-success">${data.status}</span></p>
                        <p><strong>Result Type:</strong> <span class="badge ${data.is_abnormal ? 'bg-warning' : 'bg-success'}">${data.is_abnormal ? 'Abnormal' : 'Normal'}</span></p>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h6>Test Results</h6>
                    <div class="p-3 border rounded">
                        <pre>${data.results || 'No results available'}</pre>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h6>Interpretation</h6>
                    <div class="p-3 border rounded">
                        <p>${data.interpretation || 'No interpretation available'}</p>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h6>Recommendations</h6>
                    <div class="p-3 border rounded">
                        <p>${data.recommendations || 'No recommendations available'}</p>
                    </div>
                </div>
            </div>
        `);
        $('#viewResultsModal').modal('show');
    });
}

// Delete test
function deleteTest(testId) {
    confirmDelete('Are you sure you want to delete this blood test? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/del-blood-inv/${testId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('Blood test deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting test: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Print report
function printReport(testId) {
    window.open(`/admin/blood-investigation/${testId}/print`, '_blank');
}

// Export functions
function exportToExcel() {
    window.open('/admin/blood-investigation/export/excel', '_blank');
}

function exportToPDF() {
    window.open('/admin/blood-investigation/export/pdf', '_blank');
}

// Import tests
function importTests() {
    showSuccess('Import functionality coming soon!');
}
</script>
@endsection
