@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-2">Users</h1>

    <!-- Add New User Button -->
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

    <!-- Search Form -->
    <form action="{{ route('users.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    <!-- Users Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Status</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_email }}</td>
                <td>{{ $user->user_type }}</td>
                <td>{{ $user->user_status }}</td>
                <td>{{ $user->user_gender }}</td>
                <td>{{ $user->role_role_id }}</td>
                <td>
                    <a href="{{ route('users.show', ['user' => $user->user_id]) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('users.edit', ['user' => $user->user_id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection