@extends('layouts.main')

@section('title', 'Classes')

@section('content')
<header class="text-center">
  <h2>My Classes</h2>
  <p>Overview of enrolled subjects</p>
</header>

<div class="row g-4" style="max-width: 1000px; margin: 0 auto;">
  <div class="col-md-6">
    <div class="card p-4">
      <h5>Data Structures</h5>
      <p><strong>Professor:</strong> Dr. Reyes</p>
      <p><strong>Schedule:</strong> Monday 9:00 AM</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-4">
      <h5>Database Systems</h5>
      <p><strong>Professor:</strong> Prof. Cruz</p>
      <p><strong>Schedule:</strong> Tuesday 1:00 PM</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-4">
      <h5>Software Engineering</h5>
      <p><strong>Professor:</strong> Engr. Santos</p>
      <p><strong>Schedule:</strong> Wednesday 10:30 AM</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-4">
      <h5>Web Development</h5>
      <p><strong>Professor:</strong> Ms. Dela Cruz</p>
      <p><strong>Schedule:</strong> Thursday 4:00 PM</p>
    </div>
  </div>
</div>
@endsection
