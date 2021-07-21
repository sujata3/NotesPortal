<?php

use App\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('Welcome');
});

Auth::routes();

//Notes and resources routes

Route::get('/login',[App\Http\Controllers\NotesController::class, 'index'])->name('login');

//Route::get('/admin-panel',[App\Http\Controllers\NotesController::class, 'adminPanel'])->name('admin.panel');
Route::get('/home',[App\Http\Controllers\NotesController::class, 'homePage'])->name('home.page')->middleware('auth');
Route::get('/admin/notes',[App\Http\Controllers\NotesController::class, 'viewNotes'])->name('admin.viewNotes')->middleware('auth');

Route::get('/admin/notes/add',[App\Http\Controllers\NotesController::class, 'addNoteForm'])->name('admin.addNotes')->middleware('auth');
Route::post('/admin/notes', [App\Http\Controllers\NotesController::class, 'store'])->name('admin.notes.store')->middleware('auth');



//other routes



Route::get('/download/{file}',[App\Http\Controllers\NotesController::class, 'downloadFile']) ->name('data.download');
Route::get('/view/{id}',[App\Http\Controllers\NotesController::class, 'view']) ->name('data.view');
Route::get('/Update', [App\Http\Controllers\NotesController::class, 'notesUpdateList'])->name('note.update');
Route::get('/Delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('delete.note');
Route::get('/Edit/{id}', [App\Http\Controllers\NotesController::class, 'edit'])->name('edit.note');
Route::post('/UpdateData/{id}', [App\Http\Controllers\NotesController::class, 'updateData'])->name('update.data');


//logout
Route::get('/logout',[App\Http\Controllers\NotesController::class, 'logout'])->name('admin.logout');
