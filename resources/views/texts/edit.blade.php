@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Edit Text</h2>
    <form method="POST" action="{{ route('texts.update', $text) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Key</label>
            <input name="key" class="form-control" value="{{ $text->key }}" required>
        </div>

        @foreach($languages as $language)
        <div class="mb-3">
            <label class="form-label">{{ $language->name }} Text</label>
            <input name="translations[{{ $language->id }}]" class="form-control"
                   value="{{ $translations[$language->id] ?? '' }}">
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
