@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Note</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf

        <!-- Title Field (required for validation and database) -->
        <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <!-- Content Field -->
        <div class="mb-3">
            <label for="note_content" class="form-label">Note Content</label>
            <textarea name="note_content" id="note_content" class="form-control" rows="4" required>{{ old('note_content') }}</textarea>
        </div>


        <!-- Date Field -->
        <div class="mb-3">
            <label for="note_date" class="form-label">Note Date (optional)</label>
            <input type="date" name="note_date" id="note_date" class="form-control" value="{{ old('note_date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Note</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Jobs</a>
    </form>
</div>
@endsection
