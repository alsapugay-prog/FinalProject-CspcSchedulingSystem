@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<header class="text-center">
  <h2>Student Profiles</h2>
  <p>Meet the CCS Students</p>
</header>

<div class="row g-4 justify-content-center" style="max-width: 1000px; width: 100%;">
  <div class="col-md-4 text-center">
    <div class="card p-4">
      <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-img mx-auto">
      <h5>Aldrin Sapugay</h5>
      <p><strong>Course:</strong> BS Information Technology</p>
      <p><strong>Email:</strong> aldrin.sapugay@ccs.edu</p>
    </div>
  </div>
  <div class="col-md-4 text-center">
    <div class="card p-4">
      <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-img mx-auto">
      <h5>Ian Cyrus Tumambing</h5>
      <p><strong>Course:</strong> BS Information Technology</p>
      <p><strong>Email:</strong> ian.tumambing@ccs.edu</p>
    </div>
  </div>
  <div class="col-md-4 text-center">
    <div class="card p-4">
      <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-img mx-auto">
      <h5>Matt Gabriel Villadolid</h5>
      <p><strong>Course:</strong> BS Information Systems</p>
      <p><strong>Email:</strong> matt.villadolid@ccs.edu</p>
    </div>
  </div>
</div>
@endsection
