@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detail Action</h3>
        </div>
        <div class="card-body">
            <p><strong>Action ID:</strong> {{ $action->action_id }}</p>
            <p><strong>Action Name:</strong> {{ $action->action_name }}</p>
            <p><strong>Action Status:</strong> {{ $action->action_status }}</p>
            <p><strong>Role:</strong> {{ $action->role->role_name }}</p>
            <a href="{{ route('actions.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
