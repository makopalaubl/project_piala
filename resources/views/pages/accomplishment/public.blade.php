<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accomplishment Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <div class="container">
        <h3 class="mb-4">Accomplishment Details</h3>

        <div class="card">
            <div class="card-body">
                <h5>{{ $item->event_name }}</h5>
                <p><strong>Member:</strong> {{ $item->member->full_name ?? '-' }}</p>
                <p><strong>Level:</strong> {{ $item->level }}</p>
                <p><strong>Type:</strong> {{ $item->type }}</p>
                <p><strong>Organizer:</strong> {{ $item->organizer }}</p>
                <p><strong>Rank:</strong> {{ $item->rank }}</p>
                <p><strong>Award:</strong> {{ $item->awards['type'] ?? '-' }}</p>
                <p><strong>Duration:</strong> {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</p>

                @if($item->image_url)
                    <img src="{{ asset('storage/' . $item->image_url) }}" class="img-fluid mt-3" style="max-height: 300px;">
                @endif
            </div>
        </div>
    </div>
</body>
</html>