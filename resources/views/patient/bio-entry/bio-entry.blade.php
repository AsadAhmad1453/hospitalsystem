@extends('patient.layouts.main')

@section('custom-css')
<style>
body {
    background-color: #f6faf7;
    font-family: 'Inter', sans-serif;
}

/* Breadcrumbs */
.breadcrumb-container {
    background-color: #e6f5ef;
    border-radius: 12px;
    padding: 0.6rem 1rem;
    margin-bottom: 2rem;
}
.breadcrumb-item a {
    color: #14532d;
    text-decoration: none;
}
.breadcrumb-item.active {
    color: #166534;
    font-weight: 600;
}

/* Page title */
.page-title {
    font-size: 1.6rem;
    font-weight: 600;
    color: #14532d;
    margin-bottom: 1.5rem;
}

/* Quick Stats Cards */
.stats-grid {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}
.stats-card {
    background-color: #ffffff;
    border-radius: 16px;
    flex: 1 1 150px;
    padding: 1rem;
    text-align: center;
    box-shadow: 0 4px 12px rgba(20,83,45,0.08);
    transition: 0.3s;
}
.stats-card:hover {
    box-shadow: 0 6px 18px rgba(20,83,45,0.12);
}
.stats-card h4 {
    margin: 0.3rem 0;
    color: #14532d;
    font-weight: 600;
}

/* Form Card */
.card-biomarker {
    background-color: #fff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 6px 18px rgba(20,83,45,0.08);
    margin-bottom: 2rem;
}
.card-biomarker h3 {
    margin-bottom: 1.5rem;
    color: #14532d;
}

/* Form Inputs */
.form-group {
    margin-bottom: 1.2rem;
}
.form-group label {
    font-weight: 500;
    color: #1e3c34;
}
.form-control {
    border-radius: 12px;
    border: 1px solid #d1e5dc;
    padding: 0.7rem 1rem;
    font-size: 0.95rem;
    width: 100%;
}
.form-control:focus {
    outline: none;
    border-color: #16a34a;
    box-shadow: 0 0 8px rgba(22,163,74,0.2);
}

