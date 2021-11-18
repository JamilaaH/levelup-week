<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\Tagnote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $notes = Note::paginate(6)->sortByDesc('likes');
        $tags = Tag::all();
        return view('home', compact('notes', 'tags'));
    
    }

    public function showtag(Tag $id)
    {
        $untag = $id;
        $notes =  Tagnote::where('tag_id', $untag->id)->get();
        $tags = Tag::all();

        return view('showtag', compact('notes','tags', 'untag'));
    }

    public function profil()
    {
        return view("back.profil.index");
    }
}
