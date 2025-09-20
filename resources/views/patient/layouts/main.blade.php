<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patient Portal - Home</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at top left, #ecfdf5, #dcfce7, #f0fdf4);
      color: #064e3b;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      overflow-x: hidden;
      position: relative;
      padding-bottom: 70px; /* Prevent content overlap with mobile nav */
    }

    /* ===== Top Navbar (Desktop) ===== */
    .top-nav {
      position: sticky;
      top: 0;
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid #d1fae5;
      box-shadow: 0 2px 12px rgba(16, 185, 129, 0.12);
      z-index: 1000;
    }
    .top-nav .nav-link {
      color: #065f46 !important;
      margin: 0 0.6rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .top-nav .nav-link.active {
      color: #10b981 !important;
      border-bottom: 2px solid #10b981;
      padding-bottom: 6px;
    }

    /* ===== Bottom Navbar (Mobile) ===== */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      border-top: 1px solid #d1fae5;
      box-shadow: 0 -4px 18px rgba(16, 185, 129, 0.15);
      z-index: 1000;
      display: flex;
      justify-content: space-around;
      padding: 0.4rem 0;
    }
    .bottom-nav .nav-link {
      flex: 1;
      text-align: center;
      color: #065f46 !important;
      font-size: 0.85rem;
      transition: all 0.3s ease;
    }
    .bottom-nav .nav-link i {
      display: block;
      font-size: 1.3rem;
      margin-bottom: 2px;
    }
    .bottom-nav .nav-link.active {
      color: #10b981 !important;
      font-weight: 600;
    }

    /* Show correct nav */
    @media (max-width: 768px) {
      .top-nav { display: none; }
    }
    @media (min-width: 769px) {
      .bottom-nav { display: none; }
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
      transform: translateY(-6px) scale(1.02);
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
    }
    .dashboard-card .card-title {
      color: #047857;
      font-weight: 600;
    }
    .dashboard-card .card-icon {
      font-size: 2.2rem;
      color: #10b981;
    }

    /* ===== Animations ===== */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <!-- ===== Top Navbar (Desktop) ===== -->
  <nav class="navbar top-nav d-none d-md-flex">
    <div class="container justify-content-between">
      <a class="navbar-brand text-success fw-bold" href="#">Patient Portal</a>
      <div class="d-flex align-items-center">
        <a class="nav-link active" href="#"><i class="bi bi-house-door-fill me-1"></i>Home</a>
        <a class="nav-link" href="#"><i class="bi bi-calendar-event-fill me-1"></i>Appointments</a>
        <a class="nav-link" href="#"><i class="bi bi-chat-dots-fill me-1"></i>Messages</a>

        <!-- Profile Dropdown -->
        <div class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill me-1"></i>Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <!-- ===== Main Content ===== -->
@yield('content')

  <!-- ===== Bottom Navbar (Mobile) ===== -->
  <nav class="bottom-nav d-md-none">
    <a class="nav-link active" href="#"><i class="bi bi-house-door-fill"></i>Home</a>
    <a class="nav-link" href="#"><i class="bi bi-calendar-event-fill"></i>Appointments</a>
    <a class="nav-link" href="#"><i class="bi bi-chat-dots-fill"></i>Messages</a>
  
    <!-- Profile Dropdown for mobile -->
    <a class="nav-link dropdown-toggle" href="#" id="mobileProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-fill"></i>Profile
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mobileProfileDropdown">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item text-danger">Logout</button>
        </form>
      </li>
    </ul>
  </nav>
  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
