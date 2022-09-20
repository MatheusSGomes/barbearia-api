<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        return response()->json(Agendamento::all(), 200);
    }

    public function store(Request $request)
    {
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
    }

    public function show($id)
    {
        $agendamento = Agendamento::find($id);
        return response()->json($agendamento, 200);
    }

    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::find($id);
        $agendamento->nome = $request->nome;
        $agendamento->email = $request->email;
        $agendamento->whatsapp = $request->whatsapp;
        $agendamento->corte = $request->corte;
        $agendamento->sobrancelhas = $request->sobrancelhas;
        $agendamento->barba = $request->barba;
        $agendamento->hidratacao = $request->hidratacao;
        $agendamento->horario = $request->horario;
        $agendamento->save();

        return response()->json(["message"=> "Agendamento atualizado com sucesso"], 200);
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::find($id);
        $agendamento->delete();
        return response()->json(["message" => "Agendamento apagado com sucesso"], 200);
    }
}
