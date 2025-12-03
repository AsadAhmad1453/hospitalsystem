@extends('user.layouts.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/charts/chart-apex.css')}}">

<style>
    .dash-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(0, 1.5fr);
        gap: 1.5rem;
    }

    @media (max-width: 991px) {
        .dash-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    .card-metrics {
        border-radius: 22px;
        border: none;
        box-shadow: 0 26px 50px rgba(6, 61, 47, 0.18);
    }

    .token-pill {
        background: #f4fbf8;
        border-radius: 16px;
        padding: .75rem 1rem;
    }

    .token-pill h2 {
        margin: 0;
    }

    .role-strip h4 {
        font-weight: 600;
    }

    .role-strip + .role-strip {
        margin-top: 1.25rem;
    }

    .role-strip .progress {
        background-color: #e5f2ec;
    }

    .role-list-item {
        border-radius: 10px;
        padding: .5rem .75rem;
        background: #f7fbf9;
        margin-bottom: .3rem;
    }

    .role-toggle-btn {
        border-radius: 999px;
        padding: .35rem .9rem;
        font-size: .78rem;
    }
</style>
@endsection
@section('content')
    <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="dash-grid">
                        <!-- Greetings Card -->
                        <div>
                            <div class="card card-congratulations mb-2">
                                <div class="card-body text-center">
                                    <div class="avatar avatar-xl bg-warning shadow mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Welcome {{Auth::user()->name }}!</h1>
                                        <h4 class="text-white">
                                             Hope you're having a great day at work!
                                        </h4>
                                        <br>
                                        <h2 class="font-weight-bolder mt-1 text-white" id="weather-temp">Loading...</h2>
                                        <p class="card-text text-white-50" id="weather-desc">Fetching weather...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Token + Team Status -->
                        <div>
                            <div class="card card-metrics">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-1">
                                        <div class="token-pill mb-1">
                                            <p class="mb-25 text-muted font-small-3">Current Token</p>
                                            <h2 class="font-weight-bolder">
                                                {{ $activeToken?->token ?? 'No Token' }}
                                            </h2>
                                        </div>
                                        <div class="token-pill mb-1">
                                            <p class="mb-25 text-muted font-small-3">Total Token</p>
                                            <h2 class="font-weight-bolder">
                                                {{ $totalToken ? ($totalToken->token ? "{$totalToken->token}" : 'No Patient') : 'No Patient' }}
                                            </h2>
                                        </div>
                                        @can('reset token')
                                        <div class="mb-1">
                                            <a href="{{ route('del-all-rounds') }}" type="button" class="btn btn-primary course-sure">
                                                <i data-feather="refresh-cw" class="mr-25"></i>Reset Token
                                            </a>
                                        </div>
                                        @endcan
                                    </div>

                                    <hr>

                                    <div class="mt-2">
                                        {{-- Data Collectors --}}
                                        <div class="role-strip">
                                            <div class="d-flex justify-content-between align-items-center mb-25">
                                                <h4 class="mb-0">Data Collectors</h4>
                                                <button type="button"
                                                        class="btn btn-outline-primary btn-sm role-toggle-btn"
                                                        data-role-target="dc">
                                                    Show more
                                                </button>
                                            </div>
                                            @foreach ($dcs as $index => $dc)
                                                <div class="role-list-item dc-item {{ $index >= 3 ? 'd-none' : '' }}">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">{{$dc->name}}</p>
                                                        <span class="text-muted font-small-3">
                                                            Token: {{ $dc->latestActiveRoundAsDC?->token ?? 'No round' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Nurses --}}
                                        <div class="role-strip">
                                            <div class="d-flex justify-content-between align-items-center mb-25">
                                                <h4 class="mb-0">Nurses</h4>
                                                <button type="button"
                                                        class="btn btn-outline-primary btn-sm role-toggle-btn"
                                                        data-role-target="nurse">
                                                    Show more
                                                </button>
                                            </div>
                                            @foreach ($nurses as $index => $nurse)
                                                <div class="role-list-item nurse-item {{ $index >= 3 ? 'd-none' : '' }}">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">{{$nurse->name}}</p>
                                                        <span class="text-muted font-small-3">
                                                            Token: {{ $nurse->latestActiveRoundAsNurse?->token ?? 'No round' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Doctors --}}
                                        <div class="role-strip">
                                            <div class="d-flex justify-content-between align-items-center mb-25">
                                                <h4 class="mb-0">Doctors</h4>
                                                <button type="button"
                                                        class="btn btn-outline-primary btn-sm role-toggle-btn"
                                                        data-role-target="doctor">
                                                    Show more
                                                </button>
                                            </div>
                                            @foreach ($doctors as $index => $doctor)
                                                <div class="role-list-item doctor-item {{ $index >= 3 ? 'd-none' : '' }}">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">{{$doctor->name}}</p>
                                                        <span class="text-muted font-small-3">
                                                            Token: {{ $doctor->latestActiveRoundAsDoctor?->token ?? 'No round' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <!-- Subscribers Chart Card starts -->
                          {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">{{ $doctorRounds }}</h2>
                                    <p class="card-text">Active Patients</p>
                                </div>
                                <div id="gained-chart"></div>
                            </div>
                        </div> --}}
                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->
                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">${{$cost}}</h2>
                                    <p class="card-text">Revenue Today</p>
                                </div>
                                <div id="order-chart"></div>
                            </div>
                        </div> --}}
                        <!-- Orders Chart Card ends -->




                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="cloud" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1" id="weather-temp">Loading...</h2>
                                    <p class="card-text" id="weather-desc">Fetching weather...</p>
                                </div>
                                <div id="gained-chart"></div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-center ">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar bg-light-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="tag" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bolder mt-1">&ensp;@if($round)#{{$round->token}}@else #0 @endif</h2>
                                    </div>
                                    @can('reset token')
                                    <a href="{{ route('del-all-rounds') }}" class="reset text-warning btn btn-warning align-items-center d-flex course-sure" data-jobs="sdadas">
                                        <i data-feather="refresh-ccw" class="font-medium-5"></i>
                                        &ensp;Token</a>
                                    @endcan
                                </div>
                            </div>
                        </div> --}}

                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->

                        <!-- Orders Chart Card ends -->
                    </div>

                </section>
                <!-- Dashboard Analytics end -->

            </div>

@endsection

@section('custom-js')
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>

<script>
    $(document).ready(function () {
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
                data: { lat: latitude, lon: longitude },
                success: function (response) {
                    if (response.temp && response.description) {
                        $('#weather-temp').text(response.temp + ' °C');
                        $('#weather-desc').text(response.description);
                    } else {
                        $('#weather-temp').text('N/A');
                        $('#weather-desc').text('Weather unavailable');
                    }
                },
                error: function () {
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

    $(document).on('click','.course-sure', function (event) {
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
        }).then(function (result) {
            if (result.value) {
                window.location.href = approvalLink;
            }
        });
     });

    // Toggle show more/less for role lists
    $(document).on('click', '.role-toggle-btn', function () {
        const role = $(this).data('role-target');
        const $items = $('.' + role + '-item');
        const isExpanded = $(this).data('expanded') === true;

        if (isExpanded) {
            // Collapse back to first 3
            $items.each(function (index) {
                $(this).toggleClass('d-none', index >= 3);
            });
            $(this).text('Show more');
            $(this).data('expanded', false);
        } else {
            // Show all
            $items.removeClass('d-none');
            $(this).text('Show less');
            $(this).data('expanded', true);
        }
    });
</script>


@endsection
