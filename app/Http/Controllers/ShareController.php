<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\Tagnote;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function index()
    {
        return view('back.share.index');
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


}
