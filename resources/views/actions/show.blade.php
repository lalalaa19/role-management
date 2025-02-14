@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Detail Action</h3>
        </div>
        <div class="card-body">
            <p><strong>Action Name:</strong> {{ $action->action_name }}</p>
            <p><strong>Action Status:</strong> {{ $action->status }}</p>
            <a href="{{ route('actions.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
