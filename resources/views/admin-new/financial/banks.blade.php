@extends('admin-new.layouts.main')
@section('title', 'Banks Management')
@section('page-title', 'Banks Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Banks Management</h2>
                            <p class="text-muted mb-0">Manage bank information and logos for financial transactions.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBankModal">
                                <i class="fas fa-plus me-2"></i>Add New Bank
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Bank Management Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">🏦 Bank Information:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Bank Name:</strong> Official name of the bank</li>
                                <li><strong>Bank Logo:</strong> Official logo image file</li>
                                <li><strong>File Format:</strong> JPG, PNG, GIF, SVG</li>
                                <li><strong>File Size:</strong> Maximum 2MB</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Use high-quality, clear logos</li>
                                <li>• Ensure logos are properly sized</li>
                                <li>• Use official bank logos only</li>
                                <li>• Keep file sizes optimized</li>
                                <li>• Use appropriate file formats</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banks Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Banks List</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshBanks()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="banksTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Bank Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banks as $index => $bank)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($bank->bank_logo)
                                                <img src="{{ asset($bank->bank_logo) }}" 
                                                     alt="{{ $bank->bank_name }} Logo" 
                                                     class="img-thumbnail" 
                                                     style="height: 40px; max-width: 80px; object-fit: contain;">
                                            @else
                                                <span class="text-muted">No Logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $bank->bank_name }}</td>
                                        <td>{{ $bank->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger" 
                                                    onclick="deleteBank({{ $bank->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
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

<!-- Add Bank Modal -->
<div class="modal fade" id="addBankModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-bank') }}" method="POST" id="addBankForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">Bank Name *</label>
                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" 
                               id="bank_name" name="bank_name" placeholder="Enter bank name" required>
                        <div class="form-text">Enter the official name of the bank.</div>
                        @error('bank_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bank_logo" class="form-label">Bank Logo *</label>
                        <input type="file" class="form-control @error('bank_logo') is-invalid @enderror" 
                               id="bank_logo" name="bank_logo" accept="image/*" required>
                        <div class="form-text">Upload the bank's official logo (JPG, PNG, GIF, SVG, max 2MB).</div>
                        @error('bank_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="imagePreview" class="text-center" style="display: none;">
                        <img id="previewImg" src="" alt="Bank Logo Preview" 
                             class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                        <p class="mt-2 text-muted">Logo Preview</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Bank
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
    $('#banksTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        language: {
            emptyTable: "No banks found. Add your first bank.",
            paginate: {
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        }
    });

    // Image preview functionality
    $('#bank_logo').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
                $('#imagePreview').show();
            };
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').hide();
        }
    });

    // Form submission
    $('#addBankForm').on('submit', function(e) {
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
                $('#addBankModal').modal('hide');
                showSuccess('Bank added successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error adding bank: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function deleteBank(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this bank!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin-new.del-bank", ":id") }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    showSuccess('Bank deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting bank: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            });
        }
    });
}

function refreshBanks() {
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
