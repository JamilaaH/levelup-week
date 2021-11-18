<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use App\Models\Like;
use App\Models\Note;
use App\Models\Tag;
use App\Models\Tagnote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function meslikes()
    {
        $notes = Auth::user()->likes;
        return view('back.like', compact('notes'));
    }

    public function create()
    {
        $tags = Tag::where('user_id', Auth::user()->id)->get();
        return view('back.notes.create', compact('tags'));
    }

    public function store(Request $request )
    {
        $request->validate([
            "titre"=>'required', 
            'editeur'=>'required',
            'tag'=>"required"
        ]);

        $note = new Note();
        $note->post = $request->editeur;
        $note->titre = $request->titre;
        $note->user_id = Auth::user()->id;
        $note->save();

        $tag = new Tagnote();
        $tag->note_id = $note->id;
        $tag->tag_id = $request->tag;
        $tag->save();
        return redirect()->route('dashboard');
    }

    public function edit(Note $id)
    {
        $note = $id;
        $tags = Tag::all();
        return view('back.notes.edit', compact('note', 'tags'));
        
    }

    public function update(Note $id, Request $request)
    {
        $note = $id ;
        $note->post = $request->editeur;
        $note->titre = $request->titre;
        $note->user_id = Auth::user()->id;
        $note->save();
        // ecrire l'update du tag
        $oldtag = Tagnote::where('note_id', $note->id)->first();
        $oldtag->delete();
        $newtag = new Tagnote();
        $newtag->note_id = $note->id;
        $newtag->tag_id = $request->tag;
        $newtag->save();
        return redirect()->route('dashboard');

    }

    
    public function show(Note $id)
    {
        $note = $id;
        $meslikes = Like::all()->where('note_id', $note->id);
        return view ('back.notes.show', compact('note', 'meslikes'));
    }

    public function destroy(Note $id)
    {
        $note = $id;
        $note->delete();
        return redirect()->route('dashboard');
    }

    public function like(Note $id)
    {
        $note = $id;
        $like = new Like();
        $like->note_id = $note->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return redirect()->back();
    }

    public function dislike(Note $id)
    {
        $note = $id;
        $like = Like::where('note_id', $note->id)->where('user_id', Auth::user()->id)->first();
        $like->delete();
        return redirect()->back();
    }

    public function share(Note $id, Request $request)
    {

        $note = $id;
        $editeur = new Editeur();
        $editeur->user_id = $request->share;
        $editeur->note_id = $note->id;
        $editeur->save();
        return redirect()->back();
    }
}
