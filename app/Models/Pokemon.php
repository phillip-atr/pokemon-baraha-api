<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'type',
        'weakness',
        'resistance',
        'nickname',
        'pokemon_id',
        'trainer_id',
        'favorite'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
