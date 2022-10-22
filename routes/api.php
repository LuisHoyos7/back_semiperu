<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;;

Route::get('/user', [UserController::class,'index']);

// Route::get('client', [ClientController::class])
Route::apiResource('client', ClientController::class);


