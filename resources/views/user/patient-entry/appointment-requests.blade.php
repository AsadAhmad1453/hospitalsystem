@extends('user.layouts.main')
@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
@endsection
@section('content')

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Appointment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->patient->name}}</td>

                                    
                                    <td>{{$appointment->appointment_date}}</td>
                                    
                                    <td>
                                        <a href="{{ route('save-appointment', $appointment->patient->id) }}" class="text-warning"><i class="fa fa-save"></i></a>
                                        <a type="button" data-toggle="modal" data-target="#exampleModalCenter-{{ $appointment->id }}" class="text-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('del-appointment', $appointment->id)}}" data-jobs="sdadas" class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                     <div class="modal fade" id="exampleModalCenter-{{ $appointment->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-{{ $appointment->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Next Appointment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('update-appointment', $appointment->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mt-1">
                                        <label for="appointment_date">Appointment Scheduale</label>
                                        <input type="date" class="my-1 form-control" name="appointment_date" id="appointment_date" required value="{{ old('appointment_date') }}">
                                        @error('appointment_date')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <!-- Send Invoice Sidebar -->
        
           
        <!-- /Send Invoice Sidebar -->
    </section>
@endsection
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
{{-- <script src="{{asset('admin-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    $(document).on('change', '#activetoggle', function () {
        var patientId = $(this).data('id');
        var status = $(this).prop('checked') ? '1' : '0';
        $.ajax({
            url: "{{ route('patient-status-toggle') }}",
            method: 'GET',
            data: {
                id: patientId,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    // Optionally show a success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: 'Patient status has been updated successfully.',
                        confirmButtonClass: 'btn btn-success',
                    });
                } else {
                    // Optionally show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        confirmButtonClass: 'btn btn-danger',
                    });
                }
            },
            error: function(xhr) {
                // Optionally handle error
            }
        });
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
            buttons: [
                {
                    text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Add New Record',
                    className: 'create-new btn btn-primary',
                    action: function (e, dt, node, config) {
                        window.location.href = "{{ route('patient-add') }}"; // <-- Change to your route
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
        $('div.head-label').html('<h6 class="mb-0">Patients Table</h6>');
    }

    });

    $(document).on('click','.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this Testimonial!",
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