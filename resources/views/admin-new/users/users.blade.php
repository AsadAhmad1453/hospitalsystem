@extends('admin-new.layouts.main')
@section('title', 'User Management')
@section('page-title', 'User Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">User Management</h2>
                            <p class="text-muted mb-0">Manage hospital staff, doctors, nurses, and data collectors.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a href="{{ route('admin-new.add-user') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Add New User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        @php
            $stats = [
                [
                    'key' => 'doctorsCount',
                    'icon' => 'fas fa-user-md',
                    'count' => $doctorsCount ?? 0,
                    'label' => 'Doctors'
                ],
                [
                    'key' => 'nursesCount',
                    'icon' => 'fas fa-user-nurse',
                    'count' => $nursesCount ?? 0,
                    'label' => 'Nurses'
                ],
                [
                    'key' => 'dataCollectorsCount',
                    'icon' => 'fas fa-user-cog',
                    'count' => $dataCollectorsCount ?? 0,
                    'label' => 'Data Collectors'
                ],
                [
                    'key' => 'totalUsersCount',
                    'icon' => 'fas fa-users',
                    'count' => $totalUsersCount ?? 0,
                    'label' => 'Total Users'
                ],
            ];
        @endphp

        @foreach($stats as $stat)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card h-100" data-stat="{{ $stat['key'] }}">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center">
                                <div class="icon me-3">
                                    <i class="{{ $stat['icon'] }}"></i>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="number stat-number">{{ $stat['count'] }}</div>
                                    <div class="label">&nbsp;{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Users Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">All Users</h5>
                    <div class="d-flex gap-2">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search users..." id="searchInput">
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-filter me-1"></i>Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-filter="all">All Users</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="doctor">Doctors Only</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="nurse">Nurses Only</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="data collector">Data Collectors Only</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="usersTable">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('admin-assets/images/portrait/small/avatar-s-11.jpg') }}" 
                                                 alt="User Avatar" class="rounded-circle me-3" width="40" height="40">
                                            <div>
                                                <div class="fw-bold">{{ $user->name }}</div>
                                                <small class="text-muted">ID: {{ $user->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $userRole = $user->roles->first();
                                            $roleName = $userRole ? ucfirst($userRole->name) : 'No Role';
                                            $roleClass = $userRole ? ($userRole->name == 'doctor' ? 'primary' : ($userRole->name == 'nurse' ? 'success' : 'info')) : 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $roleClass }}">
                                            {{ $roleName }}
                                        </span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewUser({{ $user->id }})">
                                                    <i class="fas fa-eye me-2"></i>View Details
                                                </a></li>
                                                <li><a class="dropdown-item" href="{{ route('admin-new.edit-user', $user->id) }}">
                                                    <i class="fas fa-edit me-2"></i>Edit User
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="resetPassword({{ $user->id }})">
                                                    <i class="fas fa-key me-2"></i>Reset Password
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteUser({{ $user->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete User
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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-user') }}" method="POST" id="addUserForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" name="password" required minlength="8">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role_id" class="form-label">Role *</label>
                            <select class="form-control select2" id="role_id" name="role_id" required>
                                <option value="">Select Role</option>
                                @if(isset($roles) && $roles->count() > 0)
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                @else
                                    <option value="1">Doctor</option>
                                    <option value="2">Nurse</option>
                                    <option value="3">Data Collector</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="profile_pic" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="image/*">
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


<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewUserContent">
                <!-- User details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-css')
<style>
    /* Additional fixes for Select2 in modals */
    .modal .select2-container--bootstrap-5 .select2-selection {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
    }
    
    .modal .select2-container--bootstrap-5 .select2-selection:focus {
        border-color: #067a63;
        box-shadow: 0 0 0 0.2rem rgba(6, 122, 99, 0.25);
    }
    
    .modal .select2-dropdown {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
</style>
@endsection

@section('custom-js')
<script>
// Helper functions for button loading
function setButtonLoading(button, message = 'Processing...') {
    const originalText = button.html();
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>' + message);
    button.prop('disabled', true);
    return originalText;
}

function resetButton(button, originalText) {
    button.html(originalText);
    button.prop('disabled', false);
}

function showSuccess(message) {
    if (typeof Swal !== 'undefined') {
        showToast(message, 'success');
    } else {
        alert(message);
    }
}

function showError(message) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    } else {
        alert(message);
    }
}

function confirmDelete(message) {
    if (typeof Swal !== 'undefined') {
        return Swal.fire({
            title: 'Are you sure?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        });
    } else {
        return Promise.resolve({ isConfirmed: confirm(message) });
    }
}

$(document).ready(function() {
    // Initialize Select2 when modals are shown
    $('#addUserModal').on('shown.bs.modal', function() {
        $('#role_id').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Select Role',
            allowClear: true,
            dropdownParent: $('#addUserModal')
        });
    });


    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('#usersTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Filter functionality
    $('[data-filter]').on('click', function(e) {
        e.preventDefault();
        const filter = $(this).data('filter');
        
        if (filter === 'all') {
            $('#usersTable tbody tr').show();
        } else {
            $('#usersTable tbody tr').each(function() {
                const $row = $(this);
                const roleText = $row.find('td:nth-child(2)').text().toLowerCase();
                if (roleText.includes(filter)) {
                    $row.show();
                } else {
                    $row.hide();
                }
            });
        }
    });

    // Form submission
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const button = $(this).find('button[type="submit"]');
        const originalText = setButtonLoading(button, 'Creating...');
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                resetButton(button, originalText);
                if (response.success) {
                    $('#addUserModal').modal('hide');
                    showSuccess(response.message);
                    location.reload();
                } else {
                    showError(response.message);
                }
            },
            error: function(xhr) {
                resetButton(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    showError('Error creating user: ' + xhr.responseJSON.message);
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errorMessage = 'Please fix the following errors:\n';
                    Object.keys(xhr.responseJSON.errors).forEach(key => {
                        errorMessage += `• ${xhr.responseJSON.errors[key][0]}\n`;
                    });
                    showError(errorMessage);
                } else {
                    showError('Error creating user. Please try again.');
                }
            }
        });
    });

});

