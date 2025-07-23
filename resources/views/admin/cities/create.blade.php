@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Add City</h2>

    <form method="POST" action="{{ route('admin.cities.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">City Key (e.g. lefkoşa)</label>
            <input type="text" name="key" class="form-control" required>
        </div>

        @foreach ($languages as $lang)
        <div class="mb-3">
            <label class="form-label">Name ({{ $lang->code }})</label>
            <input type="text" name="name[{{ $lang->id }}]" class="form-control" required>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save City</button>
    </form>
</div>
@endsection
