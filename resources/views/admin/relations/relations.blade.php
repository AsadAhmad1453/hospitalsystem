@extends('admin.layouts.main')
@section('custom-css')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('content')

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question Statement</th>
                                <th>Section</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            @foreach($questions as $question)
                                <tr class="ui-state-default question-row" data-question-id="{{ $question->id }}" style="cursor: pointer;">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>{{$question->section->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Question Options Modal -->
    <div class="modal fade" id="questionOptionsModal" tabindex="-1" role="dialog" aria-labelledby="questionOptionsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="questionOptionsForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="questionOptionsModalLabel">Question Options & Relations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            @csrf
                            <input type="hidden" id="selected_question_id" name="selected_question_id">

                            <div class="form-group">
                                <label for="question_options">Select Options (Multiple)</label>
                                <select class="form-control select2" id="question_options" name="question_options[]" multiple>
                                    <!-- Options will be populated below -->
                                </select>
                                <small class="form-text text-muted">Select multiple options from the current question</small>
                            </div>

                            <div class="form-group">
                                <label for="related_question">Select Related Question</label>
                                <select class="form-control select2" id="related_question" name="related_question">
                                    <option value="">Choose a question...</option>
                                    @foreach($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Choose another question to relate to</small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveQuestionOptions">Save Relations</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('custom-js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('admin-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script>
    // Initialize Select2
    $(document).ready(function() {
        // Prepare a questions/options map from Blade
        var questionsData = @json($questions);

        $('.select2').select2({
            width: '100%',
            placeholder: 'Select options...'
        });

        // Handle question row click to open modal
        $(document).on('click', '.question-row', function(e) {

            // Don't trigger if clicking on action buttons
            if ($(e.target).closest('td:last-child').length) {
                return;
            }

            var questionId = $(this).data('question-id');
            var questionText = $(this).find('td:nth-child(2)').text();

            // Set modal title and question ID
            $('#questionOptionsModalLabel').text('Options for: ' + questionText);
            $('#selected_question_id').val(questionId);

            // Load options for this question from questionsData
            var optionsSelect = $('#question_options');
            optionsSelect.empty();

            var question = questionsData.find(function(q) {
                return q.id == questionId;
            });

            if (question && question.options && question.options.length > 0) {
                question.options.forEach(function(option) {
                    optionsSelect.append(new Option(option.option, option.id));
                });
            } else {
                optionsSelect.append(new Option('No options available', ''));
            }

            // Reinitialize Select2
            optionsSelect.select2({
                width: '100%',
                placeholder: 'Select options...'
            });

            // Open modal
            $('#questionOptionsModal').modal('show');
        });

        // Handle save form submit
        $('#questionOptionsForm').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/save-question-relations',
                method: 'POST',
                data: formData,
                success: function(response) {
                    $('#questionOptionsModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Question relations saved successfully!',
                        confirmButtonClass: 'btn btn-primary'
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to save question relations.',
                        confirmButtonClass: 'btn btn-primary'
                    });
                }
            });
        });
    });

    $("#sortable").sortable({
        update: function(event, ui) {
            var questionOrder = [];
            $("#sortable tr").each(function(index) {
                questionOrder.push({
                    id: $(this).find('.course-sure').attr('href').split('/').pop(),
                    position: index + 1
                });
            });

            $("#sortable tr").each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
            console.log(questionOrder)

            $.ajax({
                url: '/admin/update-question-order',
                method: 'POST',
                data: {
                    order: questionOrder,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (typeof toastr !== 'undefined') {
                        toastr.success('Question order updated successfully');
                    } else if (typeof Swal !== 'undefined') {
                        showToast('Question order updated successfully', 'success');
                    } else {
                        alert('Question order updated successfully');
                    }
                },
                error: function(xhr) {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Error updating question order');
                    } else if (typeof Swal !== 'undefined') {
                        showToast('Error updating question order', 'error');
                    } else {
                        alert('Error updating question order');
                    }
                }
            });
        }
    });
    $(function () {
        'use strict';

        var dt_basic_table = $('.datatables-basic');

        if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({
                // No ajax, use Blade-rendered data
                order: [[0, 'asc']],
                dom:
                    '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>>' +
                    '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    't' +
                    '<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [],
                responsive: true,
                language: {
                    paginate: {
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                }
            });
                $('.patient-status-toggle').bootstrapToggle();
            $('div.head-label').html('<h6 class="mb-0">Make Relations</h6>');
        }

    });

    $(document).on('click','.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this Question!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            window.location.href = approvalLink;
        }
    });
});

</script>
@endsection
