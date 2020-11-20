<?php

namespace App\Http\Controllers;

use App\Http\Resources\Type as TypeResource;
use App\Models\Type;
use App\Repositories\Contracts\TypeRepositoryInterface;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    protected $repository;

    public function __construct(TypeRepositoryInterface $repository)
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
        return TypeResource::collection($this->repository->all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new TypeResource($this->repository->store($request)))
            ->additional(['message' => 'Type Created'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return new TypeResource($this->repository->find($type));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        return (new TypeResource($this->repository->update($request, $type)))
            ->additional(['message' => 'Type Updated'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        return (new TypeResource($this->repository->delete($type)))
            ->additional(['message' => 'Type Deleted'])
            ->response()
            ->setStatusCode(200);
    }
}
