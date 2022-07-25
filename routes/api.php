<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return ['user' => $request->user()];
});

Route::post('/login', AuthController::class);
Route::post('/users/store', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('products', ProductController::class);
    
    Route::post('/logout', [UserController::class, 'logout']);
    Route::apiResource('users', UserController::class)->except(['store']);
});
