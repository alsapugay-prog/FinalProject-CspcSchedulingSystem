<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | CSPC Online Scheduling System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
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
      overflow-y: auto;
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
    .sidebar small { font-size: 0.85rem; color: #b3e5fc; }
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
    .sidebar form {
      margin-top: auto;
    }
    /* Main content */
    .main-content {
      margin-left: 230px;
      padding: 3rem;
      min-height: 100vh;
    }
    header h1 { font-weight: 700; color: #003366; letter-spacing: 0.5px; }
    header p { color: #666; margin-bottom: 2rem; }
    /* Section card */
    .section-card {
      background: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      margin-bottom: 2rem;
    }
    .section-card h3 { color: #003366; }
    /* Cards */
    .card { border-radius: 15px; border: none; background: white; box-shadow: 0 4px 20px rgba(0,0,0,0.05); transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-5px); }
    .card h5 { color: #004080; font-weight: 600; }
    /* Profile image */
    .profile-img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; border: 3px solid #004080; }
    /* Table */
    table { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.08); width: 100%; }
    th { background: #004080; color: white; text-align: center; padding: 15px; }
    td { text-align: center; padding: 15px; border-bottom: 1px solid #e0e0e0; }
    tr:hover td { background: #f1f9ff; transition: background 0.3s; }
    /* List group */
    .list-group-item {
      border-left: 4px solid #004080;
      border-radius: 8px;
      margin-bottom: 0.5rem;
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
        overflow-y: visible;
      }
      .sidebar h3, .sidebar small { display: none; }
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
      .sidebar form {
        display: none;
      }
      .main-content { margin: 0; padding: 2rem 1rem 5rem; }
      table { font-size: 0.85rem; }
      th, td { padding: 10px; }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>CSPC<br><small>Online Scheduling System</small></h3>

    <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>

    @auth
      @if(Auth::user()->role === 'instructor')
        <a href="{{ url('/schedules') }}" class="{{ request()->is('schedules') ? 'active' : '' }}">Schedules</a>
        <a href="{{ route('request.create') }}" class="{{ request()->is('request') ? 'active' : '' }}">Send Request</a>
        <a href="{{ url('/developers') }}" class="{{ request()->is('developers') ? 'active' : '' }}">Developers</a>
      @endif

      @if(Auth::user()->role === 'student')
        <a href="{{ route('request.create') }}" class="{{ request()->is('request') ? 'active' : '' }}">Send Request</a>
        <a href="{{ url('/developers') }}" class="{{ request()->is('developers') ? 'active' : '' }}">Developers</a>
      @endif

      @if(Auth::user()->role === 'admin')
        <a href="{{ url('/schedules') }}" class="{{ request()->is('schedules') ? 'active' : '' }}">Schedules</a>
        <a href="{{ url('/courses') }}" class="{{ request()->is('courses') ? 'active' : '' }}">Courses</a>
        <a href="{{ url('/announcements') }}" class="{{ request()->is('announcements') ? 'active' : '' }}">Announcements</a>
        <a href="{{ url('/developers') }}" class="{{ request()->is('developers') ? 'active' : '' }}">Developers</a>
      @endif
    @endauth

    <!-- Logout placed at bottom of sidebar -->
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
    </form>
  </div>

  <div class="main-content">
    <header class="text-center mb-5">
      @if(auth()->check())
        @if(auth()->user()->role === 'student')
          <h1 class="fw-bold mb-2">Student Dashboard</h1>
          <p>Welcome back! Here's your overview</p>
        @elseif(auth()->user()->role === 'instructor')
          <h1 class="fw-bold mb-2">Instructor Dashboard</h1>
          <p>Manage your classes and schedules</p>
        @elseif(auth()->user()->role === 'admin')
          <h1 class="fw-bold mb-2">Admin Dashboard</h1>
          <p>System overview and management tools</p>
        @endif
      @else
        <h1 class="fw-bold mb-2">Welcome to CSPC Online Scheduling System</h1>
        <p>Your centralized platform for managing class schedules and announcements</p>
      @endif
    </header>

{{-- Show only on student or instructor dashboard --}}
@if(request()->routeIs('student.dashboard') || request()->routeIs('instructor.dashboard'))
    @auth
        @if(in_array(auth()->user()->role, ['student','instructor']))

            {{-- Announcements Section --}}
            @if(isset($announcements))
                @forelse($announcements as $announcement)
                    <li class="list-group-item">
                        <strong>{{ $announcement->title }}</strong>
                        <p class="mb-0 text-muted">{{ $announcement->body }}</p>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No announcements available.</li>
                @endforelse
            @else
                <li class="list-group-item text-muted">Announcements not loaded.</li>
            @endif

            {{-- Schedules Section --}}
            @if(isset($schedules))
                @forelse($schedules as $schedule)
                    <li class="list-group-item">
                        <strong>{{ $schedule->course_name }}</strong>
                        <p class="mb-0 text-muted">{{ $schedule->day }} - {{ $schedule->time }}</p>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No schedules available.</li>
                @endforelse
            @else
                <li class="list-group-item text-muted">Schedules not loaded.</li>
            @endif

              {{-- Student Request Form --}}
              @if(auth()->user()->role === 'student')
                  <div class="section-card">
                      <h3 class="fw-bold mb-3"><i class="bi bi-envelope"></i> Send Request to Admin</h3>

                      <form method="POST" action="{{ route('request.store') }}">
                          @csrf

                          <div class="mb-3">
                              <textarea name="message" class="form-control" rows="4" placeholder="Type your request..."></textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">
                              Send Request
                          </button>
                      </form>
                  </div>
              @endif


        @endif
    @endauth
@endif

    @yield('content')
  </div>

</body>
</html>