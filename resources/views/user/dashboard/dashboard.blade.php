@extends('user.layouts.main')
@section('content')
    <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row match-height">
                        <!-- Greetings Card starts -->
                        <div class="col-lg-8 col-md-12 col-sm-12">
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
                                            
                                            You have  <strong>{{ $doctorRounds }}</strong> new patients in queue right now!.
                                            @elseif(Auth::user()->role_id == $role->id && $role->name == 'Nurse')
                                            You have  <strong>{{ $nurseRounds }}</strong> new patients in queue right now!.                                            
                                            @endif
                                            
                                            @endforeach

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Greetings Card ends -->

                        <!-- Subscribers Chart Card starts -->
                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">92.6k</h2>
                                    <p class="card-text">Subscribers Gained</p>
                                </div>
                                <div id="gained-chart"></div>
                            </div>
                        </div> --}}

                        <div class="col-lg-4 col-sm-6 col-12">
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

                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->
                 
                        <!-- Orders Chart Card ends -->
                    </div>

                </section>
                <!-- Dashboard Analytics end -->

            </div>

@endsection

@section('custom-js')

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
</script>


@endsection