@extends('layouts.app')

@section('content')
<div class="card mt-3 mx-auto " style="max-width: 700px;">
    <div class="card-header fw-bold text-center">Personal Information</div>
    <div class="card-body">
        <div class="d-flex align-items-start">
            @if ($user->user_ava)
                <img src="{{ asset('storage/' . $user->user_ava) }}" 
                     alt="Profile Picture" 
                     class="border img-thumbnail me-4" 
                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; aspect-ratio: 1/1;">
            @else
                <div class="me-3 text-muted">No Image</div>
            @endif
            <div class="w-100">
                <div class="row">
                    <div class="col-6">
                        <p><strong>ID:</strong> {{ $user->user_id }}</p>
                        <p><strong>Name:</strong> {{ $user->user_name }}</p>
                        <p><strong>Email:</strong> <span class="text-break">{{ $user->user_email }}</span></p>
                        <p><strong>Gender:</strong> {{ $user->user_gender ?? 'N/A' }}</p>
                    </div>
                    <div class="col-6">
                        <p><strong>Type:</strong> {{ $user->user_type ?? 'N/A' }}</p>
                        <p><strong>Status:</strong> {{ $user->user_status ?? 'N/A' }}</p>
                        <p><strong>Role:</strong> {{ $user->role_role_id ?? 'N/A' }}</p>
                        <p><strong>Lead:</strong> {{ $user->user_lead ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
