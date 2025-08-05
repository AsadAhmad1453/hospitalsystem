@extends('admin.layouts.main')
@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
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
                                <th>Form</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$form->name}}</td>
                                    <td>
                                        <a href="#" class="text-warning edit-form-btn" data-form-id="{{$form->id}}" data-form-name="{{$form->name}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('del-form', $form->id)}}" data-jobs="sdadas" class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form action="{{route('save-form')}}" method="POST" class="add-new-record modal-content pt-0">
                    @csrf
                    <input type="hidden" name="form_id" id="form_id" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">New Form</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="name">Form Name</label>
                            <input type="text" name="name" class="form-control dt-full-name" id="name" placeholder="Form Name" aria-label="John Doe" />
                        </div>
                                        
                        <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
{{-- <script src="{{asset('admin-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>

    $(function () {
        'use strict';

        var dt_basic_table = $('.datatables-basic');

        if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({
                // No ajax, use Blade-rendered data
                order: [[0, 'asc']],
                dom:
                    '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>>' +
                    '<"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    't' +
                    '<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [
                    {
                        text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Add New Record',
                        className: 'create-new btn btn-primary',
                        action: function (e, dt, node, config) {
                            $('#modals-slide-in').modal('show');
                        }
                    }
                ],
                responsive: true,
                language: {
                    paginate: {
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }   
                }
            });
                $('.patient-status-toggle').bootstrapToggle();
            $('div.head-label').html('<h6 class="mb-0">Forms</h6>');
        }
    });
    $(document).on('click','.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this form!",
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

// Handle edit form button click
$(document).on('click', '.edit-form-btn', function(e) {
    e.preventDefault();
    var formId = $(this).data('form-id');
    var formName = $(this).data('form-name');
    
    // Populate the modal with form data
    $('#form_id').val(formId);
    $('#name').val(formName);
    $('#exampleModalLabel').text('Edit Form');
    
    // Open the modal
    $('#modals-slide-in').modal('show');
});

// Reset modal when it's closed
$('#modals-slide-in').on('hidden.bs.modal', function () {
    $('#form_id').val('');
    $('#name').val('');
    $('#exampleModalLabel').text('New Form');
});
   
</script>
@endsection