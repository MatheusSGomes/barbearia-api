<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/agenda', function ()
{
    return [
        [
            "nome" => "João",
            "email" => "joao@email.com",
            "whatsap" => "61 9089-9089",
            "servicos" => [
                "corte",
                "sobrancelhas",
                "barba",
                "hidratação"
            ],
            "horario" => "seg-13-14"
        ],
        [
            "nome" => "Felipe",
            "email" => "felipe@email.com",
            "whatsap" => "61 8797-8977",
            "servicos" => [
                "corte",
                "sobrancelhas",
                "barba",
                "hidratação"
            ],
            "horario" => "seg-14-15"
        ],
    ];
});

Route::post('/agenda', function (Request $request) {
    dd($request->all());
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
