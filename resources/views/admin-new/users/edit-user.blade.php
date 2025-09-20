@extends('admin-new.layouts.main')
@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Edit User</h2>
                            <p class="text-muted mb-0">Update user information, role, and permissions.</p>
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
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Instructions:</strong> Update the user's information below. All fields marked with * are required. 
                Leave the password field blank to keep the current password.
            </div>
        </div>
    </div>

    <!-- Edit User Form -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form id="editUserForm" method="POST" action="{{ route('admin-new.users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-12 mb-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-user me-2"></i>Basic Information
                                </h5>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Security Information -->
                            <div class="col-12 mb-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-shield-alt me-2"></i>Security & Access
                                </h5>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" minlength="8">
                                <small class="text-muted">Leave blank to keep current password</small>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" minlength="8">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="role_id" class="form-label">Role *</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" 
                                        id="role_id" name="role_id" required>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" 
                                                {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Profile Picture -->
                            <div class="col-12 mb-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-image me-2"></i>Profile Picture
                                </h5>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="profile_pic" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" 
                                       id="profile_pic" name="profile_pic" accept="image/*">
                                @error('profile_pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            @if($user->profile_pic)
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Profile Picture</label>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $user->profile_pic) }}" 
                                         alt="Current Profile Picture" 
                                         class="rounded-circle me-3" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <small class="text-muted">Current profile picture</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin-new.users') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="fas fa-save me-2"></i>Update User
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom-js')
<script>
$(document).ready(function() {
    // Simple form submission
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();
        
        // Disable submit button
        submitBtn.prop('disabled', true);
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Updating...');
        
        // Get form data
        const formData = new FormData(this);
        
        // Submit form
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
                if (response.success) {
                    alert('User updated successfully!');
                    window.location.href = "{{ route('admin-new.users') }}";
                } else {
                    alert('Error: ' + (response.message || 'Unknown error'));
                    resetButton(submitBtn, originalText);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert('Error: ' + xhr.responseJSON.message);
                } else {
                    alert('Error updating user. Please try again.');
                }
                
                resetButton(submitBtn, originalText);
            }
        });
    });
});

// Helper function to reset button
function resetButton(button, originalText) {
    button.prop('disabled', false);
    button.html(originalText);
}
</script>
@endsection
