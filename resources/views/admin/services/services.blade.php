@extends('admin.layouts.main')
@section('custom-css')
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
                                <th>Service</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{ $service->amount }}</td>
                                    <td>
                                        <a href="{{route('edit-service', $service->id)}}" class="text-primary" ><i class="fa fa-edit"></i></a>
                                        <a href="{{route('del-service', $service->id)}}" data-jobs="sdadas" class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

   
    </section>
@endsection
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#servicesForm').on('submit', function () {
            const submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true);
            submitButton.text('Submitting...');
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
                            window.location.href = "{{ route('add-service') }}";
                        }
                    },
                    ,
                    {
                        text: '<i class="fa fa-trash"></i> Delete all',
                        className: 'btn btn-danger del-all-questions',
                        action: function (e, dt, node, config) {
                            // Use the same confirmation as .course-sure
                            Swal.fire({
                                icon: 'warning',
                                title: 'Are you sure?',
                                text: "You want to remove all Services!",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, remove all!',
                                confirmButtonClass: 'btn btn-primary',
                                cancelButtonClass: 'btn btn-danger ml-1',
                                buttonsStyling: false,
                            }).then(function (result) {
                                if (result.value) {
                                    window.location.href = "{{ route('del-all-services') }}";
                                }
                            });
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
            $('div.head-label').html('<h6 class="mb-0">Services</h6>');
        }
    });
    $(document).on('click','.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this service!",
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
