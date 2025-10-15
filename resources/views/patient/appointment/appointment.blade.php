@extends('patient.layouts.main')

@section('custom-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8faf9;
        color: #2d3748;
    }

    .page-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-weight: 700;
        font-size: 1.8rem;
        color: #14532d;
    }

    .page-header p {
        color: #4b5563;
        max-width: 700px;
        margin: 0 auto;
        font-size: 0.95rem;
    }

    .appointment-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 4px 10px rgba(20, 83, 45, 0.05);
        transition: all 0.3s ease;
        padding: 1.8rem;
    }

    .appointment-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(20, 83, 45, 0.08);
    }

    .appointment-card h5 {
        font-weight: 600;
        color: #166534;
        margin-bottom: 0.5rem;
    }

    .appointment-card p {
        color: #4b5563;
        font-size: 0.9rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 0.9rem;
        padding: 8px 10px;
    }

    .btn-book {
        background-color: #15803d;
        color: white;
        font-weight: 500;
        border-radius: 8px;
        padding: 10px 18px;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-book:hover {
        background-color: #166534;
        transform: scale(1.02);
    }

    .link-box {
        background-color: #f1f5f3;
        border: 1px dashed #a7f3d0;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        font-size: 0.9rem;
        color: #374151;
    }

    .link-box a {
        color: #15803d;
        text-decoration: none;
        font-weight: 500;
    }

    .link-box a:hover {
        text-decoration: underline;
    }

    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background-color: #ecfdf5;
        border-bottom: 1px solid #d1fae5;
    }

    .modal-title {
        font-weight: 600;
        color: #14532d;
    }

    .modal-body p {
        color: #374151;
    }

    .btn-close {
        filter: invert(0.3);
    }
</style>
@endsection

@section('content')
<div class="container pb-5">
    <div class="page-header py-4 px-3 mb-4 text-center shadow-sm rounded-3" style="background: linear-gradient(90deg, #f0fdf4, #dcfce7);">
        <h1 class="fw-bold text-success mb-2" style="font-size: 1.9rem;">Book Your Appointment</h1>
        <p class="text-muted mb-0">Choose between in-person visits or secure telemedicine consultations — effortless and reliable healthcare at your fingertips.</p>
      </div>
      

    <div class="row g-4">
        <!-- In-Person Appointment -->
        <div class="col-md-6">
            <div class="appointment-card">
                <h5><i class="fas fa-user-md me-2 text-success"></i> In-Person Appointment</h5>
                <p>Meet your doctor face-to-face at the clinic for a direct and detailed consultation.</p>

                <form class="mt-3">
                    <div class="mb-3">
                        <label class="form-label">Select Doctor</label>
                        <select class="form-control">
                            <option>Dr. Sarah Malik (General Physician)</option>
                            <option>Dr. Hamza Ahmed (Cardiologist)</option>
                            <option>Dr. Ayesha Noor (Dermatologist)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Time</label>
                        <input type="time" class="form-control">
                    </div>
                    <button type="button" class="btn btn-book w-100" data-bs-toggle="modal" data-bs-target="#successModal">Book Appointment</button>
                </form>
            </div>
        </div>

        <!-- Telemedicine Appointment -->
        <div class="col-md-6">
            <div class="appointment-card">
                <h5><i class="fas fa-video me-2 text-success"></i> Telemedicine Appointment</h5>
                <p>Consult your doctor online from home through a private, secure video session.</p>

                <form class="mt-3">
                    <div class="mb-3">
                        <label class="form-label">Select Doctor</label>
                        <select class="form-control">
                            <option>Dr. Sarah Malik (General Physician)</option>
                            <option>Dr. Hamza Ahmed (Cardiologist)</option>
                            <option>Dr. Ayesha Noor (Dermatologist)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Time</label>
                        <input type="time" class="form-control">
                    </div>
                    <button type="button" class="btn btn-book w-100" data-bs-toggle="modal" data-bs-target="#successModal">Book Telemedicine</button>
                </form>

                <div class="mt-4 link-box">
                    <p class="mb-1">Your telemedicine link will appear here once confirmed:</p>
                    <a href="#">No meeting link available</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"><i class="fas fa-check-circle text-success me-2"></i> Appointment Confirmed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Your appointment has been successfully booked.</p>
                    <p class="text-muted mb-2">You will receive a confirmation message shortly.</p>
                    <p class="mb-0"><strong>Stay healthy, stay punctual.</strong></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('custom-js')
<script src="https://kit.fontawesome.com/a2e0e9b6d3.js" crossorigin="anonymous"></script>
@endsection
