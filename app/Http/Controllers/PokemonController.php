<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Responses\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PokemonController extends Controller
{
    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'tipo' => 'required|string|max:15',
            'pontosdepoder' => 'required|int',
        ]);

        if ($validator->fails()) {
            return ApiResponses::error($validator->errors(), 'validation error');
        }

        $pokemon = Pokemon::create($request->all());
        return ApiResponses::success("Pokémon salvo com sucesso", $pokemon);
    }

    public function listartodos()
    {
        $pokemons = Pokemon::all(); 
        return response()->json([
            'status' => true,
            'message' => 'Pokémon listado com sucesso',
            'data' => $pokemons
        ], 200);
    }

    public function listarpeloID(int $id)
    {
        $pokemon = Pokemon::findOrFail($id); 
        return response()->json([
            'status' => true, 
            'message' => 'Pokémon encontrado com sucesso', 
            'data' => $pokemon
        ], 200);
    }

    public function editar(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'tipo' => 'required|string|max:15',
            'pontosdepoder' => 'required|int',
        ]);

        if ($validator->fails()) {
            return ApiResponses::error($validator->errors(), 'validation error');
        }

        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());
        
        return ApiResponses::success("Pokémon editado com sucesso", $pokemon);
    }

    public function remover(int $id)
    {
        $pokemon = Pokemon::findOrFail($id); 
        $pokemon->delete();
        return response()->json([
            'status' => true,
            'message' => 'Pokémon removido com sucesso'
        ], 200);
    }
}