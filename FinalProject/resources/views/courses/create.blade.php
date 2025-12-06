@extends('layouts.main')
@section('title','Add Class')
@section('content')
<div class="container" style="max-width:650px">
  <h3 class="accent text-center mb-3">Add Class</h3>
  <form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <label>Subject</label>
    <input name="subject" class="form-control mb-2" value="{{ old('subject') }}" required>
    @error('subject')<div class="text-danger">{{ $message }}</div>@enderror

    <label>Professor</label>
    <input name="professor" class="form-control mb-2" value="{{ old('professor') }}" required>
    @error('professor')<div class="text-danger">{{ $message }}</div>@enderror

    <label>Schedule</label>
    <input name="schedule" class="form-control mb-2" value="{{ old('schedule') }}" required>
    @error('schedule')<div class="text-danger">{{ $message }}</div>@enderror

    <button class="btn btn-info w-100">Save</button>
  </form>
</div>
@endsection
