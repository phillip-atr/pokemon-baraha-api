<?php

namespace App\Repositories;

use App\Models\Pokemon;
use App\Repositories\Contracts\PokemonRepositoryInterface;

class PokemonRepository implements PokemonRepositoryInterface
{
    /**
     * Show list of pokemons
     */
    public function all($trainer = null)
    {
        if ($trainer) {
            return Pokemon::where('trainer_id', $trainer)->get();
        }
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

    /**
     * Show list by filter
     */
    public function filter($request)
    {
        $pokemon = Pokemon::where('created_at', '!=', 'NULL');

        if (!empty($request->get('trainer_id'))) {
            $pokemon->where('trainer_id', $request->trainer_id);
        }

        if (!empty($request->get('search'))) {
            $pokemon->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if (!empty($request->get('type'))) {
            $pokemon->where('type', $request->type);
        }

        if (!empty($request->get('weakness'))) {
            $pokemon->where('weakness', $request->weakness);
        }

        if (!empty($request->get('resistance'))) {
            $pokemon->where('resistance', $request->resistance);
        }

        return $pokemon->get();
    }
}
