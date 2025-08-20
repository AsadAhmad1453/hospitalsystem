@extends('website.layouts.data-collector-layout')
@section('custom-css')
   <style>
    .card:hover {
        background: linear-gradient(230deg, #169978 0%, #024134 100%) !important;
        opacity: 1;
        color: white !important;
        transition: background 1s !important;
    }
    .card:hover h4 {
        color: white
    }
    .card {
        transition: background 1s ease-in-out !important;
    }
   </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($forms as $form )
            <div class="col-6">
                <a href="{{ route('open-data-collector', ['form_id' => $form->id, 'patient_id' => $patient_id]) }}">
                    <div class="card card-body d-flex justify-content-center align-items-center">
                        <h4 class="text-center">{{$form->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection