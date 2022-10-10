<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/home', function () {
    return view('welcome');
});
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout']);


