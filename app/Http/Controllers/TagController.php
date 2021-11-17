<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function create()
    {
        return view('back.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
        ]);

        $tag = new Tag();
        $tag->nom = $request->nom;
        $tag->user_id = Auth::user()->id;
        $tag->save();
        return redirect()->route('dashboard');
    }

    public function edit(Tag $id)
    {
        $tag = $id;
        return view('back.tag.edit', compact('tag'));
    }

    public function update(Tag $id, Request $request)
    {
        $tag = $id;
        $tag->nom = $request->nom;
        $tag->save();
        return redirect()->route('dashboard');

    }

    public function destroy(Tag $id)
    {
        $tag = $id;
        $tag->delete();
        return redirect()->back();
    }
}
