@extends('user.layouts.main')   
@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dropify-wrapper .dropify-message span.file-icon p{
        font-size: 16px;
    }
</style>
@endsection
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
                                            <label for="weight">Weight (kg)</label>
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
                                            <label for="height">Height (cm / m)</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="height" class="form-control" name="height" placeholder="Height" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="bmi">BMI</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="bmi" class="form-control" readonly name="bmi" placeholder="BMI" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="pulse">Pulse</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="pulse" class="form-control" name="pulse" placeholder="Pulse" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="systolic_blood_pressure">Systolic Blood Pressure</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="systolic_blood_pressure" class="form-control" name="systolic_blood_pressure" placeholder="Systolic Blood Pressure" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="diastlic-blood-preesure">Diastolic Blood Pressure</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="diastolic-blood-pressure" class="form-control" name="diastolic_blood_pressure" placeholder="Diastolic Blood Pressure" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="temperature">Temperature</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="temperature" class="form-control" name="temperature" placeholder="Temperature" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="weather">Current Weather</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="weather" class="form-control" readonly name="weather" placeholder="Current Weather" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-3 col-form-label">
                                            <label for="reports">Reports</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" id="reports" class="form-control file-input" name="reports" placeholder="Reports File" />
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
                                <div class="col-12 d-flex align-items-center justify-content-between" >
                                    <h5>Unique Id: </h5>
                                    <p class="float-right">{{ $patient->unique_number }}</p>    
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-between" >
                                    <h5>Name: </h5>
                                    <p class="float-right">{{ $patient->name }}</p>    
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-between" >
                                    <h5>E-mail: </h5>
                                    <p class="float-right">{{ $patient->email }}</p>    
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-between" >
                                    <h5>CNIC: </h5>
                                    <p class="float-right">{{ $patient->cnic }}</p>    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    function calculateBMI() {
        var weight = parseFloat($('#weight').val());
        var height = parseFloat($('#height').val());

        // Height should be in meters for BMI calculation
        // If height is entered in centimeters, convert to meters
        if (height > 3) { // assume cm if height > 3
            height = height / 100;
        }

        if (weight > 0 && height > 0) {
            var bmi = weight / (height * height);
            $('#bmi').val(bmi.toFixed(2));
        } else {
            $('#bmi').val('');
        }
    }

    $('#weight, #height').on('input', calculateBMI);

        // Weather: Auto-detect location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        $('#weather').val('Location not supported');
    }

    function success(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        console.log(latitude, longitude);
        $.ajax({
            url: '/api/weather',
            method: 'GET',
            data: { lat: latitude, lon: longitude },
            success: function(response) {
                if (response.temp) {
                    $('#weather').val(response.temp + ' °C');
                } else {
                    $('#weather').val('Unavailable');
                }
            },
            error: function() {
                $('#weather').val('Error fetching weather');
            }
        });
    }

    function error() {
        $('#weather').val('Unable to get location');
    }

    $('.file-input').dropify();
});



</script>
@endsection