@extends('layouts.main')
@section('title','Edit Announcement')
@section('content')
<div class="container" style="max-width:650px">
  <h3 class="accent text-center mb-3">Edit Announcement</h3>

  <form action="{{ route('announcements.update',$announcement) }}" method="POST">
    @csrf @method('PUT')
    <label>Title</label>
    <input name="title" class="form-control mb-2" value="{{ old('title',$announcement->title) }}" required>
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror

    <label>Body</label>
    <textarea name="body" class="form-control mb-2" rows="5" required>{{ old('body',$announcement->body) }}</textarea>
    @error('body')<div class="text-danger">{{ $message }}</div>@enderror

    <button class="btn btn-warning w-100">Update</button>
  </form>
</div>
@endsection
