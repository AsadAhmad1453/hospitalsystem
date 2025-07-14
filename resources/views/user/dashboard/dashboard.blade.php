@extends('user.layouts.main')
@section('custom-css')
<style>
    .reset {
        position: absolute;
        top: 20px;
        right: 20px;
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

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                @can('reset token')
                                <a href="{{ route('del-all-rounds') }}" class="reset text-warning course-sure" data-jobs="sdadas"><i data-feather="refresh-ccw" class="font-medium-5"></i></a>
                                @endcan
                                {{-- @can('next token')
                                <a href="{{ route('del-all-rounds') }}" class="next text-success text-center">NEXT <i data-feather="arrow-right" class="ml-1 font-medium-5"></i></a>
                                @endcan --}}
                                <div class="card-header flex-column align-items-center ">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">@if($round)#{{$round->token}}@else #0 @endif</h2>
                                    <p class="card-text">Current Token</p>
                                </div>
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
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

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
