@extends('patient.layouts.main')

@section('custom-css')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    background-color: #f9fbfa;
    color: #333;
  }

  .page-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .page-header h3 {
    color: #2f5e4d;
    font-weight: 600;
    margin-bottom: 0.4rem;
  }

  .page-header p {
    color: #6a7b72;
    font-size: 0.95rem;
  }

  .info-box {
    background-color: #f2f6f4;
    border-left: 4px solid #2f5e4d;
    padding: 14px 20px;
    border-radius: 8px;
    color: #40594c;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }

  .card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e3e9e6;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
  }

  .card-header {
    background: transparent;
    border-bottom: 1px solid #edf0ee;
    font-weight: 600;
    color: #2f5e4d;
    padding: 0.75rem 1.25rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0;
  }

  th, td {
    padding: 12px 16px;
    text-align: left;
    font-size: 0.95rem;
  }

  th {
    background-color: #f3f7f5;
    color: #2f5e4d;
    font-weight: 600;
    border-bottom: 1px solid #dbe3de;
  }

  tr {
    border-bottom: 1px solid #edf0ee;
    transition: background 0.2s;
  }

  tr:hover {
    background-color: #f7faf8;
  }

  .btn-download {
    background-color: #2f5e4d;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 0.85rem;
    padding: 6px 12px;
    transition: background 0.3s ease;
  }

  .btn-download:hover {
    background-color: #3a6f59;
  }

  .upload-section {
    text-align: center;
    padding: 2rem;
    border: 2px dashed #b9c9c2;
    border-radius: 10px;
    background-color: #f6faf8;
    transition: all 0.3s;
  }

  .upload-section:hover {
    border-color: #2f5e4d;
    background-color: #f2f7f4;
  }

  .upload-section i {
    font-size: 2rem;
    color: #2f5e4d;
    margin-bottom: 0.75rem;
  }

  .upload-section h5 {
    font-weight: 600;
    color: #2f5e4d;
    margin-bottom: 0.5rem;
  }

  .upload-section p {
    color: #62736c;
    font-size: 0.9rem;
  }

  .upload-btn {
    margin-top: 1rem;
    background-color: #2f5e4d;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 0.9rem;
    transition: all 0.3s;
  }

  .upload-btn:hover {
    background-color: #3a6f59;
  }

  input[type="file"] {
    display: none;
  }
</style>
@endsection

@section('content')
<main class="container py-4 flex-grow-1">
  <div class="page-header">
    <h3>Medical Reports</h3>
    <p>View all your diagnostic and lab reports in one secure place. Upload reports from outside hospitals for easy access and tracking.</p>
  </div>

  <div class="info-box">
    <strong>Tip:</strong> Keeping all your reports in one place helps your doctor understand your progress and treatment effectiveness.
  </div>

  <!-- Existing Reports -->
  <div class="card">
    <div class="card-header">Your Reports</div>
    <div class="card-body">
      <table>
        <thead>
          <tr>
            <th>Report Name</th>
            <th>Date</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Complete Blood Count (CBC)</td>
            <td>Oct 10, 2025</td>
            <td>Lab Report</td>
            <td><span style="color: #3a6f59; font-weight: 500;">Verified</span></td>
            <td><button class="btn-download">Download</button></td>
          </tr>
          <tr>
            <td>Lipid Profile</td>
            <td>Sept 25, 2025</td>
            <td>Lab Report</td>
            <td><span style="color: #3a6f59; font-weight: 500;">Verified</span></td>
            <td><button class="btn-download">Download</button></td>
          </tr>
          <tr>
            <td>Chest X-Ray</td>
            <td>Aug 18, 2025</td>
            <td>Radiology</td>
            <td><span style="color: #a07b33; font-weight: 500;">Pending Review</span></td>
            <td><button class="btn-download">Download</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Upload Section -->
  <div class="card">
    <div class="card-header">Upload External Report</div>
    <div class="card-body">
      <div class="upload-section" id="upload-area">
        <i class="fas fa-file-medical"></i>
        <h5>Upload Your Report</h5>
        <p>Drag and drop your PDF, JPG, or PNG report file here or choose from your device.</p>
        <label for="reportUpload" class="upload-btn">Choose File</label>
        <input type="file" id="reportUpload" accept=".pdf,.jpg,.jpeg,.png">
      </div>
    </div>
  </div>
</main>

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a2e0e9e64c.js" crossorigin="anonymous"></script>

<!-- JS to handle file selection preview -->
@section('custom-js')
<script>
  document.getElementById('reportUpload').addEventListener('change', function(){
    const fileName = this.files[0]?.name;
    if (fileName) {
      document.getElementById('upload-area').innerHTML = `
        <i class="fas fa-check-circle" style="color:#3a6f59; font-size:2rem; margin-bottom:0.5rem;"></i>
        <h5>${fileName}</h5>
        <p style="color:#5f6f67;">File ready for upload.</p>
        <button class="upload-btn">Upload Report</button>
      `;
    }
  });
</script>
@endsection
@endsection
