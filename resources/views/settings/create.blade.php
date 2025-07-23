@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Create Setting</h2>
    <form method="POST" action="/admin/settings">
        @csrf
        <div class="mb-3">
            <label class="form-label">Key</label>
            <input name="key" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Value</label>
            <input name="value" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

