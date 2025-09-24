<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::middleware('can:edit,comment')->group(function () {
    Route::patch('comments/{comment}', [CommentController::class, 'update']);
    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->middleware('guest');
    Route::post('login', 'authenticate')->middleware('guest');
    Route::post('logout', 'destroy')->middleware('auth');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'create')->middleware('guest');
    Route::post('register', 'store')->middleware('guest');
});

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
