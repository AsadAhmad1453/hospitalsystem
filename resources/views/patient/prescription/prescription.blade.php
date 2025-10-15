@extends('patient.layouts.main')

@section('custom-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>
:root{
  --sage: #4e9f6b;
  --sage-600: #3b8257;
  --muted: #6b736f;
  --bg: #f6faf8;
  --card-radius: 12px;
}

body { font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto; background: var(--bg); color:#17221a; }

/* Page wrapper */
.container { max-width: 1100px; }

/* Header */
.page-header { display:flex; justify-content:space-between; align-items:center; gap:1rem; margin-bottom:1rem; }
.page-header h3 { margin:0; color:#133f2a; font-weight:700; }
.page-header p { margin:0; color:var(--muted); font-size:.95rem; }

/* Controls */
.controls { display:flex; gap:.6rem; align-items:center; flex-wrap:wrap; }
.input-search { min-width:220px; max-width:420px; }
.select-filter { min-width:160px; }

/* Card */
.card {
  border-radius: var(--card-radius);
  background: #fff;
  border: 1px solid rgba(20,70,40,0.04);
  box-shadow: 0 8px 24px rgba(20,70,40,0.03);
  transition: transform .18s ease, box-shadow .18s ease;
}
.card:hover { transform: translateY(-4px); box-shadow: 0 18px 36px rgba(20,70,40,0.06); }

/* Prescription list */
.prescription-list { display:flex; flex-direction:column; gap:.85rem; }
.prescription-item { display:flex; align-items:center; gap:1rem; padding:1rem; border-radius:10px; border:1px solid rgba(20,70,40,0.03); }
.prescription-item .meta { flex:1; min-width:0; }
.prescription-item .meta h5 { margin:0; font-weight:600; color:#133f2a; font-size:1rem; }
.prescription-item .meta p { margin:0; color:var(--muted); font-size:.9rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }

/* small pill tags */
.tag-pill { background: linear-gradient(180deg, rgba(78,159,107,0.12), rgba(78,159,107,0.06)); color:var(--sage-600); padding:.25rem .5rem; border-radius:999px; font-weight:600; font-size:.82rem; }

/* schedule dots */
.schedule { display:flex; gap:.4rem; flex-wrap:wrap; margin-top:.45rem; }
.schedule .dot { background:#f0f7ef; color:var(--sage-600); padding:.2rem .45rem; border-radius:6px; font-size:.8rem; }

/* small actions */
.actions { display:flex; gap:.5rem; align-items:center; }

/* mark taken switch */
.form-switch .form-check-input { width:2.1rem; height:1.1rem; }

/* details card */
.details-grid { display:grid; grid-template-columns: 1fr 240px; gap:1rem; }
@media (max-width:900px) { .details-grid { grid-template-columns: 1fr; } }

/* pastel accent */
.accent-line { height:6px; border-radius:6px; background: linear-gradient(90deg, rgba(78,159,107,0.9), rgba(88,142,79,0.9)); margin-bottom:.5rem; }

/* helper text */
.small-muted { color:var(--muted); font-size:.9rem; }

/* footer note */
.footer-note { font-size:.88rem; color:var(--muted); margin-top:1rem; }

/* responsiveness */
@media (max-width:576px) {
  .controls { flex-direction:column; align-items:flex-start; }
  .prescription-item { flex-direction:column; align-items:flex-start; }
  .actions { margin-top:.5rem; }
}
</style>
@endsection

@section('content')
<main class="container pt-3 pb-5 flex-grow-1">
  <div class="page-header">
    <div>
      <h3>Prescriptions</h3>
      <p class="small-muted">Active prescriptions and history — review dosages, schedule, and doctor notes.</p>
    </div>

    <div class="controls">
      <input type="search" id="presSearch" class="form-control input-search" placeholder="Search medication or doctor...">
      <select id="presFilter" class="form-select select-filter">
        <option value="all">All prescriptions</option>
        <option value="active">Active</option>
        <option value="completed">Completed</option>
        <option value="as-needed">PRN (As needed)</option>
      </select>
      <button id="newPrescriptionBtn" class="btn btn-sage"><i class="fa-solid fa-file-medical me-2"></i> New</button>
    </div>
  </div>

  <div class="row g-4">
    <!-- Left column: active prescriptions list -->
    <div class="col-12 col-lg-7">
      <div class="card p-3">
        <div class="accent-line"></div>
        <h5 style="margin-bottom:.6rem;">Current Prescriptions</h5>

        <div class="prescription-list" id="presList" aria-live="polite">
          <!-- items injected by JS -->
        </div>

        <div class="footer-note">Tip: click any prescription to view details, dosing schedule, and set reminders.</div>
      </div>
    </div>

    <!-- Right column: summary / quick actions -->
    <div class="col-12 col-lg-5">
      <div class="card p-3">
        <h5 style="margin-bottom:.6rem;">Summary</h5>

        <div class="mb-3">
          <div class="small-muted">Active medications</div>
          <div class="d-flex gap-2 mt-2" id="tagSummary">
            <!-- pills injected by JS -->
          </div>
        </div>

        <div class="mb-3">
          <div class="small-muted">Next upcoming dose</div>
          <div class="mt-2 fw-semibold" id="nextDose">—</div>
        </div>

        <div class="mb-3">
          <div class="small-muted">Prescribing doctor</div>
          <div class="mt-2" id="primaryDoctor">—</div>
        </div>

        <div class="mt-3">
          <button id="downloadAllBtn" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-download me-2"></i> Download All</button>
          <button id="manageRemindersBtn" class="btn btn-sage btn-sm ms-2"><i class="fa-solid fa-bell me-2"></i> Manage Reminders</button>
        </div>
      </div>

      <div class="card p-3 mt-3">
        <h6 class="small-muted">History</h6>
        <p class="small-muted mb-0">View completed prescriptions, discontinue notes, and refill history in the Medical Records tab.</p>
      </div>
    </div>
  </div>
</main>

<!-- Prescription Details Modal -->
<div class="modal fade" id="prescriptionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="details-grid">
          <div>
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h4 id="modalMedName">Medication Name</h4>
                <div class="small-muted" id="modalDoctor">Prescribed by Dr. —</div>
              </div>
              <div class="text-end">
                <div class="tag-pill" id="modalStatus">Active</div>
                <div class="small-muted mt-2" id="modalDate">Since: —</div>
              </div>
            </div>

            <hr>

            <h6 class="mb-2">Dosage & Schedule</h6>
            <p id="modalDosage" class="small-muted mb-1">—</p>
            <div class="schedule" id="modalSchedule">
              <!-- schedule pills -->
            </div>

            <h6 class="mt-3 mb-1">Instructions</h6>
            <p id="modalInstructions" class="small-muted">—</p>

            <h6 class="mt-3 mb-1">Notes</h6>
            <p id="modalNotes" class="small-muted">—</p>

            <div class="mt-3">
              <button id="downloadPresBtn" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-download me-1"></i> Download Prescription</button>
              <button id="snoozeBtn" class="btn btn-sage btn-sm ms-2"><i class="fa-solid fa-bell-slash me-1"></i> Snooze Reminder</button>
            </div>
          </div>

          <div>
            <div style="position:sticky; top:18px;">
              <div class="card p-3 mb-3">
                <div class="small-muted">Next dose</div>
                <div class="fw-semibold mt-1" id="modalNextDose">—</div>
                <div class="small-muted mt-2" id="modalTimeUntil">—</div>
              </div>

              <div class="card p-3 mb-3">
                <div class="small-muted">Mark as taken</div>
                <div class="form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" id="markTakenSwitch">
                  <label class="form-check-label small-muted" for="markTakenSwitch">Taken now</label>
                </div>
                <div class="small-muted mt-2" id="takenFeedback"></div>
              </div>

              <div class="card p-3">
                <div class="small-muted">Refill</div>
                <div class="mt-2">
                  <button id="requestRefillBtn" class="btn btn-outline-secondary btn-sm w-100"><i class="fa-solid fa-sync me-1"></i> Request Refill</button>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- details-grid -->
      </div>
    </div>
  </div>
</div>
@endsection


@section('custom-js')
<script>
/* Sample data — in production replace with server-rendered data (Blade/JSON) */
const PRESCRIPTIONS = [
  {
    id: 1,
    name: "Atorvastatin",
    strength: "10 mg",
    frequency: "Once daily (morning)",
    doctor: "Dr. Sarah Khan",
    since: "2025-02-10",
    status: "active",
    schedule: ["Morning"],
    instructions: "Take with water. Avoid grapefruit.",
    notes: "Monitor liver enzymes monthly.",
    nextDoseTimeISO: (() => { const d=new Date(); d.setHours(8,0,0,0); return d.toISOString(); })()
  },
  {
    id: 2,
    name: "Metformin",
    strength: "500 mg",
    frequency: "Twice daily (morning, evening)",
    doctor: "Dr. Sarah Khan",
    since: "2024-11-05",
    status: "active",
    schedule: ["Morning","Evening"],
    instructions: "Take with meals to reduce GI upset.",
    notes: "Check blood sugar before dose if feeling unwell.",
    nextDoseTimeISO: (() => { const d=new Date(); d.setHours(18,0,0,0); return d.toISOString(); })()
  },
  {
    id: 3,
    name: "Vitamin D",
    strength: "1000 IU",
    frequency: "Night",
    doctor: "Dr. Ali",
    since: "2023-08-01",
    status: "completed",
    schedule: ["Night"],
    instructions: "Weekly review.",
    notes: "Completed course.",
    nextDoseTimeISO: null
  }
];

/* Render prescription items */
function renderPrescriptions(list) {
  const container = document.getElementById('presList');
  container.innerHTML = '';
  if (!list.length) {
    container.innerHTML = '<div class="small-muted">No prescriptions found.</div>';
    return;
  }
  list.forEach(p => {
    const item = document.createElement('div');
    item.className = 'prescription-item';
    item.setAttribute('data-id', p.id);

    const left = document.createElement('div');
    left.innerHTML = `<div style="width:46px;height:46px;border-radius:10px;background:linear-gradient(180deg, rgba(78,159,107,0.12), rgba(78,159,107,0.04));display:flex;align-items:center;justify-content:center;color:var(--sage-600);font-weight:700">${p.name.charAt(0)}</div>`;

    const meta = document.createElement('div');
    meta.className = 'meta';
    meta.innerHTML = `<h5>${p.name} <small style="font-weight:600;color:#667469;margin-left:.4rem">${p.strength}</small></h5>
                      <p>${p.frequency} • Prescribed by ${p.doctor}</p>
                      <div class="schedule">${p.schedule.map(s => `<span class="dot">${s}</span>`).join('')}</div>`;

    const right = document.createElement('div');
    right.style.minWidth = '150px';
    right.style.textAlign = 'right';
    right.innerHTML = `<div class="tag-pill" style="margin-bottom:.55rem">${p.status === 'active' ? 'Active' : 'Completed'}</div>
                       <div class="small-muted">Since ${p.since}</div>
                       <div class="actions mt-2">
                         <button class="btn btn-sm btn-outline-secondary btn-download" data-id="${p.id}" title="Download"><i class="fa-solid fa-download"></i></button>
                         <button class="btn btn-sm btn-outline-secondary btn-view ms-1" data-id="${p.id}" title="View"><i class="fa-solid fa-eye"></i></button>
                       </div>`;

    item.appendChild(left);
    item.appendChild(meta);
    item.appendChild(right);

    // click to open details (delegated)
    container.appendChild(item);
  });
}

/* Search + filter */
function applyFilters() {
  const q = (document.getElementById('presSearch').value || '').toLowerCase();
  const f = document.getElementById('presFilter').value;
  let filtered = PRESCRIPTIONS.slice();
  if (f !== 'all') filtered = filtered.filter(p => {
    if (f === 'active') return p.status === 'active';
    if (f === 'completed') return p.status === 'completed';
    if (f === 'as-needed') return p.frequency.toLowerCase().includes('as needed') || p.frequency.toLowerCase().includes('prn');
    return true;
  });
  if (q) filtered = filtered.filter(p => (p.name + ' ' + p.doctor + ' ' + p.notes).toLowerCase().includes(q));
  renderPrescriptions(filtered);
  renderSummary(filtered);
}

/* Summary pills & next dose */
function renderSummary(list) {
  const tags = document.getElementById('tagSummary');
  tags.innerHTML = '';
  const active = list.filter(p => p.status === 'active');
  const uniq = [...new Set(active.map(p => p.name))];
  uniq.forEach(n => {
    const pill = document.createElement('div');
    pill.className = 'tag-pill';
    pill.textContent = n;
    tags.appendChild(pill);
  });

  const nextDoseEl = document.getElementById('nextDose');
  if (active.length === 0) {
    nextDoseEl.textContent = 'No upcoming doses';
    document.getElementById('primaryDoctor').textContent = '—';
    return;
  }
  // simple next dose selection: earliest nextDoseTimeISO that isn't null
  const next = active.map(p => ({p, t: p.nextDoseTimeISO ? new Date(p.nextDoseTimeISO) : null}))
                     .filter(x => x.t)
                     .sort((a,b)=> a.t - b.t)[0];
  if (next) {
    const when = next.t;
    nextDoseEl.textContent = `${next.p.name} • ${when.toLocaleString()}`;
    document.getElementById('primaryDoctor').textContent = active[0].doctor;
  } else {
    nextDoseEl.textContent = 'No scheduled times today';
    document.getElementById('primaryDoctor').textContent = active[0].doctor;
  }
}

/* Modal population */
function openPrescriptionModal(id) {
  const pres = PRESCRIPTIONS.find(p => p.id === Number(id));
  if (!pres) return;
  // populate fields
  document.getElementById('modalMedName').textContent = `${pres.name} — ${pres.strength}`;
  document.getElementById('modalDoctor').textContent = `Prescribed by ${pres.doctor}`;
  document.getElementById('modalDate').textContent = `Since: ${pres.since}`;
  document.getElementById('modalStatus').textContent = pres.status === 'active' ? 'Active' : 'Completed';
  document.getElementById('modalDosage').textContent = pres.frequency;
  document.getElementById('modalInstructions').textContent = pres.instructions;
  document.getElementById('modalNotes').textContent = pres.notes;

  const sched = document.getElementById('modalSchedule');
  sched.innerHTML = pres.schedule.map(s => `<span class="dot">${s}</span>`).join('');

  if (pres.nextDoseTimeISO) {
    const nd = new Date(pres.nextDoseTimeISO);
    document.getElementById('modalNextDose').textContent = nd.toLocaleString();
    const diffMs = nd - new Date();
    const hh = Math.floor(diffMs / (1000*60*60));
    const mm = Math.max(0, Math.round((diffMs % (1000*60*60))/(1000*60)));
    document.getElementById('modalTimeUntil').textContent = hh>=0 ? `In ${hh}h ${mm}m` : 'Due';
  } else {
    document.getElementById('modalNextDose').textContent = '—';
    document.getElementById('modalTimeUntil').textContent = '';
  }

  // reset mark-taken UI
  const mark = document.getElementById('markTakenSwitch');
  mark.checked = false;
  document.getElementById('takenFeedback').textContent = '';

  // store currently open id on modal for later use (e.g., download)
  document.getElementById('prescriptionModal').dataset.currentId = pres.id;

  // show modal via bootstrap
  const modalEl = new bootstrap.Modal(document.getElementById('prescriptionModal'));
  modalEl.show();
}

/* Download handler (simulated) */
function downloadPrescription(id) {
  const pres = PRESCRIPTIONS.find(p => p.id === Number(id));
  if (!pres) return;
  // In production, redirect to a route that serves the file: /prescriptions/{id}/download
  // For now show toast simulation
  showToast(`Downloading prescription for ${pres.name}...`);
  // simulate file download: window.open(`/prescriptions/${id}/download`);
}

/* Quick toast function */
function showToast(message) {
  const t = document.createElement('div');
  t.className = 'position-fixed bottom-0 end-0 m-4 p-3 rounded shadow';
  t.style.background = '#153a2a';
  t.style.color = '#fff';
  t.style.zIndex = 12000;
  t.innerHTML = `<div style="min-width:180px">${message}</div>`;
  document.body.appendChild(t);
  setTimeout(()=> t.style.opacity = '1', 10);
  setTimeout(()=> { t.style.transition = 'opacity .4s ease'; t.style.opacity = '0'; setTimeout(()=> t.remove(), 600); }, 2000);
}

/* DOM ready wiring */
document.addEventListener('DOMContentLoaded', () => {
  // initial render
  renderPrescriptions(PRESCRIPTIONS);
  renderSummary(PRESCRIPTIONS);

  // search/filter hooks
  document.getElementById('presSearch').addEventListener('input', applyFilters);
  document.getElementById('presFilter').addEventListener('change', applyFilters);

  // delegate clicks in list
  document.getElementById('presList').addEventListener('click', (ev) => {
    const viewBtn = ev.target.closest('.btn-view');
    const downloadBtn = ev.target.closest('.btn-download');
    const item = ev.target.closest('.prescription-item');
    if (viewBtn) {
      const id = viewBtn.dataset.id;
      openPrescriptionModal(id);
      return;
    }
    if (downloadBtn) {
      downloadPrescription(downloadBtn.dataset.id);
      return;
    }
    if (item) {
      const id = item.dataset.id;
      openPrescriptionModal(id);
    }
  });

  // "new" button simple action (open empty modal or redirect)
  document.getElementById('newPrescriptionBtn').addEventListener('click', () => {
    showToast('Open New Prescription form (not implemented) — redirect to creation page.');
    // window.location = '/prescriptions/create';
  });

  // modal action handlers
  document.getElementById('downloadPresBtn').addEventListener('click', function() {
    const id = document.getElementById('prescriptionModal').dataset.currentId;
    downloadPrescription(id);
  });

  document.getElementById('snoozeBtn').addEventListener('click', function() {
    showToast('Snoozed reminders for this medication for 1 hour.');
  });

  document.getElementById('markTakenSwitch').addEventListener('change', function(e) {
    if (e.target.checked) {
      document.getElementById('takenFeedback').textContent = 'Marked as taken. Good job!';
      showToast('Marked dose as taken.');
    } else {
      document.getElementById('takenFeedback').textContent = '';
    }
  });

  document.getElementById('requestRefillBtn').addEventListener('click', function() {
    showToast('Refill request sent to your pharmacy / care team.');
  });

  document.getElementById('downloadAllBtn').addEventListener('click', function() {
    showToast('Preparing combined prescriptions PDF...');
  });

  document.getElementById('manageRemindersBtn').addEventListener('click', function() {
    showToast('Open Reminders settings (navigate to Reminders tab).');
    // optionally: window.location = '/patient/reminders';
  });
});
</script>
@endsection
