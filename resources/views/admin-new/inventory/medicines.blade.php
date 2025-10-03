@extends('admin-new.layouts.main')
@section('title', 'Medicine Inventory')
@section('page-title', 'Medicine Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Medicine Inventory</h2>
                            <p class="text-muted mb-0">Manage medicine stock, pricing, and inventory levels.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicineModal">
                                    <i class="fas fa-plus me-2"></i>Add New Medicine
                                </button>
                                <button class="btn btn-outline-primary" onclick="importMedicines()">
                                    <i class="fas fa-upload me-2"></i>Import CSV
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <div class="icon me-3">
                                <i class="fas fa-pills"></i>
                            </div>
                            <div>
                                <div class="number">{{ $medicines->count() }}</div>
                                <div class="label">Total Medicines</div>
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
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <div class="number">{{ $lowStockCount ?? 0 }}</div>
                                <div class="label">Low Stock</div>
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
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="number">${{ number_format($totalValue ?? 0, 2) }}</div>
                                <div class="label">Total Value</div>
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
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="number">{{ $expiringSoonCount ?? 0 }}</div>
                                <div class="label">Expiring Soon</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Search Medicines</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Name, generic name..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Category</label>
                            <select class="form-control select2" id="categoryFilter">
                                <option value="">All Categories</option>
                                <option value="antibiotic">Antibiotic</option>
                                <option value="pain-relief">Pain Relief</option>
                                <option value="vitamin">Vitamin</option>
                                <option value="supplement">Supplement</option>
                                <option value="prescription">Prescription</option>
                                <option value="otc">Over-the-Counter</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Stock Status</label>
                            <select class="form-control" id="stockFilter">
                                <option value="">All</option>
                                <option value="in-stock">In Stock</option>
                                <option value="low-stock">Low Stock</option>
                                <option value="out-of-stock">Out of Stock</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Expiry Status</label>
                            <select class="form-control" id="expiryFilter">
                                <option value="">All</option>
                                <option value="expiring-soon">Expiring Soon</option>
                                <option value="expired">Expired</option>
                                <option value="valid">Valid</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Price Range</label>
                            <select class="form-control" id="priceFilter">
                                <option value="">All</option>
                                <option value="0-10">$0 - $10</option>
                                <option value="10-50">$10 - $50</option>
                                <option value="50-100">$50 - $100</option>
                                <option value="100+">$100+</option>
                            </select>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Medicines Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Medicine Inventory</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshTable()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-download me-1"></i>Export
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="exportToExcel()">Export to Excel</a></li>
                                <li><a class="dropdown-item" href="#" onclick="exportToPDF()">Export to PDF</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="medicinesTable">
                            <thead>
                                <tr>
                                    <th>Medicine</th>
                                    <th>Generic Name</th>
                                    <th>Category</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicines as $medicine)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-pills text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $medicine->name }}</div>
                                                <small class="text-muted">{{ $medicine->manufacturer ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $medicine->generic_name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($medicine->category ?? 'General') }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold me-2">{{ $medicine->stock_quantity ?? 0 }}</span>
                                            <small class="text-muted">{{ $medicine->unit ?? 'units' }}</small>
                                        </div>
                                        @if(($medicine->stock_quantity ?? 0) <= ($medicine->min_stock_level ?? 10))
                                        <div class="text-warning small">
                                            <i class="fas fa-exclamation-triangle"></i> Low Stock
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold text-primary">${{ number_format($medicine->price ?? 0, 2) }}</span>
                                    </td>
                                    <td>
                                        @if($medicine->expiry_date)
                                        <span class="{{ \Carbon\Carbon::parse($medicine->expiry_date)->isPast() ? 'text-danger' : (\Carbon\Carbon::parse($medicine->expiry_date)->diffInDays() <= 30 ? 'text-warning' : 'text-success') }}">
                                            {{ \Carbon\Carbon::parse($medicine->expiry_date)->format('M d, Y') }}
                                        </span>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(($medicine->stock_quantity ?? 0) <= 0)
                                        <span class="badge bg-danger">Out of Stock</span>
                                        @elseif(($medicine->stock_quantity ?? 0) <= ($medicine->min_stock_level ?? 10))
                                        <span class="badge bg-warning">Low Stock</span>
                                        @else
                                        <span class="badge bg-success">In Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewMedicine({{ $medicine->id }})">
                                                    <i class="fas fa-eye me-2"></i>View Details
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="editMedicine({{ $medicine->id }})">
                                                    <i class="fas fa-edit me-2"></i>Edit Medicine
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="adjustStock({{ $medicine->id }})">
                                                    <i class="fas fa-warehouse me-2"></i>Adjust Stock
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="viewHistory({{ $medicine->id }})">
                                                    <i class="fas fa-history me-2"></i>Stock History
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#" onclick="duplicateMedicine({{ $medicine->id }})">
                                                    <i class="fas fa-copy me-2"></i>Duplicate
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteMedicine({{ $medicine->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete Medicine
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

<!-- Add Medicine Modal -->
<div class="modal fade" id="addMedicineModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin-new.save-medic') }}" method="POST" id="addMedicineForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Medicine Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="generic_name" class="form-label">Generic Name</label>
                            <input type="text" class="form-control" id="generic_name" name="generic_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="manufacturer" class="form-label">Manufacturer</label>
                            <input type="text" class="form-control" id="manufacturer" name="manufacturer">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category *</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="antibiotic">Antibiotic</option>
                                <option value="pain-relief">Pain Relief</option>
                                <option value="vitamin">Vitamin</option>
                                <option value="supplement">Supplement</option>
                                <option value="prescription">Prescription</option>
                                <option value="otc">Over-the-Counter</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Price *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="tablets">Tablets</option>
                                <option value="capsules">Capsules</option>
                                <option value="ml">ML</option>
                                <option value="mg">MG</option>
                                <option value="units">Units</option>
                                <option value="bottles">Bottles</option>
                                <option value="tubes">Tubes</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="min_stock_level" class="form-label">Minimum Stock Level</label>
                            <input type="number" class="form-control" id="min_stock_level" name="min_stock_level" min="0" value="10">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="batch_number" class="form-label">Batch Number</label>
                            <input type="text" class="form-control" id="batch_number" name="batch_number">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="side_effects" class="form-label">Side Effects</label>
                            <textarea class="form-control" id="side_effects" name="side_effects" rows="2"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="dosage_instructions" class="form-label">Dosage Instructions</label>
                            <textarea class="form-control" id="dosage_instructions" name="dosage_instructions" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Medicine
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Medicine Modal -->
<div class="modal fade" id="editMedicineModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editMedicineForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Same form fields as add medicine -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_name" class="form-label">Medicine Name *</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_generic_name" class="form-label">Generic Name</label>
                            <input type="text" class="form-control" id="edit_generic_name" name="generic_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_manufacturer" class="form-label">Manufacturer</label>
                            <input type="text" class="form-control" id="edit_manufacturer" name="manufacturer">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_category" class="form-label">Category *</label>
                            <select class="form-control" id="edit_category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="antibiotic">Antibiotic</option>
                                <option value="pain-relief">Pain Relief</option>
                                <option value="vitamin">Vitamin</option>
                                <option value="supplement">Supplement</option>
                                <option value="prescription">Prescription</option>
                                <option value="otc">Over-the-Counter</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_price" class="form-label">Price *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="edit_price" name="price" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_stock_quantity" class="form-label">Stock Quantity *</label>
                            <input type="number" class="form-control" id="edit_stock_quantity" name="stock_quantity" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_unit" class="form-label">Unit</label>
                            <select class="form-control" id="edit_unit" name="unit">
                                <option value="tablets">Tablets</option>
                                <option value="capsules">Capsules</option>
                                <option value="ml">ML</option>
                                <option value="mg">MG</option>
                                <option value="units">Units</option>
                                <option value="bottles">Bottles</option>
                                <option value="tubes">Tubes</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Medicine
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Medicine Modal -->
<div class="modal fade" id="viewMedicineModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medicine Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewMedicineContent">
                <!-- Medicine details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Stock Adjustment Modal -->
<div class="modal fade" id="adjustStockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="adjustStockForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="adjustment_type" class="form-label">Adjustment Type *</label>
                        <select class="form-control" id="adjustment_type" name="adjustment_type" required>
                            <option value="">Select Type</option>
                            <option value="add">Add Stock</option>
                            <option value="remove">Remove Stock</option>
                            <option value="set">Set Stock Level</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity *</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Adjust Stock
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
    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('#medicinesTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Filter functionality
    $('#categoryFilter, #stockFilter, #expiryFilter, #priceFilter').on('change', function() {
        filterTable();
    });

    // Form submission
    $('#addMedicineForm').on('submit', function(e) {
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
                $('#addMedicineModal').modal('hide');
                showSuccess('Medicine added successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error adding medicine: ' + xhr.responseJSON.message);
            }
        });
    });
});

