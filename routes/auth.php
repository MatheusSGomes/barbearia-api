<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
  $credentials = $request->only(['email', 'password']);
  $user = User::whereEmail($credentials['email'])->first();

  $token = $user->createToken('token');
  $check = Hash::check($credentials['password'], $user->password);

  if ($check) {
      return response()->json([
          "message" => "Login realizado com sucesso"
      ], 200, [
          "Authorization" => 'Bearer '.$token->plainTextToken,
          'Accept' => 'application/json',
      ]);
  } else {
      return response()->json(["message" => "Senha ou e-mail inválido"], 401);
  }
});

Route::post('/register', [UserController::class, 'store']);