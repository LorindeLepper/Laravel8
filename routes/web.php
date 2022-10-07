<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', [PostController::class, 'index'])->name('home');

// Posts
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

// Newsletter
Route::post('newsletter', NewsletterController::class);

// User
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class);
});

// Account
Route::get('account', [AccountController::class, 'index'])->middleware('auth');

Route::get('settings', [AccountController::class, 'settings'])->middleware('auth');
Route::post('settings', [AccountController::class, 'update'])->middleware('auth');
