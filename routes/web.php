<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InicioController;

Route::auth();
Route::middleware('guest')->group(function () {
    Route::get('/login',[InicioController::class,'index'])->name('login');
    // Route::post('/login', [LoginController::class,'login']);
});
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');
    Route::view('/{any}', 'dashboard')->where('any', '.*');
    // Route::post('/logout', [LoginController::class,'logout']);
});



