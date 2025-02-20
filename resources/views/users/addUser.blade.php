@extends('layouts.app')

@section('content')
<div class="container mt-1">
    <h2 class="text-center mb-3">User Information Form</h2>
    <form action="{{ route('users.addUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="user_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}">
                @error('user_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ old('user_email') }}">
                @error('user_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password">
                @error('user_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_type" class="form-label">User Type</label>
                <input type="text" class="form-control" name="user_type" value="{{ old('user_type', $user->user_type ?? 'Customer') }}">
                @error('user_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_status" class="form-label">User Status</label>
                <input type="text" class="form-control" id="user_status" name="user_status" value="{{ old('user_status') }}">
                @error('user_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_ava" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="user_ava" name="user_ava" >
                @error('user_ava')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_gender" class="form-label">Gender</label>
                <select class="form-select" id="user_gender" name="user_gender" value="{{ old('user_gender') }}">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('user_gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="user_lead" class="form-label">Lead</label>
                <input type="text" class="form-control" id="user_lead" name="user_lead" value="{{ old('user_lead') }}">
                @error('user_lead')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="role_role_id" class="form-label">Role</label>
                    <select name="role_role_id" class="form-select" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                @error('role_role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection