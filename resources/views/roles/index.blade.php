@extends('layouts.app')

@section('title', 'Daftar Role')

@section('content')
<div class="container">
    <h2>List of Roles</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->role_id }}</td>
                <td>{{ $role->role_name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->role_id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('roles.edit', $role->role_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('roles.destroy', $role->role_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        