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
        $validated = $request->validate([
            'note_content' => 'required|string', // Ensure note_content is required
        ]);

    // Create a new note for the logged-in user
        $note = new Note();
        $note->user_id = Auth::id(); // Set the logged-in user ID
        $note->note_content = $request->note_content;
        $note->note_date = $request->note_date; // Optional date field
        $note->save(); // Save the note to the database

    // Redirect back to notes index with a success message
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
