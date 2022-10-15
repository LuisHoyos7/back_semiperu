<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InicioController;

Route::middleware('guest')->group(function () {
    Route::get('/login',[InicioController::class,'index'])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');
    Route::get('/dashboard', function () {
        return view('home');
    });
    Route::view('/{any}', 'dashboard')->where('any', '.*');
});

Route::auth();


