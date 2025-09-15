@extends('admin-new.layouts.main')
@section('title', 'Dosage Management')
@section('page-title', 'Dosage Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Dosage Management</h2>
                            <p class="text-muted mb-0">Manage medicine dosage timings and schedules.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDosageModal">
                                <i class="fas fa-plus me-2"></i>Add New Dosage
                            </button>
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Dosage Management Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">💊 Common Dosage Types:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Once Daily:</strong> Once per day</li>
                                <li><strong>Twice Daily:</strong> Every 12 hours</li>
                                <li><strong>Three Times Daily:</strong> Every 8 hours</li>
                                <li><strong>Four Times Daily:</strong> Every 6 hours</li>
                                <li><strong>As Needed:</strong> When required</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Use clear, standardized terminology</li>
                                <li>• Include specific timing instructions</li>
                                <li>• Consider patient convenience</li>
                                <li>• Document special requirements</li>
                                <li>• Keep dosage schedules simple</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dosage Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Dosage List</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshDosage()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dosageTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dosage</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dosage as $index => $dose)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-clock text-primary me-2"></i>
                                                <span class="fw-medium">{{ $dose->dose }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $dose->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                                        onclick="deleteDosage({{ $dose->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-clock fa-3x mb-3"></i>
                                                <p>No dosage timings found. Add your first dosage schedule.</p>
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

<!-- Add Dosage Modal -->
<div class="modal fade" id="addDosageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Dosage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-dose') }}" method="POST" id="addDosageForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dose" class="form-label">Dosage Timing *</label>
                        <input type="text" class="form-control @error('dose') is-invalid @enderror" 
                               id="dose" name="dose" placeholder="e.g., Once Daily, Twice Daily, Every 8 hours" required>
                        <div class="form-text">Enter the dosage timing or frequency (e.g., "Once Daily", "Every 6 hours").</div>
                        @error('dose')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Dosage
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
    $('#dosageTable').DataTable({
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
    $('#addDosageForm').on('submit', function(e) {
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
                $('#addDosageModal').modal('hide');
                showSuccess('Dosage added successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error adding dosage: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function deleteDosage(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this dosage timing!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin-new.del-dose", ":id") }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    showSuccess('Dosage deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting dosage: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            });
        }
    });
}

function refreshDosage() {
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
