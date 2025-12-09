@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3>📧 Send Request to Admin</h3>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Request form --}}
    <form action="{{ route('request.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <textarea name="message" class="form-control" rows="4" placeholder="Write your request..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            Send Request
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Auto-dismiss success alert after 3 seconds
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.remove();
        }
    }, 3000);

    // Add loading spinner to button on submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const btn = this.querySelector('button[type="submit"]');
        const spinner = btn.querySelector('.spinner-border');
        spinner.classList.remove('d-none');
        btn.setAttribute('disabled', 'true');
    });
</script>
@endpush