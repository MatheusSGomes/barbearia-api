<?php

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/agenda', function () {
    return response()->json(Agendamento::all(), 200);
});

Route::post('/agenda', function (Request $request) {
    $agendamento = new Agendamento;
    $agendamento->nome = $request->nome;
    $agendamento->email = $request->email;
    $agendamento->whatsapp = $request->whatsapp;
    $agendamento->horario = $request->horario;
    $agendamento->corte = $request->servicos['corte'];
    $agendamento->sobrancelhas = $request->servicos['sobrancelhas'];
    $agendamento->barba = $request->servicos['barba'];
    $agendamento->hidratacao = $request->servicos['hidratacao'];
    $agendamento->save();

    return response()->json([
        "message"=>"Agendamento realizado com sucesso", 
        "data" => $agendamento->attributesToArray()
    ], 200);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
