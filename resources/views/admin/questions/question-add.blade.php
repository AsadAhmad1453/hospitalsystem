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
                                        @error('question')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-1">
                                    <label>Select Section</label>
                                    <select class="select2 form-control form-control-lg" id="section" name="section_id">
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Question Type</label>
                                    <select class="select2 form-control form-control-lg" id="question_type" name="question_type">
                                        <option value="0" {{ old('question_type') == 1 ? 'selected' : '' }}>Single Select Question</option>
                                        <option value="1" {{ old('question_type') == 1 ? 'selected' : '' }}>Multi-select Question</option>
                                        <option value="2" {{ old('question_type') == 2 ? 'selected' : '' }}>Text Question</option>
                                        <option value="3" {{ old('question_type') == 2 ? 'selected' : '' }}>Date</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-1">
                                    <label>Has Dependency?</label>
                                    <select class="select2 form-control form-control-lg" id="has_dependency" name="has_dependency">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
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
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Select Dependent Question</label>
                                    <select class="select2 form-control form-control-lg" id="dependentQuestion" name="dependent_question_id">
                                        @foreach($questions as $question)
                                            <option value="{{ $question->id }}" {{ old('dependent_question_id') == $question->id ? 'selected' : '' }}>{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Dependent Options</label>
                                    <select class="select2 form-control" id="dependentOptions" name="options_id[]" multiple>
                                       
                                    </select>
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
{{-- <script>
$(document).ready(function() {
    function toggleDependencyDropdown() {
        if ($('#has_dependency').val() === 'yes') {
            $('#dependentQuestion').closest('.col-md-6').show();
        } else {
            $('#dependentQuestion').closest('.col-md-6').hide();
        }
    }

        // Run on page load and on change
    toggleDependencyDropdown();
    $('#has_dependency').on('change', toggleDependencyDropdown);


    var allQuestions = @json($questions);

    $('#dependentQuestion').on('change', function() {
    var selectedId = $(this).val();
    var options = [];
    allQuestions.forEach(function(q) {
        if (q.id == selectedId) {
            options = q.options;
        }
    });

    var $dependentOptions = $('#dependentOptions');
    $dependentOptions.empty();
    if (options && options.length > 0) {
        options.forEach(function(opt) {
            $dependentOptions.append('<option value="'+opt.id+'">'+opt.option+'</option>');
        });
        $dependentOptions.closest('.form-group').show();
    } else {
        $dependentOptions.closest('.form-group').hide();
    }
});

// Optionally, trigger change on page load if you want to pre-populate
$('#dependentQuestion').trigger('change');
    
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



    function generateUniqueNumber() {
        var name = $('#patient-name').val().trim();
        var age = $('#patient-age').val().trim();
        var sex = $('#patient-sex').val();
        var phone = $('#patient-phone').val().trim();
        var city = $('#patient-city').val().trim();

        var firstName = name.split(' ')[0] || '';
        var lastThreePhone = phone ? phone.slice(-3) : '';
        var cityFirstLetter = city ? city.charAt(0).toUpperCase() : '';

        // Always generate, even if some fields are empty
        var unique = firstName + '-' + age + '-' + sex + '-' + lastThreePhone + '-' + cityFirstLetter;
        $('#unique-number').val(unique.replace(/^-+|-+$/g, '').replace(/--+/g, '-'));
    }

    $('#patient-name, #patient-age, #patient-sex, #patient-phone, #patient-city').on('input change', generateUniqueNumber);
});
</script> --}}

<script>
$(document).ready(function() {
    // Hide dependency fields by default
    $('#dependentQuestion').closest('.col-md-6').hide();
    $('#dependentOptions').closest('.col-md-6').hide();

    // All questions with options from backend
    var allQuestions = @json($questions);

    // Show/hide dependency question and options dropdown
    function toggleDependencyDropdown() {
        if ($('#has_dependency').val() === 'yes') {
            $('#dependentQuestion').closest('.col-md-6').show();
            // Only show options if a question is selected and has options
            $('#dependentQuestion').trigger('change');
        } else {
            $('#dependentQuestion').closest('.col-md-6').hide();
            $('#dependentOptions').closest('.col-md-6').hide();
        }
    }

    // Run on page load and on change
    toggleDependencyDropdown();
    $('#has_dependency').on('change', toggleDependencyDropdown);

    // Show dependent options only after a question is selected
    $('#dependentQuestion').on('change', function() {
        // Only proceed if dependency is enabled
        if ($('#has_dependency').val() !== 'yes') {
            $('#dependentOptions').closest('.col-md-6').hide();
            return;
        }
        var selectedId = $(this).val();
        var options = [];
        allQuestions.forEach(function(q) {
            if (q.id == selectedId) {
                options = q.options;
            }
        });

        var $dependentOptions = $('#dependentOptions');
        $dependentOptions.empty();
        if (options && options.length > 0) {
            options.forEach(function(opt) {
                $dependentOptions.append('<option value="'+opt.id+'">'+opt.option+'</option>');
            });
            $dependentOptions.closest('.col-md-6').show();
            // If using select2, refresh it:
            if ($dependentOptions.hasClass('select2')) {
                $dependentOptions.trigger('change.select2');
            }
        } else {
            $dependentOptions.closest('.col-md-6').hide();
        }
    });

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