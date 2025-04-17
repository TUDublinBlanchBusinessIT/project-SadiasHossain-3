<!DOCTYPE html>
<html>
<head>
    <title>Job Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">My Job Applications</h1>

    <a href="{{ route('jobs.create') }}" class="btn btn-success mb-3">Add New Job</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Status</th>
                <th>Date Applied</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->company_name }}</td>
                <td>{{ $job->status }}</td>
                <td>{{ $job->date_applied }}</td>
                <td>
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
