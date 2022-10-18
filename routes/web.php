<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\HomeController;

Route::middleware('guest')->group(function () {
    Route::get('/',[InicioController::class,'index'])->name('login');
});
Route::auth();
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('home');
    // });
    // Route::view('/{any}', 'dashboard')->where('any', '.*');

    Route::get('/{view?}', [HomeController::class,'index'])->where('view', '(.*)')->name('landing');
});




