<?php

namespace App\Repositories;

use App\Models\Type;
use App\Repositories\CategoryInterface;

class TypeRepository implements CategoryInterface
{
    /**
     * Show list of types
     */
    public function all()
    {
        return Type::all();
    }

    /**
     * Show only a type
     */
    public function find($type)
    {
        return Type::find($type);
    }

    /**
     * Store a type
     */
    public function store($request)
    {
        return Type::create($request->all());
    }

    /**
     * Update a type
     */
    public function update($request, $type)
    {
        $type->update($request->all());
        return $this->find($type);
    }

    /**
     * Delete a type
     */
    public function delete($type)
    {
        $type->delete();
        return $this->find($type);
    }
}