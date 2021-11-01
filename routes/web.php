<?php

use App\{
  Http\Controllers\PostController,
  Http\Controllers\PostCommentsController,
  Http\Controllers\RegisterController,
  Http\Controllers\SessionsController
};
use Illuminate\{
  Support\Facades\Route,
  Validation\ValidationException
};
use MailchimpMarketing\ApiClient;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', function () {
  request()->validate(['email' => ['required', 'email']]);

  $mailchimp = new ApiClient();

  $mailchimp->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us5'
  ]);

  try {
    $mailchimp->lists->addListMember("2036167f13", [
      "email_address" => request('email'),
      "status" => 'subscribed',
    ]);
  } catch (Exception $e) {
    throw ValidationException::withMessages([
      'email' => 'This email could not be added to the list.'
    ]);
  }

  return redirect('/')
    ->with('success', 'Subscribed!');
});
