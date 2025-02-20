@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-3">Edit User</h1>
    <form action="{{ route('users.editUser', ['user_id' => $user->user_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="user_name">Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required value="{{ old('user_name', $user->user_name) }}">
                @error('user_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_email">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" required value="{{ old('user_email', $user->user_email) }}">
                @error('user_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_password">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control">
                @error('user_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_type">User Type</label>
                <input type="text" name="user_type" class="form-control" value="{{ old('user_type', $user->user_type ?? 'Customer') }}">
                @error('user_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_status">User Status</label>
                <input type="text" name="user_status" id="user_status" class="form-control" value="{{ old('user_status', $user->user_status) }}">
                @error('user_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_ava">Profile Picture</label>
                <input type="file" name="user_ava" id="user_ava" class="form-control">
                @error('user_ava')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_gender" class="form-label">Gender</label>
                <select class="form-select" id="user_gender" name="user_gender">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('user_gender', $user->user_gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('user_gender', $user->user_gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('user_gender', $user->user_gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('user_gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_lead">Lead</label>
                <input type="text" class="form-control" id="user_lead" name="user_lead" value="{{ old('user_lead', $user->user_lead) }}">
                @error('user_lead')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="role_role_id">Role</label>
                <select name="role_role_id" class="form-select" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->role_id }}" {{ old('role_role_id', $user->role_role_id) == $role->role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save</button>
        
    </form>
</div>
@endsection