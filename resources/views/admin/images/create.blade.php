@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Upload New Image</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Image Label (optional)</label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Login Banner">
        </div>

        <div class="mb-3">
            <label class="form-label">Image File (PNG/JPG/WEBP)</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
