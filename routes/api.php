<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TreinadorController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/pokemon", [PokemonController::class,"salvar"]);
Route::get("/pokemon", [PokemonController::class,"listartodos"]);
Route::get("/pokemon/{id}", [PokemonController::class,"listarpeloID"]);
Route::delete("/pokemon/{id}", [PokemonController::class,"remover"]);
Route::put("/pokemon/{id}", [PokemonController::class,"editar"]);


Route::post("/treinador", [TreinadorController::class,"salvartreinador"]);
Route::get("/treinador", [TreinadorController::class,"listartodostreinador"]);
Route::get("/treinador/{id}", [TreinadorController::class,"listarpeloIDtreinador"]);
Route::delete("/treinador/{id}", [TreinadorController::class,"removertreinador"]);
Route::put("/treinador/{id}", [TreinadorController::class,"editartreinador"]);
