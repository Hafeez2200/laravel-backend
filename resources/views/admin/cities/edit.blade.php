@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Edit City: {{ $city->key }}</h2>

    <form method="POST" action="{{ route('admin.cities.update', $city) }}">
        @csrf
        @method('PUT')

        @foreach ($languages as $lang)
        <div class="mb-3">
            <label class="form-label">Name ({{ $lang->code }})</label>
            <input
                type="text"
                name="name[{{ $lang->id }}]"
                class="form-control"
                value="{{ old('name.' . $lang->id, $translations[$lang->id] ?? '') }}"
                required
            >
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Update City</button>
    </form>
</div>
@endsection
