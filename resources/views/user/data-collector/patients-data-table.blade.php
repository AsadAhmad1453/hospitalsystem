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

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr class="text-center">
                                <th>Token#</th>
                                <th>Name</th>
                                <th></th>
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
                                            <a href="{{ route('data-collector', ['id' => $form->id, 'patientId' => $round->patient->id]) }}" data-jobs="sdadas" class="btn btn-primary float-center">{{ $form->name }}</a>
                                        @elseif($form && $round->patient && in_array($round->patient->id, $submittedPatients))
                                            <span class="badge badge-success">Form Submitted</span>
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
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>


</script>
@endsection
