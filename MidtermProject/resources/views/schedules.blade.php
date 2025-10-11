@extends('layouts.main')

@section('title', 'Schedules')

@section('content')
<header class="text-center">
  <h2>Weekly Class Schedule</h2>
  <p>Overview of your weekly timetable</p>
</header>

<div class="table-responsive" style="max-width: 1000px;">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>8:00 - 9:30</td>
        <td>Data Structures</td>
        <td></td>
        <td>Software Engineering</td>
        <td></td>
        <td>Computer Networks</td>
      </tr>
      <tr>
        <td>10:00 - 11:30</td>
        <td></td>
        <td>Database Systems</td>
        <td></td>
        <td>Web Development</td>
        <td></td>
      </tr>
      <tr>
        <td>1:00 - 2:30</td>
        <td>Operating Systems</td>
        <td></td>
        <td></td>
        <td>AI Fundamentals</td>
        <td></td>
      </tr>
      <tr>
        <td>3:00 - 4:30</td>
        <td></td>
        <td>Mobile Development</td>
        <td></td>
        <td></td>
        <td>Capstone Project</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
