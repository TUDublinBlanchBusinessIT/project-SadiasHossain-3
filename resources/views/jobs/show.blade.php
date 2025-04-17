<!DOCTYPE html>
<html>
<head>
    <title>View Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Job Details</h2>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $job->job_title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $job->company_name }}</h6>
            <p><strong>Status:</strong> {{ $job->status }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Date Applied:</strong> {{ $job->date_applied }}</p>
            <p><strong>Link:</strong> 
                @if($job->source_link)
                    <a href="{{ $job->source_link }}" target="_blank">{{ $job->source_link }}</a>
                @else
                    N/A
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('jobs.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
</body>
</html>
