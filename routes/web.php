<?php

use Illuminate\Support\Facades\Route;


Route::get('login',[\App\Http\Controllers\LoginController::class,'loginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('login',[\App\Http\Controllers\LoginController::class,'login'])
    ->name('signin')
    ->middleware('guest');

Route::get('register',[\App\Http\Controllers\RegisterController::class,'registrationForm'])
    ->name('registrationForm')
    ->middleware('guest');

Route::post('register',[\App\Http\Controllers\RegisterController::class,'register'])
    ->name('register')
    ->middleware('guest');

Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/',function () {
        return 'admin dashboard';
    })->name('home');

    Route::resource('airlines',\App\Http\Controllers\AirlineController::class);
    Route::resource('users',\App\Http\Controllers\UserController::class);
});

Route::get('logout', function () {
   \Illuminate\Support\Facades\Auth::logout();
   return redirect()->route('login');
})->name('logout')->middleware('auth');
