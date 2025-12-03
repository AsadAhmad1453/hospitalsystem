@extends('website.layouts.data-collector-layout')
@section('custom-css')
    <style>
        :root {
            --dc-primary: #0d7a65;
            --dc-primary-dark: #064337;
            --dc-accent: #14c8a1;
            --dc-light: #f4fbf8;
            --dc-muted: #7b8a87;
            --dc-border: #d9ebe3;
        }

        .dc-hero {
            background: linear-gradient(135deg, #0d7a65 0%, #04382c 100%);
            border-radius: 28px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            color: #fff;
        }

        .dc-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.25), transparent 55%);
            opacity: .5;
        }

        .dc-hero__content {
            position: relative;
            z-index: 1;
        }

        .dc-card {
            margin-top: -4rem;
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 30px 80px rgba(7, 62, 44, 0.15);
            padding: 2.5rem;
        }

        .dc-form-grid {
            row-gap: 1.5rem;
        }

        .dc-field label {
            font-weight: 600;
            color: var(--dc-primary-dark);
            margin-bottom: .35rem;
        }

        .dc-input {
            border-radius: 14px;
            border: 1px solid var(--dc-border);
            padding: .85rem 1.1rem;
            font-weight: 500;
            color: var(--dc-primary-dark);
            transition: border-color .2s, box-shadow .2s;
            background: var(--dc-light);
        }

        .dc-input:focus {
            border-color: var(--dc-primary);
            box-shadow: 0 0 0 3px rgba(13, 122, 101, 0.15);
            background: #fff;
        }

        .dc-btn-primary {
            background: linear-gradient(135deg, var(--dc-primary), var(--dc-primary-dark));
            border: none;
            border-radius: 14px;
            padding: .95rem 1.8rem;
            font-weight: 600;
            color: #fff;
            transition: transform .2s, box-shadow .2s;
        }

        .dc-btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(6, 67, 55, 0.25);
        }

        .dc-btn-outline {
            border-radius: 14px;
            border: 1px solid var(--dc-border);
            padding: .95rem 1.8rem;
            font-weight: 600;
            color: var(--dc-primary-dark);
            background: #fff;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }

        @media (max-width: 767px) {
            .dc-hero,
            .dc-card {
                border-radius: 24px;
                padding: 1.6rem;
            }

            .dc-card {
                margin-top: -2.8rem;
            }
        }

        .letter-spacing-2 {
            letter-spacing: 0.2em;
        }
    </style>
@endsection
@section('content')
    <section id="multiple-column-form" class="pb-4">
        <div class="row">
            <div class="col-12">
                <div class="dc-hero mb-4">
                    <div class="dc-hero__content">
                        <p class="text-uppercase mb-2 letter-spacing-2">Patient Onboarding</p>
                        <h2 class="display-6 mb-2 text-white">Add a new patient</h2>
                        <p class="mb-0">Create a profile that powers the entire care journey. Keep it clean, consistent, and ready for the data collector forms.</p>
                    </div>
                </div>
                <div class="dc-card mt-1">
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <strong>There were some problems with your input:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form" method="POST" id="patient-form" action="{{ route('save-open-patient') }}">
                        @csrf
                        <div class="row dc-form-grid">
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-name">Patient Name</label>
                                    <input type="text" id="patient-name" class="form-control dc-input @error('name') is-invalid @enderror" placeholder="e.g. Ayesha Rahman" name="name" value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-age">Patient Age</label>
                                    <input type="number" id="patient-age" class="form-control dc-input @error('age') is-invalid @enderror" placeholder="Enter age" name="age" value="{{ old('age') }}" />
                                    @error('age')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-sex">Sex</label>
                                    <select class="form-control dc-input @error('sex') is-invalid @enderror" id="patient-sex" name="sex">
                                        <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Male</option>
                                        <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-city">City</label>
                                    <input type="text" id="patient-city" class="form-control dc-input @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city') }}" />
                                    @error('city')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="unique-number">MR Number</label>
                                    <input type="text" id="unique-number" class="form-control dc-input @error('unique_number') is-invalid @enderror" readonly placeholder="Auto-generated" name="unique_number" value="{{ old('unique_number') }}" />
                                    @error('unique_number')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-email">Email</label>
                                    <input type="email" id="patient-email" class="form-control dc-input @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-phone">Phone</label>
                                    <input type="number" id="patient-phone" class="form-control dc-input @error('phone') is-invalid @enderror" name="phone" placeholder="03XX-XXXXXXX" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-address">Address</label>
                                    <input type="text" id="patient-address" class="form-control dc-input @error('address') is-invalid @enderror" name="address" placeholder="Street, Area" value="{{ old('address') }}" />
                                    @error('address')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-dob">Date of birth</label>
                                    <input
                                        type="date"
                                        id="patient-dob"
                                        class="form-control dc-input @error('dateofbirth') is-invalid @enderror"
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
                            <div class="col-md-6">
                                <div class="dc-field">
                                    <label for="patient-cnic">CNIC</label>
                                    <input type="text" id="patient-cnic" class="form-control dc-input @error('cnic') is-invalid @enderror" name="cnic" placeholder="XXXXX-XXXXXXX-X" value="{{ old('cnic') }}" />
                                    @error('cnic')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap gap-2">
                                <button type="submit" class="dc-btn-primary mr-2">Save patient</button>
                                <button type="reset" class="dc-btn-outline">Reset form</button>
                            </div>
                        </div>
                    </form>
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

            var unique = firstName + '-' + age + '-' + sex + '-' + lastThreePhone + '-' + cityFirstLetter;
            $('#unique-number').val(unique.replace(/^-+|-+$/g, '').replace(/--+/g, '-'));
        }

        $('#patient-name, #patient-age, #patient-sex, #patient-phone, #patient-city').on('input change', generateUniqueNumber);
        $('form').on('submit', function() {
            $(this).find('button[type="submit"]').prop('disabled', true);
        });
    });
</script>
@endsection

