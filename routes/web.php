<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SettingsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', [PostController::class, 'index'])->name('home');

// Posts
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

// Newsletter
Route::post('newsletter', NewsletterController::class);

// guest
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [SessionsController::class, 'create']);
    Route::post('login', [SessionsController::class, 'store']);
});

// auth
Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionsController::class, 'destroy']);

    Route::get('account/{user:username}', [AccountController::class, 'index'])->name('account');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
});

// Admin
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class);
});

