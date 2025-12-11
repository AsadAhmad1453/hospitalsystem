@extends('admin-new.layouts.main')
@section('title', 'Staff & Permissions')
@section('page-title', 'Staff & Permissions Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Staff & Permissions</h2>
                            <p class="text-muted mb-0">Manage staff roles, permissions, and access levels.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                    <i class="fas fa-plus me-2"></i>Add New Role
                                </button>
                                <button class="btn btn-outline-primary" onclick="bulkUpdatePermissions()">
                                    <i class="fas fa-users-cog me-2"></i>Bulk Update
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
        @php
            $stats = [
                [
                    'count' => $roles->count(),
                    'label' => 'Total Roles',
                    'icon' => 'fas fa-users',
                    'style' => ''
                ],
                [
                    'count' => $permissions->count(),
                    'label' => 'Total Permissions',
                    'icon' => 'fas fa-user-shield',
                    'style' => 'background: linear-gradient(135deg, #28a745 0%, #20c997 100%);'
                ],
                [
                    'count' => $activeUsers ?? 0,
                    'label' => 'Active Users',
                    'icon' => 'fas fa-user-check',
                    'style' => 'background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);'
                ],
                [
                    'count' => $pendingApprovals ?? 0,
                    'label' => 'Pending Approvals',
                    'icon' => 'fas fa-clock',
                    'style' => 'background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);'
                ],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="{{ $stat['style'] }}">
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

    <!-- Roles and Permissions Management -->
    <div class="row">
        <!-- Roles Table -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Roles</h5>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                        <i class="fas fa-plus"></i> Add Role
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Role Name</th>
                                    <th width="80">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr class="role-row {{ $selectedRole && $selectedRole->id == $role->id ? 'table-active' : '' }}" 
                                    onclick="selectRole({{ $role->id }})" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ ucfirst($role->name) }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="event.preventDefault(); event.stopPropagation(); return false;">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editRole({{ $role->id }}, event)">
                                                    <i class="fas fa-edit me-2"></i>Edit Role
                                                </a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="duplicateRole({{ $role->id }}, event)">
                                                    <i class="fas fa-copy me-2"></i>Duplicate
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteRole({{ $role->id }}, event)">
                                                    <i class="fas fa-trash me-2"></i>Delete Role
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

        <!-- Permissions Management -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Permissions Management</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="selectAllPermissions()">
                            <i class="fas fa-check-square me-1"></i>Select All
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="deselectAllPermissions()">
                            <i class="fas fa-square me-1"></i>Deselect All
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($selectedRole)
                    <div class="mb-3">
                        <h6>Managing permissions for: <span class="text-primary">{{ ucfirst($selectedRole->name) }}</span></h6>
                        <p class="text-muted">Select the permissions you want to assign to this role.</p>
                    </div>
                    
                    <form id="permissionsForm" action="{{ route('admin-new.assign-permissions', $selectedRole->id) }}" method="POST">
                        @csrf
                        <!-- Hidden input removed to fix validation error -->
                        
                        <div class="row">
                            @foreach($permissions->groupBy('module') as $module => $modulePermissions)
                            <div class="col-md-6 mb-4">
                                <div class="card border">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 text-capitalize">{{ str_replace('-', ' ', $module) }}</h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach($modulePermissions as $permission)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input permission-checkbox" 
                                                   type="checkbox" 
                                                   name="permissions[]" 
                                                   value="{{ $permission->id }}" 
                                                   id="perm_{{ $permission->id }}"
                                                   {{ $selectedRole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Permissions
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-user-shield fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Select a role to manage permissions</h5>
                        <p class="text-muted">Choose a role from the list to view and edit its permissions.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Users by Role -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Users by Role</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="usersByRoleTable">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Last Active</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\User::with('roles', 'permissions')->get() as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('admin-assets/images/portrait/small/avatar-s-11.jpg') }}" 
                                                 alt="User Avatar" class="rounded-circle me-3" width="40" height="40">
                                            <div>
                                                <div class="fw-bold">{{ $user->name }}</div>
                                                <small class="text-muted">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                        <span class="badge bg-primary me-1">{{ ucfirst($role->name) }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $user->permissions->count() }} permissions</span>
                                    </td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" onclick="event.preventDefault(); event.stopPropagation(); return false;">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewUserPermissions({{ $user->id }}); return false;">
                                                    <i class="fas fa-eye me-2"></i>View Permissions
                                                </a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editUserRole({{ $user->id }}); return false;">
                                                    <i class="fas fa-edit me-2"></i>Edit Role
                                                </a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="resetUserPermissions({{ $user->id }}); return false;">
                                                    <i class="fas fa-refresh me-2"></i>Reset Permissions
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

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('save-role') }}" method="POST" id="addRoleForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Role Name *</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="role_description" class="form-label">Description</label>
                        <textarea class="form-control" id="role_description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="role_guard" class="form-label">Guard Name</label>
                        <input type="text" class="form-control" id="role_guard" name="guard_name" value="web" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editRoleForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_role_name" class="form-label">Role Name *</label>
                        <input type="text" class="form-control" id="edit_role_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_role_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_role_description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- User Permissions Modal -->
