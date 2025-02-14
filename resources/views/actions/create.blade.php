@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Action</h1>
    <form action="{{ route('actions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="action_name">Action Name</label>
            <input type="text" name="action_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="action_status">Action Status</label>
            <input type="text" name="action_status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role_role_id">Role</label>
            <select name="role_role_id" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection