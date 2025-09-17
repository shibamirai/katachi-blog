<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->middleware('guest');
    Route::post('login', 'authenticate')->middleware('guest');
    Route::post('logout', 'destroy')->middleware('auth');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'create')->middleware('guest');
    Route::post('register', 'store')->middleware('guest');
});
