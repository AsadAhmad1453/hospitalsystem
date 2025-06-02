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
                                        <label for="first-name-column">Patient Name</label>
                                        <input type="text" id="first-name-column" class="form-control " placeholder="patient name" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Identification Number</label>
                                        <input type="text" id="last-name-column" class="form-control" placeholder="unique Number" name="unique_number" value="{{ old('unique_number') }}" />
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
                                        <label for="country-floating">Phone</label>
                                        <input type="text" id="country-floating" class="form-control" name="phone" placeholder="contact no " value="{{ old('phone') }}" />
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
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
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