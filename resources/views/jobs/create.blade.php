<!DOCTYPE html>
<html>
<head>
    <title>Add New Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Job</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date_applied" class="form-label">Date Applied</label>
            <input type="date" name="date_applied" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Application Status</label>
            <select name="status" class="form-select">
                <option value="Applied">Applied</option>
                <option value="Interview">Interview</option>
                <option value="Offer">Offer</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="source_link" class="form-label">Link to Job Posting</label>
            <input type="url" name="source_link" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Job</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
