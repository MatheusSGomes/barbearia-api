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

    $token = $user->createToken('token');

    // dd($token->plainTextToken );
    // return response()->json($token->plainTextToken);

    $check = Hash::check($credentials['password'], $user->password);

    if ($check) {
        return response()->json(["message" => "Login realizado com sucesso"], 200);
    } else {
        return response()->json(["message" => "Senha ou e-mail inválido"], 401);
    }
});

Route::post('/register', function (Request $request) {
    try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return response()->json([
            "message" => "Usuário cadastrado com sucesso"
        ], 200);
    } catch (Exception $e) {
        return response()->json([
            "message" => "Não foi possível cadastrar o usuário"
        ]);
    }
});

Route::get('/protegida', function () {
    return response()->json(["message" => "Rota protegida"], 200);
})->middleware('auth:sanctum');




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

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