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

    .fitness-section {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        padding: 2rem;
        margin-bottom: 2rem;
        transition: 0.3s;
    }

    .fitness-section:hover {
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2e7d64;
        margin-bottom: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-action {
        background-color: #2e7d64;
        color: #fff;
        border: none;
        padding: 0.4rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-action:hover {
        background-color: #256752;
    }

    .graph-container {
        position: relative;
        width: 100%;
        height: 250px;
        margin-bottom: 1rem;
    }

    .stat-summary {
        text-align: center;
        color: #4a5d56;
        font-size: 0.95rem;
    }

    .meal-form {
        display: none;
        margin-top: 1rem;
        border-top: 1px solid #e0e5e3;
        padding-top: 1rem;
    }

    .meal-form input {
        width: 100%;
        padding: 0.6rem;
        border: 1px solid #cfd8d4;
        border-radius: 6px;
        margin-bottom: 0.8rem;
    }

    .btn-save {
        background-color: #2e7d64;
        color: #fff;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .btn-save:hover {
        background-color: #256752;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <h2 class="page-title">Fitness Overview</h2>

    {{-- Steps Walked --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Steps Walked</span>
        </div>
        <div class="graph-container">
            <canvas id="stepsChart"></canvas>
        </div>
        <div class="stat-summary">
            You have walked <strong>8,400 steps</strong> today. Great consistency this week!
        </div>
    </div>

    {{-- Workout Duration --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Workout Duration</span>
        </div>
        <div class="graph-container">
            <canvas id="workoutChart"></canvas>
        </div>
        <div class="stat-summary">
            Average workout duration: <strong>45 minutes</strong> per day.
        </div>
    </div>

    {{-- Calories Burned --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Calories Burned</span>
        </div>
        <div class="graph-container">
            <canvas id="caloriesChart"></canvas>
        </div>
        <div class="stat-summary">
            Total calories burned this week: <strong>3,200 kcal</strong>.
        </div>
    </div>

    {{-- Calorie Intake --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Calorie Intake</span>
            <button class="btn-action" id="addMealBtn">+ Add Meal</button>
        </div>
        <div class="graph-container">
            <canvas id="intakeChart"></canvas>
        </div>
        <div class="stat-summary">
            Today’s total intake: <strong>1,850 kcal</strong>.
        </div>

        <div class="meal-form" id="mealForm">
            <label>Meal Name</label>
            <input type="text" placeholder="e.g. Grilled Chicken Salad">
            <label>Calories</label>
            <input type="number" placeholder="e.g. 350">
            <button class="btn-save">Save Meal</button>
        </div>
    </div>

    {{-- Water Intake --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Water Intake</span>
        </div>
        <div class="graph-container">
            <canvas id="waterChart"></canvas>
        </div>
        <div class="stat-summary">
            You’ve consumed <strong>1.8 liters</strong> of water today.
        </div>
    </div>

    {{-- Weight Progress --}}
    <div class="fitness-section">
        <div class="section-title">
            <span>Weight Progress</span>
        </div>
        <div class="graph-container">
            <canvas id="weightChart"></canvas>
        </div>
        <div class="stat-summary">
            Current weight: <strong>67 kg</strong> (Down 2 kg this month — keep it up!)
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartColor = '#2e7d64';
    const fillColor = 'rgba(46, 125, 100, 0.15)';
    const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    // Steps Chart
    new Chart(document.getElementById('stepsChart'), {
        type: 'line',
        data: {
            labels: days,
            datasets: [{
                label: 'Steps',
                data: [7200, 8500, 7900, 8800, 9100, 9700, 8400],
                borderColor: chartColor,
                backgroundColor: fillColor,
                tension: 0.3,
                fill: true
            }]
        },
        options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    // Workout Duration
    new Chart(document.getElementById('workoutChart'), {
        type: 'bar',
        data: {
            labels: days,
            datasets: [{
                label: 'Minutes',
                data: [40, 45, 35, 50, 60, 55, 42],
                backgroundColor: chartColor
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });

    // Calories Burned
    new Chart(document.getElementById('caloriesChart'), {
        type: 'line',
        data: {
            labels: days,
            datasets: [{
                label: 'Calories',
                data: [400, 480, 450, 520, 580, 600, 470],
                borderColor: chartColor,
                backgroundColor: fillColor,
                tension: 0.3,
                fill: true
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });

    // Calorie Intake
    new Chart(document.getElementById('intakeChart'), {
        type: 'bar',
        data: {
            labels: ['Breakfast', 'Lunch', 'Dinner', 'Snacks'],
            datasets: [{
                label: 'Calories',
                data: [400, 700, 600, 150],
                backgroundColor: chartColor
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });

    // Water Intake
    new Chart(document.getElementById('waterChart'), {
        type: 'doughnut',
        data: {
            labels: ['Consumed', 'Remaining'],
            datasets: [{
                data: [1.8, 2 - 1.8],
                backgroundColor: [chartColor, '#e0e5e3']
            }]
        },
        options: { cutout: '75%', plugins: { legend: { display: false } } }
    });

    // Weight Progress
    new Chart(document.getElementById('weightChart'), {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Weight (kg)',
                data: [69, 68, 67.5, 67],
                borderColor: chartColor,
                backgroundColor: fillColor,
                tension: 0.3,
                fill: true
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });

    // Add Meal toggle
    document.getElementById('addMealBtn').addEventListener('click', function() {
        const form = document.getElementById('mealForm');
        form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
    });
</script>
@endsection
