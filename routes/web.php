<?php

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

use App\Http\Controllers\PracticeController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);


use App\Http\Controllers\MovieController;

Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies.index');
Route::get('/admin/movies/create', [MovieController::class, 'createMovie'])->name('admin.movies.create');
Route::post('/admin/movies/store', [MovieController::class, 'storeMovie'])->name('admin.movies.store');
Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'editMovie'])->name('admin.movies.edit');
Route::patch('/admin/movies/{movie}/update', [MovieController::class, 'updateMovie'])->name('admin.movies.update');
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'destroyMovie'])->name('admin.movies.destroy');


//adminでない映画一覧ページ
Route::get('/movies', [MovieController::class, 'getMovie'])->name('movies.index');