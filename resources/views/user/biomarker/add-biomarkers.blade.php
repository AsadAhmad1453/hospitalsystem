@extends('user.layouts.main')   
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fill the form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save-test-reports') }}" method="POST" class="form form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="weight">Weight</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <input type="text" id="weight" class="form-control" name="weight" placeholder="Weight" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="height">Height</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="height" class="form-control" name="height" placeholder="Height" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="blood-pressure">Blood Pressure</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="blood-pressure" class="form-control" name="blood_pressure" placeholder="Blood Pressure" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="heart-rate">Heart Rate</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="heart-rate" class="form-control" name="heart_rate" placeholder="Heart Rate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="fname-icon">Name</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" id="fname-icon" class="form-control" value="{{ $patient->name }}" placeholder="First Name" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="email-icon">Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="email" id="email-icon" class="form-control" value="{{ $patient->email }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="contact-icon">CNIC</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="battery"></i></span>
                                                </div>
                                                <input type="text" id="contact-icon" class="form-control" value="{{ $patient->cnic }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="pass-icon">Unique Number</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="command"></i></span>
                                                </div>
                                                <input type="text" id="pass-icon" class="form-control" value="{{ $patient->unique_number }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection