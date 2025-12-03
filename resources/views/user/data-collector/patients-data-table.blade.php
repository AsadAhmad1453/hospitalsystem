@extends('user.layouts.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
<style>
    .card-header {
        display: none !important;
    }
</style>
@endsection
@section('content')

    <div class="data-table-page-hero">
        <div>
            <h2 class="text-white">Data Collection Queue</h2>
            <p>Select a patient to launch the data‑collector flow for this form.</p>
        </div>
    </div>

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr class="text-center">
                                <th>Token#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rounds as $round)
                                <tr class="text-center">
                                    <td>#{{$round->token}}</td>
                                    <td>{{$round->patient->name}}</td>
                                    <td>Patient</td>
                                    <td>
                                        @if($form && $round->patient && !in_array($round->patient->id, $submittedPatients))
                                            @if($form->questions->count()> 0)
                                                <a href="{{ route('data-collector', ['id' => $form->id, 'patientId' => $round->patient->id]) }}" data-jobs="sdadas" class="btn btn-primary float-center">{{ $form->name }}</a>
                                            @else
                                                <span class="badge badge-warning">No Questions Available</span>
                                            @endif
                                        @else
                                            <span class="badge badge-success">Form Submitted</span>
                                        @endif
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
            $('div.head-label').html('<h6 class="mb-0">Banks</h6>');
        }
    });

</script>
@endsection
