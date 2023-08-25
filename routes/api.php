<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


// Rotas para o AdminController (acessíveis somente por administradores autenticados)
Route::middleware(['auth:api', 'isAdmin'])->group(function () {
    Route::get('/admins', [AdminController::class, 'index']);
    Route::post('/admins', [AdminController::class, 'store']);
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy']);
});

// Rotas para o ClientController (acessíveis somente por clientes autenticados)
Route::middleware(['auth:api', 'isClient'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index']);
    Route::put('/clients/update', [ClientController::class, 'update']);
    Route::get('/clients/{client}', [ClientController::class, 'show']);
});

// Rotas para o CategoryController (acessíveis para todos os usuários autenticados)
Route::middleware('auth:api')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});

// Rotas para o ReservationController (acessíveis para todos os usuários autenticados)
Route::middleware('auth:api')->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show']);
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy']);
});

// Rotas para o VehicleController (acessíveis para todos os usuários autenticados)
Route::middleware('auth:api')->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show']);
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update']);
    Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy']);
});
