<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/book/create', [BookController::class, 'create'])->name('books.create');
Route::post('/book', [BookController::class, 'store'])->name('books.store');
Route::put('/book/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/book/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/book/search', [BookController::class, 'search'])->name('books.search');