<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ingredient_id',
        'amount',
        'unit',
        'date'
    ];
}
