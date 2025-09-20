@extends('admin.layouts.main')
@section('title', 'Admin Dashboard')
@section('content')
 <div class="content-body">
    <!-- Professional Dashboard Header -->
    <div class="admin-page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="card p-2" style="background-color: #f8f9fa; border-radius: 10px;">
                    <h1 class="admin-page-title">
                        Welcome back, {{Auth::user()->name}}!
                    </h1>
                    <p class="admin-page-subtitle">
                        Here's a comprehensive overview of Shafayaat
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <div class="card text-center p-2" style="background-color: #f8f9fa; border-radius: 10px;">
                    <h3 class="admin-stats-value mb-1" id="currentTime">{{ date('H:i') }}</h3>
                    <p class="admin-stats-label mb-0">Current Time</p>
                    <button class="btn btn-sm btn-outline-primary mt-2" onclick="refreshDashboard()" id="refreshBtn">
                        <i class="fas fa-sync-alt"></i> Refresh Stats
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- System Overview Stats -->
    <div class="row ">
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card  p-2" style="background-color: #067a63  ; border-radius: 10px; color: white">
                <div class="d-flex align-items-center">
                    <div class="admin-stats-icon primary ">
                        <i class="fas fa-user-md" style="font-size: 50px"></i>
                    </div>
                    <div class="p-1">
                        <div class="admin-stats-value text-center" style="font-size: 24px; font-weight: 600">{{ $doctorscount ?? 0 }}</div>
                        <div class="admin-stats-label text-center" style="font-size: 14px; font-weight: 600">Total Doctors</div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card p-2" style="background-color: #067a63  ; border-radius: 10px; color: white">
                <div class="d-flex align-items-center">
                    <div class="admin-stats-icon primary">
                        <i class="fas fa-users" style="font-size: 50px"></i>
                    </div>
                    <div class="p-1">
                        <div class="admin-stats-value text-center" style="font-size: 24px; font-weight: 600">{{ $patientscount ?? 0 }}</div>
                        <div class="admin-stats-label text-center" style="font-size: 14px; font-weight: 600">Total Patients</div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card p-2" style="background-color: #067a63  ; border-radius: 10px; color: white">
                <div class="d-flex align-items-center">
                    <div class="admin-stats-icon primary">
                        <i class="fas fa-user-nurse" style="font-size: 50px"></i>
                    </div>
                    <div class="p-1">
                        <div class="admin-stats-value text-center" style="font-size: 24px; font-weight: 600">{{ $nursescount ?? 0 }}</div>
                        <div class="admin-stats-label text-center" style="font-size: 14px; font-weight: 600">Total Nurses</div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card p-2" style="background-color: #067a63 ; border-radius: 10px; color: white">
                <div class="d-flex align-items-center">
                    <div class="admin-stats-icon primary">
                        <i class="fas fa-clipboard-list" style="font-size: 50px"></i>
                    </div>
                    <div class="p-1 justify-content-center">
                        <div class="admin-stats-value text-center" style="font-size: 24px; font-weight: 600">{{ $formscount ?? 0 }}</div>
                        <div class="admin-stats-label text-center" style="font-size: 14px; font-weight: 600">Active Forms</div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="row">
        <!-- System Management Overview -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header" style="background-color: #067a63; color: white;">
                    <h5 class="card-title mb-0" style="color: white">
                        <i class="fas fa-chart-line me-2"></i>
                        System Management Overview
                    </h5>
                </div>
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold mb-3">
                                <i class="fas fa-cogs text-primary me-2"></i>System Components
                            </h6>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center px-0">
                                    <div class="admin-stats-icon primary me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">User Management</h6>
                                        <small class="text-muted">Manage doctors, nurses, and staff</small>
                                    </div>
                                    <a href="{{ route('users') }}" class="btn btn-sm btn-outline-primary">Manage</a>
                                </div>
                                <div class="list-group-item d-flex align-items-center px-0">
                                    <div class="admin-stats-icon success me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Forms & Questions</h6>
                                        <small class="text-muted">Configure patient forms and questions</small>
                                    </div>
                                    <a href="{{ route('forms') }}" class="btn btn-sm btn-outline-success">Manage</a>
                                </div>
                                <div class="list-group-item d-flex align-items-center px-0">
                                    <div class="admin-stats-icon warning me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Services & Settings</h6>
                                        <small class="text-muted">Configure system services</small>
                                    </div>
                                    <a href="{{ route('services') }}" class="btn btn-sm btn-outline-warning">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold mb-3">
                                <i class="fas fa-chart-pie text-info me-2"></i>Medical Services
                            </h6>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="text-center">
                                        <div class="admin-stats-value" style="font-size: 1.5rem;">{{ $medicinescount ?? 0 }}</div>
                                        <div class="admin-stats-label">Medicines</div>
                                        <a href="{{ route('medicines') }}" class="btn btn-sm btn-outline-primary mt-1">Manage</a>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center">
                                        <div class="admin-stats-value" style="font-size: 1.5rem;">{{ $bloodinvcount ?? 0 }}</div>
                                        <div class="admin-stats-label">Blood Tests</div>
                                        <a href="{{ route('blood-investigation') }}" class="btn btn-sm btn-outline-danger mt-1">Manage</a>
                                    </div>
                                        </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center">
                                        <div class="admin-stats-value" style="font-size: 1.5rem;">{{ $xrayscount ?? 0 }}</div>
                                        <div class="admin-stats-label">X-Ray Services</div>
                                        <a href="{{ route('xrays') }}" class="btn btn-sm btn-outline-info mt-1">Manage</a>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center">
                                        <div class="admin-stats-value" style="font-size: 1.5rem;">{{ $ultrasoundscount ?? 0 }}</div>
                                        <div class="admin-stats-label">Ultrasounds</div>
                                        <a href="{{ route('uss') }}" class="btn btn-sm btn-outline-success mt-1">Manage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions Panel -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('users') }}" class="btn btn-primary">
                            <i class="fas fa-users me-2"></i>Manage Users
                        </a>
                        <a href="{{ route('patients') }}" class="btn btn-success">
                            <i class="fas fa-user-injured me-2"></i>View Patients
                        </a>
                        <a href="{{ route('forms') }}" class="btn btn-warning">
                            <i class="fas fa-clipboard-list me-2"></i>Manage Forms
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-info">
                            <i class="fas fa-cogs me-2"></i>System Settings
                        </a>
                        <a href="{{ route('permissions') }}" class="btn btn-secondary">
                            <i class="fas fa-shield-alt me-2"></i>Permissions
                        </a>
                        <a href="{{ route('roles') }}" class="btn btn-dark">
                            <i class="fas fa-user-tag me-2"></i>Roles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical Services Management -->
    <div class="row mb-4">
        <div class="col-12">
                            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-stethoscope me-2"></i>
                        Medical Services Management
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon primary mb-3">
                                    <i class="fas fa-pills"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $medicinescount ?? 0 }}</h4>
                                <p class="admin-stats-label">Medicines</p>
                                <a href="{{ route('medicines') }}" class="btn btn-sm btn-primary">Manage</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon danger mb-3">
                                    <i class="fas fa-tint"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $bloodinvcount ?? 0 }}</h4>
                                <p class="admin-stats-label">Blood Investigations</p>
                                <a href="{{ route('blood-investigation') }}" class="btn btn-sm btn-danger">Manage</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon info mb-3">
                                    <i class="fas fa-x-ray"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $xrayscount ?? 0 }}</h4>
                                <p class="admin-stats-label">X-Ray Services</p>
                                <a href="{{ route('xrays') }}" class="btn btn-sm btn-info">Manage</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon success mb-3">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $ultrasoundscount ?? 0 }}</h4>
                                <p class="admin-stats-label">Ultrasounds</p>
                                <a href="{{ route('uss') }}" class="btn btn-sm btn-success">Manage</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon warning mb-3">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $ctscanscount ?? 0 }}</h4>
                                <p class="admin-stats-label">CT Scans</p>
                                <a href="{{ route('ctscans') }}" class="btn btn-sm btn-warning">Manage</a>
                                        </div>
                                    </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon secondary mb-3">
                                    <i class="fas fa-weight"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $dosagecount ?? 0 }}</h4>
                                <p class="admin-stats-label">Dosage Types</p>
                                <a href="{{ route('dosage') }}" class="btn btn-sm btn-secondary">Manage</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon dark mb-3">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $bankscount ?? 0 }}</h4>
                                <p class="admin-stats-label">Banks</p>
                                <a href="{{ route('banks') }}" class="btn btn-sm btn-dark">Manage</a>
                                        </div>
                                    </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="admin-stats-card text-center">
                                <div class="admin-stats-icon primary mb-3">
                                    <i class="fas fa-link"></i>
                                </div>
                                <h4 class="admin-stats-value">{{ $relationscount ?? 0 }}</h4>
                                <p class="admin-stats-label">Question Relations</p>
                                <a href="{{ route('relations') }}" class="btn btn-sm btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status & Recent Activity -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bell text-warning me-2"></i>System Status
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="admin-stats-icon success me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">System Online</h6>
                                <small class="text-muted">All services are running normally</small>
                            </div>
                            <span class="badge badge-success">Active</span>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="admin-stats-icon primary me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                <i class="fas fa-database"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Database Connected</h6>
                                <small class="text-muted">All data operations working</small>
                            </div>
                            <span class="badge badge-success">Connected</span>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="admin-stats-icon warning me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Security Status</h6>
                                <small class="text-muted">All security measures active</small>
                            </div>
                            <span class="badge badge-success">Secure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history text-info me-2"></i>Quick Access
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="{{ route('question-sections') }}" class="btn btn-outline-primary btn-block">
                                <i class="fas fa-list me-2"></i>Question Sections
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('questions') }}" class="btn btn-outline-success btn-block">
                                <i class="fas fa-question-circle me-2"></i>Questions
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('staff') }}" class="btn btn-outline-warning btn-block">
                                <i class="fas fa-user-tie me-2"></i>Staff Management
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('manage-profile') }}" class="btn btn-outline-info btn-block">
                                <i class="fas fa-user-cog me-2"></i>My Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    'use strict';
    
   
    // Real-time clock update
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', {
            hour12: true,
            hour: '2-digit',
            minute: '2-digit'
        });
        $('#currentTime').text(timeString);
    }
    
    updateClock();
    setInterval(updateClock, 1000);
    
    // Enhanced tooltips
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top',
        trigger: 'hover',
        delay: { show: 500, hide: 100 }
    });
    
    // Auto-refresh stats every 30 seconds
    setInterval(function() {
        // You can add AJAX calls here to refresh real-time data
        console.log('Refreshing dashboard data...');
    }, 30000);
    
    // Enhanced button interactions
    $('.btn').on('click', function() {
        const $btn = $(this);
        $btn.addClass('admin-pulse');
        setTimeout(() => {
            $btn.removeClass('admin-pulse');
        }, 1000);
    });
    
    // Real-time notifications simulation
    function showNotification(message, type = 'info') {
        const notification = $(`
            <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `);
        
        $('body').append(notification);
        
        setTimeout(function() {
            notification.fadeOut(500, function() {
                $(this).remove();
            });
        }, 5000);
    }
    
    // Simulate real-time updates
    setInterval(function() {
        if (Math.random() < 0.1) { // 10% chance every 30 seconds
            showNotification('System running smoothly - all services operational', 'success');
        }
        
        if (Math.random() < 0.05) { // 5% chance every 30 seconds
            showNotification('New patient registration detected', 'info');
        }
    }, 30000);
    
    // Refresh dashboard function
    window.refreshDashboard = function() {
        const refreshBtn = document.getElementById('refreshBtn');
        const originalText = refreshBtn.innerHTML;
        
        refreshBtn.disabled = true;
        refreshBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Refreshing...';
        
        // Clear cache and reload page
        fetch('{{ route("clear-cache") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Dashboard refreshed successfully!', 'success');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                showNotification('Error refreshing dashboard', 'error');
                refreshBtn.disabled = false;
                refreshBtn.innerHTML = originalText;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error refreshing dashboard', 'error');
            refreshBtn.disabled = false;
            refreshBtn.innerHTML = originalText;
        });
    };
});
</script>
@endsection