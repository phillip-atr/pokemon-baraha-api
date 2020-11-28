<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TrainerRepositoryInterface;
use App\Models\Trainer;
use App\Http\Resources\Trainer as TrainerResource;

class TrainerController extends Controller
{
    protected $repository;

    public function __construct(TrainerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrainerResource::collection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new TrainerResource($this->repository->store($request)))
            ->additional(['message' => 'Trainer Record Created'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        return new TrainerResource($this->repository->find($trainer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        return (new TrainerResource($this->repository->update($request, $trainer)))
            ->additional(['message' => 'Trainer Record Updated'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        return (new TrainerResource($this->repository->delete($trainer)))
            ->additional(['message' => 'Trainer Record Deleted'])
            ->response()
            ->setStatusCode(200);
    }
}
