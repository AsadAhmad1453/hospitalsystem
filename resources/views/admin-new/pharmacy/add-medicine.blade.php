@extends('admin-new.layouts.main')
@section('title', 'Add New Medicine')
@section('page-title', 'Add New Medicine')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Add New Medicine</h2>
                            <p class="text-muted mb-0">Add a new medicine to the pharmacy inventory with complete details.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('admin-new.medicines') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Medicines
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Medicine Management Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">📋 Required Information:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Medicine Name:</strong> Brand or commercial name</li>
                                <li><strong>Generic Name:</strong> Active ingredient name</li>
                                <li><strong>Category:</strong> Type of medication</li>
                                <li><strong>Price:</strong> Cost per unit</li>
                                <li><strong>Stock Quantity:</strong> Available inventory</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Use accurate generic names for better tracking</li>
                                <li>• Set appropriate minimum stock levels</li>
                                <li>• Include detailed dosage instructions</li>
                                <li>• Document side effects for safety</li>
                                <li>• Track batch numbers and expiry dates</li>
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
                    <h5 class="mb-0"><i class="fas fa-pills me-2"></i>Medicine Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('save-medic') }}" method="POST" id="addMedicineForm">
                        @csrf
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-12 mb-4">
                                <h6 class="text-primary border-bottom pb-2">Basic Information</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">
                                    Medicine Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" placeholder="Enter medicine name" required>
                                <div class="form-text">Enter the brand or commercial name of the medicine.</div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="generic_name" class="form-label">Generic Name</label>
                                <input type="text" class="form-control" id="generic_name" name="generic_name" 
                                       placeholder="Enter generic name">
                                <div class="form-text">Enter the active ingredient or generic name.</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" 
                                       placeholder="Enter manufacturer name">
                                <div class="form-text">Name of the pharmaceutical company.</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="category" class="form-label">
                                    Category <span class="text-danger">*</span>
                                </label>
                                <select class="form-control @error('category') is-invalid @enderror" 
                                        id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="antibiotic">Antibiotic</option>
                                    <option value="pain-relief">Pain Relief</option>
                                    <option value="vitamin">Vitamin</option>
                                    <option value="supplement">Supplement</option>
                                    <option value="prescription">Prescription</option>
                                    <option value="otc">Over-the-Counter</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="form-text">Select the appropriate category for this medicine.</div>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pricing & Inventory -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Pricing & Inventory</h6>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="price" class="form-label">
                                    Price <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                           id="price" name="price" step="0.01" min="0" 
                                           placeholder="0.00" required>
                                </div>
                                <div class="form-text">Price per unit in dollars.</div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="stock_quantity" class="form-label">
                                    Stock Quantity <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                       id="stock_quantity" name="stock_quantity" min="0" 
                                       placeholder="0" required>
                                <div class="form-text">Current available quantity in inventory.</div>
                                @error('stock_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="unit" class="form-label">Unit</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option value="units">Units</option>
                                    <option value="tablets">Tablets</option>
                                    <option value="capsules">Capsules</option>
                                    <option value="ml">ML</option>
                                    <option value="mg">MG</option>
                                    <option value="bottles">Bottles</option>
                                    <option value="tubes">Tubes</option>
                                </select>
                                <div class="form-text">Unit of measurement for this medicine.</div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="min_stock_level" class="form-label">Minimum Stock Level</label>
                                <input type="number" class="form-control" id="min_stock_level" name="min_stock_level" 
                                       min="0" value="10" placeholder="10">
                                <div class="form-text">Alert when stock falls below this level.</div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                                <div class="form-text">Expiration date of the medicine batch.</div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="batch_number" class="form-label">Batch Number</label>
                                <input type="text" class="form-control" id="batch_number" name="batch_number" 
                                       placeholder="Enter batch number">
                                <div class="form-text">Manufacturing batch number for tracking.</div>
                            </div>

                            <!-- Medical Information -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Medical Information</h6>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" 
                                          placeholder="Enter detailed description of the medicine..."></textarea>
                                <div class="form-text">Detailed description of the medicine and its uses.</div>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="side_effects" class="form-label">Side Effects</label>
                                <textarea class="form-control" id="side_effects" name="side_effects" rows="2" 
                                          placeholder="List common side effects..."></textarea>
                                <div class="form-text">Document known side effects for patient safety.</div>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="dosage_instructions" class="form-label">Dosage Instructions</label>
                                <textarea class="form-control" id="dosage_instructions" name="dosage_instructions" rows="2" 
                                          placeholder="Enter dosage instructions..."></textarea>
                                <div class="form-text">Recommended dosage and administration instructions.</div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-new.medicines') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary me-2" onclick="previewMedicine()">
                                            <i class="fas fa-eye me-2"></i>Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Add Medicine
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
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Medicine Preview</h5>
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
                showSuccess('Medicine added successfully!');
                setTimeout(() => {
                    window.location.href = '{{ route("admin-new.medicines") }}';
                }, 1500);
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error adding medicine: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function previewMedicine() {
    const name = document.getElementById('name').value;
    const genericName = document.getElementById('generic_name').value;
    const category = document.getElementById('category').value;
    const price = document.getElementById('price').value;
    const stock = document.getElementById('stock_quantity').value;
    const unit = document.getElementById('unit').value;
    const description = document.getElementById('description').value;
    
    if (!name || !category || !price || !stock) {
        showError('Please fill in the required fields first.');
        return;
    }
    
    let previewHtml = `
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-primary">${name}</h5>
                ${genericName ? `<p class="text-muted mb-2"><strong>Generic Name:</strong> ${genericName}</p>` : ''}
                <p class="mb-2"><strong>Category:</strong> <span class="badge bg-info">${category}</span></p>
                <p class="mb-2"><strong>Price:</strong> $${price} per ${unit}</p>
                <p class="mb-2"><strong>Stock:</strong> ${stock} ${unit}</p>
                ${description ? `<p class="mb-0"><strong>Description:</strong> ${description}</p>` : ''}
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fas fa-pills text-muted" style="font-size: 4rem;"></i>
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
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
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
