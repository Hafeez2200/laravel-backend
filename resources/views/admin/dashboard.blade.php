<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Admin Dashboard</h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <div class="list-group">
            <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">Manage Users</a>
            <a href="{{ route('texts.index') }}" class="list-group-item list-group-item-action">Manage Texts</a>
            <a href="{{ route('settings.index') }}" class="list-group-item list-group-item-action">Manage Settings</a>
            <a href="{{ route('admin.images.index') }}" class="list-group-item list-group-item-action">Manage Images</a>
            <a href="{{ route('admin.cities.index') }}" class="list-group-item list-group-item-action">Manage Cities</a>
            <a href="{{ route('languages.index') }}" class="list-group-item list-group-item-action">Manage Languages</a>
        </div>
    </div>
</body>
</html>
