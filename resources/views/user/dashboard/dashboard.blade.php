@extends('user.layouts.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/charts/chart-apex.css')}}">

<style>
    .reset {
        border: none;
        z-index: 1;
    }

    .next {
        position: absolute;
        top: 20px;
        right: 20px;
        border: none;
        z-index: 1;
        display: flex;
        align-items: center;
    }
</style>
@endsection
@section('content')
    <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row match-height">
                        <!-- Greetings Card starts -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                   <div class="avatar avatar-xl bg-warning shadow">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Welcome {{Auth::user()->name }}!</h1>
                                        <p class="card-text m-auto w-75">
                                            @foreach ($roles as $role)

                                            @if(Auth::user()->role_id == $role->id && $role->name == 'Doctor')

                                            You have  <strong>{{ $queue }}</strong> new patients in queue right now!.
                                            @elseif(Auth::user()->role_id == $role->id && $role->name == 'Nurse')
                                            You have  <strong>{{ $nurseRounds }}</strong> new patients in queue right now!.
                                            @endif

                                            @endforeach

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <!-- Subscribers Chart Card starts -->
                          <div class="col-lg-3 col-sm-6 col-12">
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
                        </div>
                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->
                        <div class="col-lg-3 col-sm-6 col-12">
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
                        </div>
                        <!-- Orders Chart Card ends -->

                        <div class="col-lg-9 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                                            <div class="mb-1 mb-sm-0">
                                                <h2 class="font-weight-bolder mb-25">{{$activeToken->token ?? 'No Patient'}}</h2>
                                                <p class="card-text font-weight-bold mb-2">Active Token</p>
                                            </div>
                                            <div class="mb-1 mb-sm-0">
                                                <h2 class="font-weight-bolder mb-25">{{ $totalToken->token}}</h2>
                                                <p class="card-text font-weight-bold mb-2">Total Token</p>
                                            </div>
                                            @can('reset token')
                                                <a href="{{ route('del-all-rounds') }}" type="button" class="btn btn-primary">Reset Token</a>
                                            @endcan
                                        </div>
                                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column text-right order-sm-2 order-1">
                                            <div id="avg-sessions-chart"></div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row avg-sessions pt-50">
                                        @foreach ($doctors as $doctor)
                                            <div class="col-6 mb-2">
                                                <p class="mb-50">{{$doctor->name}}: {{ $doctor->latestActiveRound?->token ?? 'No round' }}</p>
                                                <div class="progress progress-bar-primary" style="height: 6px">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-6 mb-2">
                                            <p class="mb-50">Users: 100K</p>
                                            <div class="progress progress-bar-warning" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width: 60%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-50">Retention: 90%</p>
                                            <div class="progress progress-bar-danger" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="70" aria-valuemax="100" style="width: 70%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-50">Duration: 1yr</p>
                                            <div class="progress progress-bar-success" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="90" aria-valuemax="100" style="width: 90%"></div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
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
                        </div>

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
</script>


@endsection
