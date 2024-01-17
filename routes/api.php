<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Api\GuestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('users', UserController::class);
Route::apiResource('guests', GuestController::class);

// Route::delete('/users/{id}', [UserController::class, 'destroy']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::get("/users/{id}", [UserController::class, 'show']);
// Route::get("/users", [UserController::class, 'index']);
// Route::post("/users", [UserController::class, 'store']);


Route::get('/', function () {
    return "Hello World";
});
