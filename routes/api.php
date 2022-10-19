<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user =  User::where('id',Auth::user()->id)->with('roles', 'permissions')->get();
    return $user;
});

// Route::get('client', [ClientController::class])
Route::apiResource('client', ClientController::class);

