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
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 2rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    height: 100%;
  }

  .enhanced-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    border-color: #667eea;
  }

  .stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin-bottom: 1rem;
  }

  .stat-number {
    font-size: 2.2rem;
    font-weight: 700;
    color: #667eea;
    margin: 0.5rem 0;
  }

  .stat-label {
    font-size: 0.95rem;
    color: #333;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .stat-description {
    font-size: 0.85rem;
    color: #999;
  }

  .content-section {
    margin-top: 3rem;
  }

  .section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 3px solid #667eea;
  }

  .announcement-item {
    background: #f8f9fa;
    border-left: 4px solid #667eea;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .announcement-item:hover {
    background: #f0f2f8;
  }

  .announcement-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 0.5rem;
  }

  .announcement-date {
    font-size: 0.85rem;
    color: #999;
  }

  .schedule-item {
    background: #f8f9fa;
    border-left: 4px solid #4facfe;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .schedule-item:hover {
    background: #f0f7ff;
  }

  .empty-state {
    text-align: center;
    padding: 2rem;
    color: #999;
  }

  .empty-state-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
  }
</style>

<div class="dashboard-header">
  <h1 class="mb-0">Welcome back!</h1>
  <p class="mb-0 mt-2 opacity-75">Here's your dashboard overview</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
  <!-- Courses Card -->
  <div class="col-lg-4 col-md-6">
    <div class="enhanced-card text-center">
      <div class="stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; margin-left: auto; margin-right: auto;">
        <i class="bi bi-book"></i>
      </div>
      <p class="stat-label">Total Courses</p>
      <p class="stat-number">{{ $courses_count ?? 0 }}</p>
      <p class="stat-description">Courses available</p>
    </div>
  </div>

  <!-- Schedules Card -->
  <div class="col-lg-4 col-md-6">
    <div class="enhanced-card text-center">
      <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c); color: white; margin-left: auto; margin-right: auto;">
        <i class="bi bi-calendar-check"></i>
      </div>
      <p class="stat-label">Schedules</p>
      <p class="stat-number">{{ $schedules->count() ?? 0 }}</p>
      <p class="stat-description">Scheduled slots</p>
    </div>
  </div>

  <!-- Announcements Card -->
  <div class="col-lg-4 col-md-6">
    <div class="enhanced-card text-center">
      <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe); color: white; margin-left: auto; margin-right: auto;">
        <i class="bi bi-megaphone"></i>
      </div>
      <p class="stat-label">Announcements</p>
      <p class="stat-number">{{ $announcements->count() ?? 0 }}</p>
      <p class="stat-description">Active notices</p>
    </div>
  </div>
</div>

<!-- Schedules Section -->
<div class="content-section">
  <h2 class="section-title">
    <i class="bi bi-calendar-check me-2"></i>Your Schedules
  </h2>
  @if($schedules && $schedules->count() > 0)
    <div class="row">
      <div class="col-lg-8">
        @foreach($schedules as $schedule)
          <div class="schedule-item">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="announcement-title">{{ $schedule->title ?? $schedule->course->name ?? 'Schedule' }}</h6>
                <p class="mb-2 text-dark">
                  <i class="bi bi-clock me-2"></i>
                  {{ $schedule->start_time ?? 'Time not specified' }} - {{ $schedule->end_time ?? '' }}
                </p>
                @if($schedule->location)
                  <p class="mb-0 text-muted">
                    <i class="bi bi-geo-alt me-2"></i>
                    {{ $schedule->location }}
                  </p>
                @endif
              </div>
              <span class="badge bg-light text-dark">{{ \Carbon\Carbon::parse($schedule->date)->format('M d, Y') ?? 'N/A' }}</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="empty-state">
      <div class="empty-state-icon">
        <i class="bi bi-calendar-x"></i>
      </div>
      <p>No schedules available at the moment</p>
    </div>
  @endif
</div>

<!-- Announcements Section -->
<div class="content-section">
  <h2 class="section-title">
    <i class="bi bi-megaphone me-2"></i>Announcements
  </h2>
  @if($announcements && $announcements->count() > 0)
    <div class="row">
      <div class="col-lg-8">
        @foreach($announcements as $announcement)
          <div class="announcement-item">
            <div class="d-flex justify-content-between align-items-start">
              <div class="flex-grow-1">
                <h6 class="announcement-title">{{ $announcement->title }}</h6>
                <p class="mb-2 text-dark">{{ Str::limit($announcement->description, 150) }}</p>
                <p class="announcement-date mb-0">
                  <i class="bi bi-calendar me-2"></i>
                  {{ $announcement->created_at->format('M d, Y h:i A') }}
                </p>
              </div>
              @if($announcement->is_important)
                <span class="badge bg-danger ms-2">Important</span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="empty-state">
      <div class="empty-state-icon">
        <i class="bi bi-megaphone"></i>
      </div>
      <p>No announcements at the moment</p>
    </div>
  @endif
</div>

@endsection