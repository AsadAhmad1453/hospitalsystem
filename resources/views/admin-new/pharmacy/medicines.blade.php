@extends('admin-new.layouts.main')
@section('title', 'Pharmacy Management')
@section('page-title', 'Pharmacy Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Pharmacy Management</h2>
                            <p class="text-muted mb-0">Manage medicines, prescriptions, and pharmacy operations.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group">
                                <a href="{{ route('admin-new.add-medicine') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Add Medicine
                                </a>
                                <button class="btn btn-outline-primary" onclick="processPrescription()">
                                    <i class="fas fa-prescription me-2"></i>Process Prescription
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
                                <i class="fas fa-prescription"></i>
                            </div>
                            <div>
                                <div class="number">{{ $prescriptionsCount ?? 0 }}</div>
                                <div class="label">Prescriptions</div>
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
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">Quick Actions</h6>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary w-100" onclick="checkExpiry()">
                                <i class="fas fa-calendar-times fa-2x mb-2"></i><br>
                                Check Expiry
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-success w-100" onclick="reorderStock()">
                                <i class="fas fa-shopping-cart fa-2x mb-2"></i><br>
                                Reorder Stock
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-info w-100" onclick="generateReport()">
                                <i class="fas fa-chart-bar fa-2x mb-2"></i><br>
                                Generate Report
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-warning w-100" onclick="auditInventory()">
                                <i class="fas fa-clipboard-check fa-2x mb-2"></i><br>
                                Audit Inventory
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-danger w-100" onclick="viewAlerts()">
                                <i class="fas fa-bell fa-2x mb-2"></i><br>
                                View Alerts
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-secondary w-100" onclick="manageSuppliers()">
                                <i class="fas fa-truck fa-2x mb-2"></i><br>
                                Manage Suppliers
                            </button>
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
                            <label class="form-label">Supplier</label>
                            <select class="form-control select2" id="supplierFilter">
                                <option value="">All Suppliers</option>
                                <option value="supplier1">Supplier 1</option>
                                <option value="supplier2">Supplier 2</option>
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
                                                <li><a class="dropdown-item" href="#" onclick="createPrescription({{ $medicine->id }})">
                                                    <i class="fas fa-prescription me-2"></i>Create Prescription
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

<!-- Process Prescription Modal -->
<div class="modal fade" id="processPrescriptionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process Prescription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="processPrescriptionForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="patient_id" class="form-label">Patient *</label>
                            <select class="form-control select2" id="patient_id" name="patient_id" required>
                                <option value="">Select Patient</option>
                                @foreach(\App\Models\Patient::all() as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }} - {{ $patient->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doctor_id" class="form-label">Prescribed By *</label>
                            <select class="form-control select2" id="doctor_id" name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach(\App\Models\User::role('doctor')->get() as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="medicines" class="form-label">Medicines *</label>
                            <div id="medicinesContainer">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="medicines[]" required>
                                            <option value="">Select Medicine</option>
                                            @foreach($medicines as $medicine)
                                            <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" name="quantities[]" placeholder="Qty" min="1" required>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-outline-danger" onclick="removeMedicine(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addMedicine()">
                                <i class="fas fa-plus me-1"></i>Add Medicine
                            </button>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="instructions" class="form-label">Instructions</label>
                            <textarea class="form-control" id="instructions" name="instructions" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Process Prescription
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
    $('#categoryFilter, #stockFilter, #expiryFilter, #supplierFilter').on('change', function() {
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
    const supplier = $('#supplierFilter').val();
    
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
        
        $(this).toggle(show);
    });
}

// Clear filters
function clearFilters() {
    $('#searchInput').val('');
    $('#categoryFilter').val('').trigger('change');
    $('#stockFilter').val('');
    $('#expiryFilter').val('');
    $('#supplierFilter').val('').trigger('change');
    $('#medicinesTable tbody tr').show();
}

// Refresh table
function refreshTable() {
    location.reload();
}

// Adjust stock
function adjustStock(medicineId) {
    $('#adjustStockForm').attr('action', `/admin/medicines/${medicineId}/adjust-stock`);
    $('#adjustStockModal').modal('show');
}

// Process prescription
function processPrescription() {
    $('#processPrescriptionModal').modal('show');
}

// Add medicine to prescription
function addMedicine() {
    const container = $('#medicinesContainer');
    const medicineRow = `
        <div class="row mb-2">
            <div class="col-md-6">
                <select class="form-control select2" name="medicines[]" required>
                    <option value="">Select Medicine</option>
                    @foreach($medicines as $medicine)
                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="quantities[]" placeholder="Qty" min="1" required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-danger" onclick="removeMedicine(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.append(medicineRow);
    $('.select2').select2();
}

// Remove medicine from prescription
function removeMedicine(button) {
    $(button).closest('.row').remove();
}

// Quick actions
function checkExpiry() {
    showSuccess('Expiry check completed! Found 5 medicines expiring soon.');
}

function reorderStock() {
    showSuccess('Reorder list generated! 12 medicines need restocking.');
}

function generateReport() {
    showSuccess('Pharmacy report generated successfully!');
}

function auditInventory() {
    showSuccess('Inventory audit started! Please complete physical count.');
}

function viewAlerts() {
    showSuccess('Showing all pharmacy alerts and notifications.');
}

function manageSuppliers() {
    showSuccess('Supplier management coming soon!');
}

// Export functions
function exportToExcel() {
    window.open('/admin/pharmacy/export/excel', '_blank');
}

function exportToPDF() {
    window.open('/admin/pharmacy/export/pdf', '_blank');
}
</script>
@endsection
