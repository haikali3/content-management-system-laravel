<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['auth'])->group(function () {
  Route::get('home', [HomeController::class, 'index'])->name('home'); //format like this go
  Route::resource('categories', CategoriesController::class);
  Route::resource('posts', PostsController::class);
  Route::resource('tags', TagsController::class);
  Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
  Route::put('restore-posts/{post}', [PostsController::class, 'restore'])->name('restore-posts');

});

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('users', [UsersController::class, 'index'])->name('users.index'); //add use above
});
