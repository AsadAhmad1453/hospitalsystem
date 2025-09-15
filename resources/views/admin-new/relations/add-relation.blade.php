@extends('admin-new.layouts.main')
@section('title', 'Add Question Relation')
@section('page-title', 'Add Question Relation')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">Add Question Relation</h2>
                            <p class="text-muted mb-0">Create conditional logic between questions to show/hide related questions based on user selections.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('admin-new.relations') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Relations
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
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Question Relations Guide</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">🔗 How Relations Work:</h6>
                            <ul class="list-unstyled">
                                <li><strong>Parent Question:</strong> The question that triggers the relation</li>
                                <li><strong>Trigger Options:</strong> Specific answers that activate the relation</li>
                                <li><strong>Related Question:</strong> The question that appears when conditions are met</li>
                                <li><strong>Conditional Logic:</strong> "If user selects X, then show Y"</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">💡 Best Practices:</h6>
                            <ul class="list-unstyled">
                                <li>• Use clear, logical question flows</li>
                                <li>• Test relations thoroughly before publishing</li>
                                <li>• Avoid circular dependencies</li>
                                <li>• Keep relations simple and intuitive</li>
                                <li>• Document complex logic flows</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-light">
                                <h6 class="text-dark mb-2">📋 Example Use Case:</h6>
                                <p class="mb-0">
                                    <strong>Parent Question:</strong> "Do you have any allergies?"<br>
                                    <strong>Trigger Option:</strong> "Yes"<br>
                                    <strong>Related Question:</strong> "Please specify your allergies"<br>
                                    <em>Result: The allergy details question only appears when user selects "Yes"</em>
                                </p>
                            </div>
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
                    <h5 class="mb-0"><i class="fas fa-link me-2"></i>Relation Configuration</h5>
                </div>
                <div class="card-body">
                    <form id="addRelationForm" action="{{ route('admin-new.save-question-relations') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Parent Question Selection -->
                            <div class="col-12 mb-4">
                                <h6 class="text-primary border-bottom pb-2">Step 1: Select Parent Question</h6>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="selected_question_id" class="form-label">
                                    Parent Question <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('selected_question_id') is-invalid @enderror" 
                                        id="selected_question_id" name="selected_question_id" required>
                                    <option value="">Choose a parent question</option>
                                    @foreach($questions as $question)
                                        <option value="{{ $question->id }}" 
                                                data-type="{{ $question->question_type }}"
                                                data-section="{{ $question->section->name ?? 'No Section' }}">
                                            {{ $question->question_text }} 
                                            <small class="text-muted">({{ $question->section->name ?? 'No Section' }})</small>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Select the question that will trigger the relation when answered.</div>
                                @error('selected_question_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Question Options (Dynamic) -->
                            <div class="col-12 mb-4" id="questionOptionsSection" style="display: none;">
                                <h6 class="text-primary border-bottom pb-2">Step 2: Select Trigger Options</h6>
                                <div id="questionOptionsContainer">
                                    <p class="text-muted">Select a parent question first to see its options.</p>
                                </div>
                                <div class="form-text">Choose which specific answers should trigger the related question to appear.</div>
                            </div>

                            <!-- Related Question Selection -->
                            <div class="col-12 mb-4" id="relatedQuestionSection" style="display: none;">
                                <h6 class="text-primary border-bottom pb-2">Step 3: Select Related Question</h6>
                            </div>

                            <div class="col-12 mb-4" id="relatedQuestionField" style="display: none;">
                                <label for="related_question" class="form-label">
                                    Related Question <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('related_question') is-invalid @enderror" 
                                        id="related_question" name="related_question">
                                    <option value="">Choose a related question</option>
                                    @foreach($questions as $question)
                                        <option value="{{ $question->id }}" 
                                                data-section="{{ $question->section->name ?? 'No Section' }}">
                                            {{ $question->question_text }} 
                                            <small class="text-muted">({{ $question->section->name ?? 'No Section' }})</small>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Select the question that will appear when the trigger conditions are met.</div>
                                @error('related_question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-new.relations') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary me-2" onclick="previewRelation()">
                                            <i class="fas fa-eye me-2"></i>Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                                            <i class="fas fa-save me-2"></i>Save Relation
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
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Relation Preview</h5>
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

    // Handle parent question selection
    $('#selected_question_id').on('change', function() {
        const questionId = $(this).val();
        const questionType = $(this).find('option:selected').data('type');
        
        if (questionId) {
            loadQuestionOptions(questionId, questionType);
            $('#relatedQuestionSection, #relatedQuestionField').show();
        } else {
            $('#questionOptionsSection, #relatedQuestionSection, #relatedQuestionField').hide();
            $('#questionOptionsContainer').html('<p class="text-muted">Select a parent question first to see its options.</p>');
            $('#submitBtn').prop('disabled', true);
        }
    });

    // Handle related question selection
    $('#related_question').on('change', function() {
        updateSubmitButton();
    });

    // Form submission
    $('#addRelationForm').on('submit', function(e) {
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
                showSuccess('Question relation created successfully!');
                setTimeout(() => {
                    window.location.href = '{{ route("admin-new.relations") }}';
                }, 1500);
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    showError('Error creating relation: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });
});

function loadQuestionOptions(questionId, questionType) {
    $.ajax({
        url: '{{ route("admin-new.get-question-options", ":id") }}'.replace(':id', questionId),
        type: 'GET',
        success: function(response) {
            if (response.options && response.options.length > 0) {
                let optionsHtml = '<div class="row">';
                response.options.forEach(function(option, index) {
                    optionsHtml += `
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="question_options[]" value="${option.id}" 
                                       id="option_${option.id}">
                                <label class="form-check-label" for="option_${option.id}">
                                    ${option.option}
                                </label>
                            </div>
                        </div>
                    `;
                });
                optionsHtml += '</div>';
                
                $('#questionOptionsContainer').html(optionsHtml);
                $('#questionOptionsSection').show();
                
                // Add change handler for checkboxes
                $('input[name="question_options[]"]').on('change', function() {
                    updateSubmitButton();
                });
            } else {
                $('#questionOptionsContainer').html('<p class="text-warning">This question has no options available for relations.</p>');
                $('#questionOptionsSection').show();
            }
        },
        error: function() {
            $('#questionOptionsContainer').html('<p class="text-danger">Error loading question options.</p>');
            $('#questionOptionsSection').show();
        }
    });
}

function updateSubmitButton() {
    const hasParentQuestion = $('#selected_question_id').val() !== '';
    const hasRelatedQuestion = $('#related_question').val() !== '';
    const hasSelectedOptions = $('input[name="question_options[]"]:checked').length > 0;
    
    if (hasParentQuestion && hasRelatedQuestion && hasSelectedOptions) {
        $('#submitBtn').prop('disabled', false);
    } else {
        $('#submitBtn').prop('disabled', true);
    }
}

function previewRelation() {
    const parentQuestionId = $('#selected_question_id').val();
    const relatedQuestionId = $('#related_question').val();
    const selectedOptions = $('input[name="question_options[]"]:checked');
    
    if (!parentQuestionId || !relatedQuestionId || selectedOptions.length === 0) {
        showError('Please complete all required fields first.');
        return;
    }
    
    const parentQuestionText = $('#selected_question_id option:selected').text();
    const relatedQuestionText = $('#related_question option:selected').text();
    
    let selectedOptionsText = [];
    selectedOptions.each(function() {
        selectedOptionsText.push($(this).next('label').text().trim());
    });
    
    let previewHtml = `
        <div class="alert alert-info">
            <h6 class="mb-3">📋 Relation Logic Preview:</h6>
            <div class="row">
                <div class="col-md-6">
                    <strong>Parent Question:</strong><br>
                    <span class="text-primary">${parentQuestionText}</span>
                </div>
                <div class="col-md-6">
                    <strong>Related Question:</strong><br>
                    <span class="text-success">${relatedQuestionText}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <strong>Trigger Conditions:</strong><br>
                    <span class="text-warning">When user selects: ${selectedOptionsText.join(', ')}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <strong>Result:</strong><br>
                    <span class="text-success">The related question will appear</span>
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
