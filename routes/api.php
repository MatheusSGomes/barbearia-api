<?php

use App\Http\Controllers\AgendamentoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::apiResource('/agenda', AgendamentoController::class);

Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    $user = User::whereEmail($credentials['email'])->first();
    $check = Hash::check($credentials['password'], $user->password);

    if ($check) {
        return ["message" => "Login realizado com sucesso"];
    } else {
        return ["message" => "Senha ou e-mail inválido"];
    }
});

Route::post('/register', function (Request $request) {
    try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return [
            "message" => "Usuário cadastrado com sucesso"
        ];
    } catch (Exception $e) {
        return [
            "message" => "Não foi possível cadastrar o usuário"
        ];
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/criar-usuario', function() {
//     $user = Auth::user();
//     dd(Auth::user());
//     $token = $user->createToken('token');
//     return response()->json($token->plainTextToken);
// });

// Route::post('/tokens/create', function (Request $request) {
//     dd($request->user());
//     $token = $request->user()->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// });