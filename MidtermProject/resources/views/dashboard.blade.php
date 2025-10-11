@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<header class="text-center mb-5">
    <h2 class="fw-bold" style="color:#003366;">Dashboard Overview</h2>
    <p class="text-secondary">Manage your schedules, classes, and announcements in one place</p>
</header>

<div class="row g-4 justify-content-center" style="max-width: 1000px; width: 100%;">
    
    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0 rounded-4" style="background: #e6f0ff;">
            <h5 class="fw-semibold text-primary mb-3">Total Courses</h5>
            <p class="fs-3 fw-bold">8</p>
            <small class="text-muted">Courses available this term</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0 rounded-4" style="background: #e6ffe6;">
            <h5 class="fw-semibold text-success mb-3">Upcoming Classes</h5>
            <p class="fs-3 fw-bold">3</p>
            <small class="text-muted">Classes scheduled for today</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0 rounded-4" style="background: #fff5e6;">
            <h5 class="fw-semibold text-warning mb-3">Announcements</h5>
            <p class="fs-3 fw-bold">2</p>
            <small class="text-muted">New updates and notices</small>
        </div>
    </div>

</div>
@endsection