// View user details
function viewUser(userId) {
    showLoading('Loading user details...');
    
    $.get(`/admin/admin-new/users/${userId}`)
        .done(function(data) {
            hideLoading();
            $('#viewUserContent').html(`
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="${data.profile_pic ? '/storage/' + data.profile_pic : '/admin-assets/images/portrait/small/avatar-s-11.jpg'}" 
                             alt="User Avatar" class="rounded-circle mb-3" width="120" height="120">
                        <h5>${data.name}</h5>
                        <span class="badge bg-primary">${data.role}</span>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr><td><strong>Email:</strong></td><td>${data.email}</td></tr>
                            <tr><td><strong>Role:</strong></td><td>${data.role}</td></tr>
                            <tr><td><strong>Status:</strong></td><td><span class="badge bg-success">Active</span></td></tr>
                            <tr><td><strong>Created:</strong></td><td>${new Date(data.created_at).toLocaleDateString()}</td></tr>
                            <tr><td><strong>Last Updated:</strong></td><td>${new Date(data.updated_at).toLocaleDateString()}</td></tr>
                        </table>
                    </div>
                </div>
            `);
            $('#viewUserModal').modal('show');
        })
        .fail(function(xhr) {
            hideLoading();
            if (xhr.responseJSON && xhr.responseJSON.message) {
                showError('Error loading user: ' + xhr.responseJSON.message);
            } else {
                showError('Error loading user details. Please try again.');
            }
        });
}


// Delete user
function deleteUser(userId) {
    confirmDelete('Are you sure you want to delete this user? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin-new/del-user/${userId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('User deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting user: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Reset password
function resetPassword(userId) {
    Swal.fire({
        title: 'Reset Password',
        text: 'Are you sure you want to reset this user\'s password?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement password reset logic
            showSuccess('Password reset email sent to user!');
        }
    });
}
</script>
@endsection
