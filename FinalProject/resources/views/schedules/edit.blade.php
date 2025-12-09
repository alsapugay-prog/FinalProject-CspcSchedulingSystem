@extends('layouts.main')

@section('title','Edit Schedule')

@section('content')

<div class="container" style="max-width:650px">

    <h3 class="accent text-center mb-3">Edit Schedule</h3>

    <form action="{{ route('schedules.update',$schedule) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Day -->
        <label>Day</label>
        <select name="day" class="form-control mb-2" required>
            <option value="">Select day</option>

            @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $d)
                <option value="{{ $d }}" {{ old('day',$schedule->day)==$d ? 'selected' : '' }}>
                    {{ $d }}
                </option>
            @endforeach

        </select>

        <!-- Start Time -->
        <label>Start Time</label>
        <input type="time" name="start_time" class="form-control mb-2"
               value="{{ old('start_time',$schedule->start_time) }}" required>

        <!-- End Time -->
        <label>End Time</label>
        <input type="time" name="end_time" class="form-control mb-2"
               value="{{ old('end_time',$schedule->end_time) }}" required>

        <!-- Course Name (typing) -->
        <label>Course Name</label>
        <input type="text" name="course_name" class="form-control mb-2"
               value="{{ old('course_name',$schedule->course_name) }}" required>

        <!-- Location -->
        <label>Location (optional)</label>
        <input type="text" name="location" class="form-control mb-2"
               value="{{ old('location',$schedule->location) }}">

        <button class="btn btn-warning w-100">Update</button>

    </form>

</div>

@endsection
