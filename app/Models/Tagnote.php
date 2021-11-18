<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagnote extends Model
{
    use HasFactory;
    protected $table = "note_tags";

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
