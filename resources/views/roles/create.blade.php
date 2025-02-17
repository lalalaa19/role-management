@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Role</h2>
    
    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="role_name">Role Name:</label>
            <input type="text" id="role_name" name="role_name" class="form-control" value="{{ old('role_name') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
