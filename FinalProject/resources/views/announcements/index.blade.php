@extends('layouts.main')

@section('title', 'Announcements')

@section('content')
<header class="text-center">
  <h2>Announcements</h2>
  <p>Manage all your announcements here</p>
</header>

<div class="container" style="max-width: 900px; margin: 0 auto;">

  {{-- CREATE / EDIT FORM --}}
  <div class="card p-4 mb-4">
    <h5>{{ isset($announcement) ? 'Edit Announcement' : 'Create Announcement' }}</h5>
    <form action="{{ isset($announcement) ? route('announcements.update', $announcement->id) : route('announcements.store') }}" method="POST">
      @csrf
      @if(isset($announcement))
        @method('PUT')
      @endif
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $announcement->title ?? '' }}" required>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control" rows="3" required>{{ $announcement->body ?? '' }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ isset($announcement) ? 'Update' : 'Create' }}</button>
    </form>
  </div>

  {{-- LIST OF ANNOUNCEMENTS --}}
  <div class="row g-4">
    @foreach($announcements as $ann)
      <div class="col-12">
        <div class="card p-4">
          <h5>{{ $ann->title }}</h5>
          <p>{{ $ann->body }}</p>
          <small class="text-muted">Posted: {{ $ann->created_at->format('M d, Y') }}</small>
          <div class="mt-2">
            <a href="{{ route('announcements.edit', $ann->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('announcements.destroy', $ann->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>
@endsection
