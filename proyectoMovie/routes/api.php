<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[App\Http\Controllers\Api\AuthController::class, 'register']);

Route::post('login',[App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('logout',[App\Http\Controllers\Api\AuthController::class, 'logout']);  

   //productos

   Route::get('productos',[App\Http\Controllers\ProductoController::class, 'index']);

   Route::get('productos/{id}',[App\Http\Controllers\ProductoController::class, 'mostrar']);

   Route::post('productos',[App\Http\Controllers\ProductoController::class, 'store']);

   Route::post('productos/update/{id}',[App\Http\Controllers\ProductoController::class, 'update']);

   Route::delete('productos/delete/{id}',[App\Http\Controllers\ProductoController::class, 'destroy']);


});
