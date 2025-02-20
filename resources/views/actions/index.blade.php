@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Actions List</h1>
    <a href="{{ route('actions.addAction') }}" class="btn btn-primary">Add Action</a>
    <table class="table table-bordered">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>Action ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actions as $action)
                <tr>
                    <td>{{ $action->action_id }}</td>
                    <td>{{ $action->action_name }}</td>
                    <td>{{ $action->action_status }}</td>
                    <td>{{ $action->role->role_name }}</td>
                    <td>
                        <a href="{{ route('actions.viewAction', ['action_id' => $action->action_id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('actions.editAction', ['action_id' => $action->action_id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('actions.deleteAction', ['action_id' => $action->action_id]) }}" method="POST" style="display:inline;">
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