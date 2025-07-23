@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Add New Language</h2>

    <form action="{{ route('languages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Language Name</label>
            <input name="name" class="form-control" required placeholder="e.g., Turkish">
        </div>

        <div class="mb-3">
            <label class="form-label">Language Code</label>
            <input name="code" class="form-control" required placeholder="e.g., tr">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
