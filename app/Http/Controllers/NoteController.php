<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function likes()
    {
        $notes = Auth::user()->likes;
        return view('back.like', compact('notes'));
    }
}
