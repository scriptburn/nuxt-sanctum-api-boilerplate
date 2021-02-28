<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScalesrepApiController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class.'@register');
Route::post('/auth/login', LoginController::class)->name('login');
Route::post('/auth/logout', LogoutController::class);
Route::any('/search/{keyword}', ScalesrepApiController::class.'@search');

Route::middleware(['auth:api'])->group(function ()
{
	Route::get('/auth/user', ProfileController::class.'@me');

});
