@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Role Details</h2>
        </div>
        <div class="card-body">
            <p><strong>Role ID:</strong> {{ $role->role_id }}</p>
            <p><strong>Role Name:</strong> {{ $role->role_name }}</p>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
