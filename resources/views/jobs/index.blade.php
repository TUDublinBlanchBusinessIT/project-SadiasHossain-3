@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center fw-bold display-6">My Job Applications</h1>

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
                <td class="d-flex flex-column gap-1">
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <!-- Add Note Button -->
                    <a href="{{ route('notes.create', ['job_id' => $job->id]) }}" class="btn btn-success btn-sm">Add Note</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