<div class="modal fade" id="userPermissionsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="userPermissionsContent">
                <!-- User permissions will be loaded here -->
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
/* Table row styling */
.role-row {
    transition: all 0.3s ease;
}

.role-row:hover {
    background-color: #f8f9fa;
}

.role-row.table-active {
    background-color: #e3f2fd !important;
}

/* Fix dropdown z-index issues */
.dropdown-menu {
    z-index: 1050 !important;
}

.table .dropdown-menu {
    z-index: 1050 !important;
}

.dropdown {
    position: relative !important;
}

/* Ensure dropdown container doesn't clip content */
.table-responsive {
    overflow: visible !important;
}

.card-body {
    overflow: visible !important;
}

/* Permission checkbox styling */
.permission-checkbox {
    transform: scale(1.1);
}

.permission-checkbox:checked {
    background-color: #067a63;
    border-color: #067a63;
}

/* Table styling */
.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.table td {
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: rgba(0,0,0,.075);
}

/* Ensure dropdown container doesn't clip content */
.table-responsive {
    overflow: visible !important;
}

.card-body {
    overflow: visible !important;
}

/* Additional dropdown positioning fixes */
.dropdown-menu.dropdown-menu-end {
    right: 0 !important;
    left: auto !important;
}

.dropdown-menu {
    min-width: 150px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    border: 1px solid rgba(0, 0, 0, 0.15) !important;
}
</style>
@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    // Prevent page reload on dropdown button clicks
    $('.dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    });

    // Form submission
    $('#addRoleForm').on('submit', function(e) {
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
                $('#addRoleModal').modal('hide');
                showSuccess('Role created successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error creating role: ' + xhr.responseJSON.message);
            }
        });
    });

    // Edit Role Form submission
    $('#editRoleForm').on('submit', function(e) {
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
                if (response.success) {
                    showSuccess(response.message);
                    $('#editRoleModal').modal('hide');
                    location.reload();
                } else {
                    showError(response.message);
                }
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    showError(xhr.responseJSON.message);
                } else {
                    showError('Error updating role. Please try again.');
                }
            }
        });
    });

    // Permissions form submission
    $('#permissionsForm').on('submit', function(e) {
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
                showSuccess('Permissions updated successfully!');
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error updating permissions: ' + xhr.responseJSON.message);
            }
        });
    });
});

// Select role
function selectRole(roleId) {
    window.location.href = `/admin/admin-new/staff/select-role/${roleId}`;
}

// Select all permissions
function selectAllPermissions() {
    $('.permission-checkbox').prop('checked', true);
}

// Deselect all permissions
function deselectAllPermissions() {
    $('.permission-checkbox').prop('checked', false);
}

