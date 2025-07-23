@extends('layouts.simple')

@section('content')
<div class="container py-5">
    <h2>Logs for {{ $user->name }}</h2>
    <ul class="list-group">
    @foreach ($logs as $log)
        <li class="list-group-item">{{ $log->clicked_at }} - {{ $log->image_url }}</li>
    @endforeach
    </ul>
</div>
@endsection
