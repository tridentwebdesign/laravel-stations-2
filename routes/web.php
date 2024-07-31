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

// 映画詳細ページのルート
Route::get('/admin/movies/{id}', [MovieController::class, 'show'])->name('admin.movies.show');

// 特定の映画のスケジュールページのルート
Route::get('/admin/movies/{id}/schedules', [MovieController::class, 'schedules'])->name('admin.movies.schedules');

//adminでない映画一覧ページ
Route::get('/movies', [MovieController::class, 'getMovie'])->name('movies.index');

//映画詳細ページ
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// スケジュール一覧ページのルート
Route::get('/admin/schedules', [MovieController::class, 'indexSchedules'])->name('admin.schedules.index');



//座席一覧ページ
use App\Http\Controllers\SheetController;

Route::get('/sheets', [SheetController::class, 'index'])->name('sheets.index');


use App\Http\Controllers\ScheduleController;

// スケジュール管理
Route::get('/admin/schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
Route::get('/admin/schedules/{id}', [ScheduleController::class, 'show'])->name('admin.schedules.show');
Route::get('/admin/movies/{movie_id}/schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
Route::post('/admin/movies/{movie_id}/schedules/store', [ScheduleController::class, 'store'])->name('admin.schedules.store');
Route::get('/admin/schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
Route::patch('/admin/schedules/{id}/update', [ScheduleController::class, 'update'])->name('admin.schedules.update');
Route::delete('/admin/schedules/{id}/destroy', [ScheduleController::class, 'destroy'])->name('admin.schedules.destroy');


