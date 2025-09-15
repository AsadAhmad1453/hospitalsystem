@extends('admin-new.layouts.main')
@section('title', 'Question Relations')
@section('page-title', 'Question Relations Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">Question Relations</h2>
                            <p class="text-muted mb-0">Manage dependencies and relationships between questions and their options.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a href="{{ route('admin-new.add-relation') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add New Relation
                            </a>
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
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div>
                                <div class="number">{{ $questions->count() }}</div>
                                <div class="label">Total Questions</div>
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
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <div class="number">{{ \App\Models\Dependency::count() }}</div>
                                <div class="label">Active Relations</div>
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
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div>
                                <div class="number">{{ $questions->groupBy('section_id')->count() }}</div>
                                <div class="label">Sections</div>
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
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div>
                                <div class="number">{{ $questions->where('type', 'multiple_choice')->count() }}</div>
                                <div class="label">Multiple Choice</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Questions List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Question Relations</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="refreshRelations()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="exportRelations()">
                            <i class="fas fa-download me-1"></i>Export
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="relationsTable">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Section</th>
                                    <th>Type</th>
                                    <th>Options</th>
                                    <th>Dependencies</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                <tr>
                                    <td>
                                        <div class="fw-bold">{{ $question->question_text }}</div>
                                        @if($question->description)
                                        <small class="text-muted">{{ Str::limit($question->description, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $question->section->name ?? 'No Section' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $question->type)) }}</span>
                                    </td>
                                    <td>
                                        @if($question->options && $question->options->count() > 0)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach($question->options->take(3) as $option)
                                            <span class="badge bg-light text-dark">{{ $option->option_text }}</span>
                                            @endforeach
                                            @if($question->options->count() > 3)
                                            <span class="badge bg-secondary">+{{ $question->options->count() - 3 }} more</span>
                                            @endif
                                        </div>
                                        @else
                                        <span class="text-muted">No options</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                        $dependencies = \App\Models\Dependency::where('question_id', $question->id)->count();
                                        @endphp
                                        @if($dependencies > 0)
                                        <span class="badge bg-success">{{ $dependencies }} relation(s)</span>
                                        @else
                                        <span class="badge bg-warning">No relations</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewRelations({{ $question->id }})">
                                                    <i class="fas fa-eye me-2"></i>View Relations
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="editRelations({{ $question->id }})">
                                                    <i class="fas fa-edit me-2"></i>Edit Relations
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="addRelation({{ $question->id }})">
                                                    <i class="fas fa-plus me-2"></i>Add Relation
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteAllRelations({{ $question->id }})">
                                                    <i class="fas fa-trash me-2"></i>Delete All Relations
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

<!-- Add Relation Modal -->
<div class="modal fade" id="addRelationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Question Relation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addRelationForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="selected_question_id" class="form-label">Select Question *</label>
                            <select class="form-control select2" id="selected_question_id" name="selected_question_id" required>
                                <option value="">Choose a question</option>
                                @foreach($questions as $question)
                                <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="related_question" class="form-label">Related Question *</label>
                            <select class="form-control select2" id="related_question" name="related_question" required>
                                <option value="">Choose a related question</option>
                                @foreach($questions as $question)
                                <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Question Options *</label>
                            <div id="questionOptionsContainer">
                                <p class="text-muted">Select a question first to see its options.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Relation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Relations Modal -->
<div class="modal fade" id="viewRelationsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Question Relations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewRelationsContent">
                <!-- Relations will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#relationsTable').DataTable({
        responsive: true,
        pageLength: 25,
        order: [[0, 'asc']]
    });

    // Handle question selection change
    $('#selected_question_id').on('change', function() {
        const questionId = $(this).val();
        if (questionId) {
            loadQuestionOptions(questionId);
        } else {
            $('#questionOptionsContainer').html('<p class="text-muted">Select a question first to see its options.</p>');
        }
    });

    // Form submission
    $('#addRelationForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const button = $(this).find('button[type="submit"]');
        const originalText = showLoading(button);
        
        $.ajax({
            url: '{{ route("admin-new.save-question-relations") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                hideLoading(button, originalText);
                $('#addRelationModal').modal('hide');
                showSuccess('Question relation saved successfully!');
                location.reload();
            },
            error: function(xhr) {
                hideLoading(button, originalText);
                showError('Error saving relation: ' + xhr.responseJSON.message);
            }
        });
    });
});

// Load question options
function loadQuestionOptions(questionId) {
    $.ajax({
        url: `/admin-new/get-question-options/${questionId}`,
        type: 'GET',
        success: function(response) {
            let optionsHtml = '<div class="row">';
            response.options.forEach(function(option) {
                optionsHtml += `
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="question_options[]" value="${option.id}" id="option_${option.id}">
                            <label class="form-check-label" for="option_${option.id}">
                                ${option.option_text}
                            </label>
                        </div>
                    </div>
                `;
            });
            optionsHtml += '</div>';
            $('#questionOptionsContainer').html(optionsHtml);
        },
        error: function(xhr) {
            $('#questionOptionsContainer').html('<p class="text-danger">Error loading options.</p>');
        }
    });
}

// View relations
function viewRelations(questionId) {
    $.ajax({
        url: `/admin-new/get-question-relations/${questionId}`,
        type: 'GET',
        success: function(response) {
            let content = `
                <h6>Question: ${response.question.question_text}</h6>
                <hr>
                <h6>Relations:</h6>
            `;
            
            if (response.relations.length > 0) {
                content += '<div class="table-responsive"><table class="table table-sm">';
                content += '<thead><tr><th>Option</th><th>Related Question</th><th>Actions</th></tr></thead><tbody>';
                
                response.relations.forEach(function(relation) {
                    content += `
                        <tr>
                            <td>${relation.option.option_text}</td>
                            <td>${relation.related_question.question_text}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteRelation(${relation.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                });
                
                content += '</tbody></table></div>';
            } else {
                content += '<p class="text-muted">No relations found for this question.</p>';
            }
            
            $('#viewRelationsContent').html(content);
            $('#viewRelationsModal').modal('show');
        },
        error: function(xhr) {
            showError('Error loading relations.');
        }
    });
}

// Add relation
function addRelation(questionId) {
    $('#selected_question_id').val(questionId).trigger('change');
    $('#addRelationModal').modal('show');
}

// Edit relations
function editRelations(questionId) {
    addRelation(questionId);
}

// Delete all relations
function deleteAllRelations(questionId) {
    Swal.fire({
        title: 'Delete All Relations',
        text: 'Are you sure you want to delete all relations for this question?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete all!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin-new/delete-all-relations/${questionId}`,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    showSuccess('All relations deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    showError('Error deleting relations.');
                }
            });
        }
    });
}

// Refresh relations
function refreshRelations() {
    location.reload();
}

// Export relations
function exportRelations() {
    showSuccess('Export functionality coming soon!');
}
</script>
@endsection
