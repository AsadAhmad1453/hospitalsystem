@extends('patient.layouts.main')

@section('custom-css')
<style>
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        background-color: #fff;
        transition: all 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }
    .text-theme { color: #198754; }
    .btn-theme {
        background-color: #198754;
        color: #fff;
        border-radius: 8px;
    }
    .btn-theme:hover {
        background-color: #157347;
        color: #fff;
    }
    .chart-container {
        height: 230px;
        width: 100%;
    }
    .section-title {
        font-weight: 600;
        font-size: 1rem;
        color: #444;
        margin-bottom: 12px;
    }
    .breadcrumb { margin-bottom: 1rem; }
    .summary-box {
        background: #f8fdf9;
        border: 1px solid #e3f0e7;
        border-radius: 10px;
        padding: 15px;
    }
    .breadcrumb-item+.breadcrumb-item:before {
      content: '' !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid mt-3">

    {{-- Breadcrumb --}}
    <div class="bg-light rounded px-3 py-2 mb-3 shadow-sm">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i> </li>
                <li class="breadcrumb-item active">Fitness Overview</li>
            </ol>
        </nav>
    </div>

    {{-- Overview Summary --}}
    {{-- <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-fire text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">2,340 kcal</h5>
                <p class="small text-muted mb-0">Calories Burned</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-shoe-prints text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">8,920</h5>
                <p class="small text-muted mb-0">Steps Walked</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-bed text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">7h 45m</h5>
                <p class="small text-muted mb-0">Average Sleep</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-heartbeat text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">72 bpm</h5>
                <p class="small text-muted mb-0">Resting Heart Rate</p>
            </div>
        </div>
    </div> --}}

    <div class="row gx-3">
        <div class="col-6 col-lg-6 col-xxl-3 mb-3">
           <div class="card adminuiux-card">
              <div class="card-body">
                 <div class="row gx-2 gx-sm-3 align-items-center">
                    <div class="col">
                       <p class="h4 mb-0"><i class="fa fa-fire fs-4 text-warning"></i> 1,850</p>
                       <p class="text-secondary small">Calories Burned</p>
                    </div>
                    <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                       <div class="summarychart height-40 w-100">
                          <canvas id="areachartgreen1"></canvas>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-6 col-lg-6 col-xxl-3 mb-3">
           <div class="card adminuiux-card">
              <div class="card-body">
                 <div class="row gx-2 gx-sm-3 align-items-center">
                    <div class="col">
                       <p class="h4 mb-0"><i class="fa-solid fa-moon fs-4 text-primary"></i> 7.2h</p>
                       <p class="text-secondary small">Sleep Duration</p>
                    </div>
                    <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                       <div class="summarychart height-40 w-100">
                          <canvas id="areachartblue1"></canvas>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-6 col-lg-6 col-xxl-3 mb-3">
           <div class="card adminuiux-card">
              <div class="card-body">
                 <div class="row gx-2 gx-sm-3 align-items-center">
                    <div class="col">
                       <p class="h4 mb-0"><i class="fa fa-shoe-prints fs-4 text-success"></i> 9,230</p>
                       <p class="text-secondary small">Steps Today</p>
                    </div>
                    <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                       <div class="summarychart height-40 w-100">
                          <canvas id="areachartyellow1"></canvas>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-6 col-lg-6 col-xxl-3 mb-3">
           <div class="card adminuiux-card">
              <div class="card-body">
                 <div class="row gx-2 gx-sm-3 align-items-center">
                    <div class="col">
                       <p class="h4 mb-0"><i class="fa fa-heart-pulse fs-4 text-danger"></i> 78</p>
                       <p class="text-secondary small">Avg Heart Rate</p>
                    </div>
                    <div class="col-12 col-sm-3 mt-2 mt-sm-0">
                       <div class="summarychart height-40 w-100">
                          <canvas id="areachartred1"></canvas>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>

    {{-- Charts --}}
    <div class="row g-4 mb-4">
        {{-- Calorie Intake with Add Meal --}}
        <div class="col-lg-6">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="section-title mb-0">
                        <i class="fa fa-utensils me-2 text-theme"></i>Calorie Intake
                    </h6>
                    <button class="btn btn-sm btn-theme" data-bs-toggle="modal" data-bs-target="#addMealModal">
                        <i class="fa fa-plus me-1"></i> Add Meal
                    </button>
                </div>
                <div class="chart-container">
                    <canvas id="calorieChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Steps --}}
        <div class="col-lg-6">
            <div class="card p-4">
                <h6 class="section-title"><i class="fa fa-walking me-2 text-theme"></i>Steps Walked</h6>
                <div class="chart-container">
                    <canvas id="stepsChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Sleep --}}
        <div class="col-lg-6">
            <div class="card p-4">
                <h6 class="section-title"><i class="fa fa-bed me-2 text-theme"></i>Sleep Duration</h6>
                <div class="chart-container">
                    <canvas id="sleepChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Weight --}}
        <div class="col-lg-6">
            <div class="card p-4">
                <h6 class="section-title"><i class="fa fa-weight me-2 text-theme"></i>Weight Progress</h6>
                <div class="chart-container">
                    <canvas id="weightChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Section --}}
    <div class="summary-box mt-4">
        <h6 class="fw-bold text-theme mb-2"><i class="fa fa-chart-line me-1"></i> Weekly Summary</h6>
        <p class="small text-muted mb-0">
            Your activity levels have remained consistent this week. You achieved 92% of your daily step goals and maintained a steady sleep duration.
            Keep tracking your meals and workouts regularly for better insights and balance.
        </p>
    </div>
</div>

{{-- Add Meal Modal --}}
<div class="modal fade" id="addMealModal" tabindex="-1" aria-labelledby="addMealModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-theme fw-semibold" id="addMealModalLabel">
                    <i class="fa fa-utensils me-2"></i> Add Meal
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Meal Type</label>
                        <select class="form-select">
                            <option>Breakfast</option>
                            <option>Lunch</option>
                            <option>Dinner</option>
                            <option>Snack</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calories</label>
                        <input type="number" class="form-control" placeholder="Enter calories" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Time</label>
                        <input type="time" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" rows="2" placeholder="Optional notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-theme rounded-3">Save Meal</button>
            </div>
        </div>
    </div>
</div>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
            x: { grid: { display: false } }
        },
        plugins: { legend: { display: false } }
    };

    new Chart(document.getElementById('calorieChart'), {
        type: 'bar',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                data: [2100, 1900, 2200, 2000, 2400, 2300, 2100],
                backgroundColor: '#19875488',
                borderRadius: 6
            }]
        },
        options: chartOptions
    });

    new Chart(document.getElementById('stepsChart'), {
        type: 'line',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                data: [8000, 8500, 7900, 9200, 8800, 9400, 9700],
                borderColor: '#198754',
                backgroundColor: '#19875420',
                fill: true,
                tension: 0.4,
                borderWidth: 2
            }]
        },
        options: chartOptions
    });

    new Chart(document.getElementById('sleepChart'), {
        type: 'bar',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                data: [7.5, 6.8, 8, 7.2, 7.6, 8.1, 7.9],
                backgroundColor: '#19875488',
                borderRadius: 6
            }]
        },
        options: chartOptions
    });

    new Chart(document.getElementById('weightChart'), {
        type: 'line',
        data: {
            labels: ['Week 1','Week 2','Week 3','Week 4'],
            datasets: [{
                data: [72, 71.8, 71.5, 71.3],
                borderColor: '#198754',
                backgroundColor: '#19875420',
                fill: true,
                tension: 0.4,
                borderWidth: 2
            }]
        },
        options: chartOptions
    });
</script>
@endsection
