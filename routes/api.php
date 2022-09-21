<?php

include 'auth.php';

use App\Http\Controllers\{
    AgendamentoController, 
    UserController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('/agenda', AgendamentoController::class);
Route::apiResource('/usuario', UserController::class);




Route::get('/protegida', function () {
    return response()->json(["message" => "Rota protegida acessada"], 200);
});
