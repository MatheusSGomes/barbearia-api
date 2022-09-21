<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\{
    Request, 
    JsonResponse
};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            
            return response()->json([
                "message" => "Usuário cadastrado com sucesso"
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Não foi possível cadastrar o usuário"
            ], 403);
        }
      }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json(["message" => "Usuário atualizado com sucesso", "data" => $user], 202);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["message" => "Usuário apagado com sucesso"], 200);
    }
}
