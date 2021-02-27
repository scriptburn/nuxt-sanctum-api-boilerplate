<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;



Route::post('/register', RegisterController::class.'@register');
Route::post('/auth/login', LoginController::class);
Route::post('/auth/logout', LogoutController::class);

Route::middleware(['auth:api'])->group(function ()
{

	Route::get('/auth/user', ProfileController::class.'@me');
});