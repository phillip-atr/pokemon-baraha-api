<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'class_id',
        'type_id',
        'group_id',
        'avatar',
        'user_id'
    ];
}
