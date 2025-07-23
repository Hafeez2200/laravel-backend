@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Create Text</h2>
    <form method="POST" action="{{ route('texts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Key</label>
            <input name="key" class="form-control" required>
        </div>

        @foreach($languages as $language)
        <div class="mb-3">
            <label class="form-label">{{ $language->name }} Text</label>
            <input name="translations[{{ $language->id }}]" class="form-control">
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
