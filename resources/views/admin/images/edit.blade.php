@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Edit Image</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="{{ asset('storage/' . $image->file_path) }}" width="200">
        </div>

        <div class="mb-3">
            <label class="form-label">Label</label>
            <input type="text" name="name" value="{{ $image->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Replace Image (optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
