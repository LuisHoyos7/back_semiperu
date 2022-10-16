<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Controllers\ProductController;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user =  User::where('id',Auth::user()->id)->with('roles', 'permissions')->get();
    return $user;
});

