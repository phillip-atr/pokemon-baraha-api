<?php

namespace App\Repositories;

use App\Models\Trainer;
use App\Repositories\Contracts\TrainerRepositoryInterface;

class TrainerRepository implements TrainerRepositoryInterface
{
    /**
     * Show list of trainers
     */
    public function all()
    {
        return Trainer::all();
    }

    /**
     * Show only a trainer
     */
    public function find($trainer)
    {
        return Trainer::find($trainer);
    }

    /**
     * Store a trainer
     */
    public function store($request)
    {
        return Trainer::create($request->all());
    }

    /**
     * Update a trainer
     */
    public function update($request, $trainer)
    {
        $trainer->update($request->all());
        return $this->find($trainer);
    }

    /**
     * Delete a trainer
     */
    public function delete($trainer)
    {
        $trainer->delete();
        return $this->find($trainer);
    }
}