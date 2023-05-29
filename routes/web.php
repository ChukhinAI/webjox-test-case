<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

Route::get('posts', [PostController::class, 'index'])->name('posts.index')->middleware(['role:admin|moderator']);
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(['role:admin|moderator']);
Route::put('posts{post}', [PostController::class, 'update'])->name('posts.update')->middleware(['role:admin|moderator']);
Route::get('posts.create', [PostController::class, 'create'])->name('posts.create')->middleware(['role:admin']);
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['role:admin']);
Route::post('posts.store', [PostController::class, 'store'])->name('posts.store')->middleware(['role:admin']);

