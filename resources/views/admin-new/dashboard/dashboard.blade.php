@extends('admin-new.layouts.main')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                            <p class="text-muted mb-0">Here's what's happening at Shafayaat Hospital today.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <div class="me-3">
                                    <div class="fw-bold text-primary">{{ date('l, F j, Y') }}</div>
                                    <small class="text-muted">{{ date('g:i A') }}</small>
                                </div>
                                <div class="bg-primary rounded-circle p-3">
                                    <i class="fas fa-calendar-alt text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" data-stat="doctorsCount">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div>
                                <div class="number stat-number">{{ $doctorscount ?? 0 }}</div>
                                <div class="label">Total Doctors</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="opacity-75">Active Staff</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" data-stat="nursesCount" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <div class="number stat-number">{{ $nursescount ?? 0 }}</div>
                                <div class="label">Total Nurses</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="opacity-75">Care Team</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" data-stat="totalPatients" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-user-injured"></i>
                            </div>
                            <div>
                                <div class="number stat-number">{{ $patientscount ?? 0 }}</div>
                                <div class="label">Total Patients</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="opacity-75">Registered</small>
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
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <div>
                                <div class="number">{{ $servicescount ?? 0 }}</div>
                                <div class="label">Medical Services</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="opacity-75">Available</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Analytics -->
    {{-- <div class="row mb-4">
        <!-- Patient Statistics Chart -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Patient Statistics</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Last 7 Days
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="patientChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <div class="bg-primary rounded-circle p-2 me-3">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $formscount ?? 0 }}</div>
                                    <small class="text-muted">Forms Created</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <div class="bg-success rounded-circle p-2 me-3">
                                    <i class="fas fa-question-circle text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $questionscount ?? 0 }}</div>
                                    <small class="text-muted">Questions Added</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <div class="bg-info rounded-circle p-2 me-3">
                                    <i class="fas fa-layer-group text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $sectionscount ?? 0 }}</div>
                                    <small class="text-muted">Form Sections</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <i class="fas fa-university text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $bankscount ?? 0 }}</div>
                                    <small class="text-muted">Bank Accounts</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Medical Services Overview -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Medical Services Overview</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-xl-3 col-md-6">
                            <div class="text-center p-4 border rounded">
                                <div class="bg-primary rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-capsules text-white fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">{{ $medicinescount ?? 0 }}</h4>
                                <p class="text-muted mb-0">Medicines</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="text-center p-4 border rounded">
                                <div class="bg-danger rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-tint text-white fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">{{ $bloodinvcount ?? 0 }}</h4>
                                <p class="text-muted mb-0">Blood Tests</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="text-center p-4 border rounded">
                                <div class="bg-info rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-x-ray text-white fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">{{ $xrayscount ?? 0 }}</h4>
                                <p class="text-muted mb-0">X-Ray Services</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="text-center p-4 border rounded">
                                <div class="bg-success rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-wave-square text-white fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">{{ $ultrasoundscount ?? 0 }}</h4>
                                <p class="text-muted mb-0">Ultrasounds</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity and Quick Actions -->
    <div class="row">
        <!-- Recent Activity -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Activity</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">New Patient Registered</h6>
                                <p class="text-muted mb-1">John Doe registered for consultation</p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Appointment Scheduled</h6>
                                <p class="text-muted mb-1">Dr. Smith has a new appointment at 3:00 PM</p>
                                <small class="text-muted">15 minutes ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Lab Results Ready</h6>
                                <p class="text-muted mb-1">Blood test results for Patient #1234 are ready</p>
                                <small class="text-muted">1 hour ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">New Service Added</h6>
                                <p class="text-muted mb-1">CT Scan service has been added to the system</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-user-plus me-2"></i>Add New User
                        </button>
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                            <i class="fas fa-plus me-2"></i>Add Medical Service
                        </button>
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addFormModal">
                            <i class="fas fa-file-alt me-2"></i>Create Form
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userName" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="userName" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="userEmail" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userPassword" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="userPassword" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userRole" class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-select" id="userRole" name="role_id" required>
                                <option value="">Select Role</option>
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="userPhone" name="phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="userDepartment" name="department">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">
                    <i class="fas fa-plus me-2"></i>Add Medical Service
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addServiceForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="serviceName" class="form-label">Service Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="serviceName" name="service_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="serviceAmount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="serviceAmount" name="amount" step="0.01" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDetailDescription" class="form-label">Detailed Description</label>
                        <textarea class="form-control" id="serviceDetailDescription" name="detail_description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="serviceImage" name="image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save me-2"></i>Add Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Form Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="addFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">
                    <i class="fas fa-file-alt me-2"></i>Create New Form
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFormForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formName" class="form-label">Form Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="formName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="formDescription" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Create Form
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 0 0 3px #e9ecef;
}

.timeline-content {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
    border-left: 3px solid var(--primary-color);
}
</style>

@endsection

@section('custom-js')
<script>
// Global variables for charts
let patientChart;
let currentPeriod = '7days';

// Patient Statistics Chart - Dynamic
function loadPatientChart(period = '7days') {
    currentPeriod = period;

    // Show loading state
    const ctx = document.getElementById('patientChart').getContext('2d');
    if (patientChart) {
        patientChart.destroy();
    }

    // Show loading indicator
    ctx.fillStyle = '#f8f9fa';
    ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    ctx.fillStyle = '#6c757d';
    ctx.font = '16px Arial';
    ctx.textAlign = 'center';
    ctx.fillText('Loading chart data...', ctx.canvas.width / 2, ctx.canvas.height / 2);

    // Fetch data from API
    $.ajax({
        url: '{{ route("admin-new.api.patient-statistics") }}',
        method: 'GET',
        data: { period: period },
        success: function(response) {
            // Destroy existing chart
            if (patientChart) {
                patientChart.destroy();
            }

            // Create new chart with dynamic data
            patientChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets: response.datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        },
        error: function(xhr) {
            console.error('Error loading chart data:', xhr);
            // Show error message
            ctx.fillStyle = '#dc3545';
            ctx.font = '16px Arial';
            ctx.textAlign = 'center';
            ctx.fillText('Error loading chart data', ctx.canvas.width / 2, ctx.canvas.height / 2);
        }
    });
}

// Initialize chart on page load
$(document).ready(function() {
    loadPatientChart('7days');

    // Period dropdown functionality
    $('.dropdown-item').on('click', function(e) {
        e.preventDefault();
        const period = $(this).text().toLowerCase().replace(/\s+/g, '');
        const periodMap = {
            'last7days': '7days',
            'last30days': '30days',
            'last3months': '3months'
        };

        if (periodMap[period]) {
            loadPatientChart(periodMap[period]);
            $('.dropdown-toggle').text($(this).text());
        }
    });
});

// Real-time clock
function updateClock() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('en-US', {
        hour: 'numeric',
        minute: '2-digit',
        hour12: true
    });
    const dateString = now.toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    // Update time display if element exists
    const timeElement = document.querySelector('.fw-bold.text-primary');
    if (timeElement) {
        timeElement.textContent = dateString;
    }
}

