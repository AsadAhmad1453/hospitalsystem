@extends('admin-new.layouts.main')
@section('title', 'Add New Question')
@section('page-title', 'Add New Question')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Add New Question</h2>
                            <p class="text-muted mb-0">Create a new question for your forms with detailed configuration options.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('admin-new.questions') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Questions
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Question Creation Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">📝 Question Types Explained:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Multiple Choice:</strong> Users can select multiple options</li>
                                <li><strong>Single Choice:</strong> Users can select only one option</li>
                                <li><strong>Text Input:</strong> Short text responses</li>
                                <li><strong>Textarea:</strong> Long text responses</li>
                                <li><strong>Number:</strong> Numeric input only</li>
                                <li><strong>Date:</strong> Date picker input</li>
                                <li><strong>File Upload:</strong> File attachment</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Write clear, concise questions</li>
                                <li>• Use appropriate question types</li>
                                <li>• Add helpful descriptions</li>
                                <li>• Set validation rules when needed</li>
                                <li>• Test your questions before publishing</li>
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
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Question Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-new.save-question') }}" method="POST" id="addQuestionForm">
                        @csrf
                        <div class="row">
                            <!-- Question Text -->
                            <div class="col-md-8 mb-4">
                                <label for="question" class="form-label">
                                    Question Text <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('question') is-invalid @enderror" 
                                          id="question" name="question" rows="3" 
                                          placeholder="Enter your question here..." required></textarea>
                                <div class="form-text">Write a clear, specific question that users can easily understand.</div>
                                @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Question Type -->
                            <div class="col-md-4 mb-4">
                                <label for="question_type" class="form-label">
                                    Question Type <span class="text-danger">*</span>
                                </label>
                                <select class="form-control @error('question_type') is-invalid @enderror" 
                                        id="question_type" name="question_type" required onchange="toggleOptions()">
                                    <option value="">Select Type</option>
                                    <option value="0">Single Choice</option>
                                    <option value="1">Multiple Choice</option>
                                    <option value="2">Text Input</option>
                                    <option value="3">Date</option>
                                    <option value="4">Textarea</option>
                                    <option value="5">Number</option>
                                    <option value="6">File Upload</option>
                                </select>
                                <div class="form-text">Choose the appropriate input type for your question.</div>
                                @error('question_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Selection -->
                            <div class="col-md-6 mb-4">
                                <label for="form_id" class="form-label">Form <span class="text-danger">*</span></label>
                                <select class="form-control @error('form_id') is-invalid @enderror" 
                                        id="form_id" name="form_id" required>
                                    <option value="">Select Form</option>
                                    @foreach(\App\Models\Form::all() as $form)
                                        <option value="{{ $form->id }}">{{ $form->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Select the form this question belongs to.</div>
                                @error('form_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Section -->
                            <div class="col-md-6 mb-4">
                                <label for="section_id" class="form-label">Question Section</label>
                                <select class="form-control @error('section_id') is-invalid @enderror" 
                                        id="section_id" name="section_id">
                                    <option value="">Select Section (Optional)</option>
                                    @foreach(\App\Models\Section::all() as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Group related questions together in sections.</div>
                                @error('section_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Required -->
                            <div class="col-md-6 mb-4">
                                <label for="is_required" class="form-label">Required Field</label>
                                <select class="form-control" id="is_required" name="priority">
                                    <option value="0">Optional</option>
                                    <option value="1">Required</option>
                                </select>
                                <div class="form-text">Mark as required if users must answer this question.</div>
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-4">
                                <label for="description" class="form-label">Description/Help Text</label>
                                <textarea class="form-control" id="description" name="description" rows="2" 
                                          placeholder="Add helpful instructions or additional context for users..."></textarea>
                                <div class="form-text">Provide additional guidance or context for users.</div>
                            </div>

                            <!-- Validation Rules -->
                            <div class="col-md-6 mb-4">
                                <label for="validation_rules" class="form-label">Validation Rules</label>
                                <input type="text" class="form-control" id="validation_rules" name="validation_rules" 
                                       placeholder="e.g., min:5,max:100">
                                <div class="form-text">Add validation rules (e.g., min:5, max:100, email, numeric).</div>
                            </div>

                            <!-- Order -->
                            <div class="col-md-6 mb-4">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number" class="form-control" id="order" name="order" 
                                       placeholder="Leave empty for auto-order">
                                <div class="form-text">Set the order in which this question appears.</div>
                            </div>

                            <!-- Options Section (for multiple choice and single choice) -->
                            <div class="col-12 mb-4" id="optionsSection" style="display: none;">
                                <label class="form-label">Answer Options</label>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Add the possible answer choices for multiple choice and single choice questions.
                                </div>
                                <div id="optionsContainer">
                                    <div class="option-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="options[]" 
                                                   placeholder="Enter option text">
                                            <button type="button" class="btn btn-outline-danger" onclick="removeOption(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addOption()">
                                    <i class="fas fa-plus me-1"></i>Add Option
                                </button>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-new.questions') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary me-2" onclick="previewQuestion()">
                                            <i class="fas fa-eye me-2"></i>Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Create Question
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
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Question Preview</h5>
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
    $('#addQuestionForm').on('submit', function(e) {
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
                showSuccess('Question created successfully!');
                setTimeout(() => {
                    window.location.href = '{{ route("admin-new.questions") }}';
                }, 1500);
                console.log('success');
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error creating question: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function toggleOptions() {
    const questionType = document.getElementById('question_type').value;
    const optionsSection = document.getElementById('optionsSection');
    
    if (questionType === '0' || questionType === '1') {
        optionsSection.style.display = 'block';
    } else {
        optionsSection.style.display = 'none';
    }
}

function addOption() {
    const container = document.getElementById('optionsContainer');
    const optionItem = document.createElement('div');
    optionItem.className = 'option-item mb-2';
    optionItem.innerHTML = `
        <div class="input-group">
            <input type="text" class="form-control" name="options[]" placeholder="Enter option text">
            <button type="button" class="btn btn-outline-danger" onclick="removeOption(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    container.appendChild(optionItem);
}

function removeOption(button) {
    button.closest('.option-item').remove();
}

function previewQuestion() {
    const questionText = document.getElementById('question').value;
    const questionType = document.getElementById('question_type').value;
    const description = document.getElementById('description').value;
    const isRequired = document.getElementById('is_required').value;
    
    if (!questionText || !questionType) {
        showError('Please fill in the question text and type first.');
        return;
    }
    
    let previewHtml = `
        <div class="form-group mb-3">
            <label class="form-label">
                ${questionText}
                ${isRequired === '1' ? '<span class="text-danger">*</span>' : ''}
            </label>
            ${description ? `<div class="form-text">${description}</div>` : ''}
    `;
    
    // Generate input based on type
    switch(questionType) {
        case '0': // Multiple Choice
        case '1': // Single Choice
            const options = Array.from(document.querySelectorAll('input[name="options[]"]'))
                .map(input => input.value)
                .filter(value => value.trim() !== '');
            
            if (options.length > 0) {
                const inputType = questionType === '0' ? 'checkbox' : 'radio';
                options.forEach((option, index) => {
                    previewHtml += `
                        <div class="form-check">
                            <input class="form-check-input" type="${inputType}" name="preview_${questionType}" id="preview_${index}">
                            <label class="form-check-label" for="preview_${index}">${option}</label>
                        </div>
                    `;
                });
            } else {
                previewHtml += '<p class="text-muted">No options added yet.</p>';
            }
            break;
        case '2': // Text Input
            previewHtml += '<input type="text" class="form-control" placeholder="Enter your answer...">';
            break;
        case '3': // Textarea
            previewHtml += '<textarea class="form-control" rows="3" placeholder="Enter your answer..."></textarea>';
            break;
        case '4': // Number
            previewHtml += '<input type="number" class="form-control" placeholder="Enter a number...">';
            break;
        case '5': // Date
            previewHtml += '<input type="date" class="form-control">';
            break;
        case '6': // File Upload
            previewHtml += '<input type="file" class="form-control">';
            break;
    }
    
    previewHtml += '</div>';
    
    document.getElementById('previewContent').innerHTML = previewHtml;
    document.getElementById('previewSection').style.display = 'block';
    
    // Scroll to preview
    document.getElementById('previewSection').scrollIntoView({ behavior: 'smooth' });
}

function showLoading(button) {
    const originalText = button.html();
    button.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
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
