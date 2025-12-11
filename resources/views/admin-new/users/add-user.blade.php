@extends('admin-new.layouts.main')
@section('title', 'Add New User')
@section('page-title', 'Add New User')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Add New User</h2>
                            <p class="text-muted mb-0">Create a new user account with appropriate role and permissions.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('admin-new.users') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instructions Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>User Creation Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">👥 User Roles Explained:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Doctor:</strong> Can view patients, create medical records</li>
                                <li><strong>Nurse:</strong> Can assist with patient care and data entry</li>
                                <li><strong>Data Collector:</strong> Can collect patient information</li>
                                <li><strong>Admin:</strong> Full system access and management</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Security Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Use strong passwords (8+ characters)</li>
                                <li>• Assign appropriate roles only</li>
                                <li>• Use professional email addresses</li>
                                <li>• Upload clear profile pictures</li>
                                <li>• Verify user identity before creation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>User Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-new.save-user') }}" method="POST" id="addUserForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-12 mb-4">
                                <h6 class="text-primary border-bottom pb-2">Basic Information</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" placeholder="Enter full name" required>
                                <div class="form-text">Enter the user's complete name as it should appear in the system.</div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" placeholder="Enter email address" required>
                                <div class="form-text">This will be used for login and system notifications.</div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Security & Access -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Security & Access</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Enter password" 
                                           required minlength="8">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                <div class="form-text">Password must be at least 8 characters long.</div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="role_id" class="form-label">
                                    Role <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('role_id') is-invalid @enderror" 
                                        id="role_id" name="role_id" required>
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
                                <div class="form-text">Select the appropriate role for this user.</div>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Picture -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Profile Picture</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="profile_pic" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" 
                                       id="profile_pic" name="profile_pic" accept="image/*" onchange="previewImage(this)">
                                <div class="form-text">Upload a clear profile picture (JPG, PNG, GIF).</div>
                                @error('profile_pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <div id="imagePreview" class="text-center" style="display: none;">
                                    <img id="previewImg" src="" alt="Profile Preview" 
                                         class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                    <p class="mt-2 text-muted">Profile Preview</p>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-new.users') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary me-2" onclick="previewUser()">
                                            <i class="fas fa-eye me-2"></i>Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Create User
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="row mt-4" id="previewSection" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>User Preview</h5>
                </div>
                <div class="card-body">
                    <div id="previewContent">
                        <!-- Preview content will be generated here -->
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
    // Initialize Select2
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });

    // Form submission
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const button = $(this).find('button[type="submit"]');
        const originalText = button.html();
        
        // Show loading state
        button.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
        button.prop('disabled', true);
        
        // Clear previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showSuccess(response.message);
                    setTimeout(function() {
                        window.location.href = '{{ route("admin-new.users") }}';
                    }, 1500);
                } else {
                    showError(response.message);
                    button.html(originalText);
                    button.prop('disabled', false);
                }
            },
            error: function(xhr) {
                button.html(originalText);
                button.prop('disabled', false);
                
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                } else {
                    let errorMessage = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    showError(errorMessage);
                }
            }
        });
    });

});

function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewUser() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const roleId = document.getElementById('role_id').value;
    const profilePic = document.getElementById('profile_pic').files[0];
    
    if (!name || !email || !roleId) {
        showError('Please fill in the required fields first.');
        return;
    }
    
    const roleText = document.getElementById('role_id').selectedOptions[0].text;
    
    let previewHtml = `
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-primary">${name}</h5>
                <p class="mb-2"><strong>Email:</strong> ${email}</p>
                <p class="mb-2"><strong>Role:</strong> <span class="badge bg-info">${roleText}</span></p>
                <p class="mb-0"><strong>Status:</strong> <span class="badge bg-success">Active</span></p>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    ${profilePic ? 
                        `<img src="${URL.createObjectURL(profilePic)}" alt="Profile" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">` :
                        `<i class="fas fa-user-circle text-muted" style="font-size: 4rem;"></i>`
                    }
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('previewContent').innerHTML = previewHtml;
    document.getElementById('previewSection').style.display = 'block';
    
    // Scroll to preview
    document.getElementById('previewSection').scrollIntoView({ behavior: 'smooth' });
}

function showLoading(button) {
    const originalText = button.html();
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
    button.prop('disabled', true);
    return originalText;
}

function hideLoading(button, originalText) {
    button.html(originalText);
    button.prop('disabled', false);
}

function showSuccess(message) {
    // You can implement your success notification here
    alert(message);
}

function showError(message) {
    // You can implement your error notification here
    alert(message);
}

function displayValidationErrors(errors) {
    // Clear previous errors
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    
    // Display new errors
    Object.keys(errors).forEach(field => {
        const input = $(`[name="${field}"]`);
        input.addClass('is-invalid');
        input.after(`<div class="invalid-feedback">${errors[field][0]}</div>`);
    });
}
</script>
@endsection
