<?php

use App\Http\Controllers\AgendamentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/agenda', [AgendamentoController::class, 'index']);
Route::post('/agenda', [AgendamentoController::class, 'store']);
Route::get('/agenda/{id}', [AgendamentoController::class, 'show']);
Route::put('/agenda/{id}', [AgendamentoController::class, 'update']);
Route::delete('/agenda/{id}', [AgendamentoController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
