<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patient Portal Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Floating animation */
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    .float {
      animation: float 7s ease-in-out infinite;
    }

    /* Fade-in */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up {
      animation: fadeInUp 1s ease forwards;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-emerald-50 via-green-50 to-emerald-100 relative overflow-hidden">

@yield('content')

</body>
</html>
