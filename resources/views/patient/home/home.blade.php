@extends('patient.layouts.main')

@section('custom-css')
<!-- Fonts + Icons -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

<style>
:root{
  --sage: #4e9f6b;
  --sage-dark: #355f47;
  --muted: #687067;
  --card-bg: #ffffff;
  --page-bg: #f6faf8;
  --radius: 14px;
}

/* page */
body { background: var(--page-bg); font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto; color:#1f2f26; }

/* welcome */
.welcome { display:flex; justify-content:space-between; align-items:center; gap:1rem; margin-bottom:1.25rem; }
.welcome .title h2 { margin:0; font-size:1.35rem; color:#133f2a; font-weight:700; }
.welcome .title p { margin:0; color:var(--muted); font-size:0.95rem; }

/* button */
.btn-sage {
  background: linear-gradient(180deg,var(--sage),var(--sage-dark));
  color:#fff; border:none; border-radius:999px; padding:.5rem .9rem;
  box-shadow: 0 8px 24px rgba(44,84,61,0.06);
}
.btn-sage:hover { transform:translateY(-2px); }

/* cards */
.card { background:var(--card-bg); border-radius:var(--radius); border:1px solid rgba(20,70,40,0.04); box-shadow: 0 6px 18px rgba(30,50,30,0.04); transition:transform .25s, box-shadow .25s; }
.hover-lift:hover { transform:translateY(-6px); box-shadow:0 14px 36px rgba(30,50,30,0.07); }
.p-4 { padding:1.25rem !important; }

/* icon circle */
.icon-circle { width:56px; height:56px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center; background:linear-gradient(180deg, rgba(78,159,107,0.12), rgba(78,159,107,0.06)); color:var(--sage-dark); font-size:1.2rem; margin:0 auto .65rem; }

/* stat cards */
.stat-card { text-align:center; padding:1.2rem; cursor:pointer; }
.stat-title { font-weight:600; color:#174c32; margin-bottom:.35rem; font-size:.98rem; }
.stat-value { font-size:1.35rem; font-weight:700; color:#133f2a; margin-bottom:0; }
.stat-sub { font-size:.85rem; color:var(--muted); margin-top:.35rem; }
.stat-cta { margin-top:.6rem; font-weight:600; color:var(--sage-dark); font-size:.86rem; }

/* view details link */
.underline-cta { text-decoration:none; display:inline-flex; gap:.5rem; align-items:center; color:var(--sage-dark); }
.stat-card:hover .underline-cta { text-decoration:underline; text-underline-offset:6px; }

/* modal */
.modal .modal-dialog { max-width:920px; }
.modal-content { border-radius:14px; padding: .8rem; border:1px solid rgba(20,70,40,0.04); box-shadow: 0 18px 40px rgba(20,70,30,0.06); }
.modal-header { border-bottom:none; padding:.6rem 1rem; display:flex; align-items:center; gap:.6rem; }
.modal-title { font-weight:700; color:#133f2a; }
.modal-body { padding:.6rem 1rem 1rem 1rem; }

/* inline meal inputs */
.meal-inputs { display:none; margin-top:0.85rem; justify-content:center; gap:.6rem; align-items:center; }
.meal-inputs.active { display:flex; }
.meal-inputs .form-control { max-width:230px; border-radius:10px; box-shadow:none; }

/* small helper */
.small-muted { font-size:.88rem; color:var(--muted); }

/* chart container */
.chart-wrap { background: #fff; border-radius:12px; padding:.6rem; border:1px solid rgba(20,70,40,0.03); }

/* toast */
.toast-custom { position: fixed; bottom: 20px; right: 20px; z-index: 12000; background: #153a2a; color:#fff; padding:.6rem .9rem; border-radius:8px; box-shadow: 0 10px 30px rgba(20,60,40,0.2); opacity:0; transform: translateY(8px); transition: all .35s ease; }

/* responsive */
@media (max-width:767px) {
  .welcome { flex-direction:column; align-items:flex-start; gap:.5rem; }
  .icon-circle { width:48px; height:48px; }
}
</style>
@endsection


@section('content')
<main class="container pt-3 pb-5 flex-grow-1">
  <div class="welcome">
    <div class="title">
      <h2>Welcome back, <span class="small-muted">John Doe</span></h2>
      <p class="small-muted">A calm, focused place to view your health at a glance.</p>
    </div>
    <div>
      <button class="btn-sage btn"><i class="fa-solid fa-plus me-2"></i> New Entry</button>
    </div>
  </div>

  <!-- Top overview -->
  <div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
      <div class="card hover-lift p-4 text-center">
        <div class="icon-circle"><i class="fa-solid fa-heart-pulse"></i></div>
        <div class="small-muted">Disease Status</div>
        <div class="fw-semibold" style="font-size:1.05rem;margin-top:.35rem;">Stable</div>
      </div>
    </div>

    <div class="col-12 col-md-8">
      <div class="card hover-lift p-4">
        <div class="d-flex align-items-center">
          <div class="icon-circle" style="width:48px;height:48px;border-radius:10px"><i class="fa-solid fa-stethoscope"></i></div>
          <div style="margin-left:.85rem">
            <div style="font-weight:700;color:#133f2a">Vitals Summary</div>
            <div class="small-muted">Snapshot of key vitals</div>
          </div>
        </div>

        <div class="row text-center mt-3">
          <div class="col">
            <div class="fw-semibold text-success">120/80</div>
            <small class="small-muted">Blood Pressure</small>
          </div>
          <div class="col">
            <div class="fw-semibold text-success">78 bpm</div>
            <small class="small-muted">Heart Rate</small>
          </div>
          <div class="col">
            <div class="fw-semibold text-success">98 mg/dL</div>
            <small class="small-muted">Sugar</small>
          </div>
          <div class="col">
            <div class="fw-semibold text-success">68 kg</div>
            <small class="small-muted">Weight</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Medicine & appointment -->
  <div class="row g-4 mb-4">
    <div class="col-12 col-md-6">
      <div class="card hover-lift p-4">
        <div class="d-flex align-items-center mb-3">
          <div class="icon-circle"><i class="fa-solid fa-pills"></i></div>
          <div style="margin-left:.75rem">
            <div style="font-weight:700;color:#133f2a">Today's Medicine</div>
            <div class="small-muted">Timings & doses</div>
          </div>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item border-0 ps-0 d-flex justify-content-between">
            <span>Atorvastatin 10mg</span>
            <small class="small-muted">Morning</small>
          </li>
          <li class="list-group-item border-0 ps-0 d-flex justify-content-between">
            <span>Metformin 500mg</span>
            <small class="small-muted">Afternoon</small>
          </li>
          <li class="list-group-item border-0 ps-0 d-flex justify-content-between">
            <span>Vitamin D</span>
            <small class="small-muted">Night</small>
          </li>
        </ul>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card hover-lift p-4">
        <div class="d-flex align-items-center mb-3">
          <div class="icon-circle"><i class="fa-solid fa-calendar-check"></i></div>
          <div style="margin-left:.75rem">
            <div style="font-weight:700;color:#133f2a">Upcoming Appointment</div>
            <div class="small-muted">Next visit details</div>
          </div>
        </div>

        <div class="mt-2 small-muted">Dr. Sarah Khan · Sept 15, 2025 · 10:00 AM</div>
        <div class="mt-3">
          <button class="btn-sage btn">View Details</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Stats: steps, calories, sleep -->
  <div class="row g-4 mb-4">
    <!-- Steps -->
    <div class="col-12 col-md-4">
      <div class="card stat-card hover-lift" role="button" data-bs-toggle="modal" data-bs-target="#stepsModal">
        <div class="icon-circle"><i class="fa-solid fa-shoe-prints"></i></div>
        <div class="stat-title">Steps</div>
        <div class="stat-value" id="stepsToday">--</div>
        <div class="stat-sub">Today</div>
        <div class="stat-cta"><a class="underline-cta">View weekly progress <i class="fa-solid fa-arrow-right" style="font-size:.85rem;margin-left:.4rem"></i></a></div>
      </div>
    </div>

    <!-- Calories -->
    <div class="col-12 col-md-4">
      <div class="card stat-card hover-lift" role="button" data-bs-toggle="modal" data-bs-target="#caloriesModal">
        <div class="icon-circle"><i class="fa-solid fa-fire"></i></div>
        <div class="stat-title">Calories</div>
        <div class="stat-value" id="caloriesBurnedToday">-- kcal</div>
        <div class="stat-sub">Burned today</div>
        <div class="stat-cta"><a class="underline-cta">Track meals & view weekly <i class="fa-solid fa-arrow-right" style="font-size:.85rem;margin-left:.4rem"></i></a></div>
      </div>
    </div>

    <!-- Sleep -->
    <div class="col-12 col-md-4">
      <div class="card stat-card hover-lift" role="button" data-bs-toggle="modal" data-bs-target="#sleepModal">
        <div class="icon-circle"><i class="fa-solid fa-moon"></i></div>
        <div class="stat-title">Sleep</div>
        <div class="stat-value" id="sleepLast">--</div>
        <div class="stat-sub">Last night</div>
        <div class="stat-cta"><a class="underline-cta">Log & view history <i class="fa-solid fa-arrow-right" style="font-size:.85rem;margin-left:.4rem"></i></a></div>
      </div>
    </div>
  </div>

  <!-- Messages & Tip -->
  <div class="row g-4">
    <div class="col-12 col-md-6">
      <div class="card hover-lift p-4">
        <div class="d-flex align-items-center mb-3">
          <div class="icon-circle"><i class="fa-solid fa-message"></i></div>
          <div style="margin-left:.75rem">
            <div style="font-weight:700;color:#133f2a">Messages</div>
            <div class="small-muted">From your care team</div>
          </div>
        </div>

        <div class="mt-2 small-muted">2 unread messages from your doctor.</div>
        <div class="mt-3">
          <button class="btn btn-sage">View Messages</button>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card hover-lift p-4">
        <div class="d-flex align-items-center mb-3">
          <div class="icon-circle"><i class="fa-solid fa-leaf"></i></div>
          <div style="margin-left:.75rem">
            <div style="font-weight:700;color:#133f2a">Health Tip</div>
            <div class="small-muted">Daily wellness suggestion</div>
          </div>
        </div>

        <div class="mt-2 small-muted">Stay hydrated and take short walks after meals for better digestion.</div>
      </div>
    </div>
  </div>
</main>

<!-- ===== MODALS ===== -->

<!-- Steps Modal -->
<div class="modal fade" id="stepsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Weekly Steps</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="small-muted">Your weekly step count. Switch weeks to compare trends.</p>

        <div class="d-flex justify-content-between align-items-center mb-2">
          <button id="prevWeekSteps" class="btn btn-outline-secondary btn-sm">Prev</button>
          <div class="small-muted fw-semibold" id="stepsWeekLabel">Week 1</div>
          <button id="nextWeekSteps" class="btn btn-outline-secondary btn-sm">Next</button>
        </div>

        <div class="chart-wrap">
          <canvas id="stepsChart" height="120"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Calories Modal -->
<div class="modal fade" id="caloriesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Calories — Intake vs Burned</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="small-muted">Compare intake and calories burned for the week. Add a meal to update today's intake.</p>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="small-muted">Calories Burned: <strong id="calBurnedLabel">-- kcal</strong></div>
          <div class="small-muted">Calories Intake: <strong id="calIntakeLabel">-- kcal</strong></div>
        </div>

        <div class="chart-wrap mb-3">
          <canvas id="caloriesChart" height="120"></canvas>
        </div>

        <div class="d-flex justify-content-center">
          <button id="addMealBtn" class="btn btn-sage btn-sm">Add Meal</button>
        </div>

        <div class="meal-inputs" id="mealInputs">
          <input type="text" id="mealName" class="form-control" placeholder="Meal name (e.g. Sandwich)">
          <input type="number" id="mealCalories" class="form-control" placeholder="Calories (kcal)">
          <button id="saveMealBtn" class="btn btn-sage btn-sm">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sleep Modal -->
<div class="modal fade" id="sleepModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sleep Tracker</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="small-muted">Start the timer when you go to bed and stop it when you wake — your sleep time will be saved to today's value.</p>

        <div class="chart-wrap mb-3">
          <canvas id="sleepChart" height="120"></canvas>
        </div>

        <div class="d-flex justify-content-center">
          <button id="startSleepBtn" class="btn btn-sage btn-sm">Start Sleep</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('custom-js')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
(() => {
  // Safety helpers to get DOM or return null
  const $ = id => document.getElementById(id) || null;

  // Data
  const stepsWeeks = [
    [8000, 7500, 9000, 8200, 7000, 9400, 8800],
    [8500, 8900, 9100, 8700, 9500, 9200, 9600]
  ];
  let stepsWeekIndex = 0;

  const caloriesData = {
    intake: [1600,1700,1500,1800,1750,1650,1550],
    burned: [1800,1850,1900,1750,2000,1950,1800]
  };

  const sleepHours = [7,6.5,8,7.2,7.8,6.9,7.5];

  // helper: Monday index 0..6
  const todayIndex = (() => { const d=new Date().getDay(); return (d+6)%7; })();

  // Charts
  let stepsChart, caloriesChart, sleepChart;

  function initCharts() {
    const stepsCtx = $('stepsChart').getContext('2d');
    stepsChart = new Chart(stepsCtx, {
      type: 'bar',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{ label:'Steps', data: stepsWeeks[stepsWeekIndex].slice(), backgroundColor: 'rgba(78,159,107,0.95)', borderRadius:6 }]
      },
      options: { responsive:true, plugins:{ legend:{ display:false }}, scales:{ y:{ beginAtZero:true } } }
    });

    const calCtx = $('caloriesChart').getContext('2d');
    caloriesChart = new Chart(calCtx, {
      type: 'line',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [
          { label:'Intake', data: caloriesData.intake.slice(), borderColor: 'rgba(78,159,107,0.95)', backgroundColor:'rgba(78,159,107,0.08)', tension:0.3, fill:true },
          { label:'Burned', data: caloriesData.burned.slice(), borderColor: 'rgba(220,53,69,0.9)', backgroundColor:'rgba(220,53,69,0.06)', tension:0.3, fill:true }
        ]
      },
      options: { responsive:true, plugins:{ legend:{ display:true, position:'top' } }, scales:{ y:{ beginAtZero:true } } }
    });

    const sleepCtx = $('sleepChart').getContext('2d');
    sleepChart = new Chart(sleepCtx, {
      type: 'line',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{ label:'Sleep Hours', data: sleepHours.slice(), borderColor: 'rgba(78,159,107,0.95)', backgroundColor:'rgba(78,159,107,0.06)', tension:0.3, fill:true }]
      },
      options: { responsive:true, plugins:{ legend:{ display:false } }, scales:{ y:{ beginAtZero:true, suggestedMax:10 } } }
    });
  }

  // Update stat displays
  function refreshSmallStats() {
    const s = $('stepsToday'); if (s) s.textContent = stepsWeeks[stepsWeekIndex][todayIndex].toLocaleString();
    const cb = $('caloriesBurnedToday'); if (cb) cb.textContent = caloriesData.burned[todayIndex] + ' kcal';
    const ciLabel = $('calIntakeLabel'); if (ciLabel) ciLabel.textContent = caloriesData.intake[todayIndex] + ' kcal';
    const cbLabel = $('calBurnedLabel'); if (cbLabel) cbLabel.textContent = caloriesData.burned[todayIndex] + ' kcal';
    const sl = $('sleepLast'); if (sl) {
      const h = Math.floor(sleepHours[todayIndex]);
      const m = Math.round((sleepHours[todayIndex]-h)*60);
      sl.textContent = `${h}h ${String(m).padStart(2,'0')}m`;
    }
  }

  // small transient toast
  function showToast(message) {
    const t = document.createElement('div');
    t.className = 'toast-custom';
    t.textContent = message;
    document.body.appendChild(t);
    requestAnimationFrame(()=> { t.style.opacity = '0.98'; t.style.transform = 'translateY(0)'; });
    setTimeout(()=> { t.style.opacity = '0'; t.style.transform = 'translateY(6px)'; setTimeout(()=>t.remove(),400); }, 2000);
  }

  // Wire up UI after DOM ready
  document.addEventListener('DOMContentLoaded', () => {
    // Ensure canvases exist
    if ($('stepsChart') && $('caloriesChart') && $('sleepChart')) {
      initCharts();
      refreshSmallStats();
    } else {
      console.warn('Charts: some canvas elements missing.');
    }

    // Steps modal controls
    const prevW = $('prevWeekSteps'), nextW = $('nextWeekSteps'), stepsLabel = $('stepsWeekLabel');
    if (prevW && nextW && stepsLabel && stepsChart) {
      prevW.addEventListener('click', () => {
        stepsWeekIndex = (stepsWeekIndex - 1 + stepsWeeks.length) % stepsWeeks.length;
        stepsChart.data.datasets[0].data = stepsWeeks[stepsWeekIndex].slice();
        stepsChart.update();
        stepsLabel.textContent = `Week ${stepsWeekIndex+1}`;
        refreshSmallStats();
      });
      nextW.addEventListener('click', () => {
        stepsWeekIndex = (stepsWeekIndex + 1) % stepsWeeks.length;
        stepsChart.data.datasets[0].data = stepsWeeks[stepsWeekIndex].slice();
        stepsChart.update();
        stepsLabel.textContent = `Week ${stepsWeekIndex+1}`;
        refreshSmallStats();
      });
    }

    // Calories: toggle meal inputs and save meal
    const addMealBtn = $('addMealBtn'), mealInputs = $('mealInputs'), saveMealBtn = $('saveMealBtn');
    if (addMealBtn && mealInputs) {
      addMealBtn.addEventListener('click', () => mealInputs.classList.toggle('active'));
    }
    if (saveMealBtn) {
      saveMealBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const name = ($('mealName') && $('mealName').value.trim()) || '';
        const calVal = parseInt(($('mealCalories') && $('mealCalories').value) || '', 10);
        if (!name || !calVal || isNaN(calVal)) {
          showToast('Please enter meal name and calories (kcal).');
          return;
        }
        // add to today's intake
        caloriesData.intake[todayIndex] += calVal;
        // update chart & labels
        if (caloriesChart) {
          caloriesChart.data.datasets[0].data = caloriesData.intake.slice();
          caloriesChart.update();
        }
        if ($('calIntakeLabel')) $('calIntakeLabel').textContent = caloriesData.intake[todayIndex] + ' kcal';
        showToast(`Added ${calVal} kcal to ${name}`);
        // reset and hide
        if ($('mealName')) $('mealName').value = '';
        if ($('mealCalories')) $('mealCalories').value = '';
        mealInputs.classList.remove('active');
      });
    }

    // Sleep start/stop
    const startSleepBtn = $('startSleepBtn');
    let sleepRunning = false, sleepStart = null;
    if (startSleepBtn) {
      startSleepBtn.addEventListener('click', () => {
        if (!sleepRunning) {
          sleepStart = new Date();
          sleepRunning = true;
          startSleepBtn.textContent = 'Stop & Save';
          startSleepBtn.classList.add('btn-danger');
          startSleepBtn.classList.remove('btn-sage');
        } else {
          const end = new Date();
          const diffHrs = (end - sleepStart) / 3600000; // hours
          sleepHours[todayIndex] = +( (sleepHours[todayIndex] || 0) + diffHrs ).toFixed(2);
          // update chart & stat
          if (sleepChart) {
            sleepChart.data.datasets[0].data = sleepHours.slice();
            sleepChart.update();
          }
          const h = Math.floor(sleepHours[todayIndex]);
          const m = Math.round((sleepHours[todayIndex]-h)*60);
          if ($('sleepLast')) $('sleepLast').textContent = `${h}h ${String(m).padStart(2,'0')}m`;
          // reset button
          sleepRunning = false; sleepStart = null;
          startSleepBtn.textContent = 'Start Sleep';
          startSleepBtn.classList.remove('btn-danger');
          startSleepBtn.classList.add('btn-sage');
          showToast(`Saved ${ (Math.round(diffHrs*60)/60).toFixed(2) } hours`);
        }
      });
    }

  }); // domcontentloaded end
})(); // IIFE end
</script>
@endsection
