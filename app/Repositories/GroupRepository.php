<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\CategoryInterface;

class GroupRepository implements CategoryInterface
{
    /**
     * Show list of groups
     */
    public function all()
    {
        return Group::all();
    }

    /**
     * Show only a group
     */
    public function find($group)
    {
        return Group::find($group);
    }

    /**
     * Store a group
     */
    public function store($request)
    {
        return Group::create($request->all());
    }

    /**
     * Update a group
     */
    public function update($request, $group)
    {
        $group->update($request->all());
        return $this->showGroup($group);
    }

    /**
     * Delete a group
     */
    public function delete($group)
    {
        $group->delete();
        return $this->showGroup($group);
    }
}