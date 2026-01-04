@extends('user.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/charts/chart-apex.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Outfit', sans-serif;
        }

        /* Hero Section */
        .dashboard-hero {
            background: linear-gradient(135deg, #063d2e 0%, #1f6e52 100%);
            border-radius: 24px;
            color: white;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(6, 61, 46, 0.3), 0 10px 10px -5px rgba(6, 61, 46, 0.2);
            margin-bottom: 2rem;
        }

        /* Decorative Elements */
        .dashboard-hero::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .dashboard-hero::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Glass Stat Cards */
        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 1.25rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Role Section */
        .card-roles {
            border: none;
            border-radius: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            background: white;
        }

        /* Professional List Styling */
        .role-section-header {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
        }

        .role-list-item {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            background: white;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .role-list-item:hover {
            background: #f8fafc;
            border-color: #e2e8f0;
            transform: translateX(4px);
        }

        .avatar-initials {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Scrollable List */
        .role-list {
            max-height: 300px;
            /* Adjust height as needed */
            overflow-y: auto;
            padding-right: 5px;
        }

        /* Custom Scrollbar */
        .role-list::-webkit-scrollbar {
            width: 5px;
        }

        .role-list::-webkit-scrollbar-track {
            background: transparent;
        }

        .role-list::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .role-list::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* My Status Card */
        .my-status-card {
            background: #f8fafc;
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">

            <!-- Unified Hero Section -->
            <div class="dashboard-hero">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12 mb-2 mb-lg-0">
                        <div class="d-flex align-items-center mb-2">
                            {{-- <div class="avatar bg-white bg-opacity-25 p-50 mr-2 shadow-sm rounded-circle">
                                <div class="avatar-content text-white">
                                    <i data-feather="award" class="font-medium-5"></i>
                                </div>
                            </div> --}}
                            <div>
                                <h1 class="text-white font-weight-bold mb-0">Welcome back, {{ Auth::user()->name }}!</h1>
                                <p class="text-white text-opacity-75 mb-0">Have a productive day at the hospital.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-3 p-1 rounded"
                            style="background: rgba(255,255,255,0.1); width: fit-content;">
                            <i data-feather="cloud" class="mr-2 text-white"></i>
                            <div>
                                <h4 class="text-white font-weight-bold mb-0" id="weather-temp">Loading...</h4>
                                <small class="text-white text-opacity-75" id="weather-desc">Fetching weather...</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="row">
                            <!-- Current Token -->
                            <div class="col-6 mb-2 mb-md-0">
                                <div class="stat-card text-center h-100">
                                    <p
                                        class="mb-1 text-white text-opacity-75 font-weight-600 font-small-3 text-uppercase tracking-wide">
                                        Current Token</p>
                                    <h1 class="text-white font-large-2 font-weight-bolder mb-0">
                                        {{ $activeToken?->token ?? '-' }}</h1>
                                </div>
                            </div>
                            <!-- Total Token -->
                            <div class="col-6">
                                <div class="stat-card text-center h-100">
                                    <p
                                        class="mb-1 text-white text-opacity-75 font-weight-600 font-small-3 text-uppercase tracking-wide">
                                        Total Tokens</p>
                                    <h1 class="text-white font-large-2 font-weight-bolder mb-0">
                                        {{ $totalToken ? ($totalToken->token ? "{$totalToken->token}" : '-') : '-' }}</h1>
                                </div>
                            </div>
                        </div>

                        @can('reset token')
                            <div class="text-right mt-2">
                                <a href="{{ route('del-all-rounds') }}"
                                    class="btn btn-sm bg-white text-primary font-weight-bold shadow-sm course-sure hover-lift">
                                    <i data-feather="refresh-cw" class="mr-50"></i> Reset All Tokens
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Role Visibility Section -->
            <div class="card card-roles">
                <div class="card-body">
                    @if (Auth::user()->hasRole('receptionist'))
                        {{-- RECEPTIONIST VIEW: 3 COLUMNS --}}
                        <div class="row">
                            {{-- Data Collectors --}}
                            <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                                <div class="role-section-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-primary font-weight-bold"><i data-feather="clipboard"
                                            class="mr-2"></i>Data Collectors</h6>
                                    <span class="badge badge-light-primary">{{ count($dcs) }}</span>
                                </div>
                                <div class="role-list">
                                    @foreach ($dcs as $dc)
                                        <div class="role-list-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-initials bg-light-primary text-primary mr-1">
                                                    {{ substr($dc->name, 0, 1) }}
                                                </div>
                                                <span class="font-weight-bold text-dark">{{ $dc->name }}</span>
                                            </div>
                                            <div class="badge badge-light-primary">
                                                #{{ $dc->latestActiveRoundAsDC?->token ?? '-' }}
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (count($dcs) == 0)
                                        <p class="text-center text-muted font-small-3 my-2">No data collectors active.</p>
                                    @endif
                                </div>
                            </div>

                            {{-- Nurses --}}
                            <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                                <div class="role-section-header d-flex justify-content-between align-items-center"
                                    style="background:#f0fdf4; border-color:#dcfce7;">
                                    <h6 class="mb-0 text-success font-weight-bold"><i data-feather="activity"
                                            class="mr-2"></i>Nurses</h6>
                                    <span class="badge badge-light-success">{{ count($nurses) }}</span>
                                </div>
                                <div class="role-list">
                                    @foreach ($nurses as $nurse)
                                        <div class="role-list-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-initials bg-light-success text-success mr-1">
                                                    {{ substr($nurse->name, 0, 1) }}
                                                </div>
                                                <span class="font-weight-bold text-dark">{{ $nurse->name }}</span>
                                            </div>
                                            <div class="badge badge-light-success">
                                                #{{ $nurse->latestActiveRoundAsNurse?->token ?? '-' }}
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (count($nurses) == 0)
                                        <p class="text-center text-muted font-small-3 my-2">No nurses active.</p>
                                    @endif
                                </div>
                            </div>

                            {{-- Doctors --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="role-section-header d-flex justify-content-between align-items-center"
                                    style="background:#fef2f2; border-color:#fee2e2;">
                                    <h6 class="mb-0 text-danger font-weight-bold"><i data-feather="user-check"
                                            class="mr-2"></i>Doctors</h6>
                                    <span class="badge badge-light-danger">{{ count($doctors) }}</span>
                                </div>
                                <div class="role-list">
                                    @foreach ($doctors as $doctor)
                                        <div class="role-list-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-initials bg-light-danger text-danger mr-1">
                                                    {{ substr($doctor->name, 0, 1) }}
                                                </div>
                                                <span class="font-weight-bold text-dark">{{ $doctor->name }}</span>
                                            </div>
                                            <div class="badge badge-light-danger">
                                                #{{ $doctor->latestActiveRoundAsDoctor?->token ?? '-' }}
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (count($doctors) == 0)
                                        <p class="text-center text-muted font-small-3 my-2">No doctors active.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- STAFF PERSONAL VIEW --}}
                        @php
                            $myToken = '-';
                            $roleLabel = 'Staff';
                            $badgeClass = 'badge-light-secondary';
                            $bgClass = 'bg-light-secondary';
                            $icon = 'user';

                            if (Auth::user()->hasRole('data collector')) {
                                $myToken = Auth::user()->latestActiveRoundAsDC?->token ?? '-';
                                $roleLabel = 'Data Collector';
                                $badgeClass = 'badge-light-primary';
                                $bgClass = 'bg-light-primary';
                                $icon = 'clipboard';
                            } elseif (Auth::user()->hasRole('nurse')) {
                                $myToken = Auth::user()->latestActiveRoundAsNurse?->token ?? '-';
                                $roleLabel = 'Nurse';
                                $badgeClass = 'badge-light-success';
                                $bgClass = 'bg-light-success';
                                $icon = 'activity';
                            } elseif (Auth::user()->hasRole('doctor')) {
                                $myToken = Auth::user()->latestActiveRoundAsDoctor?->token ?? '-';
                                $roleLabel = 'Doctor';
                                $badgeClass = 'badge-light-danger';
                                $bgClass = 'bg-light-danger';
                                $icon = 'user-check';
                            }
                        @endphp

                        <div class="d-flex justify-content-center pt-3 pb-3">
                            <div class="my-status-card text-center p-3" style="min-width: 300px;">
                                <div class="avatar avatar-xl {{ $bgClass }} shadow-sm mb-2">
                                    <div class="avatar-content">
                                        <i data-feather="{{ $icon }}" class="font-large-1"></i>
                                    </div>
                                </div>
                                <h3 class="font-weight-bold text-dark">My Active Station</h3>
                                <span class="badge {{ $badgeClass }} mb-3">{{ $roleLabel }}</span>

                                <div class="p-2 rounded" style="background: white; border: 1px solid #e2e8f0;">
                                    <p class="text-muted font-small-3 mb-1 text-uppercase">Currently Attending</p>
                                    <div class="d-flex align-items-baseline justify-content-center">
                                        <span class="font-medium-5 text-muted mr-1">Token #</span>
                                        <h1 class="font-large-3 font-weight-bolder text-primary mb-0">{{ $myToken }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </section>
        <!-- Dashboard Analytics end -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>

    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            } else {
                $('#weather-temp').text('Location not supported');
                $('#weather-desc').text('');
            }

            function success(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                $.ajax({
                    url: '/api/weather',
                    method: 'GET',
                    data: {
                        lat: latitude,
                        lon: longitude
                    },
                    success: function(response) {
                        if (response.temp && response.description) {
                            $('#weather-temp').text(response.temp + ' °C');
                            $('#weather-desc').text(response.description);
                        } else {
                            $('#weather-temp').text('N/A');
                            $('#weather-desc').text('Weather unavailable');
                        }
                    },
                    error: function() {
                        $('#weather-temp').text('Error');
                        $('#weather-desc').text('Failed to fetch weather');
                    }
                });
            }

            function error() {
                $('#weather-temp').text('Unable to get location');
                $('#weather-desc').text('');
            }
        });

        $(document).on('click', '.course-sure', function(event) {
            event.preventDefault();

            var approvalLink = $(this).attr('href');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You want to reset the Token!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    window.location.href = approvalLink;
                }
            });
        });
    </script>
@endsection
