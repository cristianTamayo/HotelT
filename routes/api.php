<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registroHabitacion',[App\Http\Controllers\HabitacionController::class, 'registroHabitacion']);

Route::get('/consultaHabitacion/{id}',[App\Http\Controllers\HabitacionController::class, 'consultaHabitacion']);

Route::post('/consultaHabitacionCodigo',[App\Http\Controllers\HabitacionController::class, 'consultaHabitacionCodigo']);

Route::get('/listarHabitaciones',[App\Http\Controllers\HabitacionController::class, 'listarHabitaciones']);

Route::get('/eliminarHabitacion/{id}',[App\Http\Controllers\HabitacionController::class, 'eliminarHabitacion']);

Route::post('/actualizarHabitacion',[App\Http\Controllers\HabitacionController::class, 'actualizarHabitacion']);