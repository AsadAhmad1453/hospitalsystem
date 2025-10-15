@extends('patient.layouts.main')

@section('custom-css')
<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8faf9;
  }

  .sleep-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .sleep-header h2 {
    font-weight: 600;
    color: #14532d;
  }

  .sleep-header p {
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
  }

  .card {
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    background: #fff;
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
  }

  .sleep-btn {
    background-color: #1c6a3a;
    border: none;
    color: #fff;
    padding: 0.75rem 2rem;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .sleep-btn:hover {
    background-color: #298e4e;
  }

  .stats-box {
    text-align: center;
    padding: 1.5rem;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
  }

  .stats-box h4 {
    font-size: 1.8rem;
    color: #14532d;
    margin-bottom: 0.25rem;
  }

  .stats-box small {
    color: #64748b;
  }

  canvas {
    margin-top: 1rem;
  }

  .section-title {
    font-weight: 600;
    color: #14532d;
    margin-bottom: 1rem;
  }
</style>
@endsection

@section('content')
<main class="container py-4">
  <div class="sleep-header">
    <h2>Sleep Tracker</h2>
    <p>Track your sleep duration, analyze your weekly and monthly patterns, and work towards better rest and recovery.</p>
  </div>

  <div class="row g-4 mb-4">
    <div class="col-md-4">
      <div class="stats-box">
        <h4>7h 12m</h4>
        <small>Last Night’s Sleep</small>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-box">
        <h4>6h 55m</h4>
        <small>Weekly Average</small>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-box">
        <h4>7h 08m</h4>
        <small>Monthly Average</small>
      </div>
    </div>
  </div>

  <div class="card p-4 text-center mb-4">
    <h5 class="section-title mb-3">Sleep Timer</h5>
    <p class="text-muted">Press start when you go to bed and stop when you wake up to log your sleep duration.</p>
    <button class="sleep-btn" id="sleepButton">Start Sleep</button>
    <p id="sleepDuration" class="mt-3 fw-semibold text-dark"></p>
  </div>

  <div class="card p-4 mb-4">
    <h5 class="section-title">Weekly Sleep Overview</h5>
    <canvas id="weeklySleepChart" height="120"></canvas>
  </div>

  <div class="card p-4">
    <h5 class="section-title">Monthly Sleep Trend</h5>
    <canvas id="monthlySleepChart" height="120"></canvas>
  </div>
</main>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Sleep button simulation
  let sleeping = false, startTime;
  document.getElementById('sleepButton').onclick = () => {
    const btn = document.getElementById('sleepButton');
    const dur = document.getElementById('sleepDuration');
    if (!sleeping) {
      startTime = new Date();
      btn.textContent = "Stop Sleep";
      btn.style.backgroundColor = "#dc2626";
      sleeping = true;
    } else {
      const endTime = new Date();
      const hours = ((endTime - startTime) / 3600000).toFixed(2);
      dur.textContent = `You slept ${hours} hours.`;
      btn.textContent = "Start Sleep";
      btn.style.backgroundColor = "#22c55e";
      sleeping = false;
    }
  };

  // Weekly Sleep Chart
  const weeklyCtx = document.getElementById('weeklySleepChart');
  new Chart(weeklyCtx, {
    type: 'line',
    data: {
      labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
      datasets: [{
        label: 'Hours Slept',
        data: [7, 6.5, 7.2, 6.8, 7.4, 7.1, 7.3],
        borderColor: '#16a34a',
        tension: 0.4,
        borderWidth: 2,
        pointRadius: 4,
        pointBackgroundColor: '#22c55e'
      }]
    },
    options: {
      responsive: true,
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
    }
  });

  // Monthly Sleep Chart
  const monthlyCtx = document.getElementById('monthlySleepChart');
  new Chart(monthlyCtx, {
    type: 'line',
    data: {
      labels: Array.from({length: 30}, (_, i) => `Day ${i+1}`),
      datasets: [{
        label: 'Sleep Duration (hours)',
        data: Array.from({length: 30}, () => (6.5 + Math.random() * 1.5).toFixed(1)),
        borderColor: '#14532d',
        tension: 0.35,
        borderWidth: 2,
        pointRadius: 0
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: { color: '#64748b' },
          grid: { color: '#e5e7eb' }
        },
        x: {
          ticks: { color: '#64748b', maxTicksLimit: 10 },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  });
</script>
@endsection
