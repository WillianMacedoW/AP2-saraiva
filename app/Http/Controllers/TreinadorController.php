<?php

namespace App\Http\Controllers;

use App\Models\Treinador;
use App\Responses\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreinadorController extends Controller
{
    public function salvarTreinador(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'idade' => 'required|int',
        ]);

        if ($validator->fails()) {
            return ApiResponses::error($validator->errors(), 'validation error');
        }

        $treinador = Treinador::create($request->all());
        return ApiResponses::success("Treinador salvo com sucesso", $treinador);
    }

    public function listartodosTreinador()
    {
        $treinadores = Treinador::all();
        return response()->json([
            'status' => true,
            'message' => 'Treinadores listados com sucesso',
            'data' => $treinadores
        ], 200);
    }

    public function listarpeloIDTreinador(int $id)
    {
        $treinador = Treinador::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Treinador encontrado com sucesso',
            'data' => $treinador
        ], 200);
    }

    public function editarTreinador(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'idade' => 'required|int',
        ]);

        if ($validator->fails()) {
            return ApiResponses::error($validator->errors(), 'validation error');
        }

        $treinador = Treinador::findOrFail($id);
        $treinador->update($request->all());

        return ApiResponses::success("Treinador editado com sucesso", $treinador);
    }

    public function removerTreinador(int $id)
    {
        $treinador = Treinador::findOrFail($id);
        $treinador->delete();

        return response()->json([
            'status' => true,
            'message' => 'Treinador removido com sucesso'
        ], 200);
    }
}