// Update clock every minute
setInterval(updateClock, 60000);
updateClock();

// Auto-refresh statistics every 5 minutes
setInterval(function() {
    loadRealTimeStats();
}, 300000);

// Load real-time statistics
function loadRealTimeStats() {
    $.ajax({
        url: '{{ route("admin-new.api.real-time-stats") }}',
        method: 'GET',
        success: function(response) {
            // Update statistics cards
            $('.stat-card[data-stat="totalPatients"] .stat-number').text(response.totalPatients);
            $('.stat-card[data-stat="totalUsers"] .stat-number').text(response.totalUsers);
            $('.stat-card[data-stat="totalServices"] .stat-number').text(response.totalServices);
            $('.stat-card[data-stat="totalForms"] .stat-number').text(response.totalForms);
            $('.stat-card[data-stat="recentPatients"] .stat-number').text(response.recentPatients);
            $('.stat-card[data-stat="recentUsers"] .stat-number').text(response.recentUsers);
            $('.stat-card[data-stat="doctorsCount"] .stat-number').text(response.doctorsCount);
            $('.stat-card[data-stat="nursesCount"] .stat-number').text(response.nursesCount);
            $('.stat-card[data-stat="completedTests"] .stat-number').text(response.completedTests);
            $('.stat-card[data-stat="pendingTests"] .stat-number').text(response.pendingTests);
            $('.stat-card[data-stat="abnormalResults"] .stat-number').text(response.abnormalResults);
        },
        error: function(xhr) {
            console.error('Error loading real-time stats:', xhr);
        }
    });
}

