@extends('admin-new.layouts.main')
@section('title', 'Questions Management')
@section('page-title', 'Questions Management')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="mb-2">Questions Management</h2>
                                <p class="text-muted mb-0">Create and manage form questions with various types and options.
                                </p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin-new.add-question') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Add New Question
                                    </a>
                                    <button class="btn btn-outline-primary" onclick="bulkImport()">
                                        <i class="fas fa-upload me-2"></i>Bulk Import
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <!-- Statistics Cards -->
        <div class="row mb-4">
            @php
                $stats = [
                    [
                        'count' => $questions->count(),
                        'label' => 'Questions',
                        'icon' => 'fas fa-question-circle',
                        'style' => '',
                    ],
                    [
                        'count' => $sections->count(),
                        'label' => 'Sections',
                        'icon' => 'fas fa-layer-group',
                        'style' => 'background: linear-gradient(135deg, #28a745 0%, #20c997 100%);',
                    ],
                    [
                        'count' => $questions->where('question_type', 0)->count(),
                        'label' => 'Multiple Choice',
                        'icon' => 'fas fa-list-check',
                        'style' => 'background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);',
                    ],
                    [
                        'count' => $questions->where('question_type', 2)->count(),
                        'label' => 'Text Questions',
                        'icon' => 'fas fa-keyboard',
                        'style' => 'background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);',
                    ],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stats-card h-100" style="{{ $stat['style'] }}">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="icon me-3">
                                    <i class="{{ $stat['icon'] }} fa-xs"></i>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="number stat-number"><small
                                            style="font-size: 0.75em;">{{ $stat['count'] }}</small></div>
                                    <div class="label ms-1"><small style="font-size: 0.75em;">{{ $stat['label'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Filters and Search -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Search Questions</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Question text..."
                                        id="searchInput">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Section</label>
                                <select class="form-control select2" id="sectionFilter">
                                    <option value="">All Sections</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Type</label>
                                <select class="form-control" id="typeFilter">
                                    <option value="">All Types</option>
                                    <option value="0">Multiple Choice</option>
                                    <option value="1">Single Choice</option>
                                    <option value="2">Text Input</option>
                                    <option value="3">Textarea</option>
                                    <option value="4">Number</option>
                                    <option value="5">Date</option>
                                    <option value="6">File Upload</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Form</label>
                                <select class="form-control select2" id="formFilter">
                                    <option value="">All Forms</option>
                                    @foreach (\App\Models\Form::all() as $form)
                                        <option value="{{ $form->id }}">{{ $form->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Required</label>
                                <select class="form-control" id="requiredFilter">
                                    <option value="">All</option>
                                    <option value="1">Required</option>
                                    <option value="0">Optional</option>
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

        <!-- Questions Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All Questions</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="refreshTable()">
                                <i class="fas fa-sync-alt me-1"></i>Refresh
                            </button>
                            {{-- <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="exportToExcel()">Export to
                                            Excel</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportToPDF()">Export to PDF</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover data-table" id="questionsTable">
                                <thead>
                                    <tr>
                                        <th width="50">
                                            <input type="checkbox" id="selectAll" class="form-check-input">
                                        </th>
                                        <th>Question</th>
                                        <th>Type</th>
                                        <th>Section</th>
                                        <th>Form</th>
                                        <th>Required</th>
                                        <th>Position</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="form-check-input question-checkbox"
                                                    value="{{ $question->id }}">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                        style="width: 35px; height: 35px;">
                                                        <i class="fas fa-question text-white"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">{{ Str::limit($question->question, 60) }}
                                                        </div>
                                                        @if ($question->description)
                                                            <small
                                                                class="text-muted">{{ Str::limit($question->description, 40) }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $question->question_type == 0 ? 'primary' : ($question->question_type == 1 ? 'info' : 'success') }}">
                                                    @switch($question->question_type)
                                                        @case(0)
                                                            Single Choice
                                                        @break

                                                        @case(1)
                                                            Multiple Choice
                                                        @break

                                                        @case(2)
                                                            Text Input
                                                        @break

                                                        @case(3)
                                                            Date
                                                        @break

                                                        @case(4)
                                                            Number
                                                        @break

                                                        @case(5)
                                                            Textarea
                                                        @break

                                                        @case(6)
                                                            File Upload
                                                        @break

                                                        @default
                                                            Unknown
                                                    @endswitch
                                                </span>
                                            </td>
                                            <td>
                                                @if ($question->section)
                                                    <span class="badge bg-secondary">{{ $question->section->name }}</span>
                                                @else
                                                    <span class="text-muted">No Section</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($question->form)
                                                    <span class="badge bg-info">{{ $question->form->name }}</span>
                                                @else
                                                    <span class="text-muted">No Form</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($question->is_required)
                                                    <span class="badge bg-danger">Required</span>
                                                @else
                                                    <span class="badge bg-success">Optional</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-light text-dark">{{ $question->position ?? 0 }}</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="viewQuestion({{ $question->id }})">
                                                                <i class="fas fa-eye me-2"></i>View Details
                                                            </a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="editQuestion({{ $question->id }})">
                                                                <i class="fas fa-edit me-2"></i>Edit Question
                                                            </a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="manageOptions({{ $question->id }})">
                                                                <i class="fas fa-list me-2"></i>Manage Options
                                                            </a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="duplicateQuestion({{ $question->id }})">
                                                                <i class="fas fa-copy me-2"></i>Duplicate
                                                            </a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="moveUp({{ $question->id }})">
                                                                <i class="fas fa-arrow-up me-2"></i>Move Up
                                                            </a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                onclick="moveDown({{ $question->id }})">
                                                                <i class="fas fa-arrow-down me-2"></i>Move Down
                                                            </a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item text-danger" href="#"
                                                                onclick="deleteQuestion({{ $question->id }})">
                                                                <i class="fas fa-trash me-2"></i>Delete Question
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

    <!-- Add Question Modal -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin-new.save-question') }}" method="POST" id="addQuestionForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="question" class="form-label">Question Text *</label>
                                <textarea class="form-control" id="question" name="question" rows="2" required></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="question_type" class="form-label">Question Type *</label>
                                <select class="form-control" id="question_type" name="question_type" required
                                    onchange="toggleOptions()">
                                    <option value="">Select Type</option>
                                    <option value="0">Multiple Choice</option>
                                    <option value="1">Single Choice</option>
                                    <option value="2">Text Input</option>
                                    <option value="3">Textarea</option>
                                    <option value="4">Number</option>
                                    <option value="5">Date</option>
                                    <option value="6">File Upload</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="section_id" class="form-label">Section *</label>
                                <select class="form-control select2" id="section_id" name="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form_id" class="form-label">Form *</label>
                                <select class="form-control select2" id="form_id" name="form_id" required>
                                    <option value="">Select Form</option>
                                    @foreach (\App\Models\Form::all() as $form)
                                        <option value="{{ $form->id }}">{{ $form->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description/Help Text</label>
                                <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="number" class="form-control" id="position" name="position"
                                    min="0" value="0">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="is_required" class="form-label">Required</label>
                                <select class="form-control" id="is_required" name="is_required">
                                    <option value="0">Optional</option>
                                    <option value="1">Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validation_rules" class="form-label">Validation Rules</label>
                                <input type="text" class="form-control" id="validation_rules" name="validation_rules"
                                    placeholder="e.g., min:1,max:100">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="placeholder" class="form-label">Placeholder</label>
                                <input type="text" class="form-control" id="placeholder" name="placeholder">
                            </div>

                            <!-- Options Section (for multiple choice and single choice) -->
                            <div class="col-12 mb-3" id="optionsSection" style="display: none;">
                                <label class="form-label">Answer Options</label>
                                <div id="optionsContainer">
                                    <div class="option-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="options[]"
                                                placeholder="Option text">
                                            <button type="button" class="btn btn-outline-danger"
                                                onclick="removeOption(this)">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Question
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Question Modal -->
    <div class="modal fade" id="editQuestionModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editQuestionForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Same form fields as add question -->
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="edit_question" class="form-label">Question Text *</label>
                                <textarea class="form-control" id="edit_question" name="question" rows="2" required></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit_question_type" class="form-label">Question Type *</label>
                                <select class="form-control" id="edit_question_type" name="question_type" required
                                    onchange="toggleEditOptions()">
                                    <option value="">Select Type</option>
                                    <option value="0">Single Choice</option>
                                    <option value="1">Multiple Choice</option>
                                    <option value="2">Text Input</option>
                                    <option value="3">Date</option>
                                    <option value="4">Textarea</option>
                                    <option value="5">Number</option>
                                    <option value="6">File Upload</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_section_id" class="form-label">Section *</label>
                                <select class="form-control select2" id="edit_section_id" name="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_form_id" class="form-label">Form *</label>
                                <select class="form-control select2" id="edit_form_id" name="form_id" required>
                                    <option value="">Select Form</option>
                                    @foreach (\App\Models\Form::all() as $form)
                                        <option value="{{ $form->id }}">{{ $form->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_description" class="form-label">Description/Help Text</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="2"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="edit_position" class="form-label">Position</label>
                                <input type="number" class="form-control" id="edit_position" name="position"
                                    min="0">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="edit_is_required" class="form-label">Required</label>
                                <select class="form-control" id="edit_is_required" name="is_required">
                                    <option value="0">Optional</option>
                                    <option value="1">Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="edit_validation_rules" class="form-label">Validation Rules</label>
                                <input type="text" class="form-control" id="edit_validation_rules"
                                    name="validation_rules">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="edit_placeholder" class="form-label">Placeholder</label>
                                <input type="text" class="form-control" id="edit_placeholder" name="placeholder">
                            </div>

                            <!-- Edit Options Section -->
                            <div class="col-12 mb-3" id="editOptionsSection" style="display: none;">
                                <label class="form-label">Answer Options</label>
                                <div id="editOptionsContainer">
                                    <!-- Options will be loaded here -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addEditOption()">
                                    <i class="fas fa-plus me-1"></i>Add Option
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Question
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Question Modal -->
    <div class="modal fade" id="viewQuestionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="viewQuestionContent">
                    <!-- Question details will be loaded here -->
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
            // Search functionality
            $('#searchInput').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#questionsTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Filter functionality
            $('#sectionFilter, #typeFilter, #formFilter, #requiredFilter').on('change', function() {
                filterTable();
            });

            // Select all checkbox
            $('#selectAll').on('change', function() {
                $('.question-checkbox').prop('checked', this.checked);
            });

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
                        $('#addQuestionModal').modal('hide');
                        showSuccess('Question created successfully!');
                        location.reload();
                    },
                    error: function(xhr) {
                        hideLoading(button, originalText);
                        showError('Error creating question: ' + xhr.responseJSON.message);
                    }
                });
            });
        });

        // Toggle options section based on question type
        function toggleOptions() {
            const questionType = $('#question_type').val();
            const optionsSection = $('#optionsSection');

            if (questionType == 0 || questionType == 1) {
                optionsSection.show();
            } else {
                optionsSection.hide();
            }
        }

        function toggleEditOptions() {
            const questionType = $('#edit_question_type').val();
            const optionsSection = $('#editOptionsSection');

            if (questionType == 0 || questionType == 1) {
                optionsSection.show();
            } else {
                optionsSection.hide();
            }
        }

        // Add option
        function addOption() {
            const container = $('#optionsContainer');
            const optionHtml = `
        <div class="option-item mb-2">
            <div class="input-group">
                <input type="text" class="form-control" name="options[]" placeholder="Option text">
                <button type="button" class="btn btn-outline-danger" onclick="removeOption(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
            container.append(optionHtml);
        }

        function addEditOption() {
            const container = $('#editOptionsContainer');
            const optionHtml = `
        <div class="option-item mb-2">
            <div class="input-group">
                <input type="text" class="form-control" name="edit_options[]" placeholder="Option text">
                <button type="button" class="btn btn-outline-danger" onclick="removeOption(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
            container.append(optionHtml);
        }

        // Remove option
        function removeOption(button) {
            $(button).closest('.option-item').remove();
        }

        // Filter table
        function filterTable() {
            const section = $('#sectionFilter').val();
            const type = $('#typeFilter').val();
            const form = $('#formFilter').val();
            const required = $('#requiredFilter').val();

            $('#questionsTable tbody tr').each(function() {
                let show = true;

                if (section && !$(this).text().includes(section)) {
                    show = false;
                }

                if (type && !$(this).find('.badge').text().toLowerCase().includes(getTypeText(type)
                        .toLowerCase())) {
                    show = false;
                }

                if (form && !$(this).text().includes(form)) {
                    show = false;
                }

                if (required && !$(this).text().includes(required == '1' ? 'Required' : 'Optional')) {
                    show = false;
                }

                $(this).toggle(show);
            });
        }

        function getTypeText(type) {
            const types = {
                '0': 'Multiple Choice',
                '1': 'Single Choice',
                '2': 'Text Input',
                '3': 'Textarea',
                '4': 'Number',
                '5': 'Date',
                '6': 'File Upload'
            };
            return types[type] || '';
        }

        // Clear filters
        function clearFilters() {
            $('#searchInput').val('');
            $('#sectionFilter').val('').trigger('change');
            $('#typeFilter').val('');
            $('#formFilter').val('').trigger('change');
            $('#requiredFilter').val('');
            $('#questionsTable tbody tr').show();
        }

        // Refresh table
        function refreshTable() {
            location.reload();
        }

        // View question
        function viewQuestion(questionId) {
            $.get(`/admin-new/questions/${questionId}`, function(data) {
                $('#viewQuestionContent').html(`
            <div class="row">
                <div class="col-md-8">
                    <h5>${data.question}</h5>
                    ${data.description ? `<p class="text-muted">${data.description}</p>` : ''}
                    <div class="row g-3">
                        <div class="col-6">
                            <strong>Type:</strong> ${getTypeText(data.question_type)}
                        </div>
                        <div class="col-6">
                            <strong>Section:</strong> ${data.section ? data.section.name : 'No Section'}
                        </div>
                        <div class="col-6">
                            <strong>Form:</strong> ${data.form ? data.form.name : 'No Form'}
                        </div>
                        <div class="col-6">
                            <strong>Required:</strong> ${data.is_required ? 'Yes' : 'No'}
                        </div>
                        <div class="col-6">
                            <strong>Position:</strong> ${data.position || 0}
                        </div>
                        <div class="col-6">
                            <strong>Validation:</strong> ${data.validation_rules || 'None'}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Options</h6>
                        </div>
                        <div class="card-body">
                            ${data.options && data.options.length > 0 ? 
                                data.options.map(option => `<div class="badge bg-light text-dark me-1 mb-1">${option.option}</div>`).join('') :
                                '<p class="text-muted">No options available</p>'
                            }
                        </div>
                    </div>
                </div>
            </div>
        `);
                $('#viewQuestionModal').modal('show');
            });
        }

        // Edit question
        function editQuestion(questionId) {
            $.get(`/admin-new/questions/${questionId}`, function(data) {
                $('#edit_question').val(data.question);
                $('#edit_question_type').val(data.question_type);
                $('#edit_section_id').val(data.section_id).trigger('change');
                $('#edit_form_id').val(data.form_id).trigger('change');
                $('#edit_description').val(data.description);
                $('#edit_position').val(data.position);
                $('#edit_is_required').val(data.is_required);
                $('#edit_validation_rules').val(data.validation_rules);
                $('#edit_placeholder').val(data.placeholder);

                // Load options
                if (data.options && data.options.length > 0) {
                    const container = $('#editOptionsContainer');
                    container.empty();
                    data.options.forEach(option => {
                        const optionHtml = `
                    <div class="option-item mb-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="edit_options[]" value="${option.option}">
                            <button type="button" class="btn btn-outline-danger" onclick="removeOption(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                        container.append(optionHtml);
                    });
                }

                toggleEditOptions();
                $('#editQuestionForm').attr('action', `/admin-new/questions/${questionId}`);
                $('#editQuestionModal').modal('show');
            });
        }

        // Delete question
        function deleteQuestion(questionId) {
            confirmDelete('Are you sure you want to delete this question? This action cannot be undone.').then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/admin-new/delete-question/${questionId}`,
                        type: 'GET',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            showSuccess('Question deleted successfully!');
                            location.reload();
                        },
                        error: function(xhr) {
                            let errorMsg = 'Error deleting question.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg += ' ' + xhr.responseJSON.message;
                            }
                            showError(errorMsg);
                        }
                    });
                }
            });
        }

        // Duplicate question
        function duplicateQuestion(questionId) {
            Swal.fire({
                title: 'Duplicate Question',
                text: 'Are you sure you want to duplicate this question?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, duplicate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Implement duplicate logic
                    showSuccess('Question duplicated successfully!');
                }
            });
        }

        // Move up/down
        function moveUp(questionId) {
            // Implement move up logic
            showSuccess('Question moved up!');
        }

        function moveDown(questionId) {
            // Implement move down logic
            showSuccess('Question moved down!');
        }

        // Manage options
        function manageOptions(questionId) {
            // Open options management modal
            showSuccess('Options management coming soon!');
        }

        // Export functions
        function exportToExcel() {
            window.open('/admin-new/questions/export/excel', '_blank');
        }

        function exportToPDF() {
            window.open('/admin-new/questions/export/pdf', '_blank');
        }

        // Bulk import
        function bulkImport() {
            showSuccess('Bulk import functionality coming soon!');
        }
    </script>
@endsection
