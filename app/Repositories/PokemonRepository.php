<?php

namespace App\Repositories;

use App\Models\Pokemon;
use App\Repositories\Contracts\PokemonRepositoryInterface;

class PokemonRepository implements PokemonRepositoryInterface
{
    /**
     * Show list of pokemons
     */
    public function all()
    {
        return Pokemon::all();
    }

    /**
     * Show only a pokemon
     */
    public function find($pokemon)
    {
        return Pokemon::find($pokemon);
    }

    /**
     * Store a pokemon
     */
    public function store($request)
    {
        return Pokemon::create($request->all());
    }

    /**
     * Update a pokemon
     */
    public function update($request, $pokemon)
    {
        $pokemon->update($request->all());
        return $this->find($pokemon);
    }

    /**
     * Delete a pokemon
     */
    public function delete($pokemon)
    {
        $pokemon->delete();
        return $this->find($pokemon);
    }
}