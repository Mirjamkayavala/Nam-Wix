
<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Notifications</h1>

        @if ($notifications->isEmpty())
            <p>No notifications found.</p>
        @else
    
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        @if ($notification->read_at)
                            <span class="badge bg-secondary">Read</span>
                        @else
                            <span class="badge bg-primary">New</span>
                        @endif
                        <span>{{ $notification->data['message'] }}</span>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ url('/') }}" class="btn btn-success mt-3">Home</a>
    </div>
</body>
</html>
