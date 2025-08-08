@extends('user.layouts.main')
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Choose Services</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('update-patient', $patient->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label>Select Data Collector</label>
                                    <select class="select2 form-control form-control-lg" name="dc_id">
                                        @foreach($dcs as $dc)
                                        <option value="{{ $dc->id }}" {{ old('dc_id') == $dc->id ? 'selected' : '' }}>{{ $dc->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dc_id')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-6 ">
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
                                <div class="col-md-6 mt-1">
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
                                
                                <div class="col-12 mt-2">
                                    <div class="card">
                                        <table  class="datatables-basic table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Service Name</th>
                                                    <th>Cost</th>
                                                    <th>Check</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($services as $service)
                                                <tr class="text-center">
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
