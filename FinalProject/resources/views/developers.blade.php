@extends('layouts.main')
@section('title','Developer Team')
@section('content')

<style>
    .accent {
        color: #007bff;
        font-weight: bold;
    }
    .muted {
        color: #6c757d;       
    }

    .dev-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        padding: 28px 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border: none;
        text-align: center;
        color: #333;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .dev-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.18);
    }

    .dev-img {
        object-fit: cover;
        width: 140px;
        height: 140px;
        margin: 0 auto 16px;
        border: 4px solid #007bff;
    }

    .dev-card h5 {
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .dev-card p {
        margin-bottom: 6px;
        font-size: 0.95rem;
    }
</style>

<div class="text-center mb-5">
    <h2 class="accent">Meet the Developers</h2>
    <p class="muted">The Team Behind This Laravel Project</p>
</div>

<div class="row g-4" style="max-width:1200px; margin: 0 auto;">

    {{-- Developer 1 --}}
    <div class="col-md-6 col-lg-3">
        <div class="dev-card">
            <img src="{{ asset('dreipogi.jpg') }}" onerror="this.src='https://via.placeholder.com/140'" 
                     class="rounded-circle dev-img">
            <h5><b>Mark Adrian Deleon</b></h5>
            <p class="accent">Head Leader</p>
            <p class="muted">Full Stack Developer</p>
            <p>madeleon@my.cspc.edu.ph</p>
        </div>
    </div>

    {{-- Developer 2 --}}
    <div class="col-md-6 col-lg-3">
        <div class="dev-card">
            <img src="{{ asset('ian.jpeg.jpg') }}" onerror="this.src='https://via.placeholder.com/140'" 
                     class="rounded-circle dev-img">
            <h5><b>Ian Cyrus Tumambing</b></h5>
            <p class="accent">Backend Developer</p>
            <p class="muted">Database Specialist</p>
            <p>iatumambing@my.cspc.edu.ph</p>
        </div>
    </div>

    {{-- Developer 3 --}}
    <div class="col-md-6 col-lg-3">
        <div class="dev-card">
            <img src="{{ asset('SapugayIDpic.jpg') }}" onerror="this.src='https://via.placeholder.com/140'" 
                     class="rounded-circle dev-img">
            <h5><b>Aldrin Sapugay</b></h5>
            <p class="accent">Frontend/UI Developer</p>
            <p class="muted">UX Designer</p>
            <p>alsapugay@my.cspc.edu.ph</p>
        </div>
    </div>

    {{-- Developer 4 --}}
    <div class="col-md-6 col-lg-3">
        <div class="dev-card">
            <img src="{{ asset('matt.jpg') }}" onerror="this.src='https://via.placeholder.com/140'" 
                     class="rounded-circle dev-img">
            <h5><b>Matt Gabriel Villadolid</b></h5>
            <p class="accent">System Analyst</p>
            <p class="muted">Project Manager</p>
            <p>mavilladolid@my.cspc.edu.ph</p>
        </div>
    </div>

</div>

@endsection
