@extends('layouts.main')
@section('title','Schedules')
@section('content')

<div class="text-center mb-4">
  <h2 class="accent">Weekly Class Schedule</h2>
  <p class="muted">Overview of your weekly timetable</p>
  <a href="{{ route('schedules.create') }}" class="btn btn-primary mt-2">+ Add Schedule</a>
</div>

@if(session('success')) 
  <div class="alert alert-success">{{ session('success') }}</div> 
@endif

<div class="table-responsive glass-card" style="max-width:1000px;margin:0 auto;padding:12px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
  <table class="table table-striped table-hover mb-0">
    <thead class="thead-dark">
      <tr>
        <th>Day</th>
        <th>Time</th>
        <th>Course</th>
        <th>Location</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($schedules as $s)
      <tr>
        <td>{{ $s->day }}</td>
        <td>{{ \Carbon\Carbon::createFromTimeString($s->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::createFromTimeString($s->end_time)->format('h:i A') }}</td>
        <td>{{ $s->course ? $s->course->subject : '-' }}</td>
        <td>{{ $s->location ?? '-' }}</td>
        <td>
          <a href="{{ route('schedules.edit',$s) }}" class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i> Edit
          </a>
          <form action="{{ route('schedules.destroy',$s) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Delete
              </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<style>
  .accent {
    color: #007bff;
    font-weight: bold;
  }
  .muted {
    color: #6c757d;
  }
  .glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
  }
  .table th, .table td {
    vertical-align: middle;
  }
</style>

@endsection
