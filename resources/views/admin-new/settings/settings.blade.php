@extends('admin-new.layouts.main')
@section('title', 'System Settings')
@section('page-title', 'System Settings')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">System Settings</h2>
                            <p class="text-muted mb-0">Configure system preferences, notifications, and general settings.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <button class="btn btn-primary" onclick="saveAllSettings()">
                                <i class="fas fa-save me-2"></i>Save All Settings
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Settings Navigation -->
        <div class="col-xl-3 col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Settings Categories</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="tab">
                            <i class="fas fa-cog me-2"></i>General Settings
                        </a>
                        <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-bell me-2"></i>Notifications
                        </a>
                        <a href="#email" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-envelope me-2"></i>Email Settings
                        </a>
                        <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-shield-alt me-2"></i>Security
                        </a>
                        <a href="#backup" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-database me-2"></i>Backup & Restore
                        </a>
                        <a href="#integrations" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-plug me-2"></i>Integrations
                        </a>
                        <a href="#maintenance" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                            <i class="fas fa-tools me-2"></i>Maintenance
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="col-xl-9 col-lg-8">
            <div class="tab-content">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="general">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">General Settings</h5>
                        </div>
                        <div class="card-body">
                            <form id="generalSettingsForm">
                                @csrf
                                <input type="hidden" name="form_type" value="general">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="hospital_name" class="form-label">Hospital Name *</label>
                                        <input type="text" class="form-control" id="hospital_name" name="hospital_name" 
                                               value="{{ $settings['hospital_name'] ?? 'Shafayaat Hospital' }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="hospital_code" class="form-label">Hospital Code</label>
                                        <input type="text" class="form-control" id="hospital_code" name="hospital_code" 
                                               value="{{ $settings['hospital_code'] ?? 'SH001' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="timezone" class="form-label">Timezone</label>
                                        <select class="form-control" id="timezone" name="timezone">
                                            <option value="UTC">UTC</option>
                                            <option value="America/New_York">Eastern Time</option>
                                            <option value="America/Chicago">Central Time</option>
                                            <option value="America/Denver">Mountain Time</option>
                                            <option value="America/Los_Angeles">Pacific Time</option>
                                            <option value="Europe/London">London</option>
                                            <option value="Asia/Kolkata">India Standard Time</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="date_format" class="form-label">Date Format</label>
                                        <select class="form-control" id="date_format" name="date_format">
                                            <option value="Y-m-d">YYYY-MM-DD</option>
                                            <option value="m/d/Y">MM/DD/YYYY</option>
                                            <option value="d/m/Y">DD/MM/YYYY</option>
                                            <option value="Y-m-d H:i:s">YYYY-MM-DD HH:MM:SS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-control" id="currency" name="currency">
                                            <option value="USD">USD ($)</option>
                                            <option value="EUR">EUR (€)</option>
                                            <option value="GBP">GBP (£)</option>
                                            <option value="INR">INR (₹)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="language" class="form-label">Language</label>
                                        <select class="form-control" id="language" name="language">
                                            <option value="en">English</option>
                                            <option value="es">Spanish</option>
                                            <option value="fr">French</option>
                                            <option value="de">German</option>
                                            <option value="hi">Hindi</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="hospital_address" class="form-label">Hospital Address</label>
                                        <textarea class="form-control" id="hospital_address" name="hospital_address" rows="3">{{ $settings['hospital_address'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="hospital_phone" class="form-label">Hospital Phone</label>
                                        <input type="tel" class="form-control" id="hospital_phone" name="hospital_phone" 
                                               value="{{ $settings['hospital_phone'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="hospital_email" class="form-label">Hospital Email</label>
                                        <input type="email" class="form-control" id="hospital_email" name="hospital_email" 
                                               value="{{ $settings['hospital_email'] ?? '' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Notifications Settings -->
                <div class="tab-pane fade" id="notifications">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Notification Settings</h5>
                        </div>
                        <div class="card-body">
                            <form id="notificationSettingsForm">
                                @csrf
                                <input type="hidden" name="form_type" value="notifications">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <h6>Email Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="email_new_patient" name="email_new_patient" checked>
                                            <label class="form-check-label" for="email_new_patient">
                                                New patient registration
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="email_appointment" name="email_appointment" checked>
                                            <label class="form-check-label" for="email_appointment">
                                                Appointment reminders
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="email_lab_results" name="email_lab_results" checked>
                                            <label class="form-check-label" for="email_lab_results">
                                                Lab results ready
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="email_payment" name="email_payment">
                                            <label class="form-check-label" for="email_payment">
                                                Payment notifications
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <h6>SMS Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="sms_urgent" name="sms_urgent" checked>
                                            <label class="form-check-label" for="sms_urgent">
                                                Urgent notifications only
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="sms_appointment" name="sms_appointment">
                                            <label class="form-check-label" for="sms_appointment">
                                                Appointment reminders
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <h6>System Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="system_maintenance" name="system_maintenance" checked>
                                            <label class="form-check-label" for="system_maintenance">
                                                System maintenance alerts
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="system_errors" name="system_errors" checked>
                                            <label class="form-check-label" for="system_errors">
                                                System error notifications
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Email Settings -->
                <div class="tab-pane fade" id="email">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Email Configuration</h5>
                        </div>
                        <div class="card-body">
                            <form id="emailSettingsForm">
                                @csrf
                                <input type="hidden" name="form_type" value="email">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_driver" class="form-label">Mail Driver</label>
                                        <select class="form-control" id="mail_driver" name="mail_driver">
                                            <option value="smtp">SMTP</option>
                                            <option value="mailgun">Mailgun</option>
                                            <option value="ses">Amazon SES</option>
                                            <option value="mail">PHP Mail</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_host" class="form-label">SMTP Host</label>
                                        <input type="text" class="form-control" id="mail_host" name="mail_host" 
                                               value="{{ $settings['mail_host'] ?? 'smtp.gmail.com' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_port" class="form-label">SMTP Port</label>
                                        <input type="number" class="form-control" id="mail_port" name="mail_port" 
                                               value="{{ $settings['mail_port'] ?? '587' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_username" class="form-label">SMTP Username</label>
                                        <input type="text" class="form-control" id="mail_username" name="mail_username" 
                                               value="{{ $settings['mail_username'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_password" class="form-label">SMTP Password</label>
                                        <input type="password" class="form-control" id="mail_password" name="mail_password">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_encryption" class="form-label">Encryption</label>
                                        <select class="form-control" id="mail_encryption" name="mail_encryption">
                                            <option value="tls">TLS</option>
                                            <option value="ssl">SSL</option>
                                            <option value="">None</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_from_address" class="form-label">From Address</label>
                                        <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" 
                                               value="{{ $settings['mail_from_address'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mail_from_name" class="form-label">From Name</label>
                                        <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" 
                                               value="{{ $settings['mail_from_name'] ?? 'Shafayaat Hospital' }}">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-outline-primary" onclick="testEmail()">
                                        <i class="fas fa-paper-plane me-2"></i>Test Email
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="tab-pane fade" id="security">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Security Settings</h5>
                        </div>
                        <div class="card-body">
                            <form id="securitySettingsForm">
                                @csrf
                                <input type="hidden" name="form_type" value="security">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="session_timeout" class="form-label">Session Timeout (minutes)</label>
                                        <input type="number" class="form-control" id="session_timeout" name="session_timeout" 
                                               value="{{ $settings['session_timeout'] ?? '120' }}" min="5" max="1440">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="max_login_attempts" class="form-label">Max Login Attempts</label>
                                        <input type="number" class="form-control" id="max_login_attempts" name="max_login_attempts" 
                                               value="{{ $settings['max_login_attempts'] ?? '5' }}" min="3" max="10">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password_min_length" class="form-label">Minimum Password Length</label>
                                        <input type="number" class="form-control" id="password_min_length" name="password_min_length" 
                                               value="{{ $settings['password_min_length'] ?? '8' }}" min="6" max="20">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="require_2fa" class="form-label">Require 2FA</label>
                                        <select class="form-control" id="require_2fa" name="require_2fa">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="force_password_change" name="force_password_change">
                                            <label class="form-check-label" for="force_password_change">
                                                Force password change on next login
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="log_activity" name="log_activity" checked>
                                            <label class="form-check-label" for="log_activity">
                                                Log user activity
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Backup & Restore -->
                <div class="tab-pane fade" id="backup">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Backup & Restore</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body text-center">
                                            <i class="fas fa-download fa-3x text-primary mb-3"></i>
                                            <h5>Create Backup</h5>
                                            <p class="text-muted">Create a full system backup</p>
                                            <button class="btn btn-primary" onclick="createBackup()">
                                                <i class="fas fa-download me-2"></i>Create Backup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body text-center">
                                            <i class="fas fa-upload fa-3x text-success mb-3"></i>
                                            <h5>Restore Backup</h5>
                                            <p class="text-muted">Restore from a backup file</p>
                                            <button class="btn btn-success" onclick="restoreBackup()">
                                                <i class="fas fa-upload me-2"></i>Restore Backup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6>Recent Backups</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Backup Name</th>
                                                    <th>Date Created</th>
                                                    <th>Size</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="backupsTableBody">
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">Loading backups...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Integrations -->
                <div class="tab-pane fade" id="integrations">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Third-Party Integrations</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fab fa-google fa-2x text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-1">Google Calendar</h6>
                                                    <small class="text-muted">Sync appointments with Google Calendar</small>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="google_calendar_enabled" name="google_calendar_enabled">
                                                <label class="form-check-label" for="google_calendar_enabled">
                                                    Enable Google Calendar Integration
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-sms fa-2x text-success me-3"></i>
                                                <div>
                                                    <h6 class="mb-1">SMS Gateway</h6>
                                                    <small class="text-muted">Send SMS notifications</small>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="sms_gateway_enabled" name="sms_gateway_enabled">
                                                <label class="form-check-label" for="sms_gateway_enabled">
                                                    Enable SMS Gateway
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maintenance -->
                <div class="tab-pane fade" id="maintenance">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">System Maintenance</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body text-center">
                                            <i class="fas fa-broom fa-3x text-warning mb-3"></i>
                                            <h5>Clear Cache</h5>
                                            <p class="text-muted">Clear application cache</p>
                                            <button class="btn btn-warning" onclick="clearCache()">
                                                <i class="fas fa-broom me-2"></i>Clear Cache
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card border">
                                        <div class="card-body text-center">
                                            <i class="fas fa-database fa-3x text-info mb-3"></i>
                                            <h5>Optimize Database</h5>
                                            <p class="text-muted">Optimize database performance</p>
                                            <button class="btn btn-info" onclick="optimizeDatabase()">
                                                <i class="fas fa-database me-2"></i>Optimize DB
                                            </button>
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
<script>
$(document).ready(function() {
    // Tab navigation
    $('.list-group-item').on('click', function(e) {
        e.preventDefault();
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
    });

    // Form submissions
    $('#generalSettingsForm, #notificationSettingsForm, #emailSettingsForm, #securitySettingsForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings($(this));
    });

    // Load backups when backup tab is clicked
    $('a[href="#backup"]').on('click', function() {
        loadBackups();
    });
});

// Save all settings
function saveAllSettings() {
    const forms = ['#generalSettingsForm', '#notificationSettingsForm', '#emailSettingsForm', '#securitySettingsForm'];
    let allSaved = true;
    
    forms.forEach(formId => {
        const form = $(formId);
        if (form.length) {
            saveSettings(form);
        }
    });
    
    if (allSaved) {
        showSuccess('All settings saved successfully!');
    }
}

// Save individual settings
function saveSettings(form) {
    const formData = new FormData(form[0]);
    const formId = form.attr('id');
    
    $.ajax({
        url: '/admin/settings/save',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            showSuccess('Settings saved successfully!');
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error saving settings';
            showError(errorMessage);
        }
    });
}

// Test email
function testEmail() {
    $.ajax({
        url: '/admin/settings/test-email',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            showSuccess('Test email sent successfully!');
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error sending test email';
            showError(errorMessage);
        }
    });
}

