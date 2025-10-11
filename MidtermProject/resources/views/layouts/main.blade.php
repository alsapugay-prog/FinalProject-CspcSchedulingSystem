<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | CSPC Online Scheduling System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f8ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      background: linear-gradient(180deg, #003366, #0059b3);
      color: white;
      padding: 2rem 1rem;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      box-shadow: 2px 0 15px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      z-index: 10;
    }

    .sidebar h3 {
      font-size: 1.3rem;
      font-weight: 700;
      color: #00d4ff;
      text-transform: uppercase;
      border-bottom: 2px solid #00d4ff;
      padding-bottom: 10px;
      margin-bottom: 2rem;
    }

    .sidebar small {
      font-size: 0.85rem;
      color: #b3e5fc;
    }

    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      margin: 10px 0;
      font-weight: 500;
      padding: 12px 16px;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: rgba(255,255,255,0.15);
      transform: translateX(5px);
    }

    /* Main content */
    .main-content {
      margin-left: 230px;
      padding: 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    header h2 {
      font-weight: 700;
      color: #003366;
      letter-spacing: 0.5px;
    }

    header p {
      color: #666;
      margin-bottom: 2rem;
    }

    /* Cards */
    .card {
      border-radius: 15px;
      border: none;
      background: white;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h5 {
      color: #004080;
      font-weight: 600;
    }

    /* Profile image */
    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #004080;
    }

    /* Table */
    table {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      width: 100%;
    }

    th {
      background: #004080;
      color: white;
      text-align: center;
      padding: 15px;
    }

    td {
      text-align: center;
      padding: 15px;
      border-bottom: 1px solid #e0e0e0;
    }

    tr:hover td {
      background: #f1f9ff;
      transition: background 0.3s;
    }

    /* Responsive Sidebar */
    @media (max-width: 768px) {
      .sidebar {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        height: 60px;
        width: 100%;
        position: fixed;
        bottom: 0;
        top: auto;
        padding: 0.5rem 0;
        box-shadow: 0 -3px 10px rgba(0,0,0,0.15);
      }

      .sidebar h3, .sidebar small {
        display: none;
      }

      .sidebar a {
        margin: 0;
        padding: 10px 0;
        border-radius: 0;
        font-size: 0.9rem;
      }

      .sidebar a:hover,
      .sidebar a.active {
        background: none;
        color: #00c4ff;
        transform: none;
      }

      .main-content {
        margin: 0;
        padding: 2rem 1rem 5rem;
      }

      table {
        font-size: 0.85rem;
      }

      th, td {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>CSPC<br><small>Online Scheduling System</small></h3>
    <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ url('/schedules') }}" class="{{ request()->is('schedules') ? 'active' : '' }}">Schedules</a>
    <a href="{{ url('/classes') }}" class="{{ request()->is('classes') ? 'active' : '' }}">Classes</a>
    <a href="{{ url('/announcements') }}" class="{{ request()->is('announcements') ? 'active' : '' }}">Announcements</a>
    <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    @yield('content')
  </div>
</body>
</html>
