<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'note_tags', 'note_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function editeurs()
    {
        return $this->belongsToMany(Editeur::class, );
    }
}