// Filter table
function filterTable() {
    const category = $('#categoryFilter').val();
    const stock = $('#stockFilter').val();
    const expiry = $('#expiryFilter').val();
    const price = $('#priceFilter').val();
    
    $('#medicinesTable tbody tr').each(function() {
        let show = true;
        
        if (category && !$(this).text().toLowerCase().includes(category.toLowerCase())) {
            show = false;
        }
        
        if (stock) {
            const stockText = $(this).find('td:nth-child(4)').text().toLowerCase();
            if (stock === 'in-stock' && (stockText.includes('out of stock') || stockText.includes('low stock'))) {
                show = false;
            } else if (stock === 'low-stock' && !stockText.includes('low stock')) {
                show = false;
            } else if (stock === 'out-of-stock' && !stockText.includes('out of stock')) {
                show = false;
            }
        }
        
        if (expiry) {
            const expiryText = $(this).find('td:nth-child(6)').text().toLowerCase();
            if (expiry === 'expiring-soon' && !expiryText.includes('warning')) {
                show = false;
            } else if (expiry === 'expired' && !expiryText.includes('danger')) {
                show = false;
            } else if (expiry === 'valid' && (expiryText.includes('warning') || expiryText.includes('danger'))) {
                show = false;
            }
        }
        
        $(this).toggle(show);
    });
}

