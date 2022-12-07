<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', [UserController::class,'index']);

// Route::get('client', [ClientController::class])
Route::apiResource('client', ClientController::class);
Route::apiResource('project', ProjectController::class);
Route::apiResource('sub_obras', SubObraController::class);
Route::apiResource('order_buy', OrderBuyController::class);
Route::apiResource('request_buy', RequestBuyController::class);
Route::post('/request_buy/change_status/{requestBuy}', 'RequestBuyController@changeStatus');
Route::post('/order_buy/change_status/{orderBuy}', 'OrderBuyController@changeStatus');
Route::apiResource('acts', ActController::class);



