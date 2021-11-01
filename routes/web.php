<?php

use App\{Http\Controllers\NewsletterController,
  Http\Controllers\PostController,
  Http\Controllers\PostCommentsController,
  Http\Controllers\RegisterController,
  Http\Controllers\SessionsController
};
use Illuminate\{
  Support\Facades\Route
};

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
