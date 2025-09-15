@extends('admin-new.layouts.main')
@section('title', 'Profile Management')
@section('page-title', 'My Profile')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Profile Management</h2>
                            <p class="text-muted mb-0">Manage your personal information and account settings.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-outline-primary" onclick="changePassword()">
                                <i class="fas fa-key me-2"></i>Change Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Profile Information -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic) : asset('admin-assets/images/portrait/small/avatar-s-11.jpg') }}" 
                             alt="Profile Picture" class="rounded-circle mb-3" width="120" height="120" id="profileImage">
                        <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle" 
                                onclick="document.getElementById('profileImageInput').click()" style="width: 35px; height: 35px;">
                            <i class="fas fa-camera"></i>
                        </button>
                        <input type="file" id="profileImageInput" class="d-none" accept="image/*" onchange="uploadProfileImage(this)">
                    </div>
                    
                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
                    <span class="badge bg-primary">{{ Auth::user()->roles->first()->name ?? 'Administrator' }}</span>
                    
                    <div class="mt-4">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-end">
                                    <h5 class="mb-1 text-primary">{{ $userStats['totalLogins'] ?? 0 }}</h5>
                                    <small class="text-muted">Total Logins</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-1 text-success">{{ $userStats['lastLogin'] ?? 'Never' }}</h5>
                                <small class="text-muted">Last Login</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details Form -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-profile') }}" method="POST" id="profileForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       value="{{ Auth::user()->phone ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" id="department" name="department" 
                                       value="{{ Auth::user()->department ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" 
                                       value="{{ Auth::user()->position ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id" 
                                       value="{{ Auth::user()->employee_id ?? '' }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" 
                                       value="{{ Auth::user()->date_of_birth ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" 
                                       value="{{ Auth::user()->emergency_contact ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Settings -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Account Settings</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">Email Notifications</h6>
                            <small class="text-muted">Receive email notifications for important updates</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">SMS Notifications</h6>
                            <small class="text-muted">Receive SMS notifications for urgent matters</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="smsNotifications">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">Two-Factor Authentication</h6>
                            <small class="text-muted">Add an extra layer of security to your account</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Dark Mode</h6>
                            <small class="text-muted">Switch to dark theme</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="darkMode">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Security Settings</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">Password</h6>
                            <small class="text-muted">Last changed 30 days ago</small>
                        </div>
                        <button class="btn btn-outline-primary btn-sm" onclick="changePassword()">
                            Change
                        </button>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">Login Sessions</h6>
                            <small class="text-muted">Manage your active sessions</small>
                        </div>
                        <button class="btn btn-outline-info btn-sm" onclick="viewSessions()">
                            View
                        </button>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-1">API Keys</h6>
                            <small class="text-muted">Manage your API access keys</small>
                        </div>
                        <button class="btn btn-outline-warning btn-sm" onclick="manageApiKeys()">
                            Manage
                        </button>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Account Activity</h6>
                            <small class="text-muted">View your recent account activity</small>
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="viewActivity()">
                            View
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Activity</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Profile Updated</h6>
                                <p class="text-muted mb-1">You updated your personal information</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Password Changed</h6>
                                <p class="text-muted mb-1">Your password was successfully updated</p>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Login from New Device</h6>
                                <p class="text-muted mb-1">You logged in from a new device</p>
                                <small class="text-muted">3 days ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Settings Updated</h6>
                                <p class="text-muted mb-1">You updated your notification preferences</p>
                                <small class="text-muted">1 week ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="changePasswordForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password *</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password *</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required minlength="8">
                        <div class="form-text">Password must be at least 8 characters long.</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password *</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Sessions Modal -->
<div class="modal fade" id="viewSessionsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Active Sessions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Last Active</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fas fa-desktop me-2"></i>
                                    Windows 10 - Chrome
                                </td>
                                <td>New York, NY</td>
                                <td>Now</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger">End Session</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-mobile-alt me-2"></i>
                                    iPhone - Safari
                                </td>
                                <td>New York, NY</td>
                                <td>2 hours ago</td>
                                <td><span class="badge bg-warning">Inactive</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger">End Session</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="endAllSessions()">
                    End All Other Sessions
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-css')
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
$(document).ready(function() {
    // Profile form submission
    $('#profileForm').on('submit', function(e) {
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
                showSuccess('Profile updated successfully!');
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error updating profile: ' + xhr.responseJSON.message);
            }
        });
    });

    // Change password form
    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        const newPassword = $('#new_password').val();
        const confirmPassword = $('#confirm_password').val();
        
        if (newPassword !== confirmPassword) {
            showError('Passwords do not match!');
            return;
        }
        
        const formData = new FormData(this);
        const button = $(this).find('button[type="submit"]');
        const originalText = showLoading(button);
        
        $.ajax({
            url: '/admin/change-password',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                hideLoading(button, originalText);
                $('#changePasswordModal').modal('hide');
                showSuccess('Password changed successfully!');
                $('#changePasswordForm')[0].reset();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error changing password: ' + xhr.responseJSON.message);
            }
        });
    });
});

// Upload profile image
function uploadProfileImage(input) {
    if (input.files && input.files[0]) {
        const formData = new FormData();
        formData.append('profile_pic', input.files[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
        $.ajax({
            url: '/admin/upload-profile-image',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#profileImage').attr('src', response.image_url);
                showSuccess('Profile image updated successfully!');
            },
            error: function(xhr) {
                showError('Error uploading image: ' + xhr.responseJSON.message);
            }
        });
    }
}

// Change password
function changePassword() {
    $('#changePasswordModal').modal('show');
}

// View sessions
function viewSessions() {
    $('#viewSessionsModal').modal('show');
}

// Manage API keys
function manageApiKeys() {
    showSuccess('API key management coming soon!');
}

// View activity
function viewActivity() {
    showSuccess('Activity log coming soon!');
}

// End all sessions
function endAllSessions() {
    Swal.fire({
        title: 'End All Sessions',
        text: 'This will log you out of all other devices. Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, end all sessions!'
    }).then((result) => {
        if (result.isConfirmed) {
            showSuccess('All other sessions ended successfully!');
            $('#viewSessionsModal').modal('hide');
        }
    });
}
</script>
@endsection
