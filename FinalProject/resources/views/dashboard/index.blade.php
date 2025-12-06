@extends('layouts.main')
@section('title','Dashboard')

@section('content')
<style>
  .dashboard-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 3rem 2rem;
    border-radius: 15px;
    color: white;
    margin-bottom: 3rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  }

  .enhanced-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
    border: 2px solid #000; /* black border */
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;

    /* make all cards equal height and layout content vertically */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 100%;
  }

  .enhanced-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
  }

  .enhanced-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-color: rgba(0,0,0,0.9); /* keep hover border visible */
  }

  .enhanced-card:hover::before {
    left: 100%;
  }

  .stat-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 1rem 0;
  }

  /* ensure row stretches columns so .enhanced-card height:100% works */
  .row.equal-cards {
    align-items: stretch;
  }
</style>

<div class="dashboard-header text-center">
  <h1 class="fw-bold mb-2">Dashboard Overview</h1>
  <p class="fs-5 opacity-75">Welcome back! Here's your performance at a glance</p>
</div>

<div class="row g-4 justify-content-center equal-cards">
  <!-- Courses Card -->
  <div class="col-lg-4 col-md-6 d-flex">
    <div class="enhanced-card">
      <div class="stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
        <i class="bi bi-book text-white"></i>
      </div>
      <h5 class="text-center fw-bold text-dark mb-2">Total Courses</h5>
      <p class="stat-number text-center">{{ $courses_count }}</p>
      <p class="text-center text-muted small">Courses available this term</p>
    </div>
  </div>

  <!-- Schedules Card -->
  <div class="col-lg-4 col-md-6 d-flex">
    <div class="enhanced-card">
      <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c);">
        <i class="bi bi-calendar-check text-white"></i>
      </div>
      <h5 class="text-center fw-bold text-dark mb-2">Schedules</h5>
      <p class="stat-number text-center">{{ \App\Models\Schedule::count() }}</p>
      <p class="text-center text-muted small">Total scheduled slots</p>
    </div>
  </div>

  <!-- Announcements Card -->
  <div class="col-lg-4 col-md-6 d-flex">
    <div class="enhanced-card">
      <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
        <i class="bi bi-megaphone text-white"></i>
      </div>
      <h5 class="text-center fw-bold text-dark mb-2">Announcements</h5>
      <p class="stat-number text-center">{{ $announcements_count }}</p>
      <p class="text-center text-muted small">Active notices</p>
    </div>
  </div>
</div>
@endsection