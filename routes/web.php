<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InicioController;


Route::get('/',[InicioController::class,'index']);

Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout']);