// Edit role
function editRole(roleId) {
    $.get(`/admin/admin-new/roles/${roleId}`, function(data) {
        $('#edit_role_name').val(data.name);
        $('#edit_role_description').val(data.description);
        
        $('#editRoleForm').attr('action', `/admin/admin-new/update-role/${roleId}`);
        $('#editRoleModal').modal('show');
    });
}

// Delete role
function deleteRole(roleId) {
    confirmDelete('Are you sure you want to delete this role? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/admin-new/delete-role/${roleId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('Role deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting role: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Duplicate role
function duplicateRole(roleId) {
    Swal.fire({
        title: 'Duplicate Role',
        text: 'Are you sure you want to duplicate this role?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, duplicate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement duplicate logic
            showSuccess('Role duplicated successfully!');
        }
    });
}

// View user permissions
function viewUserPermissions(userId) {
    $.get(`/admin/admin-new/users/${userId}/permissions`, function(data) {
        $('#userPermissionsContent').html(`
            <div class="row">
                <div class="col-md-4">
                    <img src="${data.profile_pic ? '/storage/' + data.profile_pic : '/admin-assets/images/portrait/small/avatar-s-11.jpg'}" 
                         alt="User Avatar" class="rounded-circle mb-3" width="80" height="80">
                    <h5>${data.name}</h5>
                    <p class="text-muted">${data.email}</p>
                </div>
                <div class="col-md-8">
                    <h6>Roles:</h6>
                    <div class="mb-3">
                        ${data.roles.map(role => `<span class="badge bg-primary me-1">${role.name}</span>`).join('')}
                    </div>
                    <h6>Direct Permissions:</h6>
                    <div class="row">
                        ${data.permissions.map(permission => `
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info">${permission.name}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `);
        $('#userPermissionsModal').modal('show');
    });
}

// Edit user role
function editUserRole(userId) {
    // Implement edit user role logic
    showSuccess('Edit user role functionality coming soon!');
}

// Reset user permissions
function resetUserPermissions(userId) {
    Swal.fire({
        title: 'Reset Permissions',
        text: 'Are you sure you want to reset this user\'s permissions to their role defaults?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reset!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement reset logic
            showSuccess('User permissions reset successfully!');
        }
    });
}

// Bulk update permissions
function bulkUpdatePermissions() {
    showSuccess('Bulk update functionality coming soon!');
}

// Edit role function
function editRole(roleId, event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    console.log('Edit role called with ID:', roleId); // Debug log
    
    // Get role data
    $.get(`/admin/admin-new/roles/${roleId}`)
        .done(function(data) {
            $('#edit_role_name').val(data.name);
            $('#edit_role_description').val(data.description || '');
            $('#editRoleForm').attr('action', `/admin/admin-new/roles/${roleId}`);
            $('#editRoleModal').modal('show');
        })
        .fail(function(xhr) {
            showError('Error loading role data. Please try again.');
        });
}

// Delete role function
function deleteRole(roleId, event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    console.log('Delete role called with ID:', roleId); // Debug log
    
    Swal.fire({
        title: 'Delete Role',
        text: 'Are you sure you want to delete this role? This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        console.log('SweetAlert result:', result); // Debug log
        
        if (result.isConfirmed) {
            console.log('User confirmed deletion, making AJAX request...'); // Debug log
            
            $.ajax({
                url: `/admin/admin-new/roles/${roleId}`,
                type: 'DELETE',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Delete success:', response); // Debug log
                    showSuccess('Role deleted successfully!');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    console.log('Delete error:', xhr); // Debug log
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        showError(xhr.responseJSON.message);
                    } else {
                        showError('Error deleting role. Please try again.');
                    }
                }
            });
        } else {
            console.log('User cancelled deletion'); // Debug log
        }
    });
}

// Duplicate role function
function duplicateRole(roleId, event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    console.log('Duplicate role called with ID:', roleId); // Debug log
    showSuccess('Duplicate role functionality coming soon!');
}
</script>
@endsection
