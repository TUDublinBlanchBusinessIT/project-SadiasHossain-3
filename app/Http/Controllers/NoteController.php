<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Show all notes for the logged-in user
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return view('notes.index', compact('notes'));
    }

    // Show form to create a new note
    public function create()
    {
        return view('notes.create');
    }

    // Store a new note in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string',
            'note_content' => 'required|string', 
            'note_date' => 'nullable|date',
        ]);

        // Create and store the note
        Note::create([
            'user_id' => Auth::id(), 
            'title' => $request->title,
            'note_content' => $request->note_content, 
            'note_date' => $request->note_date,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    // Show form to edit a note
    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notes.edit', compact('note'));
    }

    // Update an existing note
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string',
            'note_content' => 'required|string',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    // Delete a note
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
