@extends('layouts.main')

@section('title', 'Announcements')

@section('content')
<header class="text-center">
  <h2>Announcements</h2>
  <p>Stay updated with the latest news and activities</p>
</header>

<div class="row g-4" style="max-width: 900px; width: 100%; margin: 0 auto;">
  <div class="col-12">
    <div class="card p-4">
      <h5>Midterm Exams</h5>
      <p>Midterm exams will start next week. Please check your schedule for details.</p>
      <small class="text-muted">Posted: Sept 18, 2025</small>
    </div>
  </div>
  <div class="col-12">
    <div class="card p-4">
      <h5>Seminar: AI Trends</h5>
      <p>Join us for a seminar on AI Trends this Friday at 3 PM in the CCS Auditorium.</p>
      <small class="text-muted">Posted: Sept 15, 2025</small>
    </div>
  </div>
  <div class="col-12">
    <div class="card p-4">
      <h5>Project Proposals</h5>
      <p>Submit your project proposals on or before Sept 25 through the online portal.</p>
      <small class="text-muted">Posted: Sept 12, 2025</small>
    </div>
  </div>
</div>
@endsection
