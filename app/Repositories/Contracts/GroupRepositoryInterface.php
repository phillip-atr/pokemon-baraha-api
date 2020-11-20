<?php

namespace App\Repositories\Contracts;

interface GroupRepositoryInterface
{
    public function all();

    public function find($id);

    public function store($request);

    public function update($request, $id);

    public function delete($id);
}