<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassResource;
use App\Models\ClassModel;
use App\Repositories\Contracts\ClassRepositoryInterface;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $repository;

    public function __construct(ClassRepositoryInterface $repository)
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
        return ClassResource::collection($this->repository->all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new ClassResource($this->repository->store($request)))
            ->additional(['message' => 'Class Created'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClassModel $class)
    {
        return new ClassResource($this->repository->find($class));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassModel $class)
    {
        return (new ClassResource($this->repository->update($request, $class)))
            ->additional(['message' => 'Class Updated'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassModel $class)
    {
        return (new ClassResource($this->repository->delete($class)))
            ->additional(['message' => 'Class Deleted'])
            ->response()
            ->setStatusCode(200);
    }
}
