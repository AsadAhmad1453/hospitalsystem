@extends('user.layouts.main')
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Patient</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('save-patient') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="patient-name">Patient Name</label>
                                        <input type="text" id="patient-name" class="form-control " placeholder="patient name" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="patient-age">Patient Age</label>
                                        <input type="text" id="patient-age" class="form-control " placeholder="patient age" name="age" value="{{ old('age') }}" />
                                        @error('name')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Sex</label>
                                    <select class="select2 form-control form-control-lg" id="patient-sex" name="sex">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">City</label>
                                        <input type="text" id="patient-city" class="form-control " placeholder="City" name="city" value="{{ old('city') }}" />
                                        @error('name')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="unique-number">MR Number</label>
                                        <input type="text" id="unique-number" class="form-control" readonly placeholder="unique Number" name="unique_number" value="{{ old('unique_number') }}" />
                                        @error('unique_number')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Email</label>
                                        <input type="email" id="city-column" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="patient-phone">Phone</label>
                                        <input type="text" id="patient-phone" class="form-control" name="phone" placeholder="contact no " value="{{ old('phone') }}" />
                                        @error('phone')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Address</label>
                                        <input type="text" id="company-column" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" />
                                        @error('address')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Date of birth</label>
                                        <input type="date" id="email-id-column" class="form-control" name="dateofbirth" placeholder="Email" value="{{ old('dateofbirth') }}" />
                                        @error('dateofbirth')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Select Doctor</label>
                                    <select class="select2 form-control form-control-lg" name="user_id">
                                        @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('user_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Select Nurse</label>
                                    <select class="select2 form-control form-control-lg" name="nurse_id">
                                        @foreach($nurses as $nurse)
                                            <option value="{{ $nurse->id }}" {{ old('nurse_id') == $nurse->id ? 'selected' : '' }}>{{ $nurse->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nurse_id')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="patient_status" value="1">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">CNIC</label>
                                        <input type="text" id="company-column" class="form-control" name="cnic" placeholder="XXXXX-XXXXXXX-X" value="{{ old('cnic') }}" />
                                        @error('cnic')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card">
                                        <table class="datatables-basic table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Service Name</th>
                                                    <th>Cost</th>
                                                    <th>Check</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($services as $service)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{ ($service->service_name) }}</td>
                                                    <td>{{ ($service->amount) }}</td>

                                                    <td>
                                                        <input type="checkbox" name="services[]" value="{{ $service->id }} " {{ (is_array(old('services')) && in_array($service->id, old('services'))) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        @error('services')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
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
});
</script>
@endsection
