@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Role Details</h2>
    <p><strong>ID:</strong> {{ $role->role_id }}</p>
    <p><strong>Role Name:</strong> {{ $role->role_name }}</p>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
