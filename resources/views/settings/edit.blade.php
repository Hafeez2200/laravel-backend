@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Edit Setting</h2>
    <form method="POST" action="/admin/settings/{{ $setting->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Key</label>
            <input name="key" class="form-control" value="{{ $setting->key }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Value</label>
            <input name="value" class="form-control" value="{{ $setting->value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
