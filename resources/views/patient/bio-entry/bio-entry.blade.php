@extends('patient.layouts.main')

@section('custom-css')
<style>
    body {
        background-color: #f7f9f8;
        font-family: 'Inter', sans-serif;
    }

    .page-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #1e3c34;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .biomarker-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        padding: 2rem;
        margin-bottom: 2rem;
        transition: 0.3s;
    }

    .biomarker-card:hover {
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    }

    label {
        font-weight: 500;
        color: #2c3e50;
    }

    input[type="number"], input[type="text"] {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d0d9d4;
        border-radius: 8px;
        margin-bottom: 1rem;
        transition: 0.3s;
    }

    input:focus {
        border-color: #2e7d64;
        outline: none;
        box-shadow: 0 0 5px rgba(46, 125, 100, 0.3);
    }

    .btn-submit {
        background-color: #2e7d64;
        color: white;
        border: none;
        padding: 0.8rem 1.6rem;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background-color: #256752;
    }

    .reminder-note {
        background-color: #e6f5ef;
        border-left: 4px solid #2e7d64;
        padding: 1rem;
        border-radius: 8px;
        margin-top: 2rem;
        color: #2e7d64;
        font-size: 0.95rem;
    }

    .last-entry {
        text-align: center;
        font-size: 0.9rem;
        color: #6b7b75;
        margin-top: 1rem;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <h2 class="page-title">Bio Marker Entry</h2>

    <div class="biomarker-card">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="bp">Blood Pressure (mmHg)</label>
                    <input type="text" id="bp" name="bp" placeholder="e.g. 120/80">
                </div>
                <div class="col-md-6">
                    <label for="heart_rate">Heart Rate (bpm)</label>
                    <input type="number" id="heart_rate" name="heart_rate" placeholder="e.g. 72">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="blood_sugar">Blood Sugar (mg/dL)</label>
                    <input type="number" id="blood_sugar" name="blood_sugar" placeholder="e.g. 95">
                </div>
                <div class="col-md-6">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" id="weight" name="weight" placeholder="e.g. 68">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="temperature">Body Temperature (°C)</label>
                    <input type="number" step="0.1" id="temperature" name="temperature" placeholder="e.g. 36.7">
                </div>
                <div class="col-md-6">
                    <label for="oxygen">Oxygen Saturation (%)</label>
                    <input type="number" id="oxygen" name="oxygen" placeholder="e.g. 98">
                </div>
            </div>

            <button type="submit" class="btn-submit mt-2">Save Entry</button>
        </form>

        <div class="reminder-note mt-4">
            Please ensure that you update your biomarkers regularly.  
            Our system will remind you **three times a week** to help you track your health progress effectively.
        </div>

        <div class="last-entry">
            Last updated on: <strong>12 October 2025</strong>
        </div>
    </div>
</div>
@endsection