/* Buttons */
.btn-submit {
    background: linear-gradient(135deg,#16a34a,#15803d);
    color: #fff;
    border-radius: 12px;
    padding: 0.8rem 1.5rem;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}
.btn-submit:hover {
    background: linear-gradient(135deg,#14532d,#166534);
}

/* Reminder */
.card-reminder {
    background-color: #e6f5ef;
    border-left: 4px solid #16a34a;
    border-radius: 12px;
    padding: 1rem 1.2rem;
    margin-top: 2rem;
    color: #14532d;
    font-size: 0.95rem;
}

/* History Cards */
.history-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.history-card {
    background: #fff;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    box-shadow: 0 4px 12px rgba(20,83,45,0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.3s;
}
.history-card:hover {
    box-shadow: 0 6px 18px rgba(20,83,45,0.12);
}
.history-card .date {
    font-weight: 600;
    color: #14532d;
}
.history-card .values span {
    margin-right: 1rem;
    color: #1e3c34;
}

.breadcrumb-item+.breadcrumb-item:before {
        content: '' !important;
      }
</style>
@endsection

@section('content')
<div class="container py-4">

    <!-- Breadcrumbs -->
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('patient-dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Bio Marker Entry</li>
            </ol>
        </nav>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <div class="stats-card">
            <div><i class="fa fa-tachometer-alt" style="color:#14532d;"></i></div>
            <div>BP</div>
            <div>120/80</div>
        </div>
        <div class="stats-card">
            <div><i class="fa fa-heart-pulse" style="color:#d32f2f;"></i></div>
            <div>Heart Rate</div>
            <div>72 bpm</div>
        </div>
        <div class="stats-card">
            <div><i class="fa fa-tint" style="color:#0284c7;"></i></div>
            <div>Blood Sugar</div>
            <div>95 mg/dL</div>
        </div>
        <div class="stats-card">
            <div><i class="fa fa-weight" style="color:#7c3aed;"></i></div>
            <div>Weight</div>
            <div>68 kg</div>
        </div>
        <div class="stats-card">
            <div><i class="fa fa-thermometer-half" style="color:#eab308;"></i></div>
            <div>Temp</div>
            <div>36.7°C</div>
        </div>
        <div class="stats-card">
            <div><i class="fa fa-lungs" style="color:#22d3ee;"></i></div>
            <div>Oxygen</div>
            <div>98%</div>
        </div>
    </div>

    <!-- Bio Marker Form -->
    <div class="card-biomarker px-4 py-3" style="max-width: 830px; margin:auto;">

        <div class="d-flex align-items-center mb-4">
            <div class="me-3 d-none d-md-block" style="font-size:2.3rem; color:#16a34a;">
                <i class="fa fa-stethoscope"></i>
            </div>
            <div>
                <h3 class="mb-0" style="font-size:1.5rem;">Health Stats Entry</h3>
                <div class="text-muted small">Input your latest biomarker data</div>
            </div>
        </div>

        <form>
            <div class="row gy-3 gx-4">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="bp" class="mb-1"><i class="fa fa-tachometer-alt me-1 text-success"></i> Blood Pressure</label>
                        <input type="text" id="bp" name="bp" class="form-control" placeholder="e.g., 120/80 mmHg">
                        <div class="form-text text-muted">Systolic/Diastolic</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="heart_rate" class="mb-1"><i class="fa fa-heart-pulse me-1 text-danger"></i> Heart Rate</label>
                        <input type="number" id="heart_rate" name="heart_rate" class="form-control" placeholder="e.g., 72">
                        <div class="form-text text-muted">bpm (beats/min)</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="blood_sugar" class="mb-1"><i class="fa fa-tint me-1 text-primary"></i> Blood Sugar</label>
                        <input type="number" id="blood_sugar" name="blood_sugar" class="form-control" placeholder="e.g., 95">
                        <div class="form-text text-muted">mg/dL</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="weight" class="mb-1"><i class="fa fa-weight me-1" style="color:#7c3aed;"></i> Weight</label>
                        <input type="number" id="weight" name="weight" class="form-control" placeholder="e.g., 68">
                        <div class="form-text text-muted">kg</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="temperature" class="mb-1"><i class="fa fa-thermometer-half me-1" style="color:#eab308;"></i> Temperature</label>
                        <input type="number" step="0.1" id="temperature" name="temperature" class="form-control" placeholder="e.g., 36.7">
                        <div class="form-text text-muted">°C</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-0">
                        <label for="oxygen" class="mb-1"><i class="fa fa-lungs me-1" style="color:#22d3ee;"></i> Oxygen Sat.</label>
                        <input type="number" id="oxygen" name="oxygen" class="form-control" placeholder="e.g., 98">
                        <div class="form-text text-muted">%</div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 mb-2">
                <button type="submit" class="btn-submit px-4 py-2" style="font-size:1.1rem;">
                    <i class="fa fa-save me-2"></i>Save Entry
                </button>
            </div>
        </form>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center card-reminder mt-4" style="gap: 0.75rem;">
            <div>
                <i class="fa fa-bell text-success me-2"></i>
                We'll remind you <strong>three times a week</strong> to enter your health stats for consistent tracking.
            </div>
            <div class="last-entry text-md-end" style="color:#6b7b75; font-size: 0.98rem;">
                <i class="fa fa-clock me-1"></i>
                Last updated: <strong>12 October 2025</strong>
            </div>
        </div>
    </div>

    <!-- History Section -->
    <div class="card-history redesigned-history mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-md-row gap-2">
            <h3 class="page-title mb-0" style="font-size:1.22rem; color:#334f41;">Recent Bio Marker Entries</h3>
            <a href="#" class="btn btn-theme btn-sm px-3"><i class="fa fa-table me-1"></i>Full History</a>
        </div>
        <div class="history-list">
            <!-- Entry 1 -->
            <div class="history-card d-flex flex-column flex-md-row align-items-md-center justify-content-between p-3 rounded mb-2" style="background:#f6f9f7; border:1px solid #e1ece7;">
                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <span class="badge bg-success rounded-pill me-3" style="font-size:0.92rem; min-width:90px;">12 Oct 2025</span>
                    <span class="me-4"><i class="fa fa-heart-pulse text-danger me-1"></i> BP: <strong>120/80</strong></span>
                    <span class="me-4"><i class="fa fa-heartbeat text-pink me-1"></i> HR: <strong>72</strong></span>
                    <span class="me-4"><i class="fa fa-tint text-primary me-1"></i> BS: <strong>95</strong></span>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <span class="me-4"><i class="fa fa-weight text-purple me-1"></i> W: <strong>68kg</strong></span>
                    <span class="me-4"><i class="fa fa-thermometer-half text-warning me-1"></i> Temp: <strong>36.7°C</strong></span>
                    <span><i class="fa fa-lungs text-info me-1"></i> O<sub>2</sub>: <strong>98%</strong></span>
                </div>
            </div>
            <!-- Entry 2 -->
            <div class="history-card d-flex flex-column flex-md-row align-items-md-center justify-content-between p-3 rounded mb-2" style="background:#f6f9f7; border:1px solid #e1ece7;">
                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <span class="badge bg-secondary rounded-pill me-3" style="font-size:0.92rem; min-width:90px;">10 Oct 2025</span>
                    <span class="me-4"><i class="fa fa-heart-pulse text-danger me-1"></i> BP: <strong>118/78</strong></span>
                    <span class="me-4"><i class="fa fa-heartbeat text-pink me-1"></i> HR: <strong>70</strong></span>
                    <span class="me-4"><i class="fa fa-tint text-primary me-1"></i> BS: <strong>92</strong></span>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <span class="me-4"><i class="fa fa-weight text-purple me-1"></i> W: <strong>68kg</strong></span>
                    <span class="me-4"><i class="fa fa-thermometer-half text-warning me-1"></i> Temp: <strong>36.6°C</strong></span>
                    <span><i class="fa fa-lungs text-info me-1"></i> O<sub>2</sub>: <strong>97%</strong></span>
                </div>
            </div>
            <!-- Entry 3 -->
            <div class="history-card d-flex flex-column flex-md-row align-items-md-center justify-content-between p-3 rounded mb-2" style="background:#f6f9f7; border:1px solid #e1ece7;">
                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <span class="badge bg-secondary rounded-pill me-3" style="font-size:0.92rem; min-width:90px;">08 Oct 2025</span>
                    <span class="me-4"><i class="fa fa-heart-pulse text-danger me-1"></i> BP: <strong>122/82</strong></span>
                    <span class="me-4"><i class="fa fa-heartbeat text-pink me-1"></i> HR: <strong>74</strong></span>
                    <span class="me-4"><i class="fa fa-tint text-primary me-1"></i> BS: <strong>96</strong></span>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <span class="me-4"><i class="fa fa-weight text-purple me-1"></i> W: <strong>68kg</strong></span>
                    <span class="me-4"><i class="fa fa-thermometer-half text-warning me-1"></i> Temp: <strong>36.8°C</strong></span>
                    <span><i class="fa fa-lungs text-info me-1"></i> O<sub>2</sub>: <strong>99%</strong></span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
