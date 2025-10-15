<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Shafayaat Hospital - Admin Panel')</title>
    <meta name="description" content="Shafayaat Hospital Management System - Comprehensive Healthcare Administration">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/images/ico/favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #067a63;
            --primary-dark: #055a4a;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-brand {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .sidebar-brand i {
            font-size: 2rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 0;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
            position: relative;
        }

        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .nav-link .badge {
            margin-left: auto;
            background-color: var(--warning-color);
            color: var(--dark-color);
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }

        .submenu {
            background-color: rgba(0, 0, 0, 0.1);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .submenu.show {
            max-height: 300px;
        }

        .submenu .nav-link {
            padding-left: 3rem;
            font-size: 0.9rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Header */
        .header {
            background: white;
            height: var(--header-height);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--dark-color);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background-color: var(--light-color);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-dropdown {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 0.5rem 0;
            min-width: 200px;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: var(--light-color);
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #e9ecef;
            padding: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Stats Cards */
        .stats-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 1rem;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .stats-card:hover::before {
            transform: scale(1);
        }

        .stats-card .icon {
            font-size: 3rem;
            opacity: 0.8;
        }

        .stats-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .stats-card .label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Tables */
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--light-color);
            border: none;
            font-weight: 600;
            color: var(--dark-color);
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f3f4;
        }

        /* Forms */
        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(6, 122, 99, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 0.5rem;
            padding: 1rem 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 1rem;
            }
        }

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Fix Select2 dropdown z-index in modals */
        .modal .select2-container {
            z-index: 9999 !important;
        }
        
        .modal .select2-dropdown {
            z-index: 9999 !important;
        }
        
        .modal .select2-search--dropdown {
            z-index: 9999 !important;
        }
        
        .modal .select2-results {
            z-index: 9999 !important;
        }
    </style>
    
    @yield('custom-css')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin-new.dashboard') }}" class="sidebar-brand">
                <i class="fas fa-hospital"></i>
                <span class="brand-text">Shafayaat</span>
            </a>
        </div>
        
        <div class="sidebar-nav">
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.dashboard') ? 'active' : '' }}" href="{{ route('admin-new.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.users') ? 'active' : '' }}" href="{{ route('admin-new.users') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                        <span class="badge">{{ \App\Models\User::count() }}</span>
                    </a>
                </li>

                <!-- Staff & Permissions -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.staff') ? 'active' : '' }}" href="{{ route('admin-new.staff') }}">
                        <i class="fas fa-user-shield"></i>
                        <span>Staff & Permissions</span>
                    </a>
                </li>

                <!-- Patient Management -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.patients') || Route::is('admin-new.patient-info') ? 'active' : '' }}" href="{{ route('admin-new.patients') }}">
                        <i class="fas fa-user-injured"></i>
                        <span>Patients</span>
                        <span class="badge">{{ \App\Models\Patient::count() }}</span>
                    </a>
                </li>

                <!-- Medical Services -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.services') ? 'active' : '' }}" href="{{ route('admin-new.services') }}">
                        <i class="fas fa-stethoscope"></i>
                        <span>Medical Services</span>
                        <span class="badge">{{ \App\Models\Service::count() }}</span>
                    </a>
                </li>

                <!-- Form Builder -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.forms') || Route::is('admin-new.question-sections') || Route::is('admin-new.questions') || Route::is('admin-new.relations') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#formBuilderMenu">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Form Builder</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse submenu {{ Route::is('admin-new.forms') || Route::is('admin-new.question-sections') || Route::is('admin-new.questions') || Route::is('admin-new.relations') ? 'show' : '' }}" id="formBuilderMenu">
                        <a class="nav-link {{ Route::is('admin-new.forms') ? 'active' : '' }}" href="{{ route('admin-new.forms') }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Forms</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.question-sections') ? 'active' : '' }}" href="{{ route('admin-new.question-sections') }}">
                            <i class="fas fa-layer-group"></i>
                            <span>Sections</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.questions') ? 'active' : '' }}" href="{{ route('admin-new.questions') }}">
                            <i class="fas fa-question-circle"></i>
                            <span>Questions</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.relations') ? 'active' : '' }}" href="{{ route('admin-new.relations') }}">
                            <i class="fas fa-project-diagram"></i>
                            <span>Relations</span>
                        </a>
                    </div>
                </li>

                <!-- Laboratory -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.blood-investigation') || Route::is('admin-new.xrays') || Route::is('admin-new.uss') || Route::is('admin-new.ctscans') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#labMenu">
                        <i class="fas fa-flask"></i>
                        <span>Laboratory</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse submenu {{ Route::is('admin-new.blood-investigation') || Route::is('admin-new.xrays') || Route::is('admin-new.uss') || Route::is('admin-new.ctscans') ? 'show' : '' }}" id="labMenu">
                        <a class="nav-link {{ Route::is('admin-new.blood-investigation') ? 'active' : '' }}" href="{{ route('admin-new.blood-investigation') }}">
                            <i class="fas fa-tint"></i>
                            <span>Blood Investigation</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.xrays') ? 'active' : '' }}" href="{{ route('admin-new.xrays') }}">
                            <i class="fas fa-x-ray"></i>
                            <span>X-Rays</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.uss') ? 'active' : '' }}" href="{{ route('admin-new.uss') }}">
                            <i class="fas fa-wave-square"></i>
                            <span>Ultrasounds</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.ctscans') ? 'active' : '' }}" href="{{ route('admin-new.ctscans') }}">
                            <i class="fas fa-scanner"></i>
                            <span>CT Scans</span>
                        </a>
                    </div>
                </li>

                <!-- Pharmacy -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.medicines') || Route::is('admin-new.dosage') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pharmacyMenu">
                        <i class="fas fa-pills"></i>
                        <span>Pharmacy</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse submenu {{ Route::is('admin-new.medicines') || Route::is('admin-new.dosage') ? 'show' : '' }}" id="pharmacyMenu">
                        <a class="nav-link {{ Route::is('admin-new.medicines') ? 'active' : '' }}" href="{{ route('admin-new.medicines') }}">
                            <i class="fas fa-capsules"></i>
                            <span>Medicines</span>
                        </a>
                        <a class="nav-link {{ Route::is('admin-new.dosage') ? 'active' : '' }}" href="{{ route('admin-new.dosage') }}">
                            <i class="fas fa-weight"></i>
                            <span>Dosage</span>
                        </a>
                    </div>
                </li>

                <!-- Financial -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.banks') ? 'active' : '' }}" href="{{ route('admin-new.banks') }}">
                        <i class="fas fa-university"></i>
                        <span>Banks</span>
                    </a>
                </li>


                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.settings') ? 'active' : '' }}" href="{{ route('admin-new.settings') }}">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>


                <!-- Profile -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin-new.profile') ? 'active' : '' }}" href="{{ route('admin-new.profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
            </div>
            
            <div class="header-right">
                <!-- User Dropdown -->
                <div class="dropdown user-dropdown">
                    <button class="btn btn-link d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <img src="{{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic) : asset('admin-assets/images/portrait/small/avatar-s-11.jpg') }}" 
                             alt="User Avatar" class="user-avatar me-2">
                        <div class="text-start">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">Administrator</small>
                        </div>
                        <i class="fas fa-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admin-new.profile') }}">
                            <i class="fas fa-user me-2"></i>Profile
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-cog me-2"></i>Settings
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="content-area">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JavaScript -->
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Mobile Sidebar Toggle
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').classList.add('collapsed');
            document.getElementById('mainContent').classList.add('expanded');
        }

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Initialize DataTables
        $(document).ready(function() {
            $('.data-table').DataTable({
                responsive: true,
                pageLength: 25,
                order: [[0, 'desc']],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });

            // Initialize Select2
            $('.select2').select2({
                theme: 'bootstrap-5',
                width: '100%'
            });
        });

        // Confirmation dialogs
        function confirmDelete(message = 'Are you sure you want to delete this item?') {
            return Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            });
        }

        // Success notification
        function showSuccess(message, title = 'Success!') {
            Swal.fire({
                icon: 'success',
                title: title,
                text: message,
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timerProgressBar: true
            });
        }

        // Error notification
        function showError(message, title = 'Error!') {
            Swal.fire({
                icon: 'error',
                title: title,
                text: message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33'
            });
        }

        // Warning notification
        function showWarning(message, title = 'Warning!') {
            Swal.fire({
                icon: 'warning',
                title: title,
                text: message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#ffc107'
            });
        }

        // Info notification
        function showInfo(message, title = 'Information') {
            Swal.fire({
                icon: 'info',
                title: title,
                text: message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#17a2b8'
            });
        }

        // Loading notification
        function showLoading(message = 'Processing...') {
            Swal.fire({
                title: message,
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        // Close loading
        function hideLoading() {
            Swal.close();
        }

        // Toast notifications
        function showToast(message, type = 'success') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: type,
                title: message
            });
        }

        // Button loading state
        function setButtonLoading(button, message = 'Loading...') {
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="spinner"></span> ' + message;
            button.disabled = true;
            return originalText;
        }

        function resetButton(button, originalText) {
            button.innerHTML = originalText;
            button.disabled = false;
        }
    </script>

    @yield('custom-js')
</body>
</html>
