<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    Route::ressources([
//        'posts' => PostController::class,
//        'categories' => CategoryController::class,
//    ]);

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('id');
    Route::get('/posts/create',  [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('id');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('id');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->whereNumber('id');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show')->whereNumber('id');
    Route::get('/categories/create',  [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->whereNumber('id');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->whereNumber('id');



});

require __DIR__.'/auth.php';

//
// TODO : Faire le layout form
//
