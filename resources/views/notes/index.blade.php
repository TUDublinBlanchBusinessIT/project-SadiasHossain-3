@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">My Notes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('notes.create') }}" class="btn btn-success mb-3">Add New Note</a>
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary mb-3">Back to Job List</a>


    @if($notes->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Note Content</th>
                    <th>Note Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->note_content }}</td>
                        <td>{{ $note->note_date }}</td>
                        <td>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this note?')">
                                    Delete
                                </button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    
        <p>No notes found. Create one!</p>
    @endif
</div>
@endsection
