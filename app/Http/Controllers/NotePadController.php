<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;

class NotePadController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $notes = Auth::user()->notes;

        return view('site.notepad.index', compact('notes', 'user'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('site.notepad.create', compact('user'));
    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Anotação criada com sucesso!');
    }

    public function edit(Note $note)
    {
        $user = Auth::user();

        return view('site.notepad.edit', compact('note', 'user'));
    }

    public function update(Request $request, Note $note)
    {
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Anotação atualizada com sucesso!');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Anotação excluída com sucesso!');
    }
}
