<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ShareController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tag/{id}', [HomeController::class, 'showtag'])->name('tag');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('/notes-likes', [NoteController::class, 'meslikes'])->name('like.index');
    //tag
    Route::get('/creer-tag', [TagController::class, 'create'])->name('create.tag');
    Route::post('/store-tag', [TagController::class, 'store'])->name('store.tag');
    Route::get('/edit-tag/{id}', [TagController::class, 'edit'])->name('edit.tag');
    Route::put('/update-tag/{id}', [TagController::class, 'update'])->name('update.tag');
    Route::delete('/delete-tag/{id}', [TagController::class, 'destroy'])->name('destroy.tag');
    //notes
    Route::get('/creer-note', [NoteController::class, 'create'])->name('create.note');
    Route::post('/store-note', [NoteController::class, 'store'])->name('store.note');
    Route::get('/edit-note/{id}', [NoteController::class, 'edit'])->name('edit.note');
    Route::put('/update-note/{id}', [NoteController::class, 'update'])->name('update.note');
    Route::get('/show-note/{id}', [NoteController::class, 'show'])->name('show.note');
    Route::delete('/delete-note/{id}', [NoteController::class, 'destroy'])->name('destroy.note');

    //btn share notes 
    Route::post('/share/{id}', [NoteController::class, 'share'])->name('share');
    //partagé avec moi
    Route::get('/share-with-me', [ShareController::class, 'index'])->name("share.index");
    Route::get('/share/edit-note/{id}', [ShareController::class, 'edit'])->name('edit.share');
    Route::put('/share/update-note/{id}', [ShareController::class, 'update'])->name('update.share');

    // bouton J'aime
    Route::post('/like/{id}' , [NoteController::class, 'like'])->name('like');
    Route::delete('/dislike/{id}' , [NoteController::class, 'dislike'])->name('dislike');

    //profil
    Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
});
