@extends('admin-new.layouts.main')
@section('title', 'Add New Blood Test')
@section('page-title', 'Add New Blood Test')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Add New Blood Test</h2>
                            <p class="text-muted mb-0">Order a new blood investigation test for a patient with complete details.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('admin-new.blood-investigation') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Blood Tests
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Blood Test Ordering Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">🔬 Test Types Explained:</h6>
                            <ul class="list-unstyled">
                                <li><strong>CBC:</strong> Complete Blood Count</li>
                                <li><strong>Lipid Profile:</strong> Cholesterol and triglycerides</li>
                                <li><strong>Liver Function:</strong> Liver enzymes and proteins</li>
                                <li><strong>Kidney Function:</strong> Creatinine and BUN levels</li>
                                <li><strong>Diabetes Panel:</strong> Glucose and HbA1c</li>
                                <li><strong>Thyroid Function:</strong> TSH, T3, T4 levels</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Priority Levels:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Normal:</strong> Routine testing (24-48 hours)</li>
                                <li><strong>Urgent:</strong> Same day results needed</li>
                                <li><strong>STAT:</strong> Immediate results required</li>
                                <li>• Always verify patient information</li>
                                <li>• Include relevant clinical notes</li>
                                <li>• Set appropriate completion dates</li>
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
                    <h5 class="mb-0"><i class="fas fa-vial me-2"></i>Test Order Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('save-blood-inv') }}" method="POST" id="addTestForm">
                        @csrf
                        <div class="row">
                            <!-- Patient & Doctor Information -->
                            <div class="col-12 mb-4">
                                <h6 class="text-primary border-bottom pb-2">Patient & Doctor Information</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="patient_id" class="form-label">
                                    Patient <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('patient_id') is-invalid @enderror" 
                                        id="patient_id" name="patient_id" required>
                                    <option value="">Select Patient</option>
                                    @foreach(\App\Models\Patient::all() as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }} - {{ $patient->phone }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Select the patient for whom this test is ordered.</div>
                                @error('patient_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="doctor_id" class="form-label">
                                    Ordered By <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('doctor_id') is-invalid @enderror" 
                                        id="doctor_id" name="doctor_id" required>
                                    <option value="">Select Doctor</option>
                                    @foreach(\App\Models\User::role('doctors')->get() as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Select the doctor who ordered this test.</div>
                                @error('doctor_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Test Information -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Test Information</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="test_name" class="form-label">
                                    Test Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('test_name') is-invalid @enderror" 
                                       id="test_name" name="test_name" 
                                       placeholder="Enter test name" required>
                                <div class="form-text">Enter the specific name of the blood test.</div>
                                @error('test_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="test_type" class="form-label">
                                    Test Type <span class="text-danger">*</span>
                                </label>
                                <select class="form-control @error('test_type') is-invalid @enderror" 
                                        id="test_type" name="test_type" required>
                                    <option value="">Select Type</option>
                                    <option value="cbc">Complete Blood Count</option>
                                    <option value="lipid">Lipid Profile</option>
                                    <option value="liver">Liver Function</option>
                                    <option value="kidney">Kidney Function</option>
                                    <option value="diabetes">Diabetes Panel</option>
                                    <option value="thyroid">Thyroid Function</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="form-text">Select the category of blood test.</div>
                                @error('test_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="test_code" class="form-label">Test Code</label>
                                <input type="text" class="form-control" id="test_code" name="test_code" 
                                       placeholder="Enter test code">
                                <div class="form-text">Optional: Laboratory test code for tracking.</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="priority" class="form-label">Priority Level</label>
                                <select class="form-control" id="priority" name="priority">
                                    <option value="normal">Normal</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="stat">STAT</option>
                                </select>
                                <div class="form-text">Set the urgency level for this test.</div>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="description" class="form-label">Description/Clinical Notes</label>
                                <textarea class="form-control" id="description" name="description" rows="3" 
                                          placeholder="Enter clinical notes or special instructions..."></textarea>
                                <div class="form-text">Include any relevant clinical information or special instructions.</div>
                            </div>

                            <!-- Scheduling & Cost -->
                            <div class="col-12 mb-4 mt-4">
                                <h6 class="text-primary border-bottom pb-2">Scheduling & Cost</h6>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="expected_date" class="form-label">Expected Completion</label>
                                <input type="datetime-local" class="form-control" id="expected_date" name="expected_date">
                                <div class="form-text">When do you expect the test results to be ready?</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="cost" class="form-label">Test Cost</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="cost" name="cost" 
                                           step="0.01" min="0" placeholder="0.00">
                                </div>
                                <div class="form-text">Cost of the blood test (optional).</div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-new.blood-investigation') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary me-2" onclick="previewTest()">
                                            <i class="fas fa-eye me-2"></i>Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Order Test
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
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Test Order Preview</h5>
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
    // Initialize Select2
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });

    // Form submission
    $('#addTestForm').on('submit', function(e) {
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
                showSuccess('Blood test ordered successfully!');
                setTimeout(() => {
                    window.location.href = '{{ route("admin-new.blood-investigation") }}';
                }, 1500);
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error ordering test: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function previewTest() {
    const patientId = document.getElementById('patient_id').value;
    const doctorId = document.getElementById('doctor_id').value;
    const testName = document.getElementById('test_name').value;
    const testType = document.getElementById('test_type').value;
    const priority = document.getElementById('priority').value;
    const description = document.getElementById('description').value;
    const expectedDate = document.getElementById('expected_date').value;
    const cost = document.getElementById('cost').value;
    
    if (!patientId || !doctorId || !testName || !testType) {
        showError('Please fill in the required fields first.');
        return;
    }
    
    const patientText = document.getElementById('patient_id').selectedOptions[0].text;
    const doctorText = document.getElementById('doctor_id').selectedOptions[0].text;
    
    let previewHtml = `
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-primary">${testName}</h5>
                <p class="mb-2"><strong>Patient:</strong> ${patientText}</p>
                <p class="mb-2"><strong>Ordered By:</strong> ${doctorText}</p>
                <p class="mb-2"><strong>Test Type:</strong> <span class="badge bg-info">${testType}</span></p>
                <p class="mb-2"><strong>Priority:</strong> <span class="badge bg-${priority === 'stat' ? 'danger' : priority === 'urgent' ? 'warning' : 'success'}">${priority.toUpperCase()}</span></p>
                ${expectedDate ? `<p class="mb-2"><strong>Expected Completion:</strong> ${new Date(expectedDate).toLocaleString()}</p>` : ''}
                ${cost ? `<p class="mb-2"><strong>Cost:</strong> $${cost}</p>` : ''}
                ${description ? `<p class="mb-0"><strong>Notes:</strong> ${description}</p>` : ''}
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fas fa-vial text-muted" style="font-size: 4rem;"></i>
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
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>Ordering...');
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
