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
        href="{{ asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/extensions/toastr.min.css') }}">
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
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>


                                    <td>{{ $appointment->appointment_date }}</td>

                                    <td>
                                        <a href="{{ route('save-appointment', $appointment->id) }}"
                                            class="text-warning confirm-save"
                                            data-service-count="{{ $appointment->services->count() }}"><i
                                                class="fa fa-save"></i></a>
                                        <a type="button" data-toggle="modal"
                                            data-target="#exampleModalCenter-{{ $appointment->id }}"
                                            class="text-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('del-appointment', $appointment->id) }}" data-jobs="sdadas"
                                            class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modals for each appointment -->
        @foreach ($appointments as $appointment)
            <div class="modal fade" id="exampleModalCenter-{{ $appointment->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle-{{ $appointment->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle-{{ $appointment->id }}">Next Appointment
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('update-appointment', $appointment->id) }}" method="POST"
                            class="update-appointment-form" data-id="{{ $appointment->id }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mt-1">
                                    <label for="appointment_date-{{ $appointment->id }}">Appointment Schedule</label>
                                    <input type="date" class="my-1 form-control" name="appointment_date"
                                        id="appointment_date-{{ $appointment->id }}" required
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                        value="{{ old('appointment_date', $appointment->appointment_date) }}">
                                    @error('appointment_date')
                                        <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="services-{{ $appointment->id }}">Select Services <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" name="services[]"
                                        id="services-{{ $appointment->id }}" multiple required>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                @if (
                                                    (is_array(old('services')) && in_array($service->id, old('services'))) ||
                                                        (!is_array(old('services')) && $appointment->services->contains('id', $service->id))) selected @endif>
                                                {{ $service->service_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('services')
                                        <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Accept</button>
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
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    {{-- <script src="{{asset('admin-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
    <script src="{{ asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script>
        // Start Toastr Configuration
        if (typeof toastr !== 'undefined') {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (session('success'))
                toastr.success(@json(session('success')));
            @endif

            @if (session('error'))
                toastr.error(@json(session('error')));
            @endif

            @if (session('warning'))
                toastr.warning(@json(session('warning')));
            @endif

            @if (session('info'))
                toastr.info(@json(session('info')));
            @endif
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error(@json($error));
            @endforeach
        @endif

        $(document).ready(function() {
            $('.modal .select2').each(function() {
                $(this).select2({
                    width: '100%',
                    dropdownParent: $(this).closest('.modal')
                });
            });
        });

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
                        }) + 'Schedule an Appointment',
                        className: 'create-new btn btn-primary',
                        action: function(e, dt, node, config) {
                            // Customize these parameters as needed
                            const title = encodeURIComponent("Appointment with Patient");
                            const details = encodeURIComponent(
                                "Schedule appointment through the platform.");
                            const location = encodeURIComponent("Online or Clinic");

                            // Example: Event from 9:00 to 10:00 on July 25, 2025 (UTC format)
                            const start = "20250725T090000Z";
                            const end = "20250725T100000Z";

                            const url =
                                `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${title}&dates=${start}/${end}&details=${details}&location=${location}`;

                            // Open in a new tab
                            window.open(url, '_blank');
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
                $('div.head-label').html('<h4 class="mb-0 pl-1">Appointments</h4>');
            }

        });

        $(document).on('click', '.course-sure', function(event) {
            event.preventDefault();
            var approvalLink = $(this).attr('href');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You want to remove this !",
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

        // Validation when saving appointment from the table (Save Icon)
        $(document).on('click', '.confirm-save', function(event) {
            event.preventDefault();
            var approvalLink = $(this).attr('href');
            var serviceCount = $(this).data('service-count');

            if (serviceCount < 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Services Selected',
                    text: "Please accept the appointment and select services before saving.",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            } else {
                window.location.href = approvalLink;
            }
        });

        // Validation when updating appointment in modal
        $(document).on('submit', '.update-appointment-form', function(e) {
            var form = $(this);
            var id = form.data('id');
            var services = $('#services-' + id).val();

            if (!services || services.length === 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Services Required',
                    text: 'Please select at least one service before saving.',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });
    </script>
@endsection
