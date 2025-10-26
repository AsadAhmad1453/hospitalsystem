@extends('patient.layouts.main')

@section('custom-css')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8faf9;
    color: #333;
  }
 
  .page-header {
    margin-bottom: 2rem;
    text-align: center;
  }

  .page-header h3 {
    color: #2f5e4d;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .page-header p {
    color: #6a7b72;
    font-size: 0.95rem;
  }

  .card {
    background-color: #fff;
    border: 1px solid #e2e7e4;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
  }

  .card-header {
    background-color: transparent;
    border-bottom: 1px solid #eef1ef;
    font-weight: 600;
    font-size: 1.05rem;
    color: #2f5e4d;
  }

  .test-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 1.5rem;
  }

  .test-chip {
    padding: 10px 18px;
    border: 1px solid #cdd8d3;
    border-radius: 25px;
    background-color: #f6f9f7;
    cursor: pointer;
    color: #385c4a;
    transition: all 0.3s ease;
    font-size: 0.9rem;
  }

  .test-chip:hover {
    background-color: #e7f1ec;
  }

  .test-chip.active {
    background-color: #2f5e4d;
    color: white;
    border-color: #2f5e4d;
  }

  .btn-submit {
    background-color: #2f5e4d;
    color: #fff;
    border: none;
    padding: 0.65rem 1.4rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
  }

  .btn-submit:hover {
    background-color: #3d725d;
  }

  .info-box {
    background-color: #f2f6f4;
    border-left: 4px solid #2f5e4d;
    padding: 15px 20px;
    border-radius: 8px;
    color: #40594c;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }

  .table {
    font-size: 0.9rem;
    color: #333;
  }

  .table th {
    background-color: #f5f9f7;
    color: #2f5e4d;
    font-weight: 600;
  }

  .status-badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
  }

  .status-pending {
    background-color: #fff6d8;
    color: #927a00;
  }

  .status-completed {
    background-color: #dff3e7;
    color: #1b5b38;
  }

  .btn-outline {
    border: 1px solid #c7d3cc;
    color: #2f5e4d;
    background: transparent;
    border-radius: 6px;
    padding: 5px 10px;
    font-size: 0.85rem;
    transition: all 0.3s;
  }

  .btn-outline:hover {
    background-color: #2f5e4d;
    color: #fff;
  }

  .empty-state {
    text-align: center;
    color: #7b8b83;
    padding: 2rem 0;
  }
  .breadcrumb-item+.breadcrumb-item:before {
      content: '' !important;
    }
</style>
@endsection

@section('content')
<main class="container py-4 flex-grow-1">
  <div class="bg-light rounded px-3 py-2 mb-3 shadow-sm">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i> </li>
            <li class="breadcrumb-item active">Lab Orders</li>
        </ol>
    </nav>
</div>

  <div class="info-box">
    <strong>Note:</strong> You can select multiple tests at once. After submission, your healthcare provider will review and confirm your lab order.
  </div>

  <div class="card mb-4">
    <div class="card-header">Select Tests</div>
    <div class="card-body">
      <div class="test-options" id="testOptions">
        @php
          $tests = [
            'Complete Blood Count (CBC)',
            'Lipid Profile',
            'Liver Function Test (LFT)',
            'Kidney Function Test (KFT)',
            'Blood Sugar (Fasting/Random)',
            'Thyroid Profile',
            'Vitamin D',
            'Urinalysis',
            'COVID-19 PCR',
            'HbA1c'
          ];
        @endphp
        @foreach ($tests as $test)
          <span class="test-chip" data-test="{{ $test }}">{{ $test }}</span>
        @endforeach
      </div>
      <div class="text-end">
        <button id="submitTests" class="btn-submit">Submit Request</button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">Recent Test Requests</div>
    <div class="card-body">
      <table class="table table-bordered align-middle" id="testTable">
        <thead>
          <tr>
            <th>Date</th>
            <th>Requested Tests</th>
            <th>Status</th>
            <th>Report</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Oct 10, 2025</td>
            <td>Complete Blood Count, Lipid Profile</td>
            <td><span class="status-badge status-completed">Completed</span></td>
            <td><button class="btn-outline">View PDF</button></td>
          </tr>
          <tr>
            <td>Oct 13, 2025</td>
            <td>Liver Function Test, Vitamin D</td>
            <td><span class="status-badge status-pending">Pending</span></td>
            <td><button class="btn-outline" disabled>Pending</button></td>
          </tr>
        </tbody>
      </table>
      <div id="emptyState" class="empty-state d-none">
        <p>No lab requests yet. Start by selecting your desired tests above.</p>
      </div>
    </div>
  </div>
</main>
@endsection

@section('custom-js')
<script>
  const selectedTests = [];

  document.querySelectorAll('.test-chip').forEach(chip => {
    chip.addEventListener('click', () => {
      const test = chip.dataset.test;
      chip.classList.toggle('active');

      if (chip.classList.contains('active')) {
        selectedTests.push(test);
      } else {
        const index = selectedTests.indexOf(test);
        if (index > -1) selectedTests.splice(index, 1);
      }
    });
  });

  document.getElementById('submitTests').addEventListener('click', () => {
    if (selectedTests.length === 0) {
      alert('Please select at least one test.');
      return;
    }

    const tableBody = document.querySelector('#testTable tbody');
    const row = `
      <tr>
        <td>${new Date().toLocaleDateString()}</td>
        <td>${selectedTests.join(', ')}</td>
        <td><span class="status-badge status-pending">Pending</span></td>
        <td><button class="btn-outline" disabled>Pending</button></td>
      </tr>
    `;

    tableBody.insertAdjacentHTML('beforeend', row);
    document.getElementById('emptyState').classList.add('d-none');
    selectedTests.length = 0;
    document.querySelectorAll('.test-chip').forEach(chip => chip.classList.remove('active'));
    alert('Lab test request submitted successfully.');
  });
</script>
@endsection
