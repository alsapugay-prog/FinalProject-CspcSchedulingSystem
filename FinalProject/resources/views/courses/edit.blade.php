@extends('layouts.main')
@section('title','Edit Class')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card border-0 shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
          <h3 class="mb-0 fw-bold">✏️ Edit Class</h3>
        </div>
        <div class="card-body p-4">

          <form action="{{ route('courses.update',$course) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <!-- Subject -->
            <div class="form-floating mb-4">
              <input id="subject" name="subject" type="text"
                class="form-control rounded-3 @error('subject') is-invalid @enderror"
                value="{{ old('subject',$course->subject) }}" placeholder="Subject" required>
              <label for="subject">Subject</label>
              @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Professor & Schedule -->
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input id="professor" name="professor" type="text"
                    class="form-control rounded-3 @error('professor') is-invalid @enderror"
                    value="{{ old('professor',$course->professor) }}" placeholder="Professor" required>
                  <label for="professor">Professor</label>
                  @error('professor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input id="schedule" name="schedule" type="text"
                    class="form-control rounded-3 @error('schedule') is-invalid @enderror"
                    value="{{ old('schedule',$course->schedule) }}" placeholder="Schedule" required>
                  <label for="schedule">Schedule</label>
                  @error('schedule')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>

            <!-- Submit -->
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary btn-lg rounded-3 shadow-sm">
                <i class="bi bi-save me-2"></i> Update Class
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection