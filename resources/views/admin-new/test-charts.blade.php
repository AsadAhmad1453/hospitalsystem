@extends('admin-new.layouts.main')

@section('page-title', 'Test Dynamic Charts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Dynamic Charts Test</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h6>Patient Statistics Chart</h6>
                            <canvas id="testPatientChart" height="300"></canvas>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h6>Revenue Breakdown Chart</h6>
                            <canvas id="testRevenueChart" height="300"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h6>Patient Demographics Chart</h6>
                            <canvas id="testDemographicsChart" height="300"></canvas>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h6>Department Performance Chart</h6>
                            <canvas id="testDepartmentChart" height="300"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h6>Real-time Statistics</h6>
                            <div class="row" id="realTimeStats">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Total Patients</h5>
                                            <h3 class="text-primary" id="totalPatients">-</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Total Users</h5>
                                            <h3 class="text-success" id="totalUsers">-</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Total Services</h5>
                                            <h3 class="text-info" id="totalServices">-</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Total Forms</h5>
                                            <h3 class="text-warning" id="totalForms">-</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    // Test Patient Statistics Chart
    loadTestChart('{{ route("admin-new.api.patient-statistics") }}', 'testPatientChart', 'line');
    
    // Test Revenue Chart
    loadTestChart('{{ route("admin-new.api.revenue-breakdown") }}', 'testRevenueChart', 'doughnut');
    
    // Test Demographics Chart
    loadTestChart('{{ route("admin-new.api.patient-demographics") }}', 'testDemographicsChart', 'bar');
    
    // Test Department Chart
    loadTestChart('{{ route("admin-new.api.department-performance") }}', 'testDepartmentChart', 'bar');
    
    // Load real-time stats
    loadRealTimeStats();
});

function loadTestChart(url, canvasId, chartType) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    
    // Show loading
    ctx.fillStyle = '#f8f9fa';
    ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    ctx.fillStyle = '#6c757d';
    ctx.font = '16px Arial';
    ctx.textAlign = 'center';
    ctx.fillText('Loading...', ctx.canvas.width / 2, ctx.canvas.height / 2);
    
    $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
            new Chart(ctx, {
                type: chartType,
                data: {
                    labels: response.labels,
                    datasets: response.datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: chartType === 'doughnut' ? {} : {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(xhr) {
            console.error('Error loading chart:', xhr);
            ctx.fillStyle = '#dc3545';
            ctx.fillText('Error loading chart', ctx.canvas.width / 2, ctx.canvas.height / 2);
        }
    });
}

function loadRealTimeStats() {
    $.ajax({
        url: '{{ route("admin-new.api.real-time-stats") }}',
        method: 'GET',
        success: function(response) {
            $('#totalPatients').text(response.totalPatients);
            $('#totalUsers').text(response.totalUsers);
            $('#totalServices').text(response.totalServices);
            $('#totalForms').text(response.totalForms);
        },
        error: function(xhr) {
            console.error('Error loading real-time stats:', xhr);
        }
    });
}
</script>
@endsection