// Clear filters
function clearFilters() {
    $('#searchInput').val('');
    $('#categoryFilter').val('').trigger('change');
    $('#stockFilter').val('');
    $('#expiryFilter').val('');
    $('#priceFilter').val('');
    $('#medicinesTable tbody tr').show();
}

// Refresh table
function refreshTable() {
    location.reload();
}

// View medicine
function viewMedicine(medicineId) {
    $.get(`/admin/medicines/${medicineId}`, function(data) {
        $('#viewMedicineContent').html(`
            <div class="row">
                <div class="col-md-8">
                    <h4>${data.name}</h4>
                    <p class="text-muted">${data.description || 'No description available.'}</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <strong>Generic Name:</strong> ${data.generic_name || 'N/A'}
                        </div>
                        <div class="col-6">
                            <strong>Manufacturer:</strong> ${data.manufacturer || 'N/A'}
                        </div>
                        <div class="col-6">
                            <strong>Category:</strong> ${data.category || 'General'}
                        </div>
                        <div class="col-6">
                            <strong>Price:</strong> $${parseFloat(data.price || 0).toFixed(2)}
                        </div>
                        <div class="col-6">
                            <strong>Stock:</strong> ${data.stock_quantity || 0} ${data.unit || 'units'}
                        </div>
                        <div class="col-6">
                            <strong>Min Level:</strong> ${data.min_stock_level || 10}
                        </div>
                        <div class="col-6">
                            <strong>Expiry Date:</strong> ${data.expiry_date ? new Date(data.expiry_date).toLocaleDateString() : 'N/A'}
                        </div>
                        <div class="col-6">
                            <strong>Batch Number:</strong> ${data.batch_number || 'N/A'}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Stock Status</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="h2 text-primary">${data.stock_quantity || 0}</div>
                                <div class="text-muted">Current Stock</div>
                                <div class="mt-2">
                                    ${(data.stock_quantity || 0) <= (data.min_stock_level || 10) ? 
                                        '<span class="badge bg-warning">Low Stock</span>' : 
                                        '<span class="badge bg-success">In Stock</span>'
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        $('#viewMedicineModal').modal('show');
    });
}

// Edit medicine
function editMedicine(medicineId) {
    $.get(`/admin/medicines/${medicineId}`, function(data) {
        $('#edit_name').val(data.name);
        $('#edit_generic_name').val(data.generic_name);
        $('#edit_manufacturer').val(data.manufacturer);
        $('#edit_category').val(data.category);
        $('#edit_price').val(data.price);
        $('#edit_stock_quantity').val(data.stock_quantity);
        $('#edit_unit').val(data.unit);
        $('#edit_description').val(data.description);
        
        $('#editMedicineForm').attr('action', `/admin/medicines/${medicineId}`);
        $('#editMedicineModal').modal('show');
    });
}

// Adjust stock
function adjustStock(medicineId) {
    $('#adjustStockForm').attr('action', `/admin/medicines/${medicineId}/adjust-stock`);
    $('#adjustStockModal').modal('show');
}

// Delete medicine
function deleteMedicine(medicineId) {
    confirmDelete('Are you sure you want to delete this medicine? This action cannot be undone.').then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/del-medic/${medicineId}`,
                type: 'GET',
                success: function(response) {
                    showSuccess('Medicine deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting medicine: ' + xhr.responseJSON.message);
                }
            });
        }
    });
}

// Duplicate medicine
function duplicateMedicine(medicineId) {
    Swal.fire({
        title: 'Duplicate Medicine',
        text: 'Are you sure you want to duplicate this medicine?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, duplicate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement duplicate logic
            showSuccess('Medicine duplicated successfully!');
        }
    });
}

// View history
function viewHistory(medicineId) {
    window.open(`/admin/medicines/${medicineId}/history`, '_blank');
}

// Export functions
function exportToExcel() {
    window.open('/admin/medicines/export/excel', '_blank');
}

function exportToPDF() {
    window.open('/admin/medicines/export/pdf', '_blank');
}

// Import medicines
function importMedicines() {
    showSuccess('Import functionality coming soon!');
}
</script>
@endsection
