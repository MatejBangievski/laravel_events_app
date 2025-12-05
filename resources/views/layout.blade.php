<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Event System</a>
        <div>
            <a href="{{ route('organizers.index') }}" class="btn btn-light btn-sm">Organizers</a>
            <a href="{{ route('events.index') }}" class="btn btn-light btn-sm">Events</a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
