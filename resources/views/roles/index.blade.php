@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Roles</h1>
    <a href="{{ route('roles.addRole') }}" class="btn btn-primary">Add New Role</a>
    
    <table class="table table-bordered ">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                        <a href="{{ route('roles.viewRole', ['role_id' => $role->role_id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('roles.editRole', ['role_id' => $role->role_id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('roles.deleteRole', ['role_id' => $role->role_id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection
        