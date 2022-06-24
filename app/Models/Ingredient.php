<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'apiIngredientId'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'ingredients_users');
    }
    public function likes()
    {
        return $this->belongsToMany(User::class,'favorite_ingredients');
    }
}
