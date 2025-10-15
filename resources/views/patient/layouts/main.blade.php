<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patient Portal</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <style>
    /* --- Welcome Header --- */

    body {
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at top left, #ecfdf5, #dcfce7, #f0fdf4);
      color: #064e3b;
      min-height: 100vh;
      overflow-x: hidden;
      margin: 0;
    }

    /* ===== Sidebar ===== */
    .sidebar {
      width: 260px;
      background: linear-gradient(180deg, #ffffff 0%, #f0fdf4 100%);
      box-shadow: 2px 0 20px rgba(16, 185, 129, 0.1);
      border-right: 1px solid #d1fae5;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      display: flex;
      flex-direction: column;
      transition: all 0.3s ease;
      z-index: 1000;
      overflow-y: auto;
      scrollbar-width: none;
    }

    .sidebar::-webkit-scrollbar {
      display: none;
    }

    .sidebar .brand {
      font-weight: 700;
      font-size: 1.3rem;
      background: linear-gradient(90deg, #059669, #10b981);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
      padding: 1.5rem 0;
      letter-spacing: 0.5px;
      position: relative;
    }

    .sidebar .brand::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 20%;
      width: 60%;
      height: 2px;
      background: linear-gradient(90deg, #6ee7b7, #10b981, #6ee7b7);
      border-radius: 3px;
      opacity: 0.5;
    }

    .sidebar .nav-link {
      color: #065f46;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.8rem;
      padding: 0.9rem 1.5rem;
      border-left: 4px solid transparent;
      transition: all 0.25s ease;
      border-radius: 0 12px 12px 0;
      margin-right: 10px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background: #ecfdf5;
      border-left: 4px solid #10b981;
      color: #047857;
      font-weight: 600;
    }

    .sidebar-footer {
      margin-top: auto;
      padding: 1rem 1.5rem;
      border-top: 1px solid #d1fae5;
      background: #f9fffb;
    }

    .sidebar-footer button {
      font-weight: 500;
      border-radius: 12px;
    }

    /* ===== Main Content ===== */
    .content {
      margin-left: 260px;
      padding: 2rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
      position: relative;
    }

    /* ===== Mobile Sidebar ===== */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
      background: #10b981;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 0.6rem 0.8rem;
      box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }

    @media (max-width: 991px) {
      .sidebar {
        left: -270px;
      }
      .sidebar.active {
        left: 0;
      }
      .sidebar-toggle {
        display: block;
      }
      .content {
        margin-left: 0;
        padding-top: 4rem;
      }
    }

    /* ===== Welcome Header ===== */
    .welcome-header {
      font-size: 1.9rem;
      font-weight: 600;
      background: linear-gradient(90deg, #047857, #10b981);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 0.3px;
      margin-bottom: 0.8rem;
      position: relative;
      display: inline-block;
    }

    .welcome-header::after {
      content: "";
      position: absolute;
      bottom: -6px;
      left: 0;
      width: 50%;
      height: 3px;
      border-radius: 2px;
      background: linear-gradient(90deg, #6ee7b7, #10b981);
    }

    .welcome-subtext {
      font-size: 0.95rem;
      color: #065f46cc;
      margin-bottom: 2rem;
    }

    /* ===== Dashboard Cards ===== */
    .dashboard-card {
      border-radius: 18px;
      background: #ffffff;
      box-shadow: 0 8px 20px rgba(16, 185, 129, 0.1);
      border: none;
      transition: all 0.3s ease;
      animation: fadeInUp 0.6s ease forwards;
    }

    .dashboard-card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 12px 28px rgba(16, 185, 129, 0.15);
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
  @yield('custom-css')
</head>

<body>
  <!-- Sidebar -->
  <nav class="sidebar" id="sidebar">
    <div class="brand">Patient Portal</div>
    <div class="flex-grow-1">
      <a href="{{route('patient-dashboard')}}" class="nav-link {{Route::is('patient-dashboard') ? 'active' : ''}}"><i class="bi bi-house-door-fill"></i> Dashboard</a>
      <a href="{{route('prescription')}}" class="nav-link {{Route::is('prescription') ? 'active' : ''}}"><i class="bi bi-capsule-pill"></i> Prescriptions</a>
      <a href="{{route('appointment')}}" class="nav-link {{Route::is('appointment') ? 'active' : ''}}"><i class="bi bi-calendar-event-fill"></i> Appointments</a>
      <a href="{{route('sleep')}}" class="nav-link {{Route::is('sleep') ? 'active' : ''}}"><i class="bi bi-moon-stars-fill"></i>Sleep Tracker</a>
      <a href="{{route('lab-orders')}}" class="nav-link  {{Route::is('lab-orders') ? 'active' : ''}}"><i class="fa-solid fa-flask-vial"></i>Lab Orders</a>
      <a href="{{route('elearning')}}" class="nav-link {{Route::is('elearning') ? 'active' : ''}}"><i class="fa-solid fa-graduation-cap"></i>E-Learning</a>
      <a href="{{route('medreps')}}" class="nav-link {{Route::is('medreps') ? 'active' : ''}}"><i class="fa-solid fa-notes-medical"></i> Medical Reports</a>
      <a href="{{route('bio-entry')}}" class="nav-link {{Route::is('bio-entry') ? 'active' : ''}}"><i class="bi bi-pencil-square"></i> Bio Entry</a>
      <a href="{{route('fitness')}}" class="nav-link {{Route::is('fitness') ? 'active' : ''}}"><i class="fa-solid fa-heart"></i>Fitness Stats</a>
      <a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Profile</a>
    </div>
    <div class="sidebar-footer">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
      </form>
    </div>
  </nav>

  <!-- Mobile Toggle -->
  <button class="sidebar-toggle" id="sidebarToggle">
    <i class="bi bi-list"></i>
  </button>

  <!-- Content -->
  <div class="content">
    

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    toggle.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  </script>
  @yield('custom-js')
</body>
</html>
