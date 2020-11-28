<?php

namespace App\Http\Resources;

use App\Models\ClassModel;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class Trainer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
            'class' => $this->class,
            'type' => $this->type,
            'group' => $this->group,
            'max_catch' => $this->max_catch,
            'reset_catch' => $this->reset_catch,
            'number_of_pokemons' => count($this->pokemons)
        ];
    }
}
