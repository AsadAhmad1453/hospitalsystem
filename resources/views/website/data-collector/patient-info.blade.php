@extends('website.layouts.data-collector-layout')
@section('custom-css')
    <style>
            input[type=number]::-webkit-outer-spin-button,
            input[type=number]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* For Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
    </style>
@endsection
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Patient</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>There were some problems with your input:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form" method="POST" id="patient-form" action="{{ route('save-open-patient') }}" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="patient-name">Patient Name</label>
                                        <input type="text" id="patient-name" class="form-control @error('name') is-invalid @enderror" placeholder="patient name" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="patient-age">Patient Age</label>
                                        <input type="number" id="patient-age" class="form-control @error('age') is-invalid @enderror" placeholder="patient age" name="age" value="{{ old('age') }}" />
                                        @error('age')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-1">
                                    <label>Sex</label>
                                    <select class="select2 form-control form-control-lg @error('sex') is-invalid @enderror" id="patient-sex" name="sex">
                                        <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Male</option>
                                        <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="first-name-column">City</label>
                                        <input type="text" id="patient-city" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city') }}" />
                                        @error('city')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="unique-number">MR Number</label>
                                        <input type="text" id="unique-number" class="form-control @error('unique_number') is-invalid @enderror" readonly placeholder="unique Number" name="unique_number" value="{{ old('unique_number') }}" />
                                        @error('unique_number')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="city-column">Email</label>
                                        <input type="email" id="city-column" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="patient-phone">Phone</label>
                                        <input type="number" id="patient-phone" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="contact no " value="{{ old('phone') }}" />
                                        @error('phone')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="company-column">Address</label>
                                        <input type="text" id="company-column" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ old('address') }}" />
                                        @error('address')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email-id-column">Date of birth</label>
                                        <input
                                        type="date"
                                        id="email-id-column"
                                        class="form-control @error('dateofbirth') is-invalid @enderror"
                                        name="dateofbirth"
                                        placeholder="Date of Birth"
                                        value="{{ old('dateofbirth') }}"
                                        max="{{ date('Y-m-d') }}" />     
                                        @error('dateofbirth')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <input type="hidden" name="patient_status" value="1">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="company-column">CNIC</label>
                                        <input type="text" id="company-column" class="form-control @error('cnic') is-invalid @enderror" name="cnic" placeholder="XXXXX-XXXXXXX-X" value="{{ old('cnic') }}" />
                                        @error('cnic')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
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

<script>

$(document).ready(function() {
    function generateUniqueNumber() {
        var name = $('#patient-name').val().trim();
        var age = $('#patient-age').val().trim();
        var sex = $('#patient-sex').val();
        var phone = $('#patient-phone').val().trim();
        var city = $('#patient-city').val().trim();

        var firstName = name.split(' ')[0] || '';
        var lastThreePhone = phone ? phone.slice(-3) : '';
        var cityFirstLetter = city ? city.charAt(0).toUpperCase() : '';

        // Always generate, even if some fields are empty
        var unique = firstName + '-' + age + '-' + sex + '-' + lastThreePhone + '-' + cityFirstLetter;
        $('#unique-number').val(unique.replace(/^-+|-+$/g, '').replace(/--+/g, '-'));
    }

    $('#patient-name, #patient-age, #patient-sex, #patient-phone, #patient-city').on('input change', generateUniqueNumber);
    $('form').on('submit', function() {
        // Disable the submit button to prevent multiple submissions
        $(this).find('button[type="submit"]').prop('disabled', true);
    });
});
</script>
@endsection
