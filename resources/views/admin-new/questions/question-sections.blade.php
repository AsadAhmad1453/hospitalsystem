@extends('admin-new.layouts.main')
@section('title', 'Question Sections')
@section('page-title', 'Question Sections Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Question Sections</h2>
                            <p class="text-muted mb-0">Manage question sections for forms.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                                <i class="fas fa-plus me-2"></i>Add New Section
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sections Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Sections List</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshSections()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="sectionsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Section Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $section->name }}</div>
                                    </td>
                                    <td>{{ $section->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin-new.del-section', $section->id) }}" 
                                           class="text-danger course-sure" 
                                           data-bs-toggle="tooltip" 
                                           title="Delete Section">
                                            <i class="fas fa-trash"></i>
                                        </a>
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

<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="sectionsForm" action="{{ route('admin-new.save-section') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Section Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" placeholder="Enter section name" 
                               value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Section
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
    $('#sectionsTable').DataTable({
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
    $('#sectionsForm').on('submit', function(e) {
        const submitButton = $('#submitBtn');
        submitButton.prop('disabled', true);
        submitButton.html('<i class="fas fa-spinner fa-spin me-2"></i>Submitting...');
    });

    // Reset modal when closed
    $('#addSectionModal').on('hidden.bs.modal', function () {
        $('#name').val('');
        $('#submitBtn').prop('disabled', false).html('<i class="fas fa-save me-2"></i>Save Section');
    });
});

// Delete section confirmation
$(document).on('click', '.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this Section!",
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'Cancel'
    }).then(function (result) {
        if (result.isConfirmed) {
            window.location.href = approvalLink;
        }
    });
});

// Refresh sections
function refreshSections() {
    location.reload();
}
</script>
@endsection
