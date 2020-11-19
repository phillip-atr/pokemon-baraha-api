<?php

namespace App\Repositories;

use App\Models\ClassModel;
use App\Repositories\CategoryInterface;

class ClassRepository implements CategoryInterface
{
    /**
     * Show list of classes
     */
    public function all()
    {
        return ClassModel::all();
    }

    /**
     * Show only a class
     */
    public function find($class)
    {
        return ClassModel::find($class);
    }

    /**
     * Store a class
     */
    public function store($request)
    {
        return ClassModel::create($request->all());
    }

    /**
     * Update a class
     */
    public function update($request, $class)
    {
        $class->update($request->all());
        return $this->find($class);
    }

    /**
     * Delete a class
     */
    public function delete($class)
    {
        $class->delete();
        return $this->find($class);
    }
}