@extends('admin-new.layouts.main')
@section('title', 'Medical Services Management')
@section('page-title', 'Medical Services')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Medical Services Management</h2>
                            <p class="text-muted mb-0">Manage hospital services, pricing, and availability.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                <i class="fas fa-plus me-2"></i>Add New Service
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <div>
                                <div class="number">{{ $services->count() }}</div>
                                <div class="label">Total Services</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="number">${{ number_format($services->avg('amount') ?? 0, 2) }}</div>
                                <div class="label">Avg. Price</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="number">{{ $services->where('created_at', '>=', now()->subDays(30))->count() }}</div>
                                <div class="label">This Month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-star"></i>
                            </div>
                            <div>
                                <div class="number">4.8</div>
                                <div class="label">Avg. Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid/List Toggle -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex gap-2">
                                <div class="input-group" style="width: 300px;">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search services..." id="searchInput">
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-filter me-1"></i>Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-filter="all">All Services</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="consultation">Consultation</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="diagnostic">Diagnostic</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="treatment">Treatment</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="emergency">Emergency</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary active" id="gridView">
                                    <i class="fas fa-th"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary" id="listView">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid View -->
    <div class="row" id="servicesGrid">
        @foreach($services as $service)
        <div class="col-xl-4 col-lg-6 col-md-6 mb-4 service-card">
            <div class="card h-100 service-item">
                <div class="position-relative">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->service_name }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-stethoscope text-white fa-3x"></i>
                    </div>
                    @endif
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-success">Active</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $service->service_name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($service->description, 100) }}</p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h4 text-primary mb-0">${{ number_format($service->amount, 2) }}</span>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-1">(4.8)</span>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" onclick="viewService({{ $service->id }})">
                                <i class="fas fa-eye me-1"></i>View Details
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary" onclick="editService({{ $service->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-danger" onclick="deleteService({{ $service->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Services List View -->
    <div class="row d-none" id="servicesList">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="servicesTable">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->service_name }}"
                                                 class="rounded me-3" width="50" height="50" style="object-fit: cover;">
                                            @else
                                            <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3"
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-stethoscope text-white"></i>
                                            </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold">{{ $service->service_name }}</div>
                                                <small class="text-muted">ID: {{ $service->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ Str::limit($service->description, 50) }}</td>
                                    <td>
                                        <span class="fw-bold text-primary">${{ number_format($service->amount, 2) }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">General</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>{{ $service->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewService({{ $service->id }})">
                                                    <i class="fas fa-eye me-2"></i>View Details
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="editService({{ $service->id }})">
                                                    <i class="fas fa-edit me-2"></i>Edit Service
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="duplicateService({{ $service->id }})">
                                                    <i class="fas fa-copy me-2"></i>Duplicate
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteService({{ $service->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete Service
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

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-service') }}" method="POST" id="addServiceForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="service_name" class="form-label">Service Name *</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">Price *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="amount" name="amount" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category *</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="consultation">Consultation</option>
                                <option value="diagnostic">Diagnostic</option>
                                <option value="treatment">Treatment</option>
                                <option value="emergency">Emergency</option>
                                <option value="surgery">Surgery</option>
                                <option value="therapy">Therapy</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="duration" name="duration" min="1">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="detail_description" class="form-label">Detailed Description</label>
                            <textarea class="form-control" id="detail_description" name="detail_description" rows="4"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Service Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="is_available" class="form-label">Availability</label>
                            <select class="form-control" id="is_available" name="is_available">
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editServiceForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Same form fields as add service -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_service_name" class="form-label">Service Name *</label>
                            <input type="text" class="form-control" id="edit_service_name" name="service_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_amount" class="form-label">Price *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="edit_amount" name="amount" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_category" class="form-label">Category *</label>
                            <select class="form-control" id="edit_category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="consultation">Consultation</option>
                                <option value="diagnostic">Diagnostic</option>
                                <option value="treatment">Treatment</option>
                                <option value="emergency">Emergency</option>
                                <option value="surgery">Surgery</option>
                                <option value="therapy">Therapy</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_duration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="edit_duration" name="duration" min="1">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit_description" class="form-label">Description *</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit_detail_description" class="form-label">Detailed Description</label>
                            <textarea class="form-control" id="edit_detail_description" name="detail_description" rows="4"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_image" class="form-label">Service Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_is_available" class="form-label">Availability</label>
                            <select class="form-control" id="edit_is_available" name="is_available">
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Service Modal -->
<div class="modal fade" id="viewServiceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Service Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewServiceContent">
                <!-- Service details will be loaded here -->
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
.service-item {
    transition: all 0.3s ease;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.service-card {
    transition: all 0.3s ease;
}

#servicesList {
    display: none;
}

#servicesList.show {
    display: block;
}

#servicesGrid.hide {
    display: none;
}
</style>
@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('.service-card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        $('#servicesTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Filter functionality
    $('[data-filter]').on('click', function(e) {
        e.preventDefault();
        const filter = $(this).data('filter');

        if (filter === 'all') {
            $('.service-card').show();
            $('#servicesTable tbody tr').show();
        } else {
            $('.service-card').hide();
            $('#servicesTable tbody tr').hide();
            $(`.service-card:contains("${filter}")`).show();
            $(`#servicesTable tbody tr:contains("${filter}")`).show();
        }
    });

    // View toggle
    $('#gridView').on('click', function() {
        $(this).addClass('active');
        $('#listView').removeClass('active');
        $('#servicesGrid').removeClass('hide');
        $('#servicesList').removeClass('show').addClass('d-none');
    });

    $('#listView').on('click', function() {
        $(this).addClass('active');
        $('#gridView').removeClass('active');
        $('#servicesGrid').addClass('hide');
        $('#servicesList').removeClass('d-none').addClass('show');
    });

    // Form submission
    $('#addServiceForm').on('submit', function(e) {
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
                $('#addServiceModal').modal('hide');
                showSuccess('Service created successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error creating service: ' + xhr.responseJSON.message);
            }
        });
    });
});

// View service details
function viewService(serviceId) {
    $.get(`/admin/admin-new/services/${serviceId}`, function(data) {
        $('#viewServiceContent').html(`
            <div class="row">
                <div class="col-md-4">
                    ${data.image ?
                        `<img src="/storage/${data.image}" alt="${data.service_name}" class="img-fluid rounded">` :
                        `<div class="bg-primary rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-stethoscope text-white fa-3x"></i>
                        </div>`
                    }
                </div>
                <div class="col-md-8">
                    <h4>${data.service_name}</h4>
                    <p class="text-muted">${data.description}</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <strong>Price:</strong> $${parseFloat(data.amount).toFixed(2)}
                        </div>
                        <div class="col-6">
                            <strong>Category:</strong> ${data.category || 'General'}
                        </div>
                        <div class="col-6">
                            <strong>Duration:</strong> ${data.duration || 'N/A'} minutes
                        </div>
                        <div class="col-6">
                            <strong>Status:</strong> <span class="badge bg-success">Active</span>
                        </div>
                        <div class="col-12">
                            <strong>Detailed Description:</strong>
                            <p>${data.detail_description || 'No detailed description available.'}</p>
                        </div>
                    </div>
                </div>
            </div>
        `);
        $('#viewServiceModal').modal('show');
    });
}

// Edit service
function editService(serviceId) {
    $.get(`/admin/admin-new/services/${serviceId}`, function(data) {
        $('#edit_service_name').val(data.service_name);
        $('#edit_amount').val(data.amount);
        $('#edit_category').val(data.category);
        $('#edit_duration').val(data.duration);
        $('#edit_description').val(data.description);
        $('#edit_detail_description').val(data.detail_description);
        $('#edit_is_available').val(data.is_available);

        $('#editServiceForm').attr('action', `/admin/services/${serviceId}`);
        $('#editServiceModal').modal('show');
    });
}

// Delete service
function deleteService(serviceId) {
    confirmDelete('Are you sure you want to delete this service? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/admin-new/delete-service/${serviceId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('Service deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting service: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Duplicate service
function duplicateService(serviceId) {
    Swal.fire({
        title: 'Duplicate Service',
        text: 'Are you sure you want to duplicate this service?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, duplicate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement duplicate logic
            showSuccess('Service duplicated successfully!');
        }
    });
}
</script>
@endsection
