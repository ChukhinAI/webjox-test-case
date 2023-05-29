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

/*
Route::prefix('admin')->middleware(['middleware' => ['role:admin']])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});
*/

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

    Route::resource('posts', PostController::class);
    Route::get('posts.create', [PostController::class, 'create']); // мб убрать
    Route::get('posts.delete', [PostController::class, 'delete']); // мб убрать
});

/*
Route::middleware(['role:moderator'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

    //Route::resource('posts', PostController::class);
    Route::get('posts', [PostController::class, 'index']);
    // Route::get('admin_panel.posts.edit', [PostController::class, 'edit']); // no
    //Route::get('admin_panel.posts', [PostController::class, 'edit']); // no
    //Route::get('posts.edit', [PostController::class, 'edit']); // no
    //Route::get('posts.update', [PostController::class, 'update']);
    //Route::get('posts.store', [PostController::class, 'store']);
});
*/
