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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Notes', [App\Http\Controllers\NotesController::class, 'get']);
Route::post('/Notes',[App\Http\Controllers\NotesController::class, 'store']) ->name('data.store');

Route::get('/Show',[App\Http\Controllers\NotesController::class, 'Show']) ->name('data.show');
Route::get('/download/{file}',[App\Http\Controllers\NotesController::class, 'download']) ->name('data.download');
Route::get('/view/{id}',[App\Http\Controllers\NotesController::class, 'view']) ->name('data.view');
Route::get('/Update', [App\Http\Controllers\NotesController::class, 'update'])->name('note.update');
Route::get('/Delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('delete.note');
Route::get('/Edit/{id}', [App\Http\Controllers\NotesController::class, 'edit'])->name('edit.note');
