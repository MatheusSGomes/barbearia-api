<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', function (Request $request) {

    try {
        $credentials = $request->only(['email', 'password']);
        $user = User::whereEmail($credentials['email'])->first();
        $token = $user->createToken('token');
        $check = Hash::check($credentials['password'], $user->password);

        if ($check) {
            return response()->json([
                "message" => "Login realizado com sucesso"
            ], 200, [
                "Authorization" => 'Bearer '.$token->plainTextToken,
                'Accept' => 'application/json'
            ]);
        } else {
            return response()->json(["message" => "Senha ou e-mail inválido"], 401);
        }
    } catch (\Throwable $th) {
        return response()->json(["message" => "Senha ou e-mail inválido"], 401);
    }
  
});

Route::post('/logout', function (Request $request) {
    // $auth = $request->header('Authorization');
    // $user = User::where('api_token', $auth)->first();
    // $token = PersonalAccessToken::where('token', $auth);
    
    try {
        $token = $request->bearerToken();
        $findUser = PersonalAccessToken::findToken($token);
        $user = $findUser->tokenable;

        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(["message" => "Usuário deslogado com sucesso"]);
    } catch (Exception $e) {
        return response()->json(["message" => "Não foi possível deslogar"]);
    }
});