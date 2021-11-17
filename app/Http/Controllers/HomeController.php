<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $notes = Note::all();
        $tags = Tag::all();
        return view('home', compact('notes', 'tags'));
    
    }
}
