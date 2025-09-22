<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/v1/auth/register', RegisterController::class);
Route::post('/v1/auth/login', LoginController::class);

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('todos', TodoController::class);
});