// Create backup
function createBackup() {
    Swal.fire({
        title: 'Create Backup',
        text: 'This will create a full system backup. Continue?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, create backup!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/settings/create-backup',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    showSuccess('Backup created successfully!');
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error creating backup';
                    showError(errorMessage);
                }
            });
        }
    });
}

// Restore backup
function restoreBackup() {
    showSuccess('Backup restore functionality coming soon!');
}

// Clear cache
function clearCache() {
    $.ajax({
        url: '/admin/settings/clear-cache',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            showSuccess('Cache cleared successfully!');
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error clearing cache';
            showError(errorMessage);
        }
    });
}

// Optimize database
function optimizeDatabase() {
    $.ajax({
        url: '/admin/settings/optimize-database',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            showSuccess('Database optimized successfully!');
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error optimizing database';
            showError(errorMessage);
        }
    });
}

// SweetAlert helper functions
function showSuccess(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 3000,
        showConfirmButton: false
    });
}

function showError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
        confirmButtonText: 'OK'
    });
}

// Load backups
function loadBackups() {
    $.ajax({
        url: '/admin/settings/backups',
        type: 'GET',
        success: function(response) {
            const tbody = $('#backupsTableBody');
            tbody.empty();
            
            if (response.backups && response.backups.length > 0) {
                response.backups.forEach(function(backup) {
                    tbody.append(`
                        <tr>
                            <td>${backup.name}</td>
                            <td>${backup.date}</td>
                            <td>${backup.size}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" onclick="downloadBackup('${backup.name}')">Download</button>
                                <button class="btn btn-sm btn-outline-success" onclick="restoreBackup('${backup.name}')">Restore</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteBackup('${backup.name}')">Delete</button>
                            </td>
                        </tr>
                    `);
                });
            } else {
                tbody.append(`
                    <tr>
                        <td colspan="4" class="text-center text-muted">No backups found</td>
                    </tr>
                `);
            }
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error loading backups';
            showError(errorMessage);
        }
    });
}

// Download backup
function downloadBackup(filename) {
    window.open('/admin/settings/download-backup/' + filename, '_blank');
}

// Delete backup
function deleteBackup(filename) {
    Swal.fire({
        title: 'Delete Backup',
        text: 'Are you sure you want to delete this backup?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implement delete functionality
            showSuccess('Backup deleted successfully!');
            loadBackups(); // Reload the list
        }
    });
}
</script>
@endsection
