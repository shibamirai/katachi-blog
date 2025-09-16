<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->middleware('guest');
    Route::post('login', 'authenticate')->middleware('guest');
    Route::post('logout', 'destroy')->middleware('auth');
});
