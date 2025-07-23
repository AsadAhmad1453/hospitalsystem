@extends('user.layouts.main')
@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
<style>
    .buttons-print {
        display: none !important;
    }

    .btn {
        padding: 5px;
        font-size: 12px !important;
    }
</style>

@endsection
@section('content')
<section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr class="text-center">
                                <th>Token#</th>
                                <th>Unique Number</th>
                                <th>CNIC</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rounds as $round)
                                <tr class="text-center">
                                    <td>#{{$round->token}}</td>
                                    <td>{{$round->patient->unique_number}}</td>
                                    <td>{{$round->patient->cnic}}</td>
                                    <td>{{$round->patient->name}}</td>
                                    <td>{{ $round->patient->email }}</td>

                                    <td>
                                        <a href="{{route('biomarker-add', $round->patient->id)}}" data-jobs="sdadas" class="btn btn-primary">Examine</a>
                                        <a href="{{route('view-patient', $round->patient->id)}}" data-jobs="sdadas" class="btn btn-info">Info</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
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
                '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                't' +
                '<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [7, 10, 25, 50, 75, 100],

            responsive: true,
            language: {
                paginate: {
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
        $('div.head-label').html('<h6 class="mb-0">Patients Queue</h6>');
    }

    });



</script>
@endsection
