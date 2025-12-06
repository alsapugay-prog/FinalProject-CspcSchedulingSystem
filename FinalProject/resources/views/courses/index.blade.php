@extends('layouts.main')
@section('title','Classes')

@push('styles')
<style>
  .text-gradient {
    background: linear-gradient(to right, #007bff, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .hover-card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease;
  }
</style>
@endpush

@section('content')

<div class="container py-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold text-gradient"> My Classes</h2>
    <p class="text-muted">Overview of enrolled subjects</p>
    <a href="{{ route('courses.create') }}" class="btn btn-outline-primary btn-lg mt-3 shadow-sm">
      <i class="bi bi-plus-circle me-1"></i> Add Class
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success text-center shadow-sm rounded-3">
      {{ session('success') }}
    </div>
  @endif

  <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
    @foreach($courses as $c)
      <div class="col">
        <div class="card border-0 shadow-lg rounded-4 h-100 position-relative hover-card bg-light">
          <div class="card-body p-4">
            <!-- Action buttons -->
            <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
              <a href="{{ route('courses.edit',$c) }}" class="btn btn-sm btn-warning rounded-pill px-3">
                <i class="bi bi-pencil-square"></i> Edit
              </a>
              <form action="{{ route('courses.destroy',$c) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger rounded-pill px-3">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </form>
            </div>

            <!-- Class info -->
            <h4 class="fw-bold text-primary mb-3">{{ $c->subject }}</h4>
            <p class="mb-2"><i class="bi bi-person-badge me-2"></i><strong>Professor:</strong> {{ $c->professor }}</p>
            <p><i class="bi bi-calendar-event me-2"></i><strong>Schedule:</strong> {{ $c->schedule }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection