@extends('layouts.main')
@section('title','Add Announcement')
@section('content')
<div class="container" style="max-width:650px">
  <h3 class="accent text-center mb-3">Add Announcement</h3>

  <form action="{{ route('announcements.store') }}" method="POST">
    @csrf
    <label>Title</label>
    <input name="title" class="form-control mb-2" required>
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror

    <label>Body</label>
    <textarea name="body" class="form-control mb-2" rows="5" required></textarea>
    @error('body')<div class="text-danger">{{ $message }}</div>@enderror

    <button class="btn btn-info w-100">Save</button>
  </form>
</div>
@endsection
