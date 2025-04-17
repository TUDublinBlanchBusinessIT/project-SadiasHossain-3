<!DOCTYPE html>
<html>
<head>
    <title>Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Job</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" required>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ $job->company_name }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $job->location }}">
        </div>

        <div class="mb-3">
            <label for="date_applied" class="form-label">Date Applied</label>
            <input type="date" name="date_applied" class="form-control" value="{{ $job->date_applied }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Application Status</label>
            <select name="status" class="form-select">
                <option value="Applied" {{ $job->status == 'Applied' ? 'selected' : '' }}>Applied</option>
                <option value="Interview" {{ $job->status == 'Interview' ? 'selected' : '' }}>Interview</option>
                <option value="Offer" {{ $job->status == 'Offer' ? 'selected' : '' }}>Offer</option>
                <option value="Rejected" {{ $job->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="source_link" class="form-label">Job Link</label>
            <input type="url" name="source_link" class="form-control" value="{{ $job->source_link }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
