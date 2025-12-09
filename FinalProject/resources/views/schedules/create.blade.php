@extends('layouts.main')
@section('title','Add Schedule')
@section('content')

<div class="container" style="max-width:650px">
  <h3 class="accent text-center mb-3">Add Schedule</h3>

  <form action="{{ route('schedules.store') }}" method="POST">
    @csrf

    <!-- Day -->
    <label>Day</label>
    <select name="day" class="form-control mb-2" required>
      <option value="">Select day</option>
      @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $d)
        <option value="{{ $d }}" {{ old('day')==$d ? 'selected' : '' }}>
            {{ $d }}
        </option>
      @endforeach
    </select>
    @error('day')<div class="text-danger">{{ $message }}</div>@enderror

    <!-- Start Time -->
    <label>Start Time</label>
    <input type="time" name="start_time" class="form-control mb-2" value="{{ old('start_time') }}" required>
    @error('start_time')<div class="text-danger">{{ $message }}</div>@enderror

    <!-- End Time -->
    <label>End Time</label>
    <input type="time" name="end_time" class="form-control mb-2" value="{{ old('end_time') }}" required>
    @error('end_time')<div class="text-danger">{{ $message }}</div>@enderror

    <!-- Course Name (typing manually) -->
    <label>Course</label>
    <input name="course_name" class="form-control mb-2" value="{{ old('course_name') }}">

    <!-- Location -->
    <label>Instructor Assign</label>
    <input name="instructor_name" class="form-control mb-2" value="{{ old('instructor_name') }}">

    <!-- Location -->
    <label>Location </label>
    <input name="location" class="form-control mb-2" value="{{ old('location') }}">

    <button class="btn btn-info w-100">Save</button>
  </form>
</div>

@endsection
