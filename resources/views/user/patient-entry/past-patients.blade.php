@extends('user.layouts.main')
@section('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <style>
        .btn-info {
            padding: 5px;
            font-size: 12px !important;
        }
    </style>
@endsection
@section('content')
    <div class="data-table-page-hero">
        <div>
            <h2 class="text-white">Past Patients</h2>
            <p>Quickly revisit patient histories, invoices, and follow‑up information.</p>
        </div>
    </div>

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr class="text-center">
                                <th>Unique Number</th>
                                <th>CNIC</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr class="text-center">
                                    <td>{{ $patient->unique_number }}</td>
                                    <td>{{ $patient->cnic }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('patient-edit', $patient->id) }}"
                                            class="btn btn-info mr-1">Invoice</a>
                                        <a href="{{ route('del-user-patient', $patient->id) }}" data-jobs="sdadas"
                                            class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->

    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            var dt_basic_table = $('.datatables-basic');

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    // No ajax, use Blade-rendered data
                    order: [
                        [0, 'asc']
                    ],
                    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't' +
                        '<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 10,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    buttons: [{
                        text: feather.icons['plus'].toSvg({
                            class: 'mr-50 font-small-4'
                        }) + 'Add New Record',
                        className: 'create-new btn btn-primary',
                        action: function(e, dt, node, config) {
                            window.location.href =
                            "{{ route('patient-add') }}"; // <-- Change to your route
                        }
                    }],
                    responsive: true,
                    language: {
                        paginate: {
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });
                $('div.head-label').html('<h4 class="mb-0 pl-1 "><strong>Past Patients </strong> </h4>');
            }

        });

        $(document).on('click', '.course-sure', function(event) {
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
            }).then(function(result) {
                if (result.value) {
                    window.location.href = approvalLink;
                }
            });
        });
    </script>
@endsection
