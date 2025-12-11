@extends('admin-new.layouts.main')
@section('title', 'Forms Management')
@section('page-title', 'Forms Management')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="mb-2">Forms Management</h2>
                                <p class="text-muted mb-0">Manage forms and their configurations.</p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormModal">
                                    <i class="fas fa-plus me-2"></i>Add New Form
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forms Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Forms List</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="refreshForms()">
                                <i class="fas fa-sync-alt me-1"></i>Refresh
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="min-height: 400px;">
                            <table class="table table-hover" id="formsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Form Name</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="fw-bold">{{ $form->name }}</div>
                                            </td>
                                            <td>{{ $form->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="editForm({{ $form->id }}, '{{ $form->name }}')">
                                                                <i class="fas fa-edit me-2"></i>Edit
                                                            </a></li>
                                                        <li><a class="dropdown-item text-danger" href="#"
                                                                onclick="deleteForm({{ $form->id }})">
                                                                <i class="fas fa-trash me-2"></i>Delete
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

    <!-- Add/Edit Form Modal -->
    <div class="modal fade" id="addFormModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formForm" action="{{ route('admin-new.save-form') }}" method="POST">
                    @csrf
                    <input type="hidden" name="form_id" id="form_id" value="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Form Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter form name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save me-2"></i>Save Form
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
            $('#formsTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                language: {
                    paginate: {
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                }
            });

            // Form submission
            $('#formForm').on('submit', function(e) {
                const submitButton = $('#submitBtn');
                submitButton.prop('disabled', true);
                submitButton.html('<i class="fas fa-spinner fa-spin me-2"></i>Saving...');
            });

            // Reset modal when closed
            $('#addFormModal').on('hidden.bs.modal', function() {
                $('#form_id').val('');
                $('#name').val('');
                $('#modalTitle').text('Add New Form');
                $('#submitBtn').prop('disabled', false).html('<i class="fas fa-save me-2"></i>Save Form');
            });
        });

        // Edit form
        function editForm(formId, formName) {
            $('#form_id').val(formId);
            $('#name').val(formName);
            $('#modalTitle').text('Edit Form');
            $('#addFormModal').modal('show');
        }

        // Delete form
        function deleteForm(formId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this form!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/admin/admin-new/delete-form/${formId}`;
                }
            });
        }

        // Refresh forms
        function refreshForms() {
            location.reload();
        }
    </script>
@endsection
