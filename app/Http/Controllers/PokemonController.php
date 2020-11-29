<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\Contracts\PokemonRepositoryInterface;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected $repository;

    public function __construct(PokemonRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('trainer_id')) {
            return PokemonResource::collection($this->repository->all($request->get('trainer_id')));
        }
        return PokemonResource::collection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new PokemonResource($this->repository->store($request)))
            ->additional(['message' => 'Pokemon Record Created'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        return new PokemonResource($pokemon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        return (new PokemonResource($this->repository->update($request, $pokemon)))
            ->additional(['message' => 'Pokemon Record Updated'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        return (new PokemonResource($this->repository->delete($pokemon)))
            ->additional(['message' => 'Pokemon Record Deleted'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Display list of Pokemons by trainer
     * 
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        return PokemonResource::collection($this->repository->filter($request));
    }
}
