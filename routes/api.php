<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rota para registro de novo usuário
Route::post('register', [AuthController::class, 'register']);

// Rota para autenticação (login)
Route::post('login', [AuthController::class, 'login']);


// Rotas acessíveis para todos os usuários
Route::get('users', 'UserController@index');
Route::post('users', 'UserController@store');
Route::delete('users/{user}', 'UserController@destroy');
Route::get('veiculos', 'VeiculoController@index');
Route::get('reservas', 'ReservaController@index');
Route::post('reservas', 'ReservaController@store');
Route::delete('reservas/{reserva}', 'ReservaController@destroy');

// Rotas acessíveis apenas para administradores
Route::group(['middleware' => 'role:admin'], function () {
    Route::post('veiculos', 'VeiculoController@store');
    Route::delete('veiculos/{veiculo}', 'VeiculoController@destroy');
});