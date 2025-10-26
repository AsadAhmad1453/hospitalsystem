@extends('patient.layouts.main')

@section('custom-css')
<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8faf9;
  }

  /* Breadcrumbs */
  .breadcrumbs {
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    color: #64748b;
  }

  .breadcrumbs a {
    text-decoration: none;
    color: #14532d;
    font-weight: 500;
  }

  .breadcrumbs span {
    color: #94a3b8;
  }

  .card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    background: #fff;
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-2px);
  }

  .sleep-btn {
    background-color: #1c6a3a;
    border: none;
    color: #fff;
    padding: 0.75rem 1.75rem;
    border-radius: 50px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(28, 106, 58, 0.2);
  }

  .sleep-btn:hover {
    background-color: #268046;
  }

  .timer-box {
    background: #f0fdf4;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: inset 0 0 10px rgba(20, 83, 45, 0.05);
  }

  .stats-box h4 {
    font-size: 1.8rem;
    color: #14532d;
    margin-bottom: 0.25rem;
  }

  .stats-box small {
    color: #64748b;
  }

  .section-title {
    font-weight: 600;
    color: #14532d;
    margin-bottom: 1rem;
  }

  .chart-container {
    position: relative;
    height: 300px;
    width: 100%;
  }

  @media (max-width: 768px) {
    .stats-box {
      padding: 1rem;
      margin-bottom: 1rem;
    }

    .sleep-btn {
      width: 100%;
    }
  }

  .breadcrumb-item+.breadcrumb-item:before {
    content: '' !important;
  }
</style>
<style>
  /* Mini chart fixed container so Chart.js won't expand */
  .mini-chart-wrap { height: 80px; width: 100%; }
  .stat-card .icon-circle {
    width: 44px; height: 44px; display:inline-flex; align-items:center; justify-content:center;
    border-radius:10px; background:rgba(16,185,129,0.08);
  }
  .stat-card .meta { margin-top:8px; }
  .stat-card .delta { font-size:0.9rem; opacity:0.85; display:flex; gap:6px; align-items:center; justify-content:center; }
</style>
@endsection

@section('content')
<main class="container py-4">

  {{-- Breadcrumb --}}
  <div class="bg-light rounded px-3 py-2 mb-3 shadow-sm">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 small">
        <li class="breadcrumb-item"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i></li>
        <li class="breadcrumb-item active">Sleep Tracker</li>
      </ol>
    </nav>
  </div>

  <!-- Stats -->
<!-- Stats (replace the old 3 cards block) -->


<div class="row gx-3 mb-4">
  <div class="col-12 col-md-4 mb-3">
    <div class="card p-3 stat-card text-center">
      <div class="icon-circle mx-auto mb-2">
        <i class="fa fa-bed text-success"></i>
      </div>
      <h5 class="fw-semibold text-dark mb-0">7h 12m</h5>
      <small class="text-muted d-block">Last Night Sleep</small>
      <div class="delta text-success mb-2"><i class="fa fa-arrow-up"></i><span>+0.4h from avg</span></div>
      <div class="mini-chart-wrap">
        <canvas id="lastNightChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-4 mb-3">
    <div class="card p-3 stat-card text-center">
      <div class="icon-circle mx-auto mb-2" style="background:rgba(59,130,246,0.08)">
        <i class="fa fa-moon text-primary"></i>
      </div>
      <h5 class="fw-semibold text-dark mb-0">6h 55m</h5>
      <small class="text-muted d-block">Weekly Average</small>
      <div class="delta text-danger mb-2"><i class="fa fa-arrow-down"></i><span>-0.3h this week</span></div>
      <div class="mini-chart-wrap">
        <canvas id="weeklyMiniChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-4 mb-3">
    <div class="card p-3 stat-card text-center">
      <div class="icon-circle mx-auto mb-2" style="background:rgba(250,204,21,0.08)">
        <i class="fa fa-calendar text-warning"></i>
      </div>
      <h5 class="fw-semibold text-dark mb-0">7h 08m</h5>
      <small class="text-muted d-block">Monthly Average</small>
      <div class="delta text-success mb-2"><i class="fa fa-arrow-up"></i><span>Stable progress</span></div>
      <div class="mini-chart-wrap">
        <canvas id="monthlyMiniChart"></canvas>
      </div>
    </div>
  </div>
