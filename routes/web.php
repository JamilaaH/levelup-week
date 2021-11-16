<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $notes = Note::all();
    $tags = Tag::all();
    return view('home', compact('notes', 'tags'));
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('/notes-likes', [NoteController::class, 'likes'])->name('like.index');
    //tag
    Route::get('/creer-tag', [TagController::class, 'create'])->name('create.tag');
    Route::post('/store-tag', [TagController::class, 'store'])->name('store.tag');
    Route::get('/edit-tag/{id}', [TagController::class, 'edit'])->name('edit.tag');
    Route::put('/update-tag/{id}', [TagController::class, 'update'])->name('update.tag');
});
