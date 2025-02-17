@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Action</h1>
    <form action="{{ route('actions.update', $action->action_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="action_name">Action Name</label>
            <input type="text" name="action_name" class="form-control" value="{{ $action->action_name }}" required>
        </div>
        <div class="form-group">
            <label for="action_status">Action Status</label>
            <input type="text" name="action_status" class="form-control" value="{{ $action->action_status }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="role_role_id">Role</label>
            <select name="role_role_id" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->role_id }}" {{ $action->role_role_id == $role->role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection