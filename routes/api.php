<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChurchController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\CellController;
use App\Http\Controllers\Api\GuestController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MemberController;

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
    //usuários
    Route::apiResource('users', UserController::class);

    //igrejas
    Route::apiResource('churches', ChurchController::class);

    // visitantes
    Route::apiResource('guests', GuestController::class);
    Route::get('guests/church/{fkCodChurch}', [GuestController::class, 'indexByChurch']);

    // membros
    Route::apiResource('members', MemberController::class);
    Route::get('members/church/{fkCodChurch}', [MemberController::class, 'indexByChurch']);

    // departamentos
    Route::apiResource('departments', DepartmentController::class);
    // células
    Route::apiResource('cells', CellController::class);
    Route::get('cells/church/{fkCodChurch}', [CellController::class, 'indexByChurch']);

    //logout
    Route::post('logout', [AuthController::class, 'logout']);
});

//login
Route::post('login', [AuthController::class, 'login']);
Route::post('members', [MemberController::class, 'store']);




// Route::delete('/users/{id}', [UserController::class, 'destroy']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::get("/users/{id}", [UserController::class, 'show']);
// Route::get("/users", [UserController::class, 'index']);
// Route::post("/users", [UserController::class, 'store']);


Route::get('/', function () {
    return "Hello World";
});
