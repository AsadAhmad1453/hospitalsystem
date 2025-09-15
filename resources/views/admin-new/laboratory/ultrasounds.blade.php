@extends('admin-new.layouts.main')
@section('title', 'Ultrasounds Management')
@section('page-title', 'Ultrasounds Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Ultrasounds Management</h2>
                            <p class="text-muted mb-0">Manage ultrasound services and procedures.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUltrasoundModal">
                                <i class="fas fa-plus me-2"></i>Add New Ultrasound
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ultrasounds Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Ultrasounds List</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshUltrasounds()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ultrasoundsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ultrasound Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($uss as $index => $us)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-ultrasound text-primary me-2"></i>
                                                <span class="fw-medium">{{ $us->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $us->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                                        onclick="deleteUltrasound({{ $us->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-ultrasound fa-3x mb-3"></i>
                                                <p>No ultrasounds found. Add your first ultrasound service.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Ultrasound Modal -->
<div class="modal fade" id="addUltrasoundModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Ultrasound</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-us') }}" method="POST" id="addUltrasoundForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Ultrasound Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" placeholder="Enter ultrasound name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Ultrasound
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
    // Initialize DataTable
    $('#ultrasoundsTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        language: {
            paginate: {
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        }
    });

    // Form submission
    $('#addUltrasoundForm').on('submit', function(e) {
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
                $('#addUltrasoundModal').modal('hide');
                showSuccess('Ultrasound added successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error adding ultrasound: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function deleteUltrasound(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this ultrasound service!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin-new.del-us", ":id") }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    showSuccess('Ultrasound deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting ultrasound: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            });
        }
    });
}

function refreshUltrasounds() {
    location.reload();
}

function showLoading(button) {
    const originalText = button.html();
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
    button.prop('disabled', true);
    return originalText;
}

function hideLoading(button, originalText) {
    button.html(originalText);
    button.prop('disabled', false);
}

function showSuccess(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 3000,
        showConfirmButton: false
    });
}

function showError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message
    });
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
