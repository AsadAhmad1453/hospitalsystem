@extends('patient.layouts.main')
@section('content')
<main class="container py-5 flex-grow-1">
    <div class="text-center mb-5">
      <h2 class="text-success fw-bold">Welcome, John Doe</h2>
      <p class="text-muted">Here’s a quick overview of your care</p>
    </div>

    <div class="row g-4">
      <!-- Appointments -->
      <div class="col-12 col-md-6">
        <div class="card dashboard-card h-100 p-4">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-calendar-event-fill card-icon me-3"></i>
            <h5 class="card-title mb-0">Upcoming Appointment</h5>
          </div>
          <p class="card-text">Dr. Sarah Khan · Sept 15, 2025 · 10:00 AM</p>
        </div>
      </div>

      <!-- Prescriptions -->
      <div class="col-12 col-md-6">
        <div class="card dashboard-card h-100 p-4">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-capsule-pill card-icon me-3"></i>
            <h5 class="card-title mb-0">Active Prescriptions</h5>
          </div>
          <p class="card-text">Atorvastatin · 10mg daily</p>
          <p class="card-text">Metformin · 500mg twice daily</p>
        </div>
      </div>

      <!-- Test Results -->
      <div class="col-12 col-md-6">
        <div class="card dashboard-card h-100 p-4">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-file-earmark-medical-fill card-icon me-3"></i>
            <h5 class="card-title mb-0">Latest Test Results</h5>
          </div>
          <p class="card-text">Blood Sugar · Normal</p>
          <p class="card-text">Cholesterol · Slightly Elevated</p>
        </div>
      </div>

      <!-- Messages -->
      <div class="col-12 col-md-6">
        <div class="card dashboard-card h-100 p-4">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-chat-dots-fill card-icon me-3"></i>
            <h5 class="card-title mb-0">Messages</h5>
          </div>
          <p class="card-text">2 unread messages from Dr. Sarah Khan</p>
        </div>
      </div>
    </div>
  </main>

@endsection