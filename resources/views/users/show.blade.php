@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="fw-bold">Personal Information</h5>
    </div>
    <div class="card-body text-center">
        <div class="mb-3">
            @if ($user->user_ava)
                <img src="{{ asset('storage/' . $user->user_ava) }}" alt="Profile Picture" class="img-thumbnail" style="max-width: 150px;">
            @else
                <p>N/A</p>
            @endif
        </div>
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6 text-start">
                <p><strong>User ID:</strong> {{ $user->user_id }}</p>
                <p><strong>Name:</strong> {{ $user->user_name }}</p>
                <p><strong>Email:</strong> {{ $user->user_email }}</p>
                <p><strong>Gender:</strong> {{ $user->user_gender ?? 'N/A' }}</p>
            </div>
            <!-- Right Column -->
            <div class="col-md-6 text-start">
                <p><strong>User Type:</strong> {{ $user->user_type ?? 'N/A' }}</p>
                <p><strong>User Status:</strong> {{ $user->user_status ?? 'N/A' }}</p>
                <p><strong>Role ID:</strong> {{ $user->role_role_id ?? 'N/A' }}</p>
                <p><strong>Lead:</strong> {{ $user->user_lead ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection