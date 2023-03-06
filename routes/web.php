<?php

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

use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todoes', [TodoController::class, 'index'])->name('todoes.index');
Route::get('/todoes/create', [TodoController::class, 'create'])->name('todoes.create');
Route::post('/todoes', [TodoController::class, 'store'])->name('todoes.store');
Route::get('/todoes/{todo}', [TodoController::class, 'show'])->name('todoes.show');
Route::get('/todoes/{todo}/edit', [TodoController::class, 'edit'])->name('todoes.edit');
Route::patch('/todoes/{todo}', [TodoController::class, 'update'])->name('todoes.update');
