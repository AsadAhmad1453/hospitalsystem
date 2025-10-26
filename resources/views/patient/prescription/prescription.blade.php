@extends('patient.layouts.main')

@section('custom-css')
<style>
  body {
    background-color: #f9fafb;
    font-family: 'Inter', sans-serif;
  }

  /* Hero Section */
  .hero {
    background: linear-gradient(135deg,rgb(40, 83, 47) 0%,rgb(76, 145, 76) 100%);
    border-radius: 16px;
    padding: 1.5rem;
    color: #fff;
    margin-bottom: 1.3rem;
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.25);
  }
  .hero h2 {
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  .hero p {
    opacity: 0.9;
    font-size: 1rem;
  }

  /* Stats Row */
  .stats-row {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: space-between;
    margin-bottom: 2rem;
  }

  .stat-box {
    background: #fff;
    flex: 1 1 120px;
    border-radius: 12px;
    padding: 1.2rem 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.25s ease;
  }

  .stat-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(16,185,129,0.15);
  }

  .stat-icon {
    background: #ecfdf5;
    color:rgb(30, 97, 39);
    font-size: 1.6rem;
    border-radius: 50%;
    padding: 0.6rem;
    margin-bottom: 0.6rem;
  }

  .stat-box h5 {
    font-size: 0.95rem;
    color: #6b7280;
  }

  .stat-box span {
    font-weight: 700;
    color:rgb(36, 90, 45);
    font-size: 1rem;
  }

  /* Report Section */
  .section-title {
    font-weight: 600;
    color: rgb(40, 83, 47);
    margin-bottom: 1.2rem;
    border-left: 4px solid rgb(40, 83, 47);
    padding-left: 0.75rem;
  }

  .report-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.2rem;
  }

  .report-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 1.2rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.25s ease;
  }

  .report-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(16,185,129,0.1);
  }

  .report-card h5 {
    font-weight: 600;
    color: #065f46;
    margin-bottom: 0.4rem;
  }

  .report-card small {
    color: #6b7280;
  }

  .report-card p {
    color: #4b5563;
    font-size: 0.9rem;
    margin: 0.4rem 0 1rem;
  }

  .btn-upload {
    background-color:rgb(49, 97, 49);
    color: #fff;
    border: none;
    padding: 0.6rem 1.4rem;
    font-weight: 600;
    border-radius: 8px;
    transition: background 0.3s ease;
  }

  .btn-upload:hover {
    background-color:rgb(45, 95, 41);
  }

  /* Activity Feed */
  .activity-section {
    margin-top: 2rem;
  }

  .activity-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.2rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }

  .activity-item {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #f3f4f6;
    padding: 0.8rem 0;
  }

  .activity-item:last-child {
    border-bottom: none;
  }

  .activity-item i {
    color:rgb(40, 102, 45);
    background: #ecfdf5;
    border-radius: 50%;
    padding: 0.5rem;
    margin-right: 0.8rem;
  }

  .activity-item small {
    color: #6b7280;
  }

  /* Health Tips */
  .tips-card {
    background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
  }

  .tips-card h5 {
    color:rgb(26, 83, 39);
    margin-bottom: 0.6rem;
  }

  /* Modal */
  .modal-content {
    border-radius: 12px;
    border: none;
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
  }

  .modal-header {
    background-color: #ecfdf5;
    border-bottom: none;
  }

  .modal-title {
    color: #065f46;
    font-weight: 600;
  }

  .btn-outline-success {
    border-color: rgb(40, 83, 47) !important;
    color: rgb(40, 83, 47) !important;  
  }
</style>
@endsection