</div>



  <!-- Sleep Timer -->
  <div class="card p-4 text-center mb-4 timer-box">
    <h5 class="section-title mb-3">Sleep Timer</h5>
    <p class="text-muted small mb-4">Press start when you go to bed and stop when you wake up to log your sleep duration.</p>
    <button class="sleep-btn" id="sleepButton"><i class="fa-solid fa-play me-2"></i> Start Sleep</button>
    <p id="sleepDuration" class="mt-3 fw-semibold text-dark fs-5"></p>
  </div>

  <!-- Weekly Chart -->
  <div class="card p-4 mb-4">
    <h5 class="section-title">Weekly Sleep Overview</h5>
    <div class="chart-container">
      <canvas id="weeklySleepChart"></canvas>
    </div>
  </div>

  <!-- Monthly Chart -->
  <div class="card p-4 mb-4">
    <h5 class="section-title">Monthly Sleep Trend</h5>
    <div class="chart-container">
      <canvas id="monthlySleepChart"></canvas>
    </div>
  </div>

</main>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // helper: render a compact mini-line inside a fixed container
  function renderMiniChart(elId, data, color, fillColor) {
    const ctx = document.getElementById(elId).getContext('2d');

    // destroy old chart instance if exists to avoid duplication when re-rendering
    if (ctx._chart) { ctx._chart.destroy(); }

    ctx._chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.map((_, i) => i+1),
        datasets: [{
          data: data,
          borderColor: color,
          backgroundColor: fillColor || 'transparent',
          fill: false,
          tension: 0.35,
          borderWidth: 2,
          pointRadius: 0,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // IMPORTANT: allows parent height to control size
        plugins: {
          legend: { display: false },
          tooltip: { enabled: false }
        },
        scales: {
          x: { display: false },
          y: { display: false }
        },
        elements: { line: { borderJoinStyle: 'round' } }
      }
    });
  }

  // sample small datasets (7 points) — replace with real data when available
  const lastNightData = [6.8, 7.1, 7.2, 7.3, 7.4, 7.2, 7.1];
  const weeklyData    = [7.2, 6.8, 6.7, 6.9, 6.6, 6.8, 6.7];
  const monthlyData   = [6.9, 7.0, 7.1, 7.2, 7.1, 7.0, 7.1];

  // Render charts
  renderMiniChart('lastNightChart', lastNightData, '#16a34a');    // green
  renderMiniChart('weeklyMiniChart', weeklyData, '#2563eb');      // blue
  renderMiniChart('monthlyMiniChart', monthlyData, '#f59e0b');    // amber
</script>
<script>
  // Sleep timer logic
  let sleeping = false, startTime;
  const sleepBtn = document.getElementById('sleepButton');
  const sleepDuration = document.getElementById('sleepDuration');

  sleepBtn.onclick = () => {
    if (!sleeping) {
      startTime = new Date();
      sleepBtn.innerHTML = '<i class="fa-solid fa-stop me-2"></i> Stop Sleep';
      sleepBtn.style.backgroundColor = '#dc2626';
      sleeping = true;
    } else {
      const endTime = new Date();
      const hours = ((endTime - startTime) / 3600000).toFixed(2);
      sleepDuration.textContent = `You slept ${hours} hours.`;
      sleepBtn.innerHTML = '<i class="fa-solid fa-play me-2"></i> Start Sleep';
      sleepBtn.style.backgroundColor = '#1c6a3a';
      sleeping = false;
    }
  };

  // Reusable chart config
  const baseOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
        ticks: { color: '#64748b' },
        grid: { color: '#e5e7eb' }
      },
      x: {
        ticks: { color: '#64748b' },
        grid: { display: false }
      }
    },
    plugins: {
      legend: { display: false }
    }
  };

  // Weekly Chart
  new Chart(document.getElementById('weeklySleepChart'), {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Hours Slept',
        data: [7, 6.5, 7.2, 6.8, 7.4, 7.1, 7.3],
        borderColor: '#22c55e',
        backgroundColor: 'rgba(34,197,94,0.2)',
        tension: 0.4,
        borderWidth: 2,
        pointRadius: 4,
        pointBackgroundColor: '#16a34a'
      }]
    },
    options: baseOptions
  });

  // Monthly Chart
  new Chart(document.getElementById('monthlySleepChart'), {
    type: 'line',
    data: {
      labels: Array.from({ length: 30 }, (_, i) => `Day ${i + 1}`),
      datasets: [{
        label: 'Sleep Duration (hours)',
        data: Array.from({ length: 30 }, () => (6.5 + Math.random() * 1.5).toFixed(1)),
        borderColor: '#14532d',
        backgroundColor: 'rgba(20,83,45,0.1)',
        tension: 0.35,
        borderWidth: 2,
        pointRadius: 0
      }]
    },
    options: baseOptions
  });


  // Mini chart base config


</script>
@endsection