// Load real-time stats on page load
$(document).ready(function() {
    loadRealTimeStats();

    // Add User Form Handler
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();

        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '{{ route("admin-new.save-user") }}',
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (typeof toastr !== 'undefined') {
                    toastr.success('User created successfully!');
                } else if (typeof Swal !== 'undefined') {
                    showToast('User created successfully!', 'success');
                } else {
                    alert('User created successfully!');
                }
                $('#addUserModal').modal('hide');
                $('#addUserForm')[0].reset();
                loadRealTimeStats(); // Refresh stats
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Please fix the following errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMessage += `• ${errors[key][0]}\n`;
                    });
                    if (typeof toastr !== 'undefined') {
                        toastr.error(errorMessage);
                    } else if (typeof Swal !== 'undefined') {
                        showToast(errorMessage, 'error');
                    } else {
                        alert(errorMessage);
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Error creating user. Please try again.');
                    } else if (typeof Swal !== 'undefined') {
                        showToast('Error creating user. Please try again.', 'error');
                    } else {
                        alert('Error creating user. Please try again.');
                    }
                }
            },
            complete: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });


    // Add Service Form Handler
    $('#addServiceForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();

        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route("admin-new.save-service") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (typeof toastr !== 'undefined') {
                    toastr.success('Service added successfully!');
                } else if (typeof Swal !== 'undefined') {
                    showToast('Service added successfully!', 'success');
                } else {
                    alert('Service added successfully!');
                }
                $('#addServiceModal').modal('hide');
                $('#addServiceForm')[0].reset();
                loadRealTimeStats(); // Refresh stats
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Please fix the following errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMessage += `• ${errors[key][0]}\n`;
                    });
                    if (typeof toastr !== 'undefined') {
                        toastr.error(errorMessage);
                    } else if (typeof Swal !== 'undefined') {
                        showToast(errorMessage, 'error');
                    } else {
                        alert(errorMessage);
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Error adding service. Please try again.');
                    } else if (typeof Swal !== 'undefined') {
                        showToast('Error adding service. Please try again.', 'error');
                    } else {
                        alert('Error adding service. Please try again.');
                    }
                }
            },
            complete: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });

    // Add Form Form Handler
    $('#addFormForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();

        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: '{{ route("admin-new.save-form") }}',
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (typeof toastr !== 'undefined') {
                    toastr.success('Form created successfully!');
                } else if (typeof Swal !== 'undefined') {
                    showToast('Form created successfully!', 'success');
                } else {
                    alert('Form created successfully!');
                }
                $('#addFormModal').modal('hide');
                $('#addFormForm')[0].reset();
                loadRealTimeStats(); // Refresh stats
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Please fix the following errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMessage += `• ${errors[key][0]}\n`;
                    });
                    if (typeof toastr !== 'undefined') {
                        toastr.error(errorMessage);
                    } else if (typeof Swal !== 'undefined') {
                        showToast(errorMessage, 'error');
                    } else {
                        alert(errorMessage);
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Error creating form. Please try again.');
                    } else if (typeof Swal !== 'undefined') {
                        showToast('Error creating form. Please try again.', 'error');
                    } else {
                        alert('Error creating form. Please try again.');
                    }
                }
            },
            complete: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });

    // Reset forms when modals are hidden
    $('#addUserModal, #addServiceModal, #addFormModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('button[type="submit"]').prop('disabled', false);
    });
});
</script>
@endsection