@section('content')
<div class="container mt-4">

  <!-- Hero -->
  <div class="hero">
    <p>Manage your medical records, track uploads, and review your reports easily.</p>
  </div>

  <!-- Stats -->
  <div class="stats-row">
    <div class="stat-box text-center">
      <div class="stat-icon"><i class="fa-solid fa-file-medical"></i></div>
      <h5>Total Reports</h5>
      <span>18</span>
    </div>
    <div class="stat-box text-center">
      <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
      <h5>Last Upload</h5>
      <span>Oct 12, 2025</span>
    </div>
    <div class="stat-box text-center">
      <div class="stat-icon"><i class="fa-solid fa-hospital"></i></div>
      <h5>Hospitals Linked</h5>
      <span>03</span>
    </div>
    <div class="stat-box text-center">
      <div class="stat-icon"><i class="fa-solid fa-user-md"></i></div>
      <h5>Doctors Connected</h5>
      <span>05</span>
    </div>
  </div>

  <!-- Reports -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="section-title">Your Reports</h4>
    <button class="btn btn-upload" data-bs-toggle="modal" data-bs-target="#uploadModal">
      <i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload Report
    </button>
  </div>

  <div class="report-grid">
    <div class="report-card">
      <h5>Blood Test Report</h5>
      <small>12 Oct 2025 • Diagnostic Center</small>
      <p>Comprehensive blood test including CBC, liver profile, and cholesterol.</p>
      <div class="d-flex gap-2">
        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
        <button class="btn btn-outline-secondary btn-sm">Download</button>
      </div>
    </div>

    <div class="report-card">
      <h5>X-Ray Chest</h5>
      <small>05 Oct 2025 • City Hospital</small>
      <p>Chest X-ray results and diagnostic summary for respiratory evaluation.</p>
      <div class="d-flex gap-2">
        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
        <button class="btn btn-outline-secondary btn-sm">Download</button>
      </div>
    </div>

    <div class="report-card">
      <h5>ECG Scan</h5>
      <small>28 Sep 2025 • Lahore Heart Clinic</small>
      <p>Electrocardiogram test uploaded for cardiology consultation.</p>
      <div class="d-flex gap-2">
        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
        <button class="btn btn-outline-secondary btn-sm">Download</button>
      </div>
    </div>
  </div>

  <!-- Activity Feed -->
  <div class="row mt-5">
    <div class="col-lg-8">
      <h4 class="section-title">Recent Activity</h4>
      <div class="activity-card">
        <div class="activity-item">
          <i class="fa-solid fa-upload"></i>
          <div>
            <strong>You uploaded</strong> “Blood Test Report”
            <br><small>2 days ago</small>
          </div>
        </div>
        <div class="activity-item">
          <i class="fa-solid fa-download"></i>
          <div>
            <strong>You downloaded</strong> “ECG Scan”
            <br><small>4 days ago</small>
          </div>
        </div>
        <div class="activity-item">
          <i class="fa-solid fa-share"></i>
          <div>
            <strong>You shared</strong> “X-Ray Chest” with Dr. Ahmad
            <br><small>1 week ago</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Tips Panel -->
    <div class="col-lg-4 mt-4 mt-lg-0">
      <div class="tips-card">
        <h5><i class="fa-solid fa-heart-pulse me-2"></i> Health Tip</h5>
        <p>Stay hydrated and maintain a balanced diet. Regular blood tests help detect potential health issues early.</p>
        <hr>
        <h6 class="mb-2">Next Recommended Checkup:</h6>
        <p><strong>Nov 25, 2025</strong> – Annual Physical Exam</p>
      </div>
    </div>
  </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Report Title</label>
            <input type="text" class="form-control" placeholder="e.g., Blood Test Report">
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">File</label>
            <input type="file" class="form-control">
          </div>
          <button type="button" class="btn btn-upload w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-file-medical me-2"></i>Report Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h5>Blood Test Report</h5>
        <p><strong>Date:</strong> 12 Oct 2025</p>
        <p><strong>Lab:</strong> Diagnostic Center</p>
        <hr>
        <p>This report includes CBC, liver profile, and lipid panel results. All parameters within normal ranges.</p>
        <div class="mt-3 text-end">
          <button class="btn btn-outline-secondary"><i class="fa-solid fa-download me-1"></i>Download PDF</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
