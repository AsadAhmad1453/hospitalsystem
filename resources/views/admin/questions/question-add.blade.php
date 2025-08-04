@extends('admin.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
@endsection
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Question</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('save-question') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="question">Question Statement</label>
                                        <input type="text" id="question" class="form-control " placeholder="Statement" name="question" value="{{ old('question') }}" />
                                        @if ($errors->has('question'))
                                            <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                                Please enter a valid question statement.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="priority">Select Priority</label>
                                    <select class="select2 form-control form-control-lg" id="priority" name="priority">
                                            <option value="1">Required</option>
                                            <option value="0">Optional</option>
                                    </select>
                                    @if ($errors->has('priority'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please select the priority of the question.
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-6 mb-1">
                                    <label>Select Form</label>
                                    <select class="select2 form-control form-control-lg" id="section" name="form_id">
                                        @foreach($forms as $form)
                                            <option value="{{ $form->id }}" {{ old('form_id') == $form->id ? 'selected' : '' }}>{{ $form->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('form_id'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please select a form.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Select Section</label>
                                    <select class="select2 form-control form-control-lg" id="section" name="section_id">
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('section_id'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please select a section.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Question Type</label>
                                    <select class="select2 form-control form-control-lg" id="question_type" name="question_type">
                                        <option value="0" {{ old('question_type') == 1 ? 'selected' : '' }}>Single Select Question</option>
                                        <option value="1" {{ old('question_type') == 1 ? 'selected' : '' }}>Multi-select Question</option>
                                        <option value="2" {{ old('question_type') == 2 ? 'selected' : '' }}>Text Question</option>
                                        <option value="3" {{ old('question_type') == 2 ? 'selected' : '' }}>Date</option>
                                    </select>
                                    @if ($errors->has('question_type'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please select a question type.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12" id="option-fields" style="display: none;">
                                    <div class="form-group">
                                        <label>Options</label>
                                        <div id="options-list">
                                            <div class="input-group mb-1 option-item">
                                                <input type="text" name="options[]" class="form-control" placeholder="Option 1">
                                                <button type="button" class="btn btn-danger btn-sm delete-option" style="display:none;"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-info mt-0" id="add-option">Add Option</button>
                                        @if ($errors->has('options'))
                                            <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                                Please provide at least two options.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('admin-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-select2.js') }}"></script>

<script>
$(document).ready(function() {
    

    // Show/hide option fields based on question type
    function toggleOptionFields() {
        var type = $('#question_type').val();
        if (type == '0' || type == '1') {
            $('#option-fields').show();
        } else {
            $('#option-fields').hide();
        }
    }
    $('#question_type').on('change', toggleOptionFields);
    toggleOptionFields();

    // Add option
    $('#add-option').on('click', function() {
        var optionCount = $('#options-list .option-item').length + 1;
        var optionHtml = `
            <div class="input-group mb-1 option-item">
                <input type="text" name="options[]" class="form-control" placeholder="Option ` + optionCount + `">
                <button type="button" class="btn btn-danger btn-sm delete-option"><i class="fa fa-trash"></i></button>
            </div>
        `;
        $('#options-list').append(optionHtml);
        updateDeleteButtons();
        updatePlaceholders();
    });

    // Delete option
    $('#options-list').on('click', '.delete-option', function() {
        $(this).closest('.option-item').remove();
        updateDeleteButtons();
        updatePlaceholders();
    });

    // Show delete button only if more than one option
    function updateDeleteButtons() {
        var items = $('#options-list .option-item');
        if (items.length > 1) {
            items.find('.delete-option').show();
        } else {
            items.find('.delete-option').hide();
        }
    }

    // Update placeholders after delete
    function updatePlaceholders() {
        $('#options-list .option-item input').each(function(i) {
            $(this).attr('placeholder', 'Option ' + (i + 1));
        });
    }

    updateDeleteButtons();
    updatePlaceholders();
});
</script>
@endsection