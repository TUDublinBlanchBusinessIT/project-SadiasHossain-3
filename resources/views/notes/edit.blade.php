@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Note</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="note_content" class="form-label">Note Content</label>
            <textarea name="note_content" id="note_content" class="form-control" rows="4" required>{{ old('note_content', $note->note_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="note_date" class="form-label">Note Date (optional)</label>
            <input type="date" name="note_date" id="note_date" class="form-control" value="{{ old('note_date', $note->note_date) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Note</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
